<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ChatbotController extends Controller
{
    public function respond(Request $request): JsonResponse
    {
        $data = $request->validate(['message' => ['required', 'string', 'max:800']]);
        $message = Str::lower(Str::ascii($data['message']));

        $intents = [
            [['suivre', 'suivi dossier', 'suivi mediation', 'etat dossier', 'code confidentiel', 'reference saisine', 'ou en est'], "Vous pouvez suivre l’instruction de votre saisine de médiation en direct grâce à votre code confidentiel (format MF-YYYY-XXXXXX) sur l’espace de suivi.", 'Suivre mon dossier', route('mediation.suivi')],
            [['saisine', 'deposer', 'formulaire', 'litige', 'plainte', 'reclamation', 'fraude', 'compte bloque', 'argent'], "Le recours à la médiation financière est 100% gratuit, indépendant et confidentiel. Vous pouvez soumettre votre saisine directement en ligne.", 'Déposer une saisine', route('mediation.recours').'#formulaire'],
            [['qui', 'quand', 'comment', 'delai', 'recevable', 'condition', 'procedure'], "La saisine du Médiateur est ouverte à toute personne physique cliente d'un établissement adhérent, après réclamation écrite préalable restée sans réponse sous 45 jours.", 'Consulter la procédure', route('mediation.recours')],
            [['adherent', 'banque', 'emf', 'microfinance', 'assurance', 'paiement', 'airtel', 'moov', 'bgfi', 'bicig', 'ecobank', 'liste'], "Le dispositif compte 48 établissements financiers formellement adhérents répartis en 3 branches (Crédit/EMF/Paiement, Assurances, Intermédiaires de marché).", 'Voir les adhérents', route('mediation.adherents')],
            [['fondement', 'decret', 'mission', 'role', 'qui est', 'mediateur', 'presentation'], "Institué par le Décret N° 0121/PR/MEP du 21 mars 2024, le Médiateur Financier a pour mission de régler à l'amiable les différends entre usagers et établissements assujettis.", 'Découvrir la médiation', route('mediation.presentation')],
            [['texte', 'reglement', 'loi', 'rapport', 'fonds', 'document', 'decret'], "Le fonds documentaire rassemble les textes légaux communautaires (CEMAC, COBAC, CIMA, COSUMAF) et nationaux, ainsi que les rapports annuels.", 'Consulter les textes', route('mediation.fonds-documentaire')],
            [['contact', 'telephone', 'email', 'adresse', 'horaire', 'beac', 'situe', 'siege', 'courrier'], "Le Secrétariat de la Médiation est situé à la Direction Nationale de la BEAC, Boulevard Triomphal à Libreville. Téléphone : +241 11 72 20 00 / Email : mediation@cnef.ga.", 'Contacts utiles', route('mediation.contacts')],
            [['candidat', 'candidature', 'postuler', 'devenir mediateur'], "Le CNEF lance périodiquement des appels à candidatures pour le poste de Médiateur Financier. Vous pouvez déposer votre dossier en ligne.", 'Postuler comme Médiateur', route('mediation.candidature')],
            [['faq', 'question', 'reponse', 'aide'], "Consultez notre foire aux questions pour tout comprendre sur la recevabilité, les délais et les effets du protocole d'accord.", 'Consulter la FAQ', route('mediation.recours').'#faq'],
            [['actualite', 'nouvelle', 'communique'], "Consultez les dernières actualités et communiqués officiels relatifs à la médiation financière et au secteur bancaire.", 'Voir les actualités', route('mediation.actualites')],
        ];

        foreach ($intents as [$terms, $answer, $label, $url]) {
            if (collect($terms)->contains(fn (string $term) => str_contains($message, $term))) {
                return response()->json(compact('answer') + ['action' => compact('label', 'url')]);
            }
        }

        return response()->json([
            'answer' => "Je suis l'assistant du Portail de la Médiation Financière en République Gabonaise. Je peux vous orienter sur la saisine en ligne, le suivi de votre dossier (code MF-), les établissements adhérents, les textes légaux ou nos coordonnées.",
            'action' => ['label' => 'Déposer une saisine', 'url' => route('mediation.recours').'#formulaire'],
        ]);
    }
}

