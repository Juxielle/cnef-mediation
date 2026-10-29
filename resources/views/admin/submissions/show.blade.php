@extends('admin.layouts.app')

@section('title', 'Détail — '.$title)

@section('content')
<div style="display:grid;grid-template-columns:1.6fr 1fr;gap:22px;align-items:start" class="admin-show-grid">
  <div class="admin-card">
    <div class="admin-card-head">
      <h2>Détail</h2>
      <a href="{{ route($routeBase.'.index') }}" class="abtn abtn-ghost">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
        Retour à la liste
      </a>
    </div>
    <div style="padding:22px" class="aform-grid">
      @foreach ($fields as $field)
        <div class="afg {{ ($field['full'] ?? false) ? 'afg-full' : '' }}">
          <label class="afl">{{ $field['label'] }}</label>
          @if (isset($field['files']))
            @if (count($field['files']))
              <div style="display:flex;flex-direction:column;gap:6px">
                @foreach ($field['files'] as $i => $path)
                  <a href="{{ route($routeBase.'.download', [$item->id, $i]) }}" style="display:flex;align-items:center;gap:8px;background:var(--gris);border-radius:7px;padding:9px 13px;font-size:12.5px;color:var(--vert);text-decoration:none">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    {{ basename($path) }}
                  </a>
                @endforeach
              </div>
            @else
              <div style="font-size:13px;color:var(--txt3)">Aucune pièce jointe.</div>
            @endif
          @else
            <div style="font-size:13.5px;color:var(--txt);line-height:1.6;white-space:pre-line">{{ $field['value'] }}</div>
          @endif
        </div>
      @endforeach
    </div>
  </div>

  <div class="admin-card">
    <div class="admin-card-head"><h2>Statut</h2></div>
    <form method="POST" action="{{ route($routeBase.'.status', $item->id) }}" style="padding:22px">
      @csrf
      @method('PATCH')
      @if ($statusType === 'boolean')
        <label class="afcheck" style="margin-bottom:18px">
          <input type="hidden" name="{{ $statusField }}" value="0">
          <input type="checkbox" name="{{ $statusField }}" value="1" @checked($item->{$statusField})>
          <span class="afl" style="margin-bottom:0">Marquer comme traité</span>
        </label>
      @else
        <div class="afg" style="margin-bottom:18px">
          <label class="afl">Statut</label>
          <select name="{{ $statusField }}" class="afsel">
            @foreach ($statusOptions as $val => $label)
              <option value="{{ $val }}" @selected($item->{$statusField} === $val)>{{ $label }}</option>
            @endforeach
          </select>
        </div>

        @if ($item instanceof \App\Models\MediationRequest)
          <div class="afg" style="margin-bottom:18px">
            <label class="afl">Observations du Médiateur (visibles par l’usager en suivi)</label>
            <textarea name="observation_mediateur" class="afta" rows="4" placeholder="Indiquez ici les informations d'avancement, pièces complémentaires attendues ou motifs de décision...">{{ old('observation_mediateur', $item->observation_mediateur) }}</textarea>
            <small style="display:block;font-size:11.5px;color:var(--txt3);margin-top:5px">Ces observations s'affichent en temps réel sur la page de suivi du demandeur.</small>
          </div>
        @endif
      @endif
      <button type="submit" class="abtn abtn-primary" style="width:100%;justify-content:center">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M5 13l4 4L19 7"/></svg>
        Mettre à jour le statut
      </button>
    </form>

    <div style="padding:0 22px 22px">
      <form method="POST" action="{{ route($routeBase.'.destroy', $item->id) }}" onsubmit="return confirm('Confirmer la suppression définitive ?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="abtn abtn-danger" style="width:100%;justify-content:center">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 6h18M8 6V4a2 2 0 012-2h4a2 2 0 012 2v2m3 0v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6h14z"/></svg>
          Supprimer définitivement
        </button>
      </form>
    </div>
  </div>
</div>

<style>@media(max-width:960px){.admin-show-grid{grid-template-columns:1fr!important}}</style>
@endsection
