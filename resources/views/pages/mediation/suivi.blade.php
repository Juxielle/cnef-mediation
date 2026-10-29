@extends('layouts.app')
@section('title', 'Suivi de dossier de médiation financière — CNEF Gabon')
@php
  $breadcrumb = 'Suivi de médiation';
@endphp

@section('content')
{{-- HERO SUIVI --}}
<section class="sec agrement-track-hero" style="background:var(--vert-f);padding:52px 5vw">
  <div class="stag light">Espace Usager & Demandeur</div>
  <h1 class="sh light" style="font-size:clamp(26px,5vw,38px);margin-bottom:10px">Suivre mon Dossier de Médiation</h1>
  <p class="si light" style="max-width:760px;margin-bottom:0">
    Consultez en direct l’état d’avancement de votre réclamation financière grâce à votre code confidentiel unique attribué lors de l'enregistrement de votre saisine.
  </p>
</section>

<section class="sec agrement-track-page" style="padding:40px 5vw 70px;background:#F8FAFC">
  {{-- ENCART SUCCÈS IMMÉDIAT SUITE À SAISINE --}}
  @if(session('dossier_cree') || session('dossier_reference'))
    <div class="dossier-confirm" style="max-width:850px;margin:0 auto 36px;background:#ECFDF5;border:1.5px solid #10B981;border-radius:14px;padding:32px 28px;text-align:center;box-shadow:0 10px 25px rgba(16,185,129,0.12)">
      <div style="width:52px;height:52px;background:#10B981;color:#fff;border-radius:50%;display:grid;place-items:center;margin:0 auto 14px">
        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>
      </div>
      <strong style="font-size:22px;color:#065F46;font-family:'Space Grotesk',sans-serif">Votre saisine a été enregistrée avec succès !</strong>
      <p style="font-size:14px;color:#047857;margin:8px auto 16px;max-width:620px">
        Un accusé de réception officiel contenant votre récapitulatif complet et votre code confidentiel vous a été envoyé par e-mail.
      </p>

      <div style="background:#fff;border:2px dashed #059669;border-radius:10px;padding:16px 24px;display:inline-block;margin:6px 0 16px">
        <div style="font-size:11px;font-weight:700;color:#64748B;letter-spacing:0.08em;text-transform:uppercase;margin-bottom:4px">Votre Code Confidentiel de Suivi</div>
        <div class="dossier-reference" id="dossier-ref-code" style="font-size:24px;color:#0A2518;font-weight:800;letter-spacing:0.06em;font-family:monospace">
          {{ session('dossier_reference', $reference ?? '') }}
        </div>
      </div>

      <div style="display:flex;justify-content:center;gap:10px;flex-wrap:wrap">
        <button type="button" onclick="navigator.clipboard.writeText('{{ session('dossier_reference', $reference ?? '') }}'); this.textContent = 'Code copié !'; setTimeout(() => this.textContent = 'Copier mon code', 2500);" class="abtn abtn-ghost abtn-sm" style="background:#fff;border:1px solid #CBD5E1;color:#0F172A;font-weight:600;padding:8px 16px;border-radius:8px;cursor:pointer">
          Copier mon code
        </button>
      </div>

      <p style="font-size:12px;color:#64748B;margin:16px 0 0">
        Conservez précieusement ce code : il vous sera systématiquement demandé pour consulter l'instruction de votre réclamation.
      </p>
    </div>
  @endif

  <div class="track-layout" style="max-width:1100px;margin:0 auto">
    {{-- CARTE PRINCIPALE : RECHERCHE ET RÉSULTAT --}}
    <div class="track-card" style="box-shadow:0 4px 15px rgba(0,0,0,0.04)">
      <div class="stag">Consultation en ligne</div>
      <h2>Où en est mon dossier ?</h2>
      <p>
        Renseignez le code confidentiel remis lors du dépôt de votre saisine (format <strong>MF-YYYY-XXXXXX</strong>).
      </p>

      <form method="POST" action="{{ route('mediation.suivi.track') }}" class="track-search-form">
        @csrf
        <label for="reference-input">Code confidentiel / Référence de saisine</label>
        <div>
          <input id="reference-input" name="reference" value="{{ old('reference', $reference ?? '') }}" placeholder="Ex : MF-2026-A1B2C3" autocomplete="off" required style="font-weight:700;letter-spacing:0.05em">
          <button type="submit">Rechercher</button>
        </div>
        @error('reference')
          <div class="form-error" style="color:#DC2626;margin-top:8px">{{ $message }}</div>
        @enderror
      </form>

      @if(isset($reference) && $reference !== '')
        @if ($dossier)
          @php
            $meta = $dossier->getStatutMeta();
            $steps = [
              1 => 'Dépôt & Enregistrement',
              2 => 'Examen de recevabilité',
              3 => 'Instruction contradictoire',
              4 => 'Proposition d’accord',
              5 => 'Clôture / Issue du litige',
            ];
            $currentStep = $meta['step'];
            $isRejete = $dossier->statut === 'rejete';
            $isNonResolu = $dossier->statut === 'non_resolu';
          @endphp

          <div class="track-result" style="margin-top:28px">
            <div class="track-result-top">
              <div>
                <span style="font-size:18px;font-weight:800;color:var(--vert-f);font-family:monospace">{{ $dossier->reference }}</span>
                <span style="display:block;font-size:12px;color:var(--txt3);margin-top:2px">Saisine enregistrée le {{ $dossier->created_at->format('d/m/Y à H:i') }}</span>
              </div>
              <strong style="background:{{ $meta['badge'] }}20;color:{{ $meta['badge'] }};font-weight:700;font-size:12.5px;padding:6px 14px;border:1px solid {{ $meta['badge'] }}40;border-radius:20px">
                {{ $meta['label'] }}
              </strong>
            </div>

            <dl style="margin:20px 0 24px">
              <div>
                <dt>Demandeur</dt>
                <dd style="font-weight:600">{{ $dossier->prenom }} {{ Str::limit($dossier->nom, 1, '***') }}</dd>
              </div>
              <div>
                <dt>Établissement financier</dt>
                <dd style="font-weight:600">{{ $dossier->etablissement }}</dd>
              </div>
              <div>
                <dt>Nature du litige</dt>
                <dd>{{ $dossier->nature_litige }}</dd>
              </div>
              <div>
                <dt>Dernière mise à jour</dt>
                <dd>{{ $dossier->date_traitement ? $dossier->date_traitement->format('d/m/Y à H:i') : $dossier->updated_at->format('d/m/Y à H:i') }}</dd>
              </div>
            </dl>

            {{-- TIMELINE D'AVANCEMENT DU DOSSIER --}}
            @if(!$isRejete)
              <div style="margin:24px 0 16px">
                <div style="font-size:11.5px;font-weight:700;color:var(--txt3);text-transform:uppercase;letter-spacing:0.06em;margin-bottom:12px">
                  Progression de la procédure
                </div>
                <ol class="track-steps">
                  @foreach ($steps as $num => $title)
                    @php
                      $isDone = $currentStep >= $num;
                      $isCurrent = $currentStep === $num;
                    @endphp
                    <li class="{{ $isDone ? 'done' : '' }} {{ $isCurrent ? 'current' : '' }}">
                      <i>{{ $isDone && !$isCurrent ? '✓' : $num }}</i>
                      <span>{{ $title }}</span>
                    </li>
                  @endforeach
                </ol>
              </div>
            @endif

            {{-- NOTIFICATION D'IRRECEVABILITÉ OU D'ÉCHEC --}}
            @if($isRejete)
              <div class="track-alert" style="background:#FEF2F2;border:1px solid #FCA5A5;color:#991B1B;padding:16px;border-radius:10px;margin-top:20px">
                <strong style="display:block;font-size:14px;margin-bottom:4px">Dossier non recevable</strong>
                {{ $dossier->observation_mediateur ?: $meta['description'] }}
              </div>
            @elseif($isNonResolu)
              <div class="track-alert" style="background:#F8FAFC;border:1px solid #CBD5E1;color:#475569;padding:16px;border-radius:10px;margin-top:20px">
                <strong style="display:block;font-size:14px;margin-bottom:4px">Clôture de la médiation</strong>
                {{ $dossier->observation_mediateur ?: $meta['description'] }}
              </div>
            @endif

            {{-- OBSERVATIONS ET MESSAGES DU MÉDIATEUR --}}
            @if($dossier->observation_mediateur && !$isRejete && !$isNonResolu)
              <div class="track-comment" style="background:#EFF6FF;border:1px solid #BFDBFE;color:#1E40AF;padding:16px 18px;border-radius:10px;margin-top:20px">
                <strong style="color:#1D4ED8;display:flex;align-items:center;gap:6px">
                  <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4M12 8h.01"/></svg>
                  Note du Médiateur pour le demandeur :
                </strong>
                <p style="color:#1E3A8A;font-size:13.5px;margin-top:6px;line-height:1.6">{{ $dossier->observation_mediateur }}</p>
              </div>
            @elseif(!$isRejete && !$isNonResolu)
              <div class="track-comment" style="margin-top:20px">
                <strong>Situation actuelle :</strong>
                <p>{{ $meta['description'] }}</p>
              </div>
            @endif
          </div>
        @else
          <div class="track-not-found" style="margin-top:24px;background:#FFF7ED;border:1px solid #FFEDD5;color:#9A3412;padding:18px;border-radius:10px">
            <strong>Aucun dossier trouvé pour le code « {{ $reference }} »</strong>
            <p style="margin:6px 0 0;font-size:13px">
              Vérifiez attentivement la saisie du code figurant sur votre accusé de réception ou e-mail de confirmation. Si l'erreur persiste, contactez le Secrétariat du Médiateur.
            </p>
          </div>
        @endif
      @endif
    </div>

    {{-- COLONNE LATÉRALE D'AIDE --}}
    <aside class="track-help">
      <div style="display:flex;align-items:center;gap:8px;margin-bottom:12px">
        <span style="font-size:20px">⚖️</span>
        <strong style="font-size:17px">Garanties du Dispositif</strong>
      </div>
      <p>
        La médiation financière du CNEF est <strong>totalement gratuite</strong> pour le consommateur et conduite sous le sceau de la <strong>confidentialité</strong>.
      </p>

      <div style="border-top:1px solid rgba(255,255,255,0.12);padding-top:14px;margin-top:14px">
        <strong style="font-size:13px;display:block;margin-bottom:6px;color:#E8A317">Délais d’instruction :</strong>
        <p style="font-size:12px;margin:0 0 14px;color:rgba(255,255,255,0.8)">
          • Examen de recevabilité : <strong>5 jours ouvrés</strong><br>
          • Durée maximale de médiation : <strong>90 jours</strong>
        </p>
      </div>

      <div style="border-top:1px solid rgba(255,255,255,0.12);padding-top:14px;margin-top:14px">
        <strong style="font-size:13px;display:block;margin-bottom:6px;color:#E8A317">Besoin d’assistance ?</strong>
        <p style="font-size:12px;margin:0 0 6px;color:rgba(255,255,255,0.8)">
          Secrétariat Général du CNEF :<br>
          Tél : <strong>+241 01 79 34 00</strong><br>
          Email : <strong>mediation@cnef.ga</strong>
        </p>
      </div>

      <small style="display:block;margin-top:16px;border-top:1px solid rgba(255,255,255,0.12);padding-top:12px;color:rgba(255,255,255,0.5)">
        Dispositif institué en application de l’Arrêté N° 002.25/MEP/SG/CNEF.
      </small>
    </aside>
  </div>
</section>
@endsection
