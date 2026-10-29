@extends('admin.layouts.app')

@section('title', $title)
@section('subtitle', $items->total().' élément(s) reçu(s)')

@section('content')
<div class="admin-card">
  <div class="admin-card-head">
    <h2>{{ $title }}</h2>
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
              <td>
                @if ($field === $statusField)
                  @if ($statusType === 'boolean')
                    <span class="astatus {{ $item->{$field} ? 'astatus-resolu' : 'astatus-nouveau' }}">{{ $item->{$field} ? 'Traité' : 'À traiter' }}</span>
                  @else
                    <span class="astatus astatus-{{ $item->{$field} }}">{{ ucfirst(str_replace('_',' ', $item->{$field})) }}</span>
                  @endif
                @elseif ($field === 'created_at')
                  {{ $item->created_at->format('d/m/Y H:i') }}
                @else
                  {{ \Illuminate\Support\Str::limit((string) data_get($item, $field), 60) }}
                @endif
              </td>
            @endforeach
            <td>
              <div class="admin-table-actions">
                <a href="{{ route($routeBase.'.show', $item->id) }}" class="abtn abtn-ghost abtn-sm">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                  Voir le détail
                </a>
              </div>
            </td>
          </tr>
        @empty
          <tr><td colspan="{{ count($columns) + 1 }}" class="admin-empty">Aucun élément reçu pour le moment.</td></tr>
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
