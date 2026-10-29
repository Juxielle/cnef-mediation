<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="icon" type="image/png" href="{{ asset('assets/images/logo-semi-trans.png') }}">
<title>@yield('title', 'Tableau de bord') — Back-office CNEF</title>
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('assets/css/app.css') }}?v={{ filemtime(public_path('assets/css/app.css')) }}">
<link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}?v={{ filemtime(public_path('assets/css/admin.css')) }}">
@stack('styles')
</head>
<body>

<div class="admin-shell">
  @include('admin.partials.sidebar')

  <div class="admin-main">
    <div class="admin-topbar">
      <div style="display:flex;align-items:center;gap:14px">
        <button type="button" class="abtn abtn-ghost abtn-icon" style="display:none" id="admin-burger" onclick="document.getElementById('admin-sidebar').classList.toggle('open')">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M3 6h18M3 12h18M3 18h18"/></svg>
        </button>
        <div>
          <h1>@yield('title', 'Tableau de bord')</h1>
          @hasSection('subtitle')
            <div class="admin-topbar-sub">@yield('subtitle')</div>
          @endif
        </div>
      </div>
      <a href="{{ route('mediation.index') }}" target="_blank" class="admin-view-site">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
        Voir le site public
      </a>
    </div>

    <div class="admin-content">
      @if (session('success'))
        <div class="alert-success" style="margin-bottom:20px">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M5 13l4 4L19 7"/></svg>
          {{ session('success') }}
        </div>
      @endif
      @yield('content')
    </div>
  </div>
</div>

@stack('scripts')
</body>
</html>
