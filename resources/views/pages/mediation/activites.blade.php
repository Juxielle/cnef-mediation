@extends('layouts.app')

@section('title', 'Activités du Médiateur — Médiation Financière')
@php($breadcrumb = 'Activités du Médiateur')

@section('content')
<section class="sec" style="background:var(--vert-f);padding-top:48px;padding-bottom:50px">
  <div class="stag light">Bilan Opérationnel &amp; Saisine en Ligne</div>
  <h1 class="sh light">Activités du Médiateur Financier</h1>
  <p class="si light">Consultez les résultats concrets de la médiation financière au Gabon, l'analyse des litiges traités et déposez directement votre demande de résolution amiable en ligne.</p>

  <div style="display:flex;gap:12px;flex-wrap:wrap;margin-top:24px">
    <a href="#saisine" class="btn-or">
      <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M22 2L11 13M22 2l-7 20-4-9-9-4 20-7z"/></svg>
      Formulaire de saisine
    </a>
    <a href="#statistiques" class="btn-ghost" style="color:#fff;border-color:rgba(255,255,255,.25)">
      Statistiques des litiges
    </a>
    <a href="{{ route('mediation.presentation') }}" class="btn-ghost" style="color:#fff;border-color:rgba(255,255,255,.25)">
      ← Présentation
    </a>
  </div>
</section>

{{-- ========================================================================= --}}
{{-- ── SECTION 1 : FORMULAIRE DE SAISINE EN LIGNE ──                          --}}
{{-- ========================================================================= --}}
<section id="saisine" class="sec" style="padding-top:56px;padding-bottom:56px;background:#fff">
  <div class="med-layout">
    <div class="med-form-wrap">
      <div class="stag">Formulaire Officiel</div>
      <h2 class="sh" style="margin-bottom:6px;font-size:24px">Saisir le Médiateur Financier</h2>
      <p class="mf-sub">Gratuit · Réponse sous 5 jours ouvrés · Procédure strictement confidentielle</p>

      <form method="POST" action="{{ route('mediation.saisine.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="frow">
          <div class="fg">
            <label class="fl">Prénom *</label>
            <input type="text" class="fi" name="prenom" value="{{ old('prenom') }}" placeholder="Jean-Baptiste" required>
            @error('prenom') <div class="form-error">{{ $message }}</div> @enderror
          </div>
          <div class="fg">
            <label class="fl">Nom *</label>
            <input type="text" class="fi" name="nom" value="{{ old('nom') }}" placeholder="Ndong Essone" required>
            @error('nom') <div class="form-error">{{ $message }}</div> @enderror
          </div>
        </div>

        <div class="frow">
          <div class="fg">
            <label class="fl">Email *</label>
            <input type="email" class="fi" name="email" value="{{ old('email') }}" placeholder="votre@email.com" required>
            @error('email') <div class="form-error">{{ $message }}</div> @enderror
          </div>
          <div class="fg">
            <label class="fl">Téléphone</label>
            <input type="tel" class="fi" name="telephone" value="{{ old('telephone') }}" placeholder="+241 06 00 00 00">
          </div>
        </div>

        <div class="fg">
          <label class="fl">Établissement concerné *</label>
          <select class="fsel" name="etablissement" id="etablissement" required>
            <option value="">— Sélectionnez l'établissement financier —</option>
            @foreach ($etablissements as $groupe => $items)
              <optgroup label="── {{ $groupe }} ──">
                @foreach ($items as $item)
                  <option value="{{ $item }}" @selected(old('etablissement') === $item)>{{ $item }} ({{ $groupe }})</option>
                @endforeach
              </optgroup>
            @endforeach
          </select>
          @error('etablissement') <div class="form-error">{{ $message }}</div> @enderror
        </div>

        <div class="fg">
          <label class="fl">Nature principale du litige *</label>
          <select class="fsel" name="nature_litige" required>
            <option value="">— Type de différend —</option>
            @foreach ($naturesLitige as $nature)
              <option @selected(old('nature_litige') === $nature)>{{ $nature }}</option>
            @endforeach
          </select>
          @error('nature_litige') <div class="form-error">{{ $message }}</div> @enderror
        </div>

        <div class="fg">
          <label class="fl">Description détaillée du litige *</label>
          <textarea class="fta" name="description" rows="5" placeholder="Décrivez les faits, la date de survenance, la démarche écrite préalable engagée auprès de l'établissement (avec date) et le préjudice subi..." required>{{ old('description') }}</textarea>
          @error('description') <div class="form-error">{{ $message }}</div> @enderror
        </div>

        <div class="fg">
          <label class="fl">Pièces justificatives (Relevés, courrier réclamation, contrats, etc.)</label>
          <div class="upload-zone" onclick="document.getElementById('saisine-file-input').click()"
               ondragover="dragOver(event,'saisine-upload-zone')" ondragleave="dragLeave(event,'saisine-upload-zone')"
               ondrop="dropFiles(event,'saisine-upload-zone','saisine-file-input')" id="saisine-upload-zone">
            <div class="upload-icon"><svg viewBox="0 0 24 24"><path d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg></div>
            <div class="upload-txt">Cliquez ou <strong>glissez-déposez</strong> vos fichiers</div>
            <div class="upload-sub">PDF, JPG, PNG, DOCX — max 10 Mo par fichier — 5 fichiers maximum</div>
          </div>
          <input type="file" id="saisine-file-input" name="pieces[]" style="display:none" multiple accept=".pdf,.jpg,.jpeg,.png,.docx" onchange="renderFileList('saisine-file-input','saisine-file-input-list')">
          <div class="file-list" id="saisine-file-input-list"></div>
          @error('pieces.*') <div class="form-error">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn-or" style="width:100%;justify-content:center;margin-top:8px">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M22 2L11 13M22 2l-7 20-4-9-9-4 20-7z"/></svg>
          Transmettre ma demande de médiation
        </button>
      </form>
    </div>

    <div>
      <div style="background:var(--gris);border-radius:var(--rl);padding:24px 28px;margin-bottom:24px">
        <h3 style="font-size:16px;font-weight:600;color:var(--txt);margin-bottom:14px">Conditions indispensables de recevabilité</h3>
        <ul style="padding-left:18px;font-size:13px;color:var(--txt2);line-height:1.75;display:flex;flex-direction:column;gap:8px">
          <li><strong>Réclamation préalable obligatoire :</strong> Vous devez avoir adressé une réclamation écrite à l'établissement et attendre 45 jours au moins sans réponse, ou avoir reçu un rejet.</li>
          <li><strong>Personnes physiques :</strong> La médiation concerne les particuliers pour leurs opérations non professionnelles.</li>
          <li><strong>Pas de litige judiciaire en cours :</strong> Le différend ne doit pas être pendant devant un tribunal civil ou arbitral.</li>
        </ul>
      </div>

      <div style="background:var(--vert-c);border:1px solid var(--brd);border-radius:var(--rl);padding:24px 28px">
        <div style="font-size:11.5px;font-weight:700;color:var(--vert);text-transform:uppercase;letter-spacing:.08em;margin-bottom:8px">Délais d'instruction</div>
        <p style="font-size:13.5px;color:var(--txt2);line-height:1.7;margin-bottom:14px">
          Dès réception, le Secrétariat du CNEF accuse réception sous <strong>5 jours ouvrés</strong> et transmet le dossier au Médiateur compétent.
        </p>
        <p style="font-size:13px;color:var(--txt2);line-height:1.65">
          La durée totale de la médiation ne peut excéder <strong>3 mois</strong> (renouvelable de 2 mois avec accord mutuel).
        </p>
      </div>
    </div>
  </div>
</section>

{{-- ========================================================================= --}}
{{-- ── SECTION 2 : STATISTIQUES & BILAN D'ACTIVITÉ ──                         --}}
{{-- ========================================================================= --}}
<section id="statistiques" class="sec" style="background:var(--gris);padding-top:56px;padding-bottom:56px">
  <div class="stag">Transparence &amp; Résultats</div>
  <h2 class="sh">Bilan d'activité et indicateurs de performance</h2>
  <p class="si">Les résultats quantitatifs de la médiation financière : volumes de saisines, taux de résolution et typologies des dossiers traités.</p>

  {{-- KPIs --}}
  <div class="stats-med-grid" style="margin-top:32px">
    @foreach ($mediationKpis as $kpi)
      <div class="smkpi">
        <div class="smkpi-l">{{ $kpi->libelle }}</div>
        <div class="smkpi-v">{{ $kpi->valeur }}</div>
        <div class="smkpi-s">{{ $kpi->sous_texte }}</div>
      </div>
    @endforeach
  </div>

  {{-- Graphiques Chart.js --}}
  <div class="stats-charts" style="margin-top:28px">
    <div class="sbox">
      <div class="sbox-t">Évolution trimestrielle des saisines &amp; résolutions</div>
      <canvas id="chart-saisines" height="210"></canvas>
    </div>
    <div class="sbox">
      <div class="sbox-t">Répartition des litiges par nature</div>
      <canvas id="chart-litiges" height="210"></canvas>
    </div>
  </div>

  {{-- Tableau des litiges --}}
  <div class="litiges-table" style="margin-top:28px">
    <div class="bt-head bt-grid-5">
      <span>Nature du litige</span>
      <span>Dossiers</span>
      <span>Résolus</span>
      <span class="bt-hide">Taux</span>
      <span>Tendance</span>
    </div>
    @foreach ($litiges as $l)
      @php($pillClass = ['g' => 'pill-g', 'y' => 'pill-y', 'r' => 'pill-r'][$l->tendance_niveau] ?? 'pill-g')
      <div class="bt-row bt-grid-5">
        <span style="font-size:13.5px;font-weight:500">{{ $l->nature }}</span>
        <span style="font-size:13.5px">{{ $l->dossiers }}</span>
        <span style="font-size:13.5px">{{ $l->resolus }}</span>
        <span class="bt-hide">
          <div class="prog-bar"><div class="prog-fill" style="width:{{ $l->taux }}%"></div></div>
        </span>
        <span><span class="pill {{ $pillClass }}">{{ $l->tendance }}</span></span>
      </div>
    @endforeach
  </div>
</section>
@endsection

@push('scripts')
<script>
  new Chart(document.getElementById('chart-saisines'), {
    type: 'bar',
    data: {
      labels: @json($saisinesTrimestrielles->pluck('periode')),
      datasets: [
        { label: 'Saisines reçues', data: @json($saisinesTrimestrielles->pluck('saisines')), backgroundColor: 'rgba(5,150,105,0.7)', borderColor: '#059669', borderWidth: 1.5, borderRadius: 4 },
        { label: 'Litiges résolus', data: @json($saisinesTrimestrielles->pluck('resolus')), backgroundColor: 'rgba(232,163,23,0.7)', borderColor: '#E8A317', borderWidth: 1.5, borderRadius: 4 }
      ]
    },
    options: {
      responsive: true,
      plugins: { legend: { position: 'bottom' } },
      scales: { y: { grid: { color: 'rgba(0,0,0,0.05)' } }, x: { grid: { display: false } } }
    }
  });

  new Chart(document.getElementById('chart-litiges'), {
    type: 'doughnut',
    data: {
      labels: @json($litiges->pluck('nature')),
      datasets: [{
        data: @json($litiges->pluck('dossiers')),
        backgroundColor: ['#059669', '#E8A317', '#2563EB', '#009A44', '#8B5CF6', '#EF4444'],
        borderWidth: 2,
        borderColor: '#fff'
      }]
    },
    options: {
      responsive: true,
      plugins: { legend: { position: 'right', labels: { boxWidth: 12 } } }
    }
  });
</script>
@endpush
