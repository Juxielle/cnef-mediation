@isset($breadcrumb)
<nav aria-label="Fil d'Ariane" style="padding:14px 5vw;background:var(--gris);border-bottom:1px solid var(--brd);font-size:12.5px;display:flex;align-items:center;flex-wrap:wrap;gap:6px">
  <a href="{{ route('mediation.index') }}" style="color:var(--txt3);text-decoration:none">Accueil Médiation</a>
  <span style="color:var(--txt3)">/</span>
  <span style="color:var(--txt);font-weight:500">{{ $breadcrumb }}</span>
</nav>
@endisset

