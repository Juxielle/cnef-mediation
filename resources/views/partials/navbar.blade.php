<nav class="site-nav site-nav-mediation" aria-label="Navigation Médiation Financière">
  <a href="{{ route('mediation.index') }}" class="nav-logo" style="display:flex;align-items:center;gap:12px;flex-shrink:0;text-decoration:none">
    <img class="nav-emb" src="{{ asset('assets/images/logo-semi-trans.png') }}" alt="Logo CNEF">
    <div class="nav-txt">
      <span style="display:flex;align-items:center;gap:8px">
        CNEF Gabon
        <span class="nav-med-badge">Médiation</span>
      </span>
      <span>Médiation Financière</span>
    </div>
  </a>

  <div class="nav-menu">
    {{-- Lien vers le portail principal CNEF --}}
    <a class="nav-btn nav-back-cnef" href="{{ config('app.cnef_portal_url', 'http://cnef-gabon.test') }}" target="_blank" rel="noopener" title="Consulter le portail officiel du CNEF Gabon">
      <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6M15 3h6v6M10 14L21 3"/></svg>
      Portail CNEF
    </a>

    <span class="nav-sep"></span>

    {{-- 1. ACCUEIL --}}
    <a class="nav-btn {{ request()->routeIs('mediation.index') ? 'active' : '' }}" href="{{ route('mediation.index') }}">
      Accueil
    </a>

    {{-- 2. PRÉSENTATION --}}
    <a class="nav-btn {{ request()->routeIs('mediation.presentation') ? 'active' : '' }}" href="{{ route('mediation.presentation') }}">
      Présentation
    </a>

    {{-- 3. RECOURS À LA MÉDIATION (Menu déroulant & lien direct) --}}
    @php
      $isRecoursActive = request()->routeIs('mediation.recours*', 'mediation.suivi*', 'mediation.activites*');
    @endphp
    <div class="nav-dropdown" id="nav-dropdown-recours">
      <button class="nav-btn nav-dd-trigger {{ $isRecoursActive ? 'active' : '' }}" type="button" onclick="toggleDropdown(event,'recours')">
        Recours à la médiation
        <svg class="nav-dd-arrow" viewBox="0 0 24 24"><path d="M6 9l6 6 6-6"/></svg>
      </button>
      <div class="nav-dd-menu" id="nav-dd-menu-recours">
        <a class="nav-dd-item {{ request()->routeIs('mediation.recours') ? 'active' : '' }}" href="{{ route('mediation.recours') }}">
          Recours à la médiation (Vue générale)
        </a>
        <a class="nav-dd-item" href="{{ route('mediation.recours') }}#saisine-info">
          1. Saisine du Médiateur
        </a>
        <a class="nav-dd-item" href="{{ route('mediation.recours') }}#voies-saisine">
          2. Voies de saisine
        </a>
        <a class="nav-dd-item" href="{{ route('mediation.recours') }}#formulaire">
          3. Demande de médiation (En ligne)
        </a>
        <a class="nav-dd-item {{ request()->routeIs('mediation.suivi*') ? 'active' : '' }}" href="{{ route('mediation.suivi') }}">
          4. Suivi des demandes
        </a>
        <a class="nav-dd-item" href="{{ route('mediation.recours') }}#faq">
          5. Foire aux questions (FAQ)
        </a>
      </div>
    </div>

    {{-- Menu déroulant : Informations utiles (Établissements adhérents, Fonds documentaire, Contacts utiles) --}}
    @php
      $isInfosActive = request()->routeIs('mediation.adherents*', 'mediation.fonds-documentaire*', 'mediation.textes*', 'mediation.contacts*');
    @endphp
    <div class="nav-dropdown" id="nav-dropdown-infos">
      <button class="nav-btn nav-dd-trigger {{ $isInfosActive ? 'active' : '' }}" type="button" onclick="toggleDropdown(event,'infos')">
        Informations utiles
        <svg class="nav-dd-arrow" viewBox="0 0 24 24"><path d="M6 9l6 6 6-6"/></svg>
      </button>
      <div class="nav-dd-menu" id="nav-dd-menu-infos">
        <a class="nav-dd-item {{ request()->routeIs('mediation.adherents*') ? 'active' : '' }}" href="{{ route('mediation.adherents') }}">
          Établissements adhérents
        </a>
        <a class="nav-dd-item {{ request()->routeIs('mediation.fonds-documentaire*', 'mediation.textes*') ? 'active' : '' }}" href="{{ route('mediation.fonds-documentaire') }}">
          Fonds documentaire
        </a>
        <a class="nav-dd-item {{ request()->routeIs('mediation.contacts*') ? 'active' : '' }}" href="{{ route('mediation.contacts') }}">
          Contacts utiles
        </a>
      </div>
    </div>

    <span class="nav-sep"></span>

    {{-- CTA saisine rapide --}}
    <a class="nav-btn nav-cta" href="{{ route('mediation.recours') }}#formulaire">
      Saisir le Médiateur
    </a>

    {{-- Sélecteur de langue --}}
    <form class="language-switcher" aria-label="Choisir la langue">
      <label for="site-language-med" class="sr-only">Choisir la langue</label>
      <svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M3 12h18M12 3a15 15 0 010 18M12 3a15 15 0 000 18"/></svg>
      <select id="site-language-med" aria-label="Choisir la langue" onchange="if(this.value) window.location.href=this.value">
        @foreach (config('locales.supported', []) as $code => $language)
          <option value="{{ route('locale.switch', $code) }}" lang="{{ $code }}" @selected(app()->getLocale() === $code)>
            {{ $language['label'] }}
          </option>
        @endforeach
      </select>
    </form>
  </div>
</nav>
