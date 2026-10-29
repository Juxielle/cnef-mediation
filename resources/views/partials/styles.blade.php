<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="icon" type="image/png" href="{{ asset('assets/images/logo-semi-trans.png') }}">
<title>@yield('title', 'CNEF — Comité National Économique et Financier') | Gabon</title>
<meta name="description" content="@yield('meta_description', "Comité National Économique et Financier du Gabon — régulation, médiation financière, baromètre économique et éducation financière.")">
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.umd.min.js"></script>
<link rel="stylesheet" href="{{ asset('assets/css/app.css') }}?v={{ filemtime(public_path('assets/css/app.css')) }}">
@stack('styles')
