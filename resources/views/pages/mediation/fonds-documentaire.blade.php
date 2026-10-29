@extends('layouts.app')

@section('title', 'Fonds Documentaire — Rapports & Réglementation — Médiation Financière CNEF Gabon')
@php($breadcrumb = 'Fonds documentaire')

@section('content')
{{-- HERO FONDS DOCUMENTAIRE --}}
<section class="sec" style="background:var(--vert-f);padding-top:48px;padding-bottom:52px">
  <div class="stag light">Rubrique Officielle B.5 · Ressources Documentaires &amp; Textes</div>
  <h1 class="sh light" style="font-size:clamp(26px,5vw,38px);margin-bottom:12px">
    Fonds Documentaire de la Médiation
  </h1>
  <p class="si light" style="max-width:820px;margin-bottom:24px">
    L'ensemble des ressources informatives et juridiques que la Médiation Financière met à la disposition des usagers, des parties prenantes institutionnelles et des professionnels assujettis.
  </p>

  <div style="display:flex;gap:12px;flex-wrap:wrap">
    <a href="#rapports" class="btn-or">
      1. Rapports Annuels &amp; Guides
    </a>
    <a href="#communautaires" class="btn-ghost" style="color:#fff;border-color:rgba(255,255,255,.3)">
      2.a Textes Communautaires
    </a>
    <a href="#nationaux" class="btn-ghost" style="color:#fff;border-color:rgba(255,255,255,.3)">
      2.b Textes Nationaux
    </a>
  </div>
</section>

{{-- ========================================================================= --}}
{{-- ── 1. RAPPORTS ANNUELS & ÉDITIONS D'ACTIVITÉ ──                           --}}
{{-- ========================================================================= --}}
<section id="rapports" class="sec" style="background:#fff;padding-top:56px;padding-bottom:56px">
  <div class="stag">1. Publications &amp; Bilans</div>
  <h2 class="sh">Rapports Annuels, Bilans &amp; Guides Pratiques</h2>
  <p class="si">Les publications officielles, guides didactiques et modèles types téléchargeables en accès libre.</p>

  <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(min(100%, 340px),1fr));gap:20px;margin-top:32px">
    @foreach ($rapportsAnnuels as $doc)
      <div class="doc-card">
        <div class="doc-icon">
          <svg viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14,2 14,8 20,8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
        </div>
        <div style="flex:1">
          <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:6px">
            <span style="font-size:10px;font-weight:700;color:var(--vert);background:var(--vert-c);padding:2px 7px;border-radius:4px;text-transform:uppercase">
              {{ $doc['format'] }} · {{ $doc['annee'] }}
            </span>
            <span style="font-size:11px;color:var(--txt3)">{{ $doc['taille'] }}</span>
          </div>
          <h3 style="font-family:'Space Grotesk',sans-serif;font-size:15.5px;font-weight:600;color:var(--txt);margin-bottom:8px;line-height:1.4">
            {{ $doc['titre'] }}
          </h3>
          <p style="font-size:12.5px;color:var(--txt2);line-height:1.6;margin-bottom:14px">
            {{ $doc['description'] }}
          </p>
          <a href="javascript:void(0)" onclick="alert('Le document « {{ addslashes($doc['titre']) }} » est disponible auprès du Secrétariat Général du CNEF (contact: mediation@cnef.ga). Téléchargement officiel prochainement actif.');" class="abtn abtn-ghost abtn-sm" style="font-size:12px;display:inline-flex;align-items:center;gap:6px">
            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4M7 10l5 5 5-5M12 15V3"/></svg>
            Télécharger le document
          </a>
        </div>
      </div>
    @endforeach
  </div>
</section>

{{-- ========================================================================= --}}
{{-- ── 2. RÉGLEMENTATION : A. TEXTES COMMUNAUTAIRES & B. TEXTES NATIONAUX ──  --}}
{{-- ========================================================================= --}}
<section id="reglementation" class="sec" style="background:var(--gris);padding-top:56px;padding-bottom:56px">
  <div class="stag">2. Corpus Réglementaire</div>
  <h2 class="sh">Réglementation Applicable à la Médiation</h2>
  <p class="si">L'armature juridique communautaire et nationale encadrant l'activité des banques, des assurances et des marchés financiers.</p>

  {{-- 2.a Textes Communautaires --}}
  <div id="communautaires" style="margin-top:36px;margin-bottom:48px">
    <div style="display:flex;align-items:center;gap:10px;margin-bottom:18px">
      <span style="font-size:12px;font-weight:800;color:var(--bleu);background:var(--bleu-c);padding:4px 10px;border-radius:6px;text-transform:uppercase">
        Sous-rubrique 2.a
      </span>
      <h3 style="font-family:'Space Grotesk',sans-serif;font-size:20px;font-weight:600;color:var(--txt);margin:0">
        Textes Communautaires (COBAC · CEMAC · CIMA · COSUMAF)
      </h3>
    </div>

    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(min(100%, 340px),1fr));gap:20px">
      @foreach ($textesRegionaux as $reg)
        <div style="background:#fff;border:1px solid var(--brd);border-radius:var(--rl);padding:24px;display:flex;flex-direction:column;justify-content:space-between">
          <div>
            <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:10px">
              <span style="font-size:10.5px;font-weight:700;color:var(--bleu);background:var(--bleu-c);padding:3px 9px;border-radius:4px">
                {{ $reg['institution'] }}
              </span>
              <span style="font-size:11px;color:var(--txt3)">{{ $reg['annee'] }}</span>
            </div>
            <h4 style="font-family:'Space Grotesk',sans-serif;font-size:16px;font-weight:600;color:var(--txt);margin-bottom:8px;line-height:1.4">
              {{ $reg['titre'] }}
            </h4>
            <p style="font-size:13px;color:var(--txt2);line-height:1.65;margin:0">
              {{ $reg['description'] }}
            </p>
          </div>
          <div style="margin-top:16px;padding-top:12px;border-top:1px solid var(--gris-m);display:flex;justify-content:space-between;align-items:center">
            <span style="font-size:11.5px;color:var(--txt3)">Règlement CEMAC officiel</span>
            <span style="font-size:11.5px;font-weight:600;color:var(--vert)">En vigueur</span>
          </div>
        </div>
      @endforeach
    </div>
  </div>

  {{-- 2.b Textes Nationaux --}}
  <div id="nationaux">
    <div style="display:flex;align-items:center;gap:10px;margin-bottom:18px">
      <span style="font-size:12px;font-weight:800;color:var(--vert);background:var(--vert-c);padding:4px 10px;border-radius:6px;text-transform:uppercase">
        Sous-rubrique 2.b
      </span>
      <h3 style="font-family:'Space Grotesk',sans-serif;font-size:20px;font-weight:600;color:var(--txt);margin:0">
        Textes Nationaux (République Gabonaise)
      </h3>
    </div>

    <div style="display:flex;flex-direction:column;gap:18px">
      {{-- Décret 0121 --}}
      <div style="background:#fff;border:1px solid var(--brd);border-left:4px solid var(--vert);border-radius:var(--rl);padding:24px 28px">
        <div style="display:flex;justify-content:space-between;align-items:flex-start;flex-wrap:wrap;gap:10px;margin-bottom:8px">
          <div>
            <span style="font-size:10.5px;font-weight:700;color:var(--vert);background:var(--vert-c);padding:2px 8px;border-radius:4px;text-transform:uppercase">Décret Fondateur</span>
            <span style="margin-left:8px;font-size:13px;font-weight:600;color:var(--txt)">Décret N° 0121/PR/MEP du 21 mars 2024</span>
          </div>
          <span style="font-size:12px;color:var(--txt3)">21 mars 2024</span>
        </div>
        <h4 style="font-family:'Space Grotesk',sans-serif;font-size:17px;font-weight:600;color:var(--txt);margin-bottom:8px">
          Décret portant création, attributions, organisation et fonctionnement de la médiation financière en République Gabonaise
        </h4>
        <p style="font-size:13px;color:var(--txt2);line-height:1.7;margin-bottom:12px">
          Texte de référence instituant le mécanisme public de médiation financière au Gabon, instaurant les trois branches de compétence, consacrant la gratuité d'accès pour les particuliers et fixant la durée maximale de médiation à 3 mois.
        </p>
        <div style="display:flex;gap:12px;font-size:12px;color:var(--txt3)">
          <span>Signé : Président de la Transition, Chef de l'État &amp; Ministre de l'Économie</span>
          <span>•</span>
          <span style="color:var(--vert);font-weight:600">Texte en vigueur</span>
        </div>
      </div>

      {{-- Arrêté 001.25 --}}
      <div style="background:#fff;border:1px solid var(--brd);border-left:4px solid var(--or);border-radius:var(--rl);padding:24px 28px">
        <div style="display:flex;justify-content:space-between;align-items:flex-start;flex-wrap:wrap;gap:10px;margin-bottom:8px">
          <div>
            <span style="font-size:10.5px;font-weight:700;color:var(--or-d);background:var(--or-p);padding:2px 8px;border-radius:4px;text-transform:uppercase">Arrêté Ministériel</span>
            <span style="margin-left:8px;font-size:13px;font-weight:600;color:var(--txt)">Arrêté N° 001.25 MEP du 07 janvier 2025</span>
          </div>
          <span style="font-size:12px;color:var(--txt3)">07 janvier 2025</span>
        </div>
        <h4 style="font-family:'Space Grotesk',sans-serif;font-size:17px;font-weight:600;color:var(--txt);margin-bottom:8px">
          Arrêté fixant les modalités de la procédure de médiation financière en République Gabonaise
        </h4>
        <p style="font-size:13px;color:var(--txt2);line-height:1.7;margin-bottom:12px">
          Définit les règles d'introduction de la saisine, la preuve indispensable de réclamation préalable de 45 jours, les délais d'examen de recevabilité (5 jours ouvrés), le délai de 15 jours accordé à l'établissement et les conditions d'homologation judiciaire des protocoles d'accord.
        </p>
        <div style="display:flex;gap:12px;font-size:12px;color:var(--txt3)">
          <span>Secrétariat Général du CNEF</span>
          <span>•</span>
          <span style="color:var(--vert);font-weight:600">Texte d'application officiel</span>
        </div>
      </div>

      {{-- Arrêté 002.25 --}}
      <div style="background:#fff;border:1px solid var(--brd);border-left:4px solid var(--bleu);border-radius:var(--rl);padding:24px 28px">
        <div style="display:flex;justify-content:space-between;align-items:flex-start;flex-wrap:wrap;gap:10px;margin-bottom:8px">
          <div>
            <span style="font-size:10.5px;font-weight:700;color:var(--bleu);background:var(--bleu-c);padding:2px 8px;border-radius:4px;text-transform:uppercase">Arrêté Ministériel</span>
            <span style="margin-left:8px;font-size:13px;font-weight:600;color:var(--txt)">Arrêté N° 002.25 MEP du 07 janvier 2025</span>
          </div>
          <span style="font-size:12px;color:var(--txt3)">07 janvier 2025</span>
        </div>
        <h4 style="font-family:'Space Grotesk',sans-serif;font-size:17px;font-weight:600;color:var(--txt);margin-bottom:8px">
          Arrêté fixant la procédure de désignation et les attributions des médiateurs financiers
        </h4>
        <p style="font-size:13px;color:var(--txt2);line-height:1.7;margin-bottom:12px">
          Établit les conditions de diplôme et d'expérience (Master + 5 ans ou Licence + 10 ans), les incompatibilités, la durée du mandat (3 ans renouvelable une seule fois), la composition du dossier de candidature et le régime de prestation de serment.
        </p>
        <div style="display:flex;gap:12px;font-size:12px;color:var(--txt3);align-items:center">
          <span style="color:var(--vert);font-weight:600">Applicable aux 3 branches</span>
          <span>•</span>
          <a href="{{ route('mediation.candidature') }}" style="color:var(--vert);font-weight:600;text-decoration:none">Voir l'appel à candidature →</a>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
