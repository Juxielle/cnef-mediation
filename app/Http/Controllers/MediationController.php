<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMediateurCandidatureRequest;
use App\Http\Requests\StoreMediationRequestRequest;
use App\Mail\MediationConfirmationMail;
use App\Models\Actualite;
use App\Models\MediateurCandidature;
use App\Models\MediationEtablissement;
use App\Models\MediationKpi;
use App\Models\MediationLitige;
use App\Models\MediationRequest as MediationRequestModel;
use App\Models\MediationSaisineTrimestre;
use App\Models\TexteReglementaire;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\View\View;

class MediationController extends Controller
{
    /**
     * B.1 - ACCUEIL du Portail Numérique de la Médiation Financière.
     * Messages d'accroche continus, informations d'ordre général et actualités.
     */
    public function index(Request $request): View|RedirectResponse
    {
        $tab = $request->query('tab');

        if ($tab === 'candidature') {
            return $this->candidature($request);
        }

        if ($tab === 'saisine') {
            return redirect()->route('mediation.recours', ['#formulaire']);
        }

        if ($tab === 'stats') {
            return $this->activites($request);
        }

        $tickerMessages = $this->getTickerMessages();
        $mediationKpis = MediationKpi::orderBy('ordre')->get();
        $articlesMediation = $this->getArticlesMediation();
        $actualitesCnef = Actualite::where('categorie', 'reglementation')
            ->orWhere('categorie', 'communique')
            ->orderBy('ordre')
            ->take(3)
            ->get();
        $adherentsTotal = MediationEtablissement::where('actif', true)->count();
        $branches = $this->getBranches();

        return view('pages.mediation.accueil', compact(
            'tickerMessages',
            'mediationKpis',
            'articlesMediation',
            'actualitesCnef',
            'adherentsTotal',
            'branches'
        ));
    }

    /**
     * B.2 - PRESENTATION du Mécanisme de Médiation Financière.
     * Sous-rubriques :
     * 1. Présentation générale (Fondement, Missions, Objectifs, Périmètre, Procédure)
     * 2. Présentation du Médiateur Financier
     */
    public function presentation(Request $request): View
    {
        $branches = $this->getBranches();
        $mediationKpis = MediationKpi::orderBy('ordre')->get();
        $textesNationaux = TexteReglementaire::where('categorie', 'mediation')
            ->orderBy('ordre')
            ->get();

        return view('pages.mediation.presentation', compact('branches', 'mediationKpis', 'textesNationaux'));
    }

    /**
     * B.3 - RECOURS A LA MEDIATION.
     * Sous-rubriques :
     * 1. Saisine du Médiateur (Qui ? Quand ? Quels litiges ? Comment ?)
     * 2. Voies de Saisine (En ligne, courrier postal, dépôt physique)
     * 3. Demande de Médiation (Formulaire en ligne)
     * 4. Suivi des Demandes de Médiation
     * 5. Foire aux questions (FAQ)
     */
    public function recours(Request $request): View
    {
        $etablissements = $this->getEtablissements();
        $naturesLitige = $this->getNaturesLitige();
        $selectedEtablissement = trim($request->query('etablissement', ''));
        $mediationKpis = MediationKpi::orderBy('ordre')->get();
        $faqs = $this->getFaqs();

        $reference = trim($request->query('reference', ''));
        $dossier = null;
        if ($reference !== '') {
            $dossier = MediationRequestModel::where('reference', strtoupper($reference))->first();
        }

        return view('pages.mediation.recours', compact(
            'etablissements',
            'naturesLitige',
            'selectedEtablissement',
            'mediationKpis',
            'faqs',
            'reference',
            'dossier'
        ));
    }

    /**
     * B.4 - ETABLISSEMENTS ADHERENTS.
     * Liste des établissements assujettis ayant formellement adhéré,
     * répartis selon les 3 branches officielles du dispositif.
     */
    public function adherents(Request $request): View
    {
        $branchesAdherents = $this->getAdherentsParBranche();
        $totalAdherents = MediationEtablissement::where('actif', true)->count();

        return view('pages.mediation.adherents', compact('branchesAdherents', 'totalAdherents'));
    }

    /**
     * B.5 - FONDS DOCUMENTAIRE.
     * 1. Rapports Annuels
     * 2. Réglementation (a. Textes Communautaires, b. Textes Nationaux)
     */
    public function fondsDocumentaire(Request $request): View
    {
        $rapportsAnnuels = $this->getRapportsAnnuels();
        $textesNationaux = TexteReglementaire::where('categorie', 'mediation')
            ->orderBy('ordre')
            ->get();
        $textesRegionaux = $this->getTextesRegionaux();

        return view('pages.mediation.fonds-documentaire', compact('rapportsAnnuels', 'textesNationaux', 'textesRegionaux'));
    }

    /**
     * B.6 - CONTACTS UTILES.
     * Coordonnées complètes du Médiateur Financier, Secrétariat CNEF
     * (auprès de la BEAC Libreville), horaires et autorités de tutelle/régulation.
     */
    public function contacts(Request $request): View
    {
        return view('pages.mediation.contacts');
    }

    /**
     * Raccourci/compatibilité : Textes réglementaires vers Fonds Documentaire.
     */
    public function textes(Request $request): View
    {
        return $this->fondsDocumentaire($request);
    }

    /**
     * Page Actualités de la médiation : communications officielles, rapports et campagnes.
     */
    public function actualites(Request $request): View
    {
        $actualitesCnef = Actualite::where('categorie', 'reglementation')
            ->orWhere('categorie', 'communique')
            ->orderBy('ordre')
            ->get();

        $articlesMediation = $this->getArticlesMediation();

        return view('pages.mediation.actualites', compact('actualitesCnef', 'articlesMediation'));
    }

    /**
     * Page Activités du Médiateur : bilan chiffré, statistiques et indicateurs.
     */
    public function activites(Request $request): View
    {
        $etablissements = $this->getEtablissements();
        $naturesLitige = $this->getNaturesLitige();
        $mediationKpis = MediationKpi::orderBy('ordre')->get();
        $litiges = MediationLitige::orderBy('ordre')->get();
        $saisinesTrimestrielles = MediationSaisineTrimestre::orderBy('ordre')->get();

        return view('pages.mediation.activites', compact(
            'etablissements',
            'naturesLitige',
            'mediationKpis',
            'litiges',
            'saisinesTrimestrielles'
        ));
    }

    /**
     * Page Candidature Médiateur : conditions d'éligibilité, dossier requis et formulaire de candidature.
     */
    public function candidature(Request $request): View
    {
        $branches = $this->getBranches();

        return view('pages.mediation.candidature', compact('branches'));
    }

    /**
     * Page de suivi d'un dossier de médiation grâce au code confidentiel MF-.
     */
    public function suivi(Request $request): View
    {
        $reference = trim($request->query('reference', ''));
        $dossier = null;

        if ($reference !== '') {
            $dossier = MediationRequestModel::where('reference', strtoupper($reference))->first();
        }

        return view('pages.mediation.suivi', compact('dossier', 'reference'));
    }

    /**
     * Recherche d'un dossier de médiation par formulaire.
     */
    public function trackSuivi(Request $request): View
    {
        $data = $request->validate([
            'reference' => ['required', 'string', 'max:50'],
        ], [
            'reference.required' => 'Veuillez renseigner votre code confidentiel de dossier.',
        ]);

        $reference = strtoupper(trim($data['reference']));
        $dossier = MediationRequestModel::where('reference', $reference)->first();

        return view('pages.mediation.suivi', compact('dossier', 'reference'));
    }

    /**
     * Enregistre une saisine de médiation soumise par un citoyen, génère un code confidentiel MF-
     * et transmet un accusé de réception par e-mail.
     */
    public function storeSaisine(StoreMediationRequestRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $pieces = [];
        if ($request->hasFile('pieces')) {
            foreach ($request->file('pieces') as $file) {
                $pieces[] = $file->store('mediation/saisines', 'local');
            }
        }

        do {
            $reference = 'MF-'.now()->format('Y').'-'.Str::upper(Str::random(6));
        } while (MediationRequestModel::where('reference', $reference)->exists());

        $saisine = MediationRequestModel::create([
            'reference' => $reference,
            'prenom' => $data['prenom'],
            'nom' => $data['nom'],
            'email' => $data['email'],
            'telephone' => $data['telephone'] ?? null,
            'etablissement' => $data['etablissement'],
            'nature_litige' => $data['nature_litige'],
            'description' => $data['description'],
            'pieces_jointes' => $pieces,
            'statut' => 'nouveau',
            'date_traitement' => now(),
        ]);

        try {
            Mail::to($data['email'])->send(new MediationConfirmationMail($saisine));
        } catch (\Throwable $e) {
            Log::warning('Échec envoi mail confirmation saisine médiation : '.$e->getMessage());
        }

        return redirect()->route('mediation.suivi', ['reference' => $reference])
            ->with('dossier_cree', true)
            ->with('dossier_reference', $reference)
            ->with('success', "Votre saisine a été enregistrée avec succès. Votre code confidentiel de suivi est : {$reference}. Un e-mail de confirmation vous a été envoyé.");
    }

    /**
     * Enregistre une candidature de médiateur financier.
     */
    public function storeCandidature(StoreMediateurCandidatureRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $pieces = [];
        if ($request->hasFile('pieces')) {
            foreach ($request->file('pieces') as $file) {
                $pieces[] = $file->store('mediation/candidatures', 'local');
            }
        }

        MediateurCandidature::create([
            'prenom' => $data['prenom'],
            'nom' => $data['nom'],
            'email' => $data['email'],
            'telephone' => $data['telephone'] ?? null,
            'branche' => $data['branche'],
            'lettre_motivation' => $data['lettre_motivation'] ?? null,
            'pieces_jointes' => $pieces,
            'statut' => 'recue',
        ]);

        return redirect()->route('mediation.candidature')
            ->with('success', "Candidature enregistrée avec succès, {$data['prenom']}. Le CNEF étudiera votre dossier lors du prochain appel à candidature.");
    }

    /**
     * Messages d'accroche diffusés en continu (Ticker B.1).
     */
    private function getTickerMessages(): array
    {
        return [
            '⚖️ Dispositif public officiel institué par le Décret N° 0121/PR/MEP du 21 mars 2024.',
            '🛡️ Recours 100% gratuit, indépendant et confidentiel ouvert à tous les particuliers en République Gabonaise.',
            '⏱️ Traitement accéléré : examen de recevabilité sous 5 jours ouvrés et résolution sous 90 jours maximum.',
            '🤝 Plus de 88% d’accords amiables obtenus entre usagers et établissements assujettis.',
            '🏦 48 établissements financiers formellement adhérents (Banques, EMF, Paiement, Assurances, Marchés financiers).',
            '📜 Tout protocole d’accord signé par les parties a force obligatoire et clôt définitivement le litige.',
        ];
    }

    /**
     * Foire aux questions officielle (FAQ B.3).
     */
    private function getFaqs(): array
    {
        return [
            [
                'question' => 'La saisine du Médiateur Financier est-elle payante ?',
                'reponse' => 'Non. La saisine du Médiateur Financier est entièrement gratuite pour les personnes physiques consommatrices de services financiers (article 6 du Décret N° 0121/PR/MEP). Aucun frais d’ouverture de dossier, d’instruction ou de clôture ne peut vous être réclamé.',
            ],
            [
                'question' => 'Quelle démarche dois-je accomplir avant de pouvoir saisir le Médiateur ?',
                'reponse' => 'Vous devez impérativement avoir préalablement adressé une réclamation écrite (courrier ou e-mail circonstancié) au service réclamations ou à la direction de votre établissement financier. Si vous essuyez un refus ou si vous ne recevez aucune réponse dans un délai de 45 jours (ou 30 jours pour certains services de paiement), la voie de la médiation vous est officiellement ouverte.',
            ],
            [
                'question' => 'Dans quel délai puis-je saisir le Médiateur ?',
                'reponse' => 'Votre saisine doit être introduite auprès du Médiateur dans un délai maximum d’un (1) an à compter de la date de votre réclamation écrite préalable auprès de l’établissement financier.',
            ],
            [
                'question' => 'Quels sont les types de litiges recevables ?',
                'reponse' => 'Sont recevables tous les litiges individuels portant sur la gestion des comptes de dépôt, les opérations de crédit, les frais et agios bancaires, les cartes bancaires, les virements, les opérations de monnaie électronique (Mobile Money), l’exécution des contrats d’assurance vie et non-vie, et la gestion des instruments financiers.',
            ],
            [
                'question' => 'Quels sont les litiges expressément exclus de la médiation ?',
                'reponse' => 'Sont exclus : les litiges entre professionnels agissant pour leurs activités commerciales, les différends déjà portés devant un tribunal judiciaire ou ayant fait l’objet d’un jugement définitif, les litiges sans réclamation écrite préalable, ainsi que les contestations de politique générale des taux d’intérêt ou de refus d’octroi d’un crédit.',
            ],
            [
                'question' => 'La solution proposée par le Médiateur est-elle obligatoire ?',
                'reponse' => 'Le Médiateur propose une solution amiable fondée sur le droit et l’équité. Les parties restent libres d’accepter ou de refuser cette proposition. Toutefois, dès lors que les deux parties signent le protocole d’accord, celui-ci acquiert une force obligatoire et met un terme définitif au litige sans qu’un recours judiciaire ultérieur ne soit recevable.',
            ],
            [
                'question' => 'Combien de temps dure la procédure de médiation ?',
                'reponse' => 'Le Secrétariat accuse réception et examine la recevabilité de votre demande sous 5 jours ouvrés. La durée maximale de la médiation est de trois (3) mois à compter de la recevabilité du dossier. Ce délai peut exceptionnellement être prorogé de deux (2) mois avec l’accord exprès des parties.',
            ],
            [
                'question' => 'Comment suivre l’avancement de mon dossier de saisine ?',
                'reponse' => 'Lors de la soumission de votre demande en ligne, un code confidentiel unique vous est automatiquement attribué (ex : MF-2026-ABC123) et confirmé par e-mail. Vous pouvez saisir ce code à tout moment dans la rubrique « Suivi des demandes » du portail pour connaître l’étape exacte de son instruction.',
            ],
        ];
    }

    /**
     * Rapports Annuels et Guides du Fonds Documentaire (B.5).
     */
    private function getRapportsAnnuels(): array
    {
        return [
            [
                'titre' => 'Rapport Annuel d’Activité de la Médiation Financière — Exercice 2024',
                'annee' => '2024',
                'format' => 'PDF',
                'taille' => '2.4 Mo',
                'description' => 'Bilan statistique exhaustif des saisines reçues, typologies des litiges résolus par branche, délais moyens d’instruction et recommandations formulées aux autorités de tutelle.',
            ],
            [
                'titre' => 'Guide Pratique du Consommateur Financier au Gabon — Édition 2025',
                'annee' => '2025',
                'format' => 'PDF',
                'taille' => '1.8 Mo',
                'description' => 'Manuel didactique expliquant les droits fondamentaux des usagers des banques, EMF, assurances et opérateurs de mobile money, ainsi que la marche à suivre pour résoudre un différend.',
            ],
            [
                'titre' => 'Bilan Périodique d’Étape du Dispositif de Médiation (S1 2025)',
                'annee' => '2025',
                'format' => 'PDF',
                'taille' => '1.1 Mo',
                'description' => 'Indicateurs de performance du premier semestre : taux d’adhésion des établissements, volume de requêtes traitées et cartographie sectorielle des réclamations.',
            ],
            [
                'titre' => 'Charte Déontologique et Procédurale du Médiateur Financier',
                'annee' => '2024',
                'format' => 'PDF',
                'taille' => '650 Ko',
                'description' => 'Engagements éthiques des médiateurs assermentés : indépendance, neutralité, respect du secret professionnel et traitement contradictoire équitable.',
            ],
            [
                'titre' => 'Modèle officiel de lettre de réclamation préalable auprès de l’établissement',
                'annee' => '2025',
                'format' => 'DOCX / PDF',
                'taille' => '220 Ko',
                'description' => 'Modèle type prêt à l’emploi pour formuler votre première démarche écrite obligatoire auprès de votre banque, microfinance ou assureur.',
            ],
        ];
    }

    /**
     * Textes régionaux CEMAC / COBAC / CIMA / COSUMAF (B.5).
     */
    private function getTextesRegionaux(): array
    {
        return [
            [
                'institution' => 'COBAC',
                'titre' => 'Règlement R-2020/06 — Traitement des réclamations clientèle',
                'description' => 'Obligations imposées aux banques et EMF pour la gestion préalable et diligente des réclamations formulées par les usagers.',
                'annee' => '2020',
            ],
            [
                'institution' => 'COBAC / UMAC',
                'titre' => 'Règlement N° 01/20/CEMAC/UMAC/COBAC — Protection des consommateurs bancaires',
                'description' => 'Transparence des conditions tarifaires, clauses abusives, information précontractuelle et obligations de conseil.',
                'annee' => '2020',
            ],
            [
                'institution' => 'CIMA',
                'titre' => 'Code CIMA des Assurances — Dispositions de protection des assurés',
                'description' => 'Règles régissant le règlement des sinistres, les délais d’indemnisation et les voies de recours amiables.',
                'annee' => 'Consolidé',
            ],
            [
                'institution' => 'COSUMAF',
                'titre' => 'Règlement Général COSUMAF — Protection des épargnants et investisseurs',
                'description' => 'Dispositifs garantissant l’intégrité des opérations et le traitement impartial des épargnants sur le marché financier régional de la CEMAC.',
                'annee' => '2022',
            ],
        ];
    }

    /**
     * Articles d'actualité de la médiation (B.1 & actualités).
     */
    private function getArticlesMediation(): array
    {
        return [
            [
                'titre' => 'Entrée en vigueur effective des arrêtés d’application 2025 sur la médiation financière',
                'date' => '15 Janvier 2025',
                'categorie' => 'Réglementation',
                'badge_couleur' => '#059669',
                'description' => 'Le Ministère de l’Économie et des Participations et le Secrétariat Général du CNEF confirment l’opérationnalisation des Arrêtés 001.25 et 002.25 encadrant les trois branches de médiation financière au Gabon.',
            ],
            [
                'titre' => 'Campagne nationale d’information : « Connaître et défendre ses droits de consommateur financier »',
                'date' => '28 Février 2025',
                'categorie' => 'Sensibilisation',
                'badge_couleur' => '#E8A317',
                'description' => 'Déploiement d’ateliers d’information et de guides pratiques à destination du grand public pour faire connaître le caractère gratuit et obligatoire du recours préalable en médiation.',
            ],
            [
                'titre' => 'Bilan d’étape du dispositif de médiation : plus de 88% d’accords amiables trouvés',
                'date' => '10 Mai 2025',
                'categorie' => 'Statistiques & Bilan',
                'badge_couleur' => '#2563EB',
                'description' => 'Le rapport périodique met en avant un délai moyen de résolution de 24 jours, principalement sur des contestations d’opérations de paiement électronique et de frais bancaires.',
            ],
            [
                'titre' => 'Appel public à candidatures pour les fonctions de médiateurs financiers et suppléants',
                'date' => '07 Juin 2025',
                'categorie' => 'Appel à candidature',
                'badge_couleur' => '#8B5CF6',
                'description' => 'Ouverture officielle de la campagne de dépôt de candidatures pour les médiateurs des branches Banque/Paiement, Assurances et Marchés financiers conformément à l’Arrêté 002.25.',
            ],
        ];
    }

    /**
     * Liste des établissements adhérents classés selon les 3 branches officielles (B.4).
     */
    private function getAdherentsParBranche(): array
    {
        $dbItems = MediationEtablissement::where('actif', true)
            ->orderBy('ordre')
            ->get();

        $branches = [
            1 => [
                'num' => 1,
                'titre' => 'Branche 1 : Établissements de Crédit, Établissements de Microfinance & Établissements de Paiement',
                'supervision' => 'COBAC / BEAC',
                'description' => 'Regroupe l’ensemble des banques commerciales, sociétés de cautionnement, institutions de microfinance (EMF) et opérateurs de paiement électronique/mobile money assujettis.',
                'badge' => '#059669',
                'sous_groupes' => [
                    '1- Établissements de crédits' => [],
                    '2- Établissements de Micro Finance (EMF)' => [],
                    '3- Établissements de paiement' => [],
                ],
                'total' => 0,
            ],
            2 => [
                'num' => 2,
                'titre' => 'Branche 2 : Compagnies d’Assurance et de Réassurance',
                'supervision' => 'CIMA / CRCA / DGA',
                'description' => 'Regroupe les compagnies d’assurance vie et non-vie, mutuelles, courtiers d’assurance et sociétés de réassurance opérant sur le territoire gabonais sous l’égide du Code CIMA.',
                'badge' => '#2563EB',
                'sous_groupes' => [
                    '4- Assurances' => [],
                ],
                'total' => 0,
            ],
            3 => [
                'num' => 3,
                'titre' => 'Branche 3 : Intermédiaires de Marché & Sociétés de Gestion',
                'supervision' => 'COSUMAF',
                'description' => 'Regroupe les sociétés de bourse, sociétés de gestion de portefeuille d’OPCVM, conseillers en investissement financier et intermédiaires de marché agréés.',
                'badge' => '#E8A317',
                'sous_groupes' => [
                    '5- Intermédiaires marchés' => [],
                ],
                'total' => 0,
            ],
        ];

        foreach ($dbItems as $item) {
            $cat = $item->categorie;
            if (isset($branches[1]['sous_groupes'][$cat])) {
                $branches[1]['sous_groupes'][$cat][] = $item;
                $branches[1]['total']++;
            } elseif (isset($branches[2]['sous_groupes'][$cat])) {
                $branches[2]['sous_groupes'][$cat][] = $item;
                $branches[2]['total']++;
            } elseif (isset($branches[3]['sous_groupes'][$cat])) {
                $branches[3]['sous_groupes'][$cat][] = $item;
                $branches[3]['total']++;
            }
        }

        return $branches;
    }

    /**
     * Liste des établissements assujettis classés par groupe pour le champ de sélection.
     */
    private function getEtablissements(): array
    {
        $dbItems = MediationEtablissement::where('actif', true)
            ->orderBy('ordre')
            ->get();

        if ($dbItems->isNotEmpty()) {
            $grouped = [];
            foreach ($dbItems as $item) {
                $grouped[$item->categorie][] = $item->nom;
            }
            return $grouped;
        }

        return [
            '1- Établissements de crédits' => [
                'AFG Bank',
                'BGFI Bank Gabon',
                'Citibank-Gabon',
                'Ecobank Gabon',
                'Orabank Gabon',
                'UGB',
                'UBA',
                'BCEG',
                'BOA GABON',
                'Coris Bank International (CBI Gabon)',
                'Alios Finance',
                'Société de Garantie du Gabon (SGG)',
            ],
            '2- Établissements de Micro Finance (EMF)' => [
                'CECAG EMF',
                'CFEC EMF',
                'SOCREPA EMF',
                'CECAA EMF',
                'COOFIGA EMF',
                'COFIDEC EMF',
                'EMERALD SECURITIES SERVICES',
                'FINAM',
                'SODEC EMF',
                'EXPRESS UNION',
                'EDG EMF',
                'LA REGIONALE EMF',
                'FIDELIS EMF',
                'COFINA EMF',
                'BAMBOO EMF',
                'La PEYRIE',
                'AMIFA EMF',
                'ARIANE FINANCE EMF',
                'SIBAFI',
            ],
            '3- Établissements de paiement' => [
                'AIRTEL MONEY',
                'CLIKPAY GABON',
                'MOOV MONEY',
            ],
            '4- Assurances' => [
                'BGFI ASSURANCE',
                'SANLAM ASSURANCE',
                'AXA GABON',
                'OGAR',
                'SUNU ASSURANCES',
                'NSIA ASSURANCES',
                'SGRE',
            ],
            '5- Intermédiaires marchés' => [
                'BGFIBourse',
                'FINANCIA ASSET MANAGEMENT',
                'AFRICA BRIGHT ASSET MANAGEMENT',
                'ESS BOURSE',
                'ELITE CAPITAL GROUP',
                'DIGITAL BOURSE',
                'FEDHEN CAPITAL',
            ],
        ];
    }

    /**
     * Typologies de litiges recevables.
     */
    private function getNaturesLitige(): array
    {
        $dbNatures = MediationLitige::orderBy('ordre')->pluck('nature')->toArray();
        if (!empty($dbNatures)) {
            return $dbNatures;
        }

        return [
            'Contestation de frais ou commission',
            'Refus de crédit ou de service',
            'Problème de remboursement de crédit',
            'Clôture ou blocage de compte',
            'Transaction non autorisée / fraude',
            'Sinistre assurance non réglé',
            'Problème de transfert ou virement',
            'Pratique commerciale abusive',
            'Autre différend financier',
        ];
    }

    /**
     * Les trois branches de la médiation financière (Décret N° 0121/PR/MEP).
     */
    private function getBranches(): array
    {
        return [
            [
                'num' => 1,
                'titre' => 'Crédit, Microfinance & Paiement',
                'supervision' => 'COBAC / BEAC',
                'description' => 'Banques commerciales, établissements de crédit, institutions de microfinance (EMF), opérateurs de mobile money et émetteurs de monnaie électronique.',
            ],
            [
                'num' => 2,
                'titre' => "Compagnies d'assurance",
                'supervision' => 'CIMA / CRCA / DGA',
                'description' => "Compagnies d'assurance vie et dommages, mutuelles, courtiers, agents généraux et réassureurs soumis au Code CIMA.",
            ],
            [
                'num' => 3,
                'titre' => 'Intermédiaires de marché',
                'supervision' => 'COSUMAF',
                'description' => 'Sociétés de bourse, sociétés de gestion de portefeuille d’OPCVM, conseillers en investissements financiers et dépositaires agréés.',
            ],
        ];
    }
}
