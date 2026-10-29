@extends('layouts.app')

@section('title', 'Établissements Adhérents — Médiation Financière — CNEF Gabon')
@php($breadcrumb = 'Établissements adhérents')

@section('content')
{{-- HERO ADHÉRENTS --}}
<section class="sec" style="background:var(--vert-f);padding-top:48px;padding-bottom:52px">
  <div class="stag light">Rubrique Officielle B.4 · Répertoire des Assujettis</div>
  <h1 class="sh light" style="font-size:clamp(26px,5vw,38px);margin-bottom:12px">
    Établissements Adhérents au Dispositif de Médiation
  </h1>
  <p class="si light" style="max-width:820px;margin-bottom:24px">
    Conformément à l'article 5 du Décret N° 0121/PR/MEP, tous les établissements financiers agréés en République Gabonaise sont assujettis et ont formellement adhéré au dispositif de médiation financière, répartis selon les 3 branches officielles d'activité.
  </p>

  <div style="display:flex;gap:12px;flex-wrap:wrap">
    <div style="background:rgba(255,255,255,.08);border:1px solid rgba(255,255,255,.16);border-radius:8px;padding:10px 18px">
      <div style="font-size:11px;color:rgba(255,255,255,.6);text-transform:uppercase">Total Assujettis</div>
      <div style="font-size:18px;font-weight:700;color:var(--or)">{{ $totalAdherents }} Établissements</div>
    </div>
    <div style="background:rgba(255,255,255,.08);border:1px solid rgba(255,255,255,.16);border-radius:8px;padding:10px 18px">
      <div style="font-size:11px;color:rgba(255,255,255,.6);text-transform:uppercase">Organisation</div>
      <div style="font-size:18px;font-weight:700;color:#fff">3 Branches Spécialisées</div>
    </div>
    <div style="background:rgba(255,255,255,.08);border:1px solid rgba(255,255,255,.16);border-radius:8px;padding:10px 18px">
      <div style="font-size:11px;color:rgba(255,255,255,.6);text-transform:uppercase">Statut d'Adhésion</div>
      <div style="font-size:18px;font-weight:700;color:#34D399">100% Adhérents Officiels</div>
    </div>
  </div>
</section>

{{-- ========================================================================= --}}
{{-- ── FILTRES PAR BRANCHE & RECHERCHE INSTANTANÉE ──                         --}}
{{-- ========================================================================= --}}
<section class="sec" style="background:var(--gris);padding-top:40px;padding-bottom:56px">
  <div style="display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:16px;margin-bottom:28px">
    <div class="adherent-filter-bar" style="margin-bottom:0">
      <button type="button" class="adh-filter-btn active" onclick="filterBranch('all', this)">
        Toutes les branches ({{ $totalAdherents }})
      </button>
      <button type="button" class="adh-filter-btn" onclick="filterBranch(1, this)">
        Branche 1 : Crédit, EMF &amp; Paiement ({{ $branchesAdherents[1]['total'] }})
      </button>
      <button type="button" class="adh-filter-btn" onclick="filterBranch(2, this)">
        Branche 2 : Assurances ({{ $branchesAdherents[2]['total'] }})
      </button>
      <button type="button" class="adh-filter-btn" onclick="filterBranch(3, this)">
        Branche 3 : Marchés Financiers ({{ $branchesAdherents[3]['total'] }})
      </button>
    </div>

    {{-- Champ de recherche rapide --}}
    <div style="min-width:280px;position:relative">
      <input type="text" id="adh-search-input" placeholder="Rechercher par nom..." onkeyup="searchAdherents()"
             style="width:100%;padding:10px 14px 10px 36px;border:1px solid var(--gris-d);border-radius:100px;font-size:13px;outline:none;background:#fff">
      <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--txt3)" stroke-width="2" style="position:absolute;left:13px;top:12px"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg>
    </div>
  </div>

  {{-- Message si aucun résultat après recherche --}}
  <div id="no-adh-result" style="display:none;background:#fff;border:1px solid var(--brd);border-radius:var(--rl);padding:32px;text-align:center;margin-bottom:30px">
    <strong style="font-size:16px;color:var(--txt)">Aucun établissement ne correspond à votre recherche.</strong>
    <p style="font-size:13px;color:var(--txt3);margin:6px 0 0">Vérifiez l'orthographe du nom de l'établissement ou réinitialisez les filtres.</p>
  </div>

  {{-- ========================================================================= --}}
  {{-- ── DÉCLINAISON PAR BRANCHE OFFICIELLE ──                                  --}}
  {{-- ========================================================================= --}}
  @foreach ($branchesAdherents as $branchNum => $branch)
    <div class="branch-section" id="branch-section-{{ $branchNum }}" style="margin-bottom:48px">
      {{-- En-tête de branche --}}
      <div style="background:#fff;border:1px solid var(--brd);border-left:4px solid {{ $branch['badge'] }};border-radius:var(--rl);padding:24px 28px;margin-bottom:20px;box-shadow:0 2px 10px rgba(0,0,0,.02)">
        <div style="display:flex;justify-content:space-between;align-items:flex-start;flex-wrap:wrap;gap:12px">
          <div>
            <div style="display:flex;gap:10px;align-items:center;margin-bottom:6px">
              <span style="font-size:11px;font-weight:800;color:#fff;background:{{ $branch['badge'] }};padding:3px 10px;border-radius:6px;text-transform:uppercase;letter-spacing:.06em">
                Branche {{ $branchNum }}
              </span>
              <span style="font-size:12px;font-weight:600;color:var(--txt3)">Supervision Prudentielle : <strong style="color:var(--txt)">{{ $branch['supervision'] }}</strong></span>
            </div>
            <h2 style="font-family:'Space Grotesk',sans-serif;font-size:20px;font-weight:600;color:var(--txt);margin:0 0 6px">
              {{ $branch['titre'] }}
            </h2>
            <p style="font-size:13px;color:var(--txt2);margin:0;max-width:850px;line-height:1.6">
              {{ $branch['description'] }}
            </p>
          </div>
          <div style="background:var(--gris);border-radius:8px;padding:8px 16px;text-align:right">
            <span style="font-size:11px;color:var(--txt3);text-transform:uppercase;display:block">Effectif</span>
            <strong style="font-size:17px;color:var(--txt);font-family:'Space Grotesk',sans-serif">{{ $branch['total'] }} Adhérents</strong>
          </div>
        </div>
      </div>

      {{-- Sous-groupes de la branche --}}
      @foreach ($branch['sous_groupes'] as $nomSousGroupe => $items)
        @if (count($items) > 0)
          <div style="margin-bottom:28px">
            <div style="display:flex;align-items:center;gap:10px;margin-bottom:14px;padding-left:4px">
              <span style="width:8px;height:8px;border-radius:50%;background:{{ $branch['badge'] }}"></span>
              <h3 style="font-size:15px;font-weight:600;color:var(--txt);margin:0">
                {{ $nomSousGroupe }} ({{ count($items) }})
              </h3>
            </div>

            <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(260px,1fr));gap:16px">
              @foreach ($items as $item)
                <div class="adh-card" data-name="{{ strtolower($item->nom) }}" data-branch="{{ $branchNum }}">
                  <div>
                    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:8px">
                      <span style="font-size:10px;font-weight:700;color:var(--vert);background:var(--vert-c);padding:2px 7px;border-radius:4px;text-transform:uppercase">
                        Adhérent officiel
                      </span>
                      <span style="font-size:10.5px;color:var(--txt3)">B.{{ $branchNum }}</span>
                    </div>
                    <h4 style="font-family:'Space Grotesk',sans-serif;font-size:15.5px;font-weight:600;color:var(--txt);margin-bottom:4px">
                      {{ $item->nom }}
                    </h4>
                    <div style="font-size:11.5px;color:var(--txt3)">
                      {{ $nomSousGroupe }}
                    </div>
                  </div>

                  <div style="margin-top:16px;padding-top:12px;border-top:1px solid var(--gris-m);display:flex;justify-content:space-between;align-items:center">
                    <span style="font-size:11px;color:var(--vert);font-weight:600">✓ Assujetti CNEF</span>
                    <a href="{{ route('mediation.recours', ['etablissement' => $item->nom]) }}#formulaire" style="font-size:12px;font-weight:600;color:var(--vert);text-decoration:none">
                      Saisir →
                    </a>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        @endif
      @endforeach
    </div>
  @endforeach
</section>
@endsection

@push('scripts')
<script>
  let activeBranch = 'all';

  function filterBranch(branch, btn) {
    activeBranch = branch;
    document.querySelectorAll('.adh-filter-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    applyFilters();
  }

  function searchAdherents() {
    applyFilters();
  }

  function applyFilters() {
    const query = document.getElementById('adh-search-input').value.toLowerCase().trim();
    let totalVisible = 0;

    [1, 2, 3].forEach(branchNum => {
      const section = document.getElementById('branch-section-' + branchNum);
      if (!section) return;

      if (activeBranch !== 'all' && activeBranch != branchNum) {
        section.style.display = 'none';
        return;
      }

      let sectionVisibleCount = 0;
      const cards = section.querySelectorAll('.adh-card');
      cards.forEach(card => {
        const name = card.getAttribute('data-name');
        const matchesQuery = query === '' || name.includes(query);
        if (matchesQuery) {
          card.style.display = 'flex';
          sectionVisibleCount++;
          totalVisible++;
        } else {
          card.style.display = 'none';
        }
      });

      section.style.display = sectionVisibleCount > 0 ? 'block' : 'none';
    });

    const noResult = document.getElementById('no-adh-result');
    if (noResult) {
      noResult.style.display = totalVisible === 0 ? 'block' : 'none';
    }
  }
</script>
@endpush
