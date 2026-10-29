{{-- Sidebar de navigation par catégories — utilisée par la page Veille réglementaire --}}
<div class="veille-nav">
  <div class="vn-cat">Textes fondateurs</div>
  <a class="vn-item {{ !$currentCategorie ? 'on' : '' }}" href="{{ route('veille.index') }}">
    Tous les textes <span class="vn-count">{{ $totalTextes }}</span>
  </a>
  @foreach ($sidebarGroups as $groupLabel => $items)
    <div class="vn-cat" style="margin-top:4px">{{ $groupLabel }}</div>
    @foreach ($items as $item)
      <a class="vn-item {{ $currentCategorie === $item['key'] ? 'on' : '' }}" href="{{ route('veille.index', ['categorie' => $item['key']]) }}">
        {{ $item['label'] }} <span class="vn-count">{{ $item['count'] }}</span>
      </a>
    @endforeach
  @endforeach
</div>
