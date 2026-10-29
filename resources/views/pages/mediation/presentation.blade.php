@extends('layouts.app')

@section('title', 'Présentation — Mécanisme & Médiateur Financier — CNEF Gabon')
@php($breadcrumb = 'Présentation')

@section('content')
{{-- HERO PRÉSENTATION --}}
<section class="sec" style="background:var(--vert-f);padding-top:48px;padding-bottom:52px">
  <div class="stag light">Rubrique Officielle B.2 · Architecture du Dispositif</div>
  <h1 class="sh light" style="font-size:clamp(26px,5vw,38px);margin-bottom:12px">
    Présentation de la Médiation Financière
  </h1>
  <p class="si light" style="max-width:820px;margin-bottom:24px">
    Découvrez l'organisation institutionnelle, les missions d'intérêt général, le cadre légal et les garanties d'indépendance offertes par le Médiateur Financier en République Gabonaise.
  </p>

  {{-- Sous-navigation interne fluide --}}
  <div style="display:flex;gap:12px;flex-wrap:wrap">
    <a href="#mecanisme" class="btn-or">
      1. Mécanisme de Médiation
    </a>
    <a href="#mediateur" class="btn-ghost" style="color:#fff;border-color:rgba(255,255,255,.3)">
      2. Le Médiateur Financier
    </a>
    <a href="{{ route('mediation.recours') }}" class="btn-ghost" style="color:#fff;border-color:rgba(255,255,255,.3)">
      Recours à la médiation →
    </a>
  </div>
</section>

{{-- ========================================================================= --}}
{{-- ── SOUS-RUBRIQUE 1 : PRÉSENTATION GÉNÉRALE DU MÉCANISME DE MÉDIATION ──   --}}
{{-- ========================================================================= --}}
<section id="mecanisme" class="sec" style="background:#fff;padding-top:56px;padding-bottom:56px">
  <div class="stag">Sous-rubrique 1</div>
  <h2 class="sh">Présentation générale du Mécanisme de Médiation</h2>
  <p class="si">
    Le mécanisme de médiation financière a été mis en place pour garantir aux usagers gabonais un accès simple, rapide et gratuit à une justice amiable de proximité.
  </p>

  {{-- a. Fondement Institutionnel --}}
  <div style="background:var(--gris);border:1px solid var(--brd);border-radius:var(--rl);padding:32px;margin-bottom:36px">
    <div style="display:flex;align-items:center;gap:10px;margin-bottom:12px">
      <span style="font-size:12px;font-weight:700;color:var(--vert);background:var(--vert-c);padding:4px 10px;border-radius:6px;text-transform:uppercase;letter-spacing:.06em">
        Point a
      </span>
      <h3 style="font-family:'Space Grotesk',sans-serif;font-size:20px;font-weight:600;color:var(--txt);margin:0">
        Fondement Institutionnel &amp; Cadre Juridique
      </h3>
    </div>
    <p style="font-size:14px;color:var(--txt2);line-height:1.75;margin-bottom:20px">
      La médiation financière au Gabon puise sa légitimité dans un corpus normatif national promulgué au plus haut niveau de l'État et articulé en parfaite conformité avec les réglementations prudentielles de la zone CEMAC :
    </p>

    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(260px,1fr));gap:16px">
      <div style="background:#fff;border:1px solid var(--brd);border-radius:10px;padding:18px">
        <div style="font-size:11px;font-weight:700;color:var(--vert);text-transform:uppercase;margin-bottom:4px">Décret Exécutif</div>
        <div style="font-size:14px;font-weight:600;color:var(--txt);margin-bottom:6px">Décret N° 0121/PR/MEP du 21 mars 2024</div>
        <p style="font-size:12.5px;color:var(--txt2);line-height:1.6;margin:0">
          Portant création, attributions, organisation et fonctionnement de la médiation financière en République Gabonaise.
        </p>
      </div>

      <div style="background:#fff;border:1px solid var(--brd);border-radius:10px;padding:18px">
        <div style="font-size:11px;font-weight:700;color:var(--or-d);text-transform:uppercase;margin-bottom:4px">Arrêté Ministériel</div>
        <div style="font-size:14px;font-weight:600;color:var(--txt);margin-bottom:6px">Arrêté N° 001.25 MEP du 07 janvier 2025</div>
        <p style="font-size:12.5px;color:var(--txt2);line-height:1.6;margin:0">
          Fixant les modalités de la procédure de médiation financière, les délais d'instruction et les conditions de clôture.
        </p>
      </div>

      <div style="background:#fff;border:1px solid var(--brd);border-radius:10px;padding:18px">
        <div style="font-size:11px;font-weight:700;color:var(--bleu);text-transform:uppercase;margin-bottom:4px">Arrêté Ministériel</div>
        <div style="font-size:14px;font-weight:600;color:var(--txt);margin-bottom:6px">Arrêté N° 002.25 MEP du 07 janvier 2025</div>
        <p style="font-size:12.5px;color:var(--txt2);line-height:1.6;margin:0">
          Fixant la procédure de désignation, le statut, les incompatibilités et les attributions des médiateurs financiers.
        </p>
      </div>
    </div>
  </div>

  {{-- b. Missions & c. Objectifs --}}
  <div style="display:grid;grid-template-columns:1fr 1fr;gap:28px;margin-bottom:36px" class="contact-grid">
    {{-- b. Missions --}}
    <div style="background:#fff;border:1.5px solid var(--vert-c);border-radius:var(--rl);padding:28px">
      <div style="display:flex;align-items:center;gap:10px;margin-bottom:14px">
        <span style="font-size:11.5px;font-weight:700;color:var(--vert);background:var(--vert-c);padding:3px 9px;border-radius:6px;text-transform:uppercase">
          Point b
        </span>
        <h3 style="font-family:'Space Grotesk',sans-serif;font-size:18px;font-weight:600;color:var(--txt);margin:0">
          Missions du Dispositif
        </h3>
      </div>
      <ul style="padding-left:18px;font-size:13.5px;color:var(--txt2);line-height:1.75;display:flex;flex-direction:column;gap:10px;margin:0">
        <li><strong>Règlement amiable :</strong> Favoriser la conciliation et la résolution non juridictionnelle des différends opposant usagers et institutions assujetties.</li>
        <li><strong>Protection active des usagers :</strong> Assurer le respect des droits des consommateurs de services financiers et l'équité des relations contractuelles.</li>
        <li><strong>Éducation &amp; Confiance :</strong> Renforcer la transparence du système financier gabonais et la confiance du grand public dans les acteurs bancaires, de microfinance et d'assurance.</li>
        <li><strong>Recommandations structurelles :</strong> Formuler des préconisations d'amélioration des pratiques professionnelles et suggérer des évolutions réglementaires aux autorités de tutelle.</li>
      </ul>
    </div>

    {{-- c. Objectifs --}}
    <div style="background:#fff;border:1.5px solid var(--or-p);border-radius:var(--rl);padding:28px">
      <div style="display:flex;align-items:center;gap:10px;margin-bottom:14px">
        <span style="font-size:11.5px;font-weight:700;color:var(--or-d);background:var(--or-p);padding:3px 9px;border-radius:6px;text-transform:uppercase">
          Point c
        </span>
        <h3 style="font-family:'Space Grotesk',sans-serif;font-size:18px;font-weight:600;color:var(--txt);margin:0">
          Objectifs Stratégiques
        </h3>
      </div>
      <ul style="padding-left:18px;font-size:13.5px;color:var(--txt2);line-height:1.75;display:flex;flex-direction:column;gap:10px;margin:0">
        <li><strong>Déjudiciarisation :</strong> Prévenir l'encombrement des tribunaux civils et commerciaux en réglant les litiges par accord transactionnel sans frais de justice.</li>
        <li><strong>Célérité :</strong> Traiter chaque requête dans un délai strict de <strong>90 jours maximum</strong> après examen de recevabilité sous 5 jours ouvrés.</li>
        <li><strong>Accessibilité &amp; Gratuité :</strong> Ouvrir le recours sans aucune barrière financière pour les personnes physiques consommatrices.</li>
        <li><strong>Équité :</strong> Rétablir l'équilibre des forces entre le client particulier et la structure financière par une instruction neutre et contradictoire.</li>
      </ul>
    </div>
  </div>

  {{-- d. Périmètre d'intervention --}}
  <div style="background:var(--gris);border:1px solid var(--brd);border-radius:var(--rl);padding:32px;margin-bottom:36px">
    <div style="display:flex;align-items:center;gap:10px;margin-bottom:14px">
      <span style="font-size:11.5px;font-weight:700;color:var(--vert);background:var(--vert-c);padding:3px 9px;border-radius:6px;text-transform:uppercase">
        Point d
      </span>
      <h3 style="font-family:'Space Grotesk',sans-serif;font-size:20px;font-weight:600;color:var(--txt);margin:0">
        Périmètre d'intervention
      </h3>
    </div>
    <p style="font-size:14px;color:var(--txt2);line-height:1.7;margin-bottom:20px">
      Le champ de compétence de la médiation financière est rigoureusement délimité par les articles 4 et 7 du Décret N° 0121/PR/MEP.
    </p>

    <div style="display:grid;grid-template-columns:1fr 1fr;gap:20px" class="contact-grid">
      <div style="background:#fff;border:1px solid #10B981;border-radius:10px;padding:22px">
        <div style="font-size:13px;font-weight:700;color:#065F46;margin-bottom:10px;display:flex;align-items:center;gap:6px">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#10B981" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
          Litiges RECEVABLES en Médiation
        </div>
        <ul style="padding-left:18px;font-size:13px;color:var(--txt2);line-height:1.7;display:flex;flex-direction:column;gap:6px;margin:0">
          <li>Litiges individuels entre personnes physiques et établissements agréés au Gabon.</li>
          <li>Contestation de commissions, frais de tenue de compte, agios et tarification.</li>
          <li>Opérations de crédit : erreurs de décompte, conditions de remboursement, garanties.</li>
          <li>Moyens de paiement : virements bloqués, cartes bancaires, litiges Mobile Money.</li>
          <li>Contrats d'assurance : retards d'indemnisation de sinistres, contestation d'expertise.</li>
          <li>Épargne et placements financiers sur le marché financier sous régulation COSUMAF.</li>
        </ul>
      </div>

      <div style="background:#fff;border:1px solid #EF4444;border-radius:10px;padding:22px">
        <div style="font-size:13px;font-weight:700;color:#991B1B;margin-bottom:10px;display:flex;align-items:center;gap:6px">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#EF4444" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><line x1="15" y1="9" x2="9" y2="15"/><line x1="9" y1="9" x2="15" y2="15"/></svg>
          Litiges EXCLUS et Irrecevables
        </div>
        <ul style="padding-left:18px;font-size:13px;color:var(--txt2);line-height:1.7;display:flex;flex-direction:column;gap:6px;margin:0">
          <li>Différends entre personnes morales ou professionnels pour leurs besoins d'exploitation.</li>
          <li>Litiges déjà soumis à une juridiction de l'ordre judiciaire ou arbitral.</li>
          <li>Dossiers ayant déjà fait l'objet d'un jugement définitif ou d'une décision de justice.</li>
          <li>Absence de réclamation écrite préalable auprès de l'établissement financier.</li>
          <li>Demandes introduites plus d'un (1) an après la réclamation écrite préalable.</li>
          <li>Refus d'octroi de crédit (décision relevant de la politique de risque de la banque).</li>
        </ul>
      </div>
    </div>
  </div>

  {{-- e. Procédure --}}
  <div style="background:#fff;border:1px solid var(--brd);border-radius:var(--rl);padding:32px">
    <div style="display:flex;align-items:center;gap:10px;margin-bottom:14px">
      <span style="font-size:11.5px;font-weight:700;color:var(--vert);background:var(--vert-c);padding:3px 9px;border-radius:6px;text-transform:uppercase">
        Point e
      </span>
      <h3 style="font-family:'Space Grotesk',sans-serif;font-size:20px;font-weight:600;color:var(--txt);margin:0">
        Déroulement de la Procédure de Médiation
      </h3>
    </div>
    <p style="font-size:14px;color:var(--txt2);line-height:1.7;margin-bottom:24px">
      Fixée par l'Arrêté N° 001.25 MEP, la procédure s'articule en cinq étapes séquentielles garantissant le contradictoire :
    </p>

    <ol class="med-steps" style="margin-bottom:0">
      <li class="ms-item">
        <div class="ms-num">1</div>
        <div>
          <div class="ms-t">Phase Préalable : Réclamation écrite (45 jours)</div>
          <div class="ms-d">Le requérant doit adresser une réclamation écrite à l'établissement. La saisine du CNEF n'est recevable qu'après rejet exprès ou au terme d'un délai d'attente de <strong>45 jours</strong> sans réponse.</div>
        </div>
      </li>
      <li class="ms-item">
        <div class="ms-num">2</div>
        <div>
          <div class="ms-t">Saisine formelle &amp; Délivrance du Code MF-</div>
          <div class="ms-d">Dépôt du dossier en ligne sur le portail ou par courrier. Un récépissé avec code de suivi confidentiel (format <strong>MF-AAAA-XXXXXX</strong>) est automatiquement remis au demandeur.</div>
        </div>
      </li>
      <li class="ms-item">
        <div class="ms-num">3</div>
        <div>
          <div class="ms-t">Examen de recevabilité (5 jours) &amp; Notification à la banque (15 jours)</div>
          <div class="ms-d">Le Secrétariat vérifie la conformité sous 5 jours ouvrés. L'établissement financier mis en cause dispose ensuite de <strong>15 jours</strong> pour accepter formellement la démarche amiable.</div>
        </div>
      </li>
      <li class="ms-item">
        <div class="ms-num">4</div>
        <div>
          <div class="ms-t">Instruction contradictoire &amp; Conciliation (90 jours max)</div>
          <div class="ms-d">Le Médiateur analyse les arguments, auditionne les parties si nécessaire, réclame communication des pièces et formule une proposition de solution équitable.</div>
        </div>
      </li>
      <li class="ms-item">
        <div class="ms-num">5</div>
        <div>
          <div class="ms-t">Issue &amp; Protocole d'accord exécutoire</div>
          <div class="ms-d">Si la solution est acceptée, les parties signent un <strong>protocole d'accord transactionnel</strong> ayant force obligatoire. Il clôt définitivement le litige et peut être homologué en justice.</div>
        </div>
      </li>
    </ol>
  </div>
</section>

{{-- ========================================================================= --}}
{{-- ── SOUS-RUBRIQUE 2 : LA PRÉSENTATION DU MÉDIATEUR FINANCIER ──            --}}
{{-- ========================================================================= --}}
<section id="mediateur" class="sec" style="background:var(--gris);padding-top:56px;padding-bottom:56px">
  <div class="stag">Sous-rubrique 2</div>
  <h2 class="sh">La Présentation du Médiateur Financier</h2>
  <p class="si">
    Autorité morale indépendante assermentée, le Médiateur Financier est le garant de la neutralité et de l'équité des débats.
  </p>

  <div style="display:grid;grid-template-columns:1.2fr 1fr;gap:36px;align-items:start" class="contact-grid">
    <div>
      <div style="background:#fff;border:1px solid var(--brd);border-radius:var(--rl);padding:30px;margin-bottom:24px">
        <h3 style="font-family:'Space Grotesk',sans-serif;font-size:18px;font-weight:600;color:var(--txt);margin-bottom:12px">
          Statut, Nomination &amp; Indépendance
        </h3>
        <p style="font-size:13.5px;color:var(--txt2);line-height:1.75;margin-bottom:16px">
          Conformément au Décret N° 0121/PR/MEP et à l'Arrêté N° 002.25 MEP, les fonctions de Médiateur Financier sont confiées à des personnalités d'une compétence juridique et financière éprouvée (Master + 5 ans d'encadrement supérieur ou Licence + 10 ans), reconnues pour leur probité et leur impartialité.
        </p>
        <p style="font-size:13.5px;color:var(--txt2);line-height:1.75;margin-bottom:16px">
          Le mandat est d'une durée de <strong>trois (3) ans renouvelable une seule fois</strong>. Durant l'exercice de son mandat, le Médiateur ne peut recevoir d'instructions d'aucune autorité administrative ou bancaire.
        </p>

        <div style="background:var(--vert-c);border:1px solid var(--brd);border-radius:8px;padding:16px;display:flex;align-items:center;gap:12px">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="var(--vert)" stroke-width="2"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6"/></svg>
          <div style="font-size:13px;color:var(--vert-f);line-height:1.6">
            <strong>Prestation de serment :</strong> Avant son entrée en fonction, chaque médiateur prête serment garantissant son impartialité et son respect absolu du secret professionnel.
          </div>
        </div>
      </div>

      <div style="background:#fff;border:1px solid var(--brd);border-radius:var(--rl);padding:30px">
        <h3 style="font-family:'Space Grotesk',sans-serif;font-size:18px;font-weight:600;color:var(--txt);margin-bottom:12px">
          Organisation par Branche de Compétence
        </h3>
        <p style="font-size:13.5px;color:var(--txt2);line-height:1.7;margin-bottom:16px">
          Le dispositif prévoit la désignation d'un médiateur titulaire et d'un suppléant pour chacune des 3 branches d'activité financière au Gabon :
        </p>
        <div style="display:flex;flex-direction:column;gap:10px">
          <div style="padding:10px 14px;background:var(--gris);border-radius:8px;display:flex;justify-content:space-between;align-items:center">
            <span style="font-size:13px;font-weight:600;color:var(--txt)">Branche 1 : Crédit, Microfinance &amp; Paiement</span>
            <span style="font-size:11px;color:var(--vert);font-weight:700">1 Titulaire + 1 Suppléant</span>
          </div>
          <div style="padding:10px 14px;background:var(--gris);border-radius:8px;display:flex;justify-content:space-between;align-items:center">
            <span style="font-size:13px;font-weight:600;color:var(--txt)">Branche 2 : Compagnies d'Assurance</span>
            <span style="font-size:11px;color:var(--bleu);font-weight:700">1 Titulaire + 1 Suppléant</span>
          </div>
          <div style="padding:10px 14px;background:var(--gris);border-radius:8px;display:flex;justify-content:space-between;align-items:center">
            <span style="font-size:13px;font-weight:600;color:var(--txt)">Branche 3 : Intermédiaires de Marché</span>
            <span style="font-size:11px;color:var(--or-d);font-weight:700">1 Titulaire + 1 Suppléant</span>
          </div>
        </div>
      </div>
    </div>

    <div>
      <div style="background:var(--vert-f);border-radius:var(--rl);padding:30px;color:#fff;margin-bottom:24px">
        <div style="font-size:11.5px;font-weight:700;color:var(--or);text-transform:uppercase;letter-spacing:.08em;margin-bottom:8px">Appel à Candidature</div>
        <h3 style="font-family:'Space Grotesk',sans-serif;font-size:18px;font-weight:600;color:#fff;margin-bottom:12px">
          Devenir Médiateur Financier
        </h3>
        <p style="font-size:13px;color:rgba(255,255,255,.8);line-height:1.7;margin-bottom:20px">
          Le recrutement des médiateurs s'effectue sur appel public à candidature ouvert aux professionnels du droit et de la finance répondant aux critères stricts de l'Arrêté 002.25.
        </p>
        <a href="{{ route('mediation.candidature') }}" class="btn-or" style="width:100%;justify-content:center">
          Consulter l'appel à candidature →
        </a>
      </div>

      <div style="background:#fff;border:1px solid var(--brd);border-radius:var(--rl);padding:26px">
        <h4 style="font-size:15px;font-weight:600;color:var(--txt);margin-bottom:10px">Permanence du Secrétariat</h4>
        <p style="font-size:13px;color:var(--txt2);line-height:1.65;margin-bottom:16px">
          Le Secrétariat Général du CNEF assure le soutien matériel, l'enregistrement des saisines et la notification des actes de médiation.
        </p>
        <div style="display:flex;flex-direction:column;gap:8px;font-size:13px;color:var(--txt)">
          <div>📍 Siège BEAC Libreville, Boulevard Triomphal</div>
          <div>📞 Standard : +241 11 72 20 00 / 01 79 34 00</div>
          <div>✉️ <a href="mailto:mediation@cnef.ga" style="color:var(--vert);font-weight:600">mediation@cnef.ga</a></div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
