@extends('layouts.app')

@section('title', 'Portail Numérique de la Médiation Financière — CNEF Gabon')
@php($breadcrumb = 'Accueil Médiation')

@section('content')
{{-- Galerie du portail de la médiation --}}
@php($carouselPhotos = ['mediation-imag.jpeg', 'image1.jpeg', 'image2.jpeg', 'image3.jpeg'])
<section class="med-gallery" aria-label="Galerie photos du CNEF Gabon" aria-roledescription="carrousel" tabindex="0">
  <div class="med-gallery-slides" aria-live="off">
    @foreach ($carouselPhotos as $photo)
      <div class="med-gallery-slide {{ $loop->first ? 'is-active' : '' }}" role="group" aria-roledescription="diapositive" aria-label="{{ $loop->iteration }} sur {{ $loop->count }}" aria-hidden="{{ $loop->first ? 'false' : 'true' }}">
        <img src="{{ asset('assets/images/mediation-carousel/'.$photo) }}" alt="Photo de groupe des participants devant un bâtiment — vue {{ $loop->iteration }}" width="{{ $loop->first ? 1080 : 1280 }}" height="{{ $loop->first ? 720 : 853 }}" loading="{{ $loop->first ? 'eager' : 'lazy' }}" @if ($loop->first) fetchpriority="high" @endif>
      </div>
    @endforeach
  </div>
  <div class="med-gallery-content">
    <div class="med-gallery-eyebrow">CNEF Gabon · Médiation financière</div>
    <h1>Un différend financier ?<br><span>Trouvons une solution amiable.</span></h1>
    <p>Un service indépendant, gratuit et confidentiel pour vous accompagner dans le règlement de vos litiges avec les établissements financiers.</p>
    <div class="med-gallery-actions">
      <a href="{{ route('mediation.recours') }}#formulaire" class="btn-or">Saisir le Médiateur <span aria-hidden="true">→</span></a>
      <a href="{{ route('mediation.suivi') }}" class="btn-ghost">Suivre mon dossier</a>
    </div>
    <ul class="med-gallery-guarantees" aria-label="Les garanties de la médiation">
      <li>Gratuité</li>
      <li>Indépendance</li>
      <li>Confidentialité</li>
    </ul>
  </div>
  <button class="med-gallery-arrow med-gallery-prev" type="button" aria-label="Photo précédente">‹</button>
  <button class="med-gallery-arrow med-gallery-next" type="button" aria-label="Photo suivante">›</button>
  <div class="med-gallery-controls">
    <div class="med-gallery-dots" aria-label="Choisir une photo">
      @for ($i = 0; $i < count($carouselPhotos); $i++)
        <button class="med-gallery-dot {{ $i === 0 ? 'is-active' : '' }}" type="button" aria-label="Afficher la photo {{ $i + 1 }}" aria-current="{{ $i === 0 ? 'true' : 'false' }}"></button>
      @endfor
    </div>
    <button class="med-gallery-pause" type="button" aria-label="Mettre le défilement en pause">Pause</button>
  </div>
</section>

{{-- ========================================================================= --}}
{{-- ── MESSAGE D'ACCROCHE DIFFUSÉ EN CONTINU (B.1) ──                         --}}
{{-- ========================================================================= --}}
<div class="med-ticker-wrap" aria-label="Informations officielles de la Médiation">
  <div class="med-ticker-label">
    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4M12 8h.01"/></svg>
    Médiation Info
  </div>
  <div class="med-ticker-track">
    @foreach ($tickerMessages as $msg)
      <span class="med-ticker-item">
        <span>{{ $msg }}</span>
        <span class="med-ticker-sep">✦</span>
      </span>
    @endforeach
    {{-- Duplication pour boucle infinie fluide --}}
    @foreach ($tickerMessages as $msg)
      <span class="med-ticker-item">
        <span>{{ $msg }}</span>
        <span class="med-ticker-sep">✦</span>
      </span>
    @endforeach
  </div>
</div>

{{-- ========================================================================= --}}
{{-- ── HERO DU PORTAIL NUMÉRIQUE DE LA MÉDIATION ──                           --}}
{{-- ========================================================================= --}}
<section class="sec" style="background:var(--vert-f);padding-top:46px;padding-bottom:52px">
  <div class="stag light">Vos démarches en ligne</div>
  <h2 class="sh light">Accédez aux services de la médiation</h2>

  {{-- Cartes d'action rapide --}}
  <div class="med-action-cards">
    <a href="{{ route('mediation.recours') }}#formulaire" class="med-act-card" style="border-color:rgba(232,163,23,.5);background:rgba(232,163,23,.1)">
      <div>
        <div class="med-act-icon">
          <svg viewBox="0 0 24 24"><path d="M22 2L11 13M22 2l-7 20-4-9-9-4 20-7z"/></svg>
        </div>
        <div class="med-act-title">Déposer un recours</div>
        <div class="med-act-desc">Formulaire officiel de saisine en ligne en cas de litige persistant avec votre banque ou assureur.</div>
      </div>
      <div style="margin-top:16px;font-size:12.5px;font-weight:700;color:var(--or);display:flex;align-items:center;gap:6px">
        Saisir le Médiateur →
      </div>
    </a>

    <a href="{{ route('mediation.suivi') }}" class="med-act-card">
      <div>
        <div class="med-act-icon" style="background:#2563EB;color:#fff">
          <svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg>
        </div>
        <div class="med-act-title">Suivi des demandes</div>
        <div class="med-act-desc">Consultez en direct l'avancement de votre dossier grâce à votre code confidentiel unique (MF-).</div>
      </div>
      <div style="margin-top:16px;font-size:12.5px;font-weight:600;color:rgba(255,255,255,.9);display:flex;align-items:center;gap:6px">
        Suivre mon dossier →
      </div>
    </a>

    <a href="{{ route('mediation.adherents') }}" class="med-act-card">
      <div>
        <div class="med-act-icon" style="background:#059669;color:#fff">
          <svg viewBox="0 0 24 24"><path d="M3 21h18M3 10h18M5 10v11M19 10v11M9 10v11M15 10v11M4 10l8-6 8 6"/></svg>
        </div>
        <div class="med-act-title">Établissements adhérents</div>
        <div class="med-act-desc">{{ $adherentsTotal }} banques, EMF, assurances et opérateurs de paiement assujettis au Gabon.</div>
      </div>
      <div style="margin-top:16px;font-size:12.5px;font-weight:600;color:rgba(255,255,255,.9);display:flex;align-items:center;gap:6px">
        Consulter la liste officielle →
      </div>
    </a>

    <a href="{{ route('mediation.fonds-documentaire') }}" class="med-act-card">
      <div>
        <div class="med-act-icon" style="background:#8B5CF6;color:#fff">
          <svg viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14,2 14,8 20,8"/></svg>
        </div>
        <div class="med-act-title">Fonds documentaire</div>
        <div class="med-act-desc">Décret 0121, Arrêtés d'application 2025, textes CEMAC/COBAC et rapports d'activité à télécharger.</div>
      </div>
      <div style="margin-top:16px;font-size:12.5px;font-weight:600;color:rgba(255,255,255,.9);display:flex;align-items:center;gap:6px">
        Accéder aux textes &amp; rapports →
      </div>
    </a>
  </div>
</section>

{{-- ========================================================================= --}}
{{-- ── 1. INFORMATIONS D'ORDRE GÉNÉRAL (B.1) ──                               --}}
{{-- ========================================================================= --}}
<section class="sec" style="background:#fff;padding-top:58px;padding-bottom:58px">
  <div class="stag">Cadre Institutionnel &amp; Garanties</div>
  <h2 class="sh">Qu'est-ce que la Médiation Financière ?</h2>
  <p class="si">
    Instituée par le Décret N° 0121/PR/MEP du 21 mars 2024 et opérationnalisée par les Arrêtés N° 001.25 et 002.25 MEP, la Médiation Financière en République Gabonaise est un dispositif d'intérêt général destiné à offrir une solution amiable, rapide et équitable aux conflits individuels entre consommateurs et institutions financières.
  </p>

  {{-- Les 4 Garanties Majeures --}}
  <div class="quick-grid" style="grid-template-columns:repeat(auto-fit,minmax(250px,1fr));gap:20px;margin-top:32px">
    <div class="quick-card" style="color:var(--vert);cursor:default">
      <div class="quick-ico" style="background:var(--vert-c)">
        <svg viewBox="0 0 24 24"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6"/></svg>
      </div>
      <div class="quick-t">100% Gratuite</div>
      <div class="quick-d">Aucun frais de dossier ni de traitement n'est réclamé aux usagers personnes physiques. La médiation est un service public de protection accessible à tous.</div>
    </div>

    <div class="quick-card" style="color:var(--bleu);cursor:default">
      <div class="quick-ico" style="background:var(--bleu-c)">
        <svg viewBox="0 0 24 24"><path d="M12 3v18M5 7l-3 6a3 3 0 006 0zM19 7l-3 6a3 3 0 006 0zM5 7h14"/></svg>
      </div>
      <div class="quick-t">Indépendance &amp; Impartialité</div>
      <div class="quick-d">Les Médiateurs Financiers sont des personnalités assermentées indépendantes des établissements bancaires et des compagnies d'assurance.</div>
    </div>

    <div class="quick-card" style="color:var(--or-d);cursor:default">
      <div class="quick-ico" style="background:var(--or-p)">
        <svg viewBox="0 0 24 24"><path d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
      </div>
      <div class="quick-t">Confidentialité Absolue</div>
      <div class="quick-d">Toutes les constatations, déclarations et pièces échangées au cours de la médiation sont rigoureusement protégées par le secret professionnel le plus strict.</div>
    </div>

    <div class="quick-card" style="color:var(--vert);cursor:default">
      <div class="quick-ico" style="background:var(--vert-c)">
        <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M9 12l2 2 4-4"/></svg>
      </div>
      <div class="quick-t">Protocole à Force Obligatoire</div>
      <div class="quick-d">L'accord amiable formalisé et signé lie définitivement les parties et clôt le litige avec la même valeur qu'une transaction juridique homologable.</div>
    </div>
  </div>

  {{-- Les 3 Branches d'Assujettissement --}}
  <div style="background:var(--gris);border:1px solid var(--brd);border-radius:var(--rl);padding:32px 36px;margin-top:40px">
    <div style="display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:14px;margin-bottom:20px">
      <div>
        <div class="stag">Périmètre d'Intervention</div>
        <h3 style="font-family:'Space Grotesk',sans-serif;font-size:20px;font-weight:600;color:var(--txt);margin:0">
          Les 3 branches officielles de la médiation financière
        </h3>
      </div>
      <a href="{{ route('mediation.adherents') }}" class="abtn abtn-ghost abtn-sm" style="font-size:12.5px;font-weight:600">
        Voir les 48 établissements adhérents →
      </a>
    </div>

    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:20px">
      @foreach ($branches as $b)
        <div style="background:#fff;border:1px solid var(--brd);border-radius:10px;padding:22px">
          <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:10px">
            <span style="font-size:11px;font-weight:700;color:var(--vert);background:var(--vert-c);padding:3px 9px;border-radius:6px;text-transform:uppercase">
              Branche {{ $b['num'] }}
            </span>
            <span style="font-size:11px;font-weight:600;color:var(--txt3)">Supervision : {{ $b['supervision'] }}</span>
          </div>
          <h4 style="font-family:'Space Grotesk',sans-serif;font-size:16px;font-weight:600;color:var(--txt);margin-bottom:8px">
            {{ $b['titre'] }}
          </h4>
          <p style="font-size:13px;color:var(--txt2);line-height:1.65;margin:0">
            {{ $b['description'] }}
          </p>
        </div>
      @endforeach
    </div>
  </div>

  {{-- Indicateurs Chiffrés --}}
  <div style="margin-top:48px">
    <div class="stag">Indicateurs de Performance</div>
    <h3 class="sh" style="font-size:22px;margin-bottom:20px">La médiation financière en chiffres</h3>
    <div class="stats-med-grid">
      @foreach ($mediationKpis as $kpi)
        <div class="smkpi">
          <div class="smkpi-l">{{ $kpi->libelle }}</div>
          <div class="smkpi-v">{{ $kpi->valeur }}</div>
          <div class="smkpi-s">{{ $kpi->sous_texte }}</div>
        </div>
      @endforeach
    </div>
  </div>
</section>

{{-- ========================================================================= --}}
{{-- ── 2. L'ACTUALITÉ DE LA MÉDIATION ET DU SECTEUR FINANCIER (B.1) ──        --}}
{{-- ========================================================================= --}}
<section class="sec" style="background:var(--gris);padding-top:58px;padding-bottom:58px">
  <div style="display:flex;justify-content:space-between;align-items:flex-end;flex-wrap:wrap;gap:16px;margin-bottom:28px">
    <div>
      <div class="stag">Publications &amp; Communiqués</div>
      <h2 class="sh" style="margin-bottom:4px">L'Actualité de la Médiation et du Secteur Financier</h2>
      <p class="si" style="margin-bottom:0">Suivez les décisions officielles, les bilans d'étape et les avis destinés aux usagers.</p>
    </div>
    <a href="{{ route('mediation.actualites') }}" class="abtn abtn-ghost" style="font-size:13px;font-weight:600">
      Toutes les actualités médiation →
    </a>
  </div>

  <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(min(100%, 300px),1fr));gap:22px">
    @foreach ($articlesMediation as $art)
      <article style="background:#fff;border:1px solid var(--brd);border-radius:var(--rl);padding:24px;display:flex;flex-direction:column;justify-content:space-between;box-shadow:0 2px 10px rgba(0,0,0,.02)">
        <div>
          <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:12px">
            <span style="font-size:11px;font-weight:700;color:{{ $art['badge_couleur'] }};background:#f8fafc;border:1px solid var(--gris-m);padding:3px 9px;border-radius:6px;text-transform:uppercase;letter-spacing:.05em">
              {{ $art['categorie'] }}
            </span>
            <span style="font-size:11.5px;color:var(--txt3)">{{ $art['date'] }}</span>
          </div>
          <h3 style="font-family:'Space Grotesk',sans-serif;font-size:16.5px;font-weight:600;color:var(--txt);margin-bottom:10px;line-height:1.4">
            {{ $art['titre'] }}
          </h3>
          <p style="font-size:13px;color:var(--txt2);line-height:1.65;margin:0">
            {{ $art['description'] }}
          </p>
        </div>
        <div style="margin-top:18px;padding-top:12px;border-top:1px solid var(--gris-m);display:flex;align-items:center;justify-content:space-between">
          <span style="font-size:12px;font-weight:600;color:var(--vert)">Communiqué officiel CNEF</span>
          <a href="{{ route('mediation.actualites') }}" style="font-size:12px;font-weight:600;color:var(--txt3);text-decoration:none">Lire →</a>
        </div>
      </article>
    @endforeach
  </div>

  {{-- Bannière d'orientation finale --}}
  <div style="background:var(--vert-f);border-radius:var(--rl);padding:32px 36px;color:#fff;margin-top:40px;display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:20px">
    <div>
      <div style="font-size:11.5px;font-weight:700;color:var(--or);text-transform:uppercase;letter-spacing:.08em;margin-bottom:6px">Besoin d'accompagnement ?</div>
      <h3 style="font-family:'Space Grotesk',sans-serif;font-size:20px;font-weight:600;color:#fff;margin-bottom:6px">
        Un litige financier non résolu avec votre établissement ?
      </h3>
      <p style="font-size:13.5px;color:rgba(255,255,255,.8);margin:0;max-width:640px;line-height:1.6">
        Vérifiez au préalable vos démarches écrites auprès de votre agence, puis déposez votre demande de médiation sur notre portail sécurisé.
      </p>
    </div>
    <div style="display:flex;gap:12px;flex-wrap:wrap">
      <a href="{{ route('mediation.recours') }}#formulaire" class="btn-or">
        Saisir le Médiateur
      </a>
      <a href="{{ route('mediation.contacts') }}" class="btn-ghost" style="color:#fff;border-color:rgba(255,255,255,.3)">
        Contacts &amp; Permanence
      </a>
    </div>
  </div>
</section>
@endsection
