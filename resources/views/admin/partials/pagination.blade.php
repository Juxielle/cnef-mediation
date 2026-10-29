@if ($paginator->hasPages())
<nav style="display:flex;align-items:center;justify-content:space-between;gap:12px;flex-wrap:wrap">
  <div style="font-size:12px;color:var(--txt3)">
    Page {{ $paginator->currentPage() }} sur {{ $paginator->lastPage() }} · {{ $paginator->total() }} élément(s)
  </div>
  <div style="display:flex;gap:6px;flex-wrap:wrap">
    @if ($paginator->onFirstPage())
      <span class="abtn abtn-ghost abtn-sm" style="opacity:.4;cursor:default">Précédent</span>
    @else
      <a href="{{ $paginator->previousPageUrl() }}" class="abtn abtn-ghost abtn-sm">Précédent</a>
    @endif

    @foreach ($elements as $element)
      @if (is_string($element))
        <span class="abtn abtn-ghost abtn-sm" style="opacity:.4;cursor:default">{{ $element }}</span>
      @endif

      @if (is_array($element))
        @foreach ($element as $page => $url)
          @if ($page == $paginator->currentPage())
            <span class="abtn abtn-primary abtn-sm">{{ $page }}</span>
          @else
            <a href="{{ $url }}" class="abtn abtn-ghost abtn-sm">{{ $page }}</a>
          @endif
        @endforeach
      @endif
    @endforeach

    @if ($paginator->hasMorePages())
      <a href="{{ $paginator->nextPageUrl() }}" class="abtn abtn-ghost abtn-sm">Suivant</a>
    @else
      <span class="abtn abtn-ghost abtn-sm" style="opacity:.4;cursor:default">Suivant</span>
    @endif
  </div>
</nav>
@endif
