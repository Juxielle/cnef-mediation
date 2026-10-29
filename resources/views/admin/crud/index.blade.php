@extends('admin.layouts.app')

@section('title', $title)
@section('subtitle', $items->total().' élément(s) au total')

@section('content')
<div class="admin-card">
  <div class="admin-card-head">
    <h2>Liste — {{ $title }}</h2>
    <a href="{{ route($routeBase.'.create') }}" class="abtn abtn-primary">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M12 5v14M5 12h14"/></svg>
      Ajouter
    </a>
  </div>

  <div class="admin-table-wrap">
    <table class="admin-table">
      <thead>
        <tr>
          @foreach ($columns as $label)
            <th>{{ $label }}</th>
          @endforeach
          <th style="text-align:right">Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($items as $item)
          <tr>
            @foreach (array_keys($columns) as $field)
              @php
                $value = data_get($item, $field);
                if (is_array($value)) {
                    $value = count($value).' élément(s)';
                } elseif (is_bool($value)) {
                    $value = $value ? 'Oui' : 'Non';
                } elseif (is_string($value) && mb_strlen($value) > 70) {
                    $value = mb_substr($value, 0, 70).'…';
                }
              @endphp
              <td>{{ $value }}</td>
            @endforeach
            <td>
              <div class="admin-table-actions">
                <a href="{{ route($routeBase.'.edit', $item->id) }}" class="abtn abtn-ghost abtn-sm">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                  Modifier
                </a>
                <form method="POST" action="{{ route($routeBase.'.destroy', $item->id) }}" onsubmit="return confirm('Confirmer la suppression ?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="abtn abtn-danger abtn-sm">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 6h18M8 6V4a2 2 0 012-2h4a2 2 0 012 2v2m3 0v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6h14z"/></svg>
                    Supprimer
                  </button>
                </form>
              </div>
            </td>
          </tr>
        @empty
          <tr><td colspan="{{ count($columns) + 1 }}" class="admin-empty">Aucun élément pour le moment.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>

  @if ($items->hasPages())
    <div style="padding:16px 22px;border-top:1px solid var(--brd)">
      {{ $items->links() }}
    </div>
  @endif
</div>
@endsection
