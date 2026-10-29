@extends('admin.layouts.app')

@section('title', 'Tableau de bord')
@section('subtitle', 'Vue d\'ensemble du contenu et des demandes du site CNEF Gabon')

@section('content')

<div class="stag" style="margin-bottom:10px">Contenu du site</div>
<div class="admin-stats-grid">
  @foreach ($stats as $s)
    <a href="{{ route($s['route']) }}" class="admin-stat" style="text-decoration:none;display:block">
      <div class="admin-stat-v">{{ $s['value'] }}</div>
      <div class="admin-stat-l">{{ $s['label'] }}</div>
    </a>
  @endforeach
</div>

<div class="stag" style="margin-bottom:10px">En attente de traitement</div>
<div class="admin-stats-grid" style="margin-bottom:32px">
  @foreach ($pending as $p)
    <a href="{{ route($p['route']) }}" class="admin-stat" style="text-decoration:none;display:block;{{ $p['value'] > 0 ? 'border-color:var(--or)' : '' }}">
      <div class="admin-stat-v" style="color:{{ $p['value'] > 0 ? 'var(--or-d)' : 'var(--vert)' }}">{{ $p['value'] }}</div>
      <div class="admin-stat-l">{{ $p['label'] }}</div>
    </a>
  @endforeach
</div>

<div class="stag" style="margin-bottom:10px">Accès rapide</div>
<div class="admin-quick-grid">
  <a class="admin-quick" href="{{ route('admin.mediation-requests.index') }}">
    <div class="admin-quick-ico"><svg viewBox="0 0 24 24"><path d="M12 3v18M5 7l-3 6a3 3 0 006 0zM19 7l-3 6a3 3 0 006 0zM5 7h14"/></svg></div>
    <div><div class="admin-quick-t">Traiter les saisines</div><div class="admin-quick-d">Médiation financière</div></div>
  </a>
  <a class="admin-quick" href="{{ route('admin.mediation-etablissements.create') }}">
    <div class="admin-quick-ico"><svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg></div>
    <div><div class="admin-quick-t">Ajouter un établissement</div><div class="admin-quick-d">Banque, EMF, Assurance...</div></div>
  </a>
  <a class="admin-quick" href="{{ route('admin.textes.create') }}">
    <div class="admin-quick-ico"><svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg></div>
    <div><div class="admin-quick-t">Ajouter un texte</div><div class="admin-quick-d">Fonds documentaire</div></div>
  </a>
  <a class="admin-quick" href="{{ route('admin.actualites.create') }}">
    <div class="admin-quick-ico"><svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg></div>
    <div><div class="admin-quick-t">Publier une actualité</div><div class="admin-quick-d">Communiqué officiel</div></div>
  </a>
</div>

@endsection

