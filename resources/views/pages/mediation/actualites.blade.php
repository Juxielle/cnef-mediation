@extends('layouts.app')

@section('title', 'Actualités — Médiation Financière')
@php($breadcrumb = 'Actualités')

@section('content')
<section class="sec" style="background:var(--vert-f);padding-top:48px;padding-bottom:50px">
  <div class="stag light">Communications Officielles &amp; Événements</div>
  <h1 class="sh light">Actualités de la Médiation Financière</h1>
  <p class="si light">Retrouvez les dernières informations relatives au déploiement de la médiation, aux bilans d'activité, aux avis d'ouverture de candidatures et aux droits des usagers des services financiers.</p>

  <div style="display:flex;gap:12px;flex-wrap:wrap;margin-top:24px">
    <a href="{{ route('mediation.presentation') }}" class="btn-ghost" style="color:#fff;border-color:rgba(255,255,255,.25)">
      ← Présentation
    </a>
    <a href="{{ route('mediation.activites') }}#saisine" class="btn-or">
      Saisir le Médiateur
    </a>
  </div>
</section>

{{-- ========================================================================= --}}
{{-- ── SECTION 1 : DERNIÈRES ACTUALITÉS DE LA MÉDIATION ──                    --}}
{{-- ========================================================================= --}}
<section class="sec" style="padding-top:56px;padding-bottom:56px;background:#fff">
  <div class="stag">À la Une</div>
  <h2 class="sh">Dernières publications &amp; communiqués</h2>
  <p class="si">Les faits marquants et avis récents publiés par le service de médiation financière du CNEF.</p>

  <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(min(100%, 300px),1fr));gap:24px;margin-top:32px">
    @foreach ($articlesMediation as $art)
      <article style="background:var(--gris);border:1px solid var(--brd);border-radius:var(--rl);padding:26px;display:flex;flex-direction:column;justify-content:space-between">
        <div>
          <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:14px">
            <span style="font-size:11px;font-weight:700;color:{{ $art['badge_couleur'] }};background:#fff;border:1px solid var(--gris-m);padding:3px 10px;border-radius:6px;text-transform:uppercase;letter-spacing:.06em">
              {{ $art['categorie'] }}
            </span>
            <span style="font-size:12px;color:var(--txt3)">{{ $art['date'] }}</span>
          </div>
          <h3 style="font-family:'Space Grotesk',sans-serif;font-size:17px;font-weight:600;color:var(--txt);margin-bottom:12px;line-height:1.4">
            {{ $art['titre'] }}
          </h3>
          <p style="font-size:13.5px;color:var(--txt2);line-height:1.7">
            {{ $art['description'] }}
          </p>
        </div>
        <div style="margin-top:20px;padding-top:14px;border-top:1px solid var(--gris-m);display:flex;justify-content:flex-end">
          <span style="font-size:12.5px;font-weight:600;color:var(--vert)">Communiqué officiel CNEF</span>
        </div>
      </article>
    @endforeach
  </div>
</section>

{{-- ========================================================================= --}}
{{-- ── SECTION 2 : AVIS OFFICIELS & TEXTES D'APPLICATION ──                   --}}
{{-- ========================================================================= --}}
<section class="sec" style="background:var(--gris);padding-top:56px;padding-bottom:56px">
  <div class="stag">Journal Officiel &amp; Textes CNEF</div>
  <h2 class="sh">Actes et décisions administratives</h2>
  <p class="si">Les arrêtés ministériels et textes réglementaires récemment publiés concernant l'organisation du service.</p>

  <div style="display:flex;flex-direction:column;gap:16px;margin-top:32px">
    @foreach ($actualitesCnef as $actu)
      <div style="background:#fff;border:1px solid var(--brd);border-radius:var(--r);padding:22px 26px;display:flex;align-items:flex-start;justify-content:space-between;flex-wrap:wrap;gap:16px">
        <div style="max-width:760px">
          <div style="display:flex;gap:10px;align-items:center;margin-bottom:8px">
            <span style="font-size:10.5px;font-weight:700;color:{{ $actu->badge_couleur ?? 'var(--vert)' }};background:var(--vert-c);padding:2px 8px;border-radius:4px;text-transform:uppercase">
              {{ $actu->badge_label ?? 'Information' }}
            </span>
            <span style="font-size:12px;color:var(--txt3)">{{ $actu->date_publication }}</span>
          </div>
          <h4 style="font-size:15.5px;font-weight:600;color:var(--txt);margin-bottom:6px">{{ $actu->titre }}</h4>
          <p style="font-size:13px;color:var(--txt2);line-height:1.65">{{ $actu->contenu }}</p>
        </div>
        <a href="{{ route('mediation.textes') }}" style="font-size:12.5px;font-weight:600;color:var(--vert);text-decoration:none;white-space:nowrap;align-self:center">
          Consulter le texte →
        </a>
      </div>
    @endforeach
  </div>
</section>

{{-- ========================================================================= --}}
{{-- ── SECTION 3 : CONTACT PRESSE & RELATIONS PUBLIQUES ──                    --}}
{{-- ========================================================================= --}}
<section class="sec" style="padding-top:56px;padding-bottom:56px;background:#fff">
  <div style="background:var(--vert-c);border:1px solid var(--brd);border-radius:var(--rl);padding:32px 36px;display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:20px">
    <div>
      <h3 style="font-family:'Space Grotesk',sans-serif;font-size:18px;font-weight:600;color:var(--vert);margin-bottom:8px">
        Restez informé des publications du Médiateur
      </h3>
      <p style="font-size:13.5px;color:var(--txt2);max-width:620px;line-height:1.65">
        Les rapports annuels, notes statistiques et communiqués du service de médiation financière sont régulièrement mis à la disposition du public et des médias.
      </p>
    </div>
    <a href="mailto:mediation@cnef.ga?subject=Demande%20d%27information%20médiation" class="btn-or">
      Contacter le service de presse CNEF
    </a>
  </div>
</section>
@endsection
