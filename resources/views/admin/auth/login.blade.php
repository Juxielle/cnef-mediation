<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" type="image/png" href="{{ asset('assets/images/logo-semi-trans.png') }}">
<title>Connexion — Back-office CNEF</title>
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('assets/css/app.css') }}?v={{ filemtime(public_path('assets/css/app.css')) }}">
<link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}?v={{ filemtime(public_path('assets/css/admin.css')) }}">
</head>
<body>

<div class="admin-login-shell">
  <div class="admin-login-flag">
    <div style="background:#009A44"></div>
    <div style="background:#FCD116"></div>
    <div style="background:#003189"></div>
  </div>

  <div class="admin-login-card">
    <div class="admin-login-logo">
      <img src="{{ asset('assets/images/logo-semi-trans.png') }}" alt="Logo CNEF">
      <span><span>CNEF Gabon</span><span>Back-office</span></span>
    </div>
    <div class="admin-login-title">Connexion</div>
    <p class="admin-login-sub">Accès réservé aux administrateurs du site.</p>

    @if ($errors->any())
      <div style="background:#fee2e2;color:#b91c1c;border-radius:8px;padding:12px 16px;font-size:13px;margin-bottom:18px">
        {{ $errors->first() }}
      </div>
    @endif

    <form method="POST" action="{{ route('admin.login.attempt') }}">
      @csrf
      <div class="afg" style="margin-bottom:16px">
        <label class="afl">Email</label>
        <input type="email" name="email" class="afi" value="{{ old('email') }}" placeholder="admin@cnef.ga" autofocus required>
      </div>
      <div class="afg" style="margin-bottom:22px">
        <label class="afl">Mot de passe</label>
        <input type="password" name="password" class="afi" placeholder="••••••••" required>
      </div>
      <button type="submit" class="btn-or" style="width:100%;justify-content:center">
        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M15 3h4a2 2 0 012 2v14a2 2 0 01-2 2h-4M10 17l5-5-5-5M15 12H3"/></svg>
        Se connecter
      </button>
    </form>
  </div>
</div>

</body>
</html>
