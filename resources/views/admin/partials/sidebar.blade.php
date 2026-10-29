<aside class="admin-sidebar" id="admin-sidebar">
  <a href="{{ route('admin.dashboard') }}" class="admin-sidebar-brand" style="text-decoration:none">
    <img class="admin-sidebar-emb" src="{{ asset('assets/images/logo-semi-trans.png') }}" alt="Logo CNEF">
    <span><span>CNEF Gabon</span><span>Médiation Back-office</span></span>
  </a>

  <nav class="admin-nav">
    <a class="admin-nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
      <svg viewBox="0 0 24 24"><path d="M3 12l9-9 9 9M5 10v10a1 1 0 001 1h3m10-11v10a1 1 0 01-1 1h-3m-6 0h6m-6 0V15h6v6"/></svg>
      Tableau de bord
    </a>

    <div class="admin-nav-group">Gestion des dossiers</div>
    <a class="admin-nav-link {{ request()->routeIs('admin.mediation-requests.*') ? 'active' : '' }}" href="{{ route('admin.mediation-requests.index') }}">
      <svg viewBox="0 0 24 24"><path d="M12 3v18M5 7l-3 6a3 3 0 006 0zM19 7l-3 6a3 3 0 006 0zM5 7h14"/></svg>
      Saisines de médiation <span class="admin-nav-count">{{ \App\Models\MediationRequest::count() }}</span>
    </a>
    <a class="admin-nav-link {{ request()->routeIs('admin.candidatures.*') ? 'active' : '' }}" href="{{ route('admin.candidatures.index') }}">
      <svg viewBox="0 0 24 24"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="8.5" cy="7" r="4"/><line x1="20" y1="8" x2="20" y2="14"/><line x1="23" y1="11" x2="17" y2="11"/></svg>
      Candidatures médiateur <span class="admin-nav-count">{{ \App\Models\MediateurCandidature::count() }}</span>
    </a>

    <div class="admin-nav-group">Dispositif &amp; Adhérents</div>
    <a class="admin-nav-link {{ request()->routeIs('admin.mediation-etablissements.*') ? 'active' : '' }}" href="{{ route('admin.mediation-etablissements.index') }}">
      <svg viewBox="0 0 24 24"><path d="M3 21h18M3 10h18M3 7l9-4 9 4M4 10v11M20 10v11"/></svg>
      Établissements adhérents <span class="admin-nav-count">{{ \App\Models\MediationEtablissement::count() }}</span>
    </a>
    <a class="admin-nav-link {{ request()->routeIs('admin.textes.*') ? 'active' : '' }}" href="{{ route('admin.textes.index') }}">
      <svg viewBox="0 0 24 24"><path d="M4 19.5A2.5 2.5 0 016.5 17H20M4 19.5A2.5 2.5 0 006.5 22H20V2H6.5A2.5 2.5 0 004 4.5v15z"/></svg>
      Fonds documentaire <span class="admin-nav-count">{{ \App\Models\TexteReglementaire::count() }}</span>
    </a>
    <a class="admin-nav-link {{ request()->routeIs('admin.actualites.*') ? 'active' : '' }}" href="{{ route('admin.actualites.index') }}">
      <svg viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><path d="M14 2v6h6M16 13H8M16 17H8M10 9H8"/></svg>
      Actualités &amp; Médias <span class="admin-nav-count">{{ \App\Models\Actualite::count() }}</span>
    </a>

    <div class="admin-nav-group">Indicateurs &amp; Statistiques</div>
    <a class="admin-nav-link {{ request()->routeIs('admin.mediation-kpis.*') ? 'active' : '' }}" href="{{ route('admin.mediation-kpis.index') }}">
      <svg viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg>
      Indicateurs clés (KPI) <span class="admin-nav-count">{{ \App\Models\MediationKpi::count() }}</span>
    </a>
    <a class="admin-nav-link {{ request()->routeIs('admin.mediation-litiges.*') ? 'active' : '' }}" href="{{ route('admin.mediation-litiges.index') }}">
      <svg viewBox="0 0 24 24"><path d="M9 17V9m4 8V5m4 12v-6M5 21h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
      Typologie des litiges <span class="admin-nav-count">{{ \App\Models\MediationLitige::count() }}</span>
    </a>
    <a class="admin-nav-link {{ request()->routeIs('admin.mediation-saisines.*') ? 'active' : '' }}" href="{{ route('admin.mediation-saisines.index') }}">
      <svg viewBox="0 0 24 24"><path d="M3 3v18h18M7 15l4-4 3 3 5-6"/></svg>
      Saisines trimestrielles <span class="admin-nav-count">{{ \App\Models\MediationSaisineTrimestre::count() }}</span>
    </a>

    <div class="admin-nav-group">Communication</div>
    <a class="admin-nav-link {{ request()->routeIs('admin.messages.*') ? 'active' : '' }}" href="{{ route('admin.messages.index') }}">
      <svg viewBox="0 0 24 24"><path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
      Messages reçus <span class="admin-nav-count">{{ \App\Models\ContactMessage::count() }}</span>
    </a>

    <div class="admin-nav-group">Accès public</div>
    <a class="admin-nav-link" href="{{ route('mediation.index') }}" target="_blank">
      <svg viewBox="0 0 24 24"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6M15 3h6v6M10 14L21 3"/></svg>
      Voir le portail public ↗
    </a>
  </nav>

  <div class="admin-sidebar-foot">
    <div class="admin-sidebar-user">
      Connecté en tant que<br>
      <strong>{{ auth()->user()->name }}</strong>
    </div>
    <form method="POST" action="{{ route('admin.logout') }}">
      @csrf
      <button type="submit" class="admin-logout">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4M16 17l5-5-5-5M21 12H9"/></svg>
        Se déconnecter
      </button>
    </form>
  </div>
</aside>
