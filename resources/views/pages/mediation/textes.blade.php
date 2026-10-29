@extends('layouts.app')

@section('title', 'Règlements — Médiation Financière')
@php($breadcrumb = 'Règlements')

@section('content')
<section class="sec" style="background:var(--vert-f);padding-top:48px;padding-bottom:50px">
  <div class="stag light">Corpus Juridique Officiel</div>
  <h1 class="sh light">Règlements de la Médiation</h1>
  <p class="si light">L'ensemble des actes réglementaires, décrets et arrêtés ministériels encadrant l'organisation, la procédure de saisine et le statut des médiateurs financiers au Gabon.</p>

  <div style="display:flex;gap:12px;flex-wrap:wrap;margin-top:24px">
    <a href="{{ route('mediation.presentation') }}" class="btn-ghost" style="color:#fff;border-color:rgba(255,255,255,.25)">
      ← Présentation de la médiation
    </a>
    <a href="{{ route('mediation.activites') }}#saisine" class="btn-or">
      Déposer une saisine
    </a>
  </div>
</section>

{{-- ========================================================================= --}}
{{-- ── SECTION 1 : TEXTES NATIONAUX DE RÉFÉRENCE ──                           --}}
{{-- ========================================================================= --}}
<section class="sec" style="padding-top:56px;padding-bottom:56px;background:#fff">
  <div class="stag">République Gabonaise</div>
  <h2 class="sh">Actes réglementaires nationaux</h2>
  <p class="si">Les textes fondateurs promulgués pour instituer et régir la médiation financière sur le territoire national.</p>

  <div style="display:flex;flex-direction:column;gap:20px;margin-top:32px">
    {{-- Décret 0121 --}}
    <div style="background:var(--gris);border:1px solid var(--brd);border-radius:var(--rl);padding:28px">
      <div style="display:flex;align-items:flex-start;justify-content:space-between;flex-wrap:wrap;gap:12px;margin-bottom:12px">
        <div>
          <span style="font-size:11px;font-weight:700;color:var(--vert);background:var(--vert-c);padding:4px 10px;border-radius:6px;text-transform:uppercase;letter-spacing:.08em">Décret Exécutif</span>
          <span style="margin-left:10px;font-size:13px;font-weight:600;color:var(--txt)">Réf. N° 0121/PR/MEP</span>
        </div>
        <span style="font-size:12.5px;color:var(--txt3)">21 mars 2024</span>
      </div>
      <h3 style="font-family:'Space Grotesk',sans-serif;font-size:18px;font-weight:600;color:var(--txt);margin-bottom:10px">
        Décret portant création, attributions, organisation et fonctionnement de la médiation financière en République Gabonaise
      </h3>
      <p style="font-size:13.5px;color:var(--txt2);line-height:1.75;margin-bottom:16px">
        Texte fondamental de la médiation financière. Il institue les trois branches d'activité (Crédit/Paiement sous supervision COBAC, Assurances sous supervision CIMA et Marchés financiers sous supervision COSUMAF). Il consacre les principes de gratuité pour les personnes physiques, l'obligation d'une réclamation préalable de 45 jours auprès de l'établissement, le caractère contradictoire et confidentiel des auditions, ainsi que la force obligatoire des protocoles d'accord.
      </p>
      <div style="display:flex;gap:12px;align-items:center;flex-wrap:wrap">
        <span style="font-size:12px;color:var(--txt3);background:#fff;border:1px solid var(--gris-m);padding:5px 12px;border-radius:6px">Signé : Présidence de la République &amp; Ministère de l'Économie</span>
        <span style="font-size:12px;color:var(--vert);font-weight:500">Texte en vigueur</span>
      </div>
    </div>

    {{-- Arrêté 001.25 --}}
    <div style="background:var(--gris);border:1px solid var(--brd);border-radius:var(--rl);padding:28px">
      <div style="display:flex;align-items:flex-start;justify-content:space-between;flex-wrap:wrap;gap:12px;margin-bottom:12px">
        <div>
          <span style="font-size:11px;font-weight:700;color:var(--or-d);background:var(--or-p);padding:4px 10px;border-radius:6px;text-transform:uppercase;letter-spacing:.08em">Arrêté Ministériel</span>
          <span style="margin-left:10px;font-size:13px;font-weight:600;color:var(--txt)">Réf. N° 001.25 MEP</span>
        </div>
        <span style="font-size:12.5px;color:var(--txt3)">07 janvier 2025</span>
      </div>
      <h3 style="font-family:'Space Grotesk',sans-serif;font-size:18px;font-weight:600;color:var(--txt);margin-bottom:10px">
        Arrêté fixant les modalités de la procédure de médiation financière en République Gabonaise
      </h3>
      <p style="font-size:13.5px;color:var(--txt2);line-height:1.75;margin-bottom:16px">
        Pris en application de l'article 23 du Décret N° 0121/PR/MEP. Il précise les formalités de dépôt de la saisine, les critères d'irrecevabilité (litiges professionnels, procédures judiciaires pendantes), le délai de 15 jours accordé à l'établissement assujetti pour accepter la procédure amiable, ainsi que les 5 causes de clôture formelle de la médiation.
      </p>
      <div style="display:flex;gap:12px;align-items:center;flex-wrap:wrap">
        <span style="font-size:12px;color:var(--txt3);background:#fff;border:1px solid var(--gris-m);padding:5px 12px;border-radius:6px">Enregistré S/N° 001.SG.CNEF/25</span>
        <span style="font-size:12px;color:var(--vert);font-weight:500">Texte d'application</span>
      </div>
    </div>

    {{-- Arrêté 002.25 --}}
    <div style="background:var(--gris);border:1px solid var(--brd);border-radius:var(--rl);padding:28px">
      <div style="display:flex;align-items:flex-start;justify-content:space-between;flex-wrap:wrap;gap:12px;margin-bottom:12px">
        <div>
          <span style="font-size:11px;font-weight:700;color:var(--bleu);background:var(--bleu-c);padding:4px 10px;border-radius:6px;text-transform:uppercase;letter-spacing:.08em">Arrêté Ministériel</span>
          <span style="margin-left:10px;font-size:13px;font-weight:600;color:var(--txt)">Réf. N° 002.25 MEP</span>
        </div>
        <span style="font-size:12.5px;color:var(--txt3)">07 janvier 2025</span>
      </div>
      <h3 style="font-family:'Space Grotesk',sans-serif;font-size:18px;font-weight:600;color:var(--txt);margin-bottom:10px">
        Arrêté fixant la procédure de désignation et les attributions des médiateurs financiers en République Gabonaise
      </h3>
      <p style="font-size:13.5px;color:var(--txt2);line-height:1.75;margin-bottom:16px">
        Pris en application des articles 12 et 34 du Décret N° 0121/PR/MEP. Il définit les conditions d'éligibilité pour les trois branches (Master + 5 ans ou Licence + 10 ans d'encadrement supérieur), la composition du dossier de candidature en 13 pièces, les incompatibilités professionnelles, ainsi que la durée du mandat (3 ans, renouvelable une seule fois).
      </p>
      <div style="display:flex;gap:12px;align-items:center;flex-wrap:wrap">
        <span style="font-size:12px;color:var(--txt3);background:#fff;border:1px solid var(--gris-m);padding:5px 12px;border-radius:6px">Applicable aux 3 branches</span>
        <a href="{{ route('mediation.candidature') }}" style="font-size:12.5px;color:var(--vert);font-weight:600;text-decoration:none">Consulter les critères de candidature →</a>
      </div>
    </div>
  </div>
</section>

{{-- ========================================================================= --}}
{{-- ── SECTION 2 : CADRE RÉGIONAL CEMAC / COBAC / CIMA / COSUMAF ──          --}}
{{-- ========================================================================= --}}
<section class="sec" style="background:var(--gris);padding-top:56px;padding-bottom:56px">
  <div class="stag">Conformité Régionale</div>
  <h2 class="sh">Normes et règlements communautaires applicables</h2>
  <p class="si">Les textes édictés par les régulateurs régionaux de la CEMAC encadrant la protection des consommateurs et le traitement des réclamations.</p>

  <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(min(100%, 280px),1fr));gap:20px;margin-top:32px">
    @foreach ($textesRegionaux as $reg)
      <div style="background:#fff;border:1px solid var(--brd);border-radius:var(--rl);padding:24px">
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:12px">
          <span style="font-size:11px;font-weight:700;color:var(--vert);background:var(--vert-c);padding:3px 8px;border-radius:4px">{{ $reg['institution'] }}</span>
          <span style="font-size:12px;color:var(--txt3)">{{ $reg['annee'] }}</span>
        </div>
        <h4 style="font-size:15px;font-weight:600;color:var(--txt);margin-bottom:8px">{{ $reg['titre'] }}</h4>
        <p style="font-size:13px;color:var(--txt2);line-height:1.65">{{ $reg['description'] }}</p>
      </div>
    @endforeach
  </div>
</section>

{{-- ========================================================================= --}}
{{-- ── SECTION 3 : CHARTE DE DÉONTOLOGIE ──                                   --}}
{{-- ========================================================================= --}}
<section class="sec" style="padding-top:56px;padding-bottom:56px;background:#fff">
  <div style="max-width:850px;margin:0 auto">
    <div class="stag" style="text-align:center">Éthique &amp; Responsabilité</div>
    <h2 class="sh" style="text-align:center">Les engagements déontologiques du Médiateur</h2>
    <p class="si" style="text-align:center">Le statut de médiateur financier impose le respect rigoureux de règles éthiques définies par la loi gabonaise.</p>

    <div style="display:grid;grid-template-columns:1fr 1fr;gap:20px;margin-top:32px" class="contact-grid">
      <div style="background:var(--vert-c);padding:22px;border-radius:var(--r)">
        <strong style="display:block;font-size:14px;color:var(--vert);margin-bottom:6px">1. Impartialité &amp; Conflits d'intérêts</strong>
        <p style="font-size:13px;color:var(--txt2);line-height:1.65">Le médiateur ne doit entretenir aucun lien d'intérêt direct ou indirect avec l'établissement mis en cause ou avec le demandeur. En cas de situation de conflit, il est tenu de se récuser sans délai.</p>
      </div>

      <div style="background:var(--vert-c);padding:22px;border-radius:var(--r)">
        <strong style="display:block;font-size:14px;color:var(--vert);margin-bottom:6px">2. Secret Professionnel Absolu</strong>
        <p style="font-size:13px;color:var(--txt2);line-height:1.65">Tous les faits, documents comptables, relevés et informations bancaires recueillis au cours de la médiation sont rigoureusement protégés et ne peuvent être divulgués à des tiers.</p>
      </div>

      <div style="background:var(--vert-c);padding:22px;border-radius:var(--r)">
        <strong style="display:block;font-size:14px;color:var(--vert);margin-bottom:6px">3. Respect du Contradictoire</strong>
        <p style="font-size:13px;color:var(--txt2);line-height:1.65">Chaque partie est informée des observations, prétentions et documents présentés par l'autre. Le médiateur veille à un traitement loyal et équilibré des arguments.</p>
      </div>

      <div style="background:var(--vert-c);padding:22px;border-radius:var(--r)">
        <strong style="display:block;font-size:14px;color:var(--vert);margin-bottom:6px">4. Respect des Délais Légaux</strong>
        <p style="font-size:13px;color:var(--txt2);line-height:1.65">La procédure est conduite avec célérité dans un délai de trois mois maximum afin d'éviter tout enlisement du litige pour le consommateur.</p>
      </div>
    </div>
  </div>
</section>
@endsection
