@extends('layouts.app')

@section('title', 'Recours à la Médiation Financière — Saisine, Formulaire & Suivi — CNEF Gabon')
@php($breadcrumb = 'Recours à la médiation')

@section('content')
{{-- HERO RECOURS --}}
<section class="sec" style="background:var(--vert-f);padding-top:48px;padding-bottom:52px">
  <div class="stag light">Rubrique Officielle B.3 · Procédure de Saisine</div>
  <h1 class="sh light" style="font-size:clamp(26px,5vw,38px);margin-bottom:12px">
    Recours à la Médiation Financière
  </h1>
  <p class="si light" style="max-width:820px;margin-bottom:24px">
    Informez-vous sur les conditions de recevabilité, choisissez votre voie de saisine, transmettez votre dossier via notre formulaire sécurisé et suivez en continu l'avancement de votre réclamation.
  </p>

  {{-- Sous-navigation interne rapide --}}
  <div class="med-subnav" style="border-bottom-color:rgba(255,255,255,.15);margin-bottom:0">
    <a href="#saisine-info" class="med-subnav-btn" style="background:rgba(255,255,255,.1);border-color:rgba(255,255,255,.2);color:#fff">
      1. Saisine du Médiateur
    </a>
    <a href="#voies-saisine" class="med-subnav-btn" style="background:rgba(255,255,255,.1);border-color:rgba(255,255,255,.2);color:#fff">
      2. Voies de Saisine
    </a>
    <a href="#formulaire" class="med-subnav-btn" style="background:var(--or);border-color:var(--or);color:#0A2518;font-weight:700">
      3. Demande de Médiation (En ligne)
    </a>
    <a href="#suivi" class="med-subnav-btn" style="background:rgba(255,255,255,.1);border-color:rgba(255,255,255,.2);color:#fff">
      4. Suivi des Demandes
    </a>
    <a href="#faq" class="med-subnav-btn" style="background:rgba(255,255,255,.1);border-color:rgba(255,255,255,.2);color:#fff">
      5. FAQ
    </a>
  </div>
</section>

{{-- ========================================================================= --}}
{{-- ── 1. SAISINE DU MÉDIATEUR (QUI ? QUAND ? QUELS LITIGES ? COMMENT ?) ──  --}}
{{-- ========================================================================= --}}
<section id="saisine-info" class="sec" style="background:#fff;padding-top:56px;padding-bottom:56px">
  <div class="stag">1. Modalités Préalables</div>
  <h2 class="sh">Saisine du Médiateur : Qui ? Quand ? Quels litiges ? Comment ?</h2>
  <p class="si">
    Pour être recevable, votre demande de médiation financière doit satisfaire aux conditions légales fixées par le Décret N° 0121/PR/MEP et l'Arrêté N° 001.25 MEP.
  </p>

  <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(260px,1fr));gap:22px;margin-top:32px">
    {{-- QUI ? --}}
    <div style="background:var(--gris);border:1px solid var(--brd);border-radius:var(--rl);padding:24px">
      <div style="width:38px;height:38px;border-radius:8px;background:var(--vert-c);display:grid;place-items:center;color:var(--vert);font-weight:700;font-size:16px;margin-bottom:14px">
        👤
      </div>
      <h3 style="font-family:'Space Grotesk',sans-serif;font-size:17px;font-weight:600;color:var(--txt);margin-bottom:10px">
        Qui peut saisir ?
      </h3>
      <p style="font-size:13px;color:var(--txt2);line-height:1.7;margin:0">
        Toute <strong>personne physique</strong> consommatrice (épargnant, emprunteur, titulaire d'un compte bancaire, de microfinance ou de paiement mobile, souscripteur ou assuré) agissant pour des besoins strictement personnels et non professionnels.
      </p>
    </div>

    {{-- QUAND ? --}}
    <div style="background:var(--gris);border:1px solid var(--brd);border-radius:var(--rl);padding:24px">
      <div style="width:38px;height:38px;border-radius:8px;background:var(--or-p);display:grid;place-items:center;color:var(--or-d);font-weight:700;font-size:16px;margin-bottom:14px">
        ⏱️
      </div>
      <h3 style="font-family:'Space Grotesk',sans-serif;font-size:17px;font-weight:600;color:var(--txt);margin-bottom:10px">
        Quand saisir ?
      </h3>
      <p style="font-size:13px;color:var(--txt2);line-height:1.7;margin:0">
        Obligatoirement <strong>après une réclamation écrite restée sans réponse pendant 45 jours</strong> auprès de votre établissement, ou après réception d'un refus écrit insatisfaisant. La saisine doit intervenir au plus tard dans un délai de <strong>1 an</strong>.
      </p>
    </div>

    {{-- QUELS LITIGES ? --}}
    <div style="background:var(--gris);border:1px solid var(--brd);border-radius:var(--rl);padding:24px">
      <div style="width:38px;height:38px;border-radius:8px;background:var(--bleu-c);display:grid;place-items:center;color:var(--bleu);font-weight:700;font-size:16px;margin-bottom:14px">
        ⚖️
      </div>
      <h3 style="font-family:'Space Grotesk',sans-serif;font-size:17px;font-weight:600;color:var(--txt);margin-bottom:10px">
        Quels litiges ?
      </h3>
      <p style="font-size:13px;color:var(--txt2);line-height:1.7;margin:0">
        Frais et agios contestés, cartes bancaires, opérations Airtel Money/Moov Money débitées à tort, difficultés de remboursement de crédit, blocage ou clôture de compte, non-règlement d'un sinistre d'assurance ou litige boursier.
      </p>
    </div>

    {{-- COMMENT ? --}}
    <div style="background:var(--gris);border:1px solid var(--brd);border-radius:var(--rl);padding:24px">
      <div style="width:38px;height:38px;border-radius:8px;background:var(--vert-c);display:grid;place-items:center;color:var(--vert);font-weight:700;font-size:16px;margin-bottom:14px">
        📄
      </div>
      <h3 style="font-family:'Space Grotesk',sans-serif;font-size:17px;font-weight:600;color:var(--txt);margin-bottom:10px">
        Comment constituer le dossier ?
      </h3>
      <p style="font-size:13px;color:var(--txt2);line-height:1.7;margin:0">
        En rédigeant un résumé chronologique des faits et en joignant <strong>impérativement la copie de la réclamation écrite préalable</strong> avec accusé de réception ou cachet, ainsi que tous les justificatifs (relevés, contrats, courriels).
      </p>
    </div>
  </div>
</section>

{{-- ========================================================================= --}}
{{-- ── 2. VOIES DE SAISINE ──                                                 --}}
{{-- ========================================================================= --}}
<section id="voies-saisine" class="sec" style="background:var(--gris);padding-top:56px;padding-bottom:56px">
  <div class="stag">2. Modalités Pratiques</div>
  <h2 class="sh">Les 3 Voies Officielles de Saisine</h2>
  <p class="si">Vous disposez de trois canaux homologués pour transmettre votre dossier de réclamation au Médiateur Financier :</p>

  <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:24px;margin-top:32px">
    {{-- Voie 1 : En ligne --}}
    <div style="background:#fff;border:2px solid var(--vert);border-radius:var(--rl);padding:28px;display:flex;flex-direction:column;justify-content:space-between">
      <div>
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:12px">
          <span style="font-size:11px;font-weight:700;color:var(--vert);background:var(--vert-c);padding:3px 9px;border-radius:6px;text-transform:uppercase">
            Voie 1 · Recommandée
          </span>
          <span style="font-size:11px;color:var(--txt3);font-weight:600">24h/24 · 7j/7</span>
        </div>
        <h3 style="font-family:'Space Grotesk',sans-serif;font-size:18px;font-weight:600;color:var(--txt);margin-bottom:10px">
          Saisine Numérique en Ligne
        </h3>
        <p style="font-size:13px;color:var(--txt2);line-height:1.65;margin-bottom:14px">
          Remplissez directement le formulaire officiel ci-dessous. Téléversez vos justificatifs au format PDF ou image. Votre dossier est instantanément enregistré.
        </p>
        <div style="background:var(--vert-c);border-radius:8px;padding:12px;font-size:12px;color:var(--vert-f);line-height:1.5">
          ✓ Délivrance immédiate de votre <strong>code confidentiel MF-</strong><br>
          ✓ Accusé de réception officiel instantané par courriel
        </div>
      </div>
      <div style="margin-top:20px">
        <a href="#formulaire" class="btn-or" style="width:100%;justify-content:center">
          Accéder au formulaire en ligne ↓
        </a>
      </div>
    </div>

    {{-- Voie 2 : Courrier postal --}}
    <div style="background:#fff;border:1px solid var(--brd);border-radius:var(--rl);padding:28px;display:flex;flex-direction:column;justify-content:space-between">
      <div>
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:12px">
          <span style="font-size:11px;font-weight:700;color:var(--txt2);background:var(--gris);padding:3px 9px;border-radius:6px;text-transform:uppercase">
            Voie 2 · Voie Postale
          </span>
          <span style="font-size:11px;color:var(--txt3);font-weight:600">Pli recommandé</span>
        </div>
        <h3 style="font-family:'Space Grotesk',sans-serif;font-size:18px;font-weight:600;color:var(--txt);margin-bottom:10px">
          Courrier sous pli recommandé
        </h3>
        <p style="font-size:13px;color:var(--txt2);line-height:1.65;margin-bottom:14px">
          Adressez votre lettre circonstanciée accompagnée de toutes les pièces justificatives en recommandé avec accusé de réception à l'adresse officielle :
        </p>
        <div style="background:var(--gris);border-radius:8px;padding:12px;font-size:12px;color:var(--txt);line-height:1.5;font-family:monospace">
          Monsieur le Médiateur Financier<br>
          Secrétariat Général du CNEF<br>
          Direction Nationale de la BEAC<br>
          BP 112 Libreville, République Gabonaise
        </div>
      </div>
      <div style="margin-top:20px;font-size:12px;color:var(--txt3)">
        Délai d'enregistrement : 5 jours à réception du courrier.
      </div>
    </div>

    {{-- Voie 3 : Dépôt physique --}}
    <div style="background:#fff;border:1px solid var(--brd);border-radius:var(--rl);padding:28px;display:flex;flex-direction:column;justify-content:space-between">
      <div>
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:12px">
          <span style="font-size:11px;font-weight:700;color:var(--txt2);background:var(--gris);padding:3px 9px;border-radius:6px;text-transform:uppercase">
            Voie 3 · Accueil Physique
          </span>
          <span style="font-size:11px;color:var(--txt3);font-weight:600">En mains propres</span>
        </div>
        <h3 style="font-family:'Space Grotesk',sans-serif;font-size:18px;font-weight:600;color:var(--txt);margin-bottom:10px">
          Dépôt direct au Secrétariat CNEF
        </h3>
        <p style="font-size:13px;color:var(--txt2);line-height:1.65;margin-bottom:14px">
          Déposez physiquement votre dossier complet contre récépissé daté et numéroté aux guichets d'accueil du Secrétariat Général du CNEF :
        </p>
        <div style="background:var(--gris);border-radius:8px;padding:12px;font-size:12px;color:var(--txt);line-height:1.5">
          📍 Siège de la BEAC Libreville, Boulevard Triomphal Omar Bongo<br>
          🕒 Du lundi au vendredi : <strong>8h00 – 15h30</strong>
        </div>
      </div>
      <div style="margin-top:20px;font-size:12px;color:var(--vert);font-weight:600">
        Récépissé de dépôt immédiat remis sur place.
      </div>
    </div>
  </div>
</section>

{{-- ========================================================================= --}}
{{-- ── 3. DEMANDE DE MÉDIATION (FORMULAIRE EN LIGNE) ──                       --}}
{{-- ========================================================================= --}}
<section id="formulaire" class="sec" style="background:#fff;padding-top:56px;padding-bottom:56px">
  <div class="med-layout">
    <div class="med-form-wrap">
      <div class="stag light" style="background:rgba(232,163,23,.2);color:var(--or)">3. Formulaire Officiel de Saisine</div>
      <h2 class="mf-title">Demande de Médiation en Ligne</h2>
      <p class="mf-sub">Procédure 100% gratuite · Réponse sous 5 jours ouvrés · Code confidentiel MF- délivré instantanément</p>

      <form method="POST" action="{{ route('mediation.saisine.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="frow">
          <div class="fg">
            <label class="fl">Prénom *</label>
            <input type="text" class="fi" name="prenom" value="{{ old('prenom') }}" placeholder="Ex : Marie" required>
            @error('prenom') <div class="form-error" style="color:#f87171;font-size:12px;margin-top:4px">{{ $message }}</div> @enderror
          </div>
          <div class="fg">
            <label class="fl">Nom *</label>
            <input type="text" class="fi" name="nom" value="{{ old('nom') }}" placeholder="Ex : Obiang" required>
            @error('nom') <div class="form-error" style="color:#f87171;font-size:12px;margin-top:4px">{{ $message }}</div> @enderror
          </div>
        </div>

        <div class="frow">
          <div class="fg">
            <label class="fl">Email de notification *</label>
            <input type="email" class="fi" name="email" value="{{ old('email') }}" placeholder="votre.email@exemple.ga" required>
            @error('email') <div class="form-error" style="color:#f87171;font-size:12px;margin-top:4px">{{ $message }}</div> @enderror
          </div>
          <div class="fg">
            <label class="fl">Téléphone / WhatsApp</label>
            <input type="tel" class="fi" name="telephone" value="{{ old('telephone') }}" placeholder="+241 07 00 00 00">
          </div>
        </div>

        {{-- Établissement avec les 5 groupes d'adhérents --}}
        <div class="fg">
          <label class="fl">Établissement financier concerné *</label>
          <select class="fsel" name="etablissement" id="etablissement" required>
            <option value="">— Sélectionnez l'établissement financier assujetti —</option>
            @foreach ($etablissements as $groupe => $items)
              <optgroup label="── {{ $groupe }} ──">
                @foreach ($items as $item)
                  <option value="{{ $item }}" @selected(old('etablissement', $selectedEtablissement) === $item)>{{ $item }} ({{ $groupe }})</option>
                @endforeach
              </optgroup>
            @endforeach
          </select>
          @error('etablissement') <div class="form-error" style="color:#f87171;font-size:12px;margin-top:4px">{{ $message }}</div> @enderror
        </div>

        {{-- Nature principale du litige --}}
        <div class="fg">
          <label class="fl">Nature principale du litige *</label>
          <select class="fsel" name="nature_litige" required>
            <option value="">— Sélectionnez le type de différend —</option>
            @foreach ($naturesLitige as $nature)
              <option @selected(old('nature_litige') === $nature)>{{ $nature }}</option>
            @endforeach
          </select>
          @error('nature_litige') <div class="form-error" style="color:#f87171;font-size:12px;margin-top:4px">{{ $message }}</div> @enderror
        </div>

        {{-- Description du litige --}}
        <div class="fg">
          <label class="fl">Description chronologique des faits &amp; Réclamation préalable *</label>
          <textarea class="fta" name="description" rows="5" placeholder="Décrivez les faits, le montant litigieux, la date de votre réclamation écrite adressée à l'établissement et la réponse obtenue ou l'absence de réponse au-delà de 45 jours..." required>{{ old('description') }}</textarea>
          @error('description') <div class="form-error" style="color:#f87171;font-size:12px;margin-top:4px">{{ $message }}</div> @enderror
        </div>

        {{-- Pièces justificatives --}}
        <div class="fg">
          <label class="fl">Pièces justificatives (Relevés, courrier de réclamation préalable, contrats, etc.)</label>
          <div class="upload-zone" onclick="document.getElementById('saisine-file-input').click()"
               ondragover="dragOver(event,'saisine-upload-zone')" ondragleave="dragLeave(event,'saisine-upload-zone')"
               ondrop="dropFiles(event,'saisine-upload-zone','saisine-file-input')" id="saisine-upload-zone">
            <div class="upload-icon"><svg viewBox="0 0 24 24"><path d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg></div>
            <div class="upload-txt">Cliquez ou <strong>glissez-déposez</strong> vos fichiers ici</div>
            <div class="upload-sub">PDF, JPG, PNG, DOCX — max 10 Mo par document — 5 pièces maximum</div>
          </div>
          <input type="file" id="saisine-file-input" name="pieces[]" style="display:none" multiple accept=".pdf,.jpg,.jpeg,.png,.docx" onchange="renderFileList('saisine-file-input','saisine-file-input-list')">
          <div class="file-list" id="saisine-file-input-list"></div>
          @error('pieces.*') <div class="form-error" style="color:#f87171;font-size:12px;margin-top:4px">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn-or" style="width:100%;justify-content:center;margin-top:10px;padding:14px;font-size:15px">
          <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M22 2L11 13M22 2l-7 20-4-9-9-4 20-7z"/></svg>
          Transmettre ma demande et obtenir mon code MF-
        </button>
      </form>
    </div>

    {{-- Colonne informative latérale --}}
    <div>
      <div style="background:var(--gris);border-radius:var(--rl);padding:26px 28px;margin-bottom:24px">
        <h3 style="font-family:'Space Grotesk',sans-serif;font-size:17px;font-weight:600;color:var(--txt);margin-bottom:12px">
          Rappel indispensable avant envoi
        </h3>
        <ul style="padding-left:18px;font-size:13px;color:var(--txt2);line-height:1.75;display:flex;flex-direction:column;gap:8px;margin:0">
          <li><strong>Preuve de démarche préalable :</strong> N'oubliez pas de joindre la preuve de votre réclamation écrite préalable (lettre avec décharge, accusé de réception, e-mail avec accusé de lecture).</li>
          <li><strong>Conservation de votre code :</strong> Un code d'identification unique vous sera attribué dès la validation. Conservez-le soigneusement pour le suivi de votre dossier.</li>
          <li><strong>Confidentialité garantie :</strong> Vos coordonnées et données financières ne sont communiquées qu'au Médiateur et à l'établissement mis en cause dans le strict cadre de la conciliation.</li>
        </ul>
      </div>

      <div style="background:var(--vert-c);border:1px solid var(--brd);border-radius:var(--rl);padding:26px 28px;margin-bottom:24px">
        <div style="font-size:11.5px;font-weight:700;color:var(--vert);text-transform:uppercase;letter-spacing:.08em;margin-bottom:8px">
          Délais Légaux d'Instruction
        </div>
        <p style="font-size:13.5px;color:var(--txt);line-height:1.7;margin-bottom:10px">
          • Accusé de réception et recevabilité : <strong>5 jours ouvrés</strong><br>
          • Réponse de l'établissement : <strong>15 jours ouvrés</strong><br>
          • Résolution de la médiation : <strong>90 jours maximum</strong>
        </p>
      </div>

      <div style="background:#fff;border:1px solid var(--brd);border-radius:var(--rl);padding:24px 28px">
        <h4 style="font-size:15px;font-weight:600;color:var(--txt);margin-bottom:8px">Une question avant de soumettre ?</h4>
        <p style="font-size:13px;color:var(--txt2);line-height:1.65;margin-bottom:12px">
          Le Secrétariat permanent du CNEF répond à toutes vos questions préliminaires par courriel ou téléphone.
        </p>
        <a href="mailto:mediation@cnef.ga" style="color:var(--vert);font-weight:600;font-size:13px;text-decoration:none">
          ✉️ Poser une question à mediation@cnef.ga →
        </a>
      </div>
    </div>
  </div>
</section>

{{-- ========================================================================= --}}
{{-- ── 4. SUIVI DES DEMANDES DE MÉDIATION (B.3) ──                            --}}
{{-- ========================================================================= --}}
<section id="suivi" class="sec" style="background:var(--gris);padding-top:56px;padding-bottom:56px">
  <div class="stag">4. Espace Requérant</div>
  <h2 class="sh">Suivi des Demandes de Médiation</h2>
  <p class="si">Consultez en direct l'avancement de votre dossier à l'aide de votre code confidentiel unique.</p>

  <div style="max-width:850px;margin:0 auto;background:#fff;border:1px solid var(--brd);border-radius:var(--rl);padding:32px 36px;box-shadow:0 4px 20px rgba(0,0,0,.03)">
    <div style="display:flex;align-items:center;gap:12px;margin-bottom:16px">
      <div style="width:40px;height:40px;border-radius:10px;background:var(--vert-c);display:grid;place-items:center;color:var(--vert)">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg>
      </div>
      <div>
        <h3 style="font-family:'Space Grotesk',sans-serif;font-size:18px;font-weight:600;color:var(--txt);margin:0">
          Où en est mon dossier de médiation ?
        </h3>
        <p style="font-size:13px;color:var(--txt3);margin:2px 0 0">Format attendu : MF-AAAA-XXXXXX (ex : MF-2026-A1B2C3)</p>
      </div>
    </div>

    <form method="POST" action="{{ route('mediation.suivi.track') }}" class="track-search-form" style="margin-top:16px">
      @csrf
      <label for="track-code-recours">Votre code confidentiel de dossier</label>
      <div>
        <input id="track-code-recours" name="reference" value="{{ old('reference', $reference ?? '') }}" placeholder="Ex : MF-2026-ABC123" required style="font-weight:700;letter-spacing:.05em">
        <button type="submit">Consulter mon dossier</button>
      </div>
    </form>

    <div style="margin-top:20px;padding-top:18px;border-top:1px solid var(--gris-m);display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:10px">
      <span style="font-size:12.5px;color:var(--txt3)">Vous avez perdu votre code de suivi ?</span>
      <a href="{{ route('mediation.suivi') }}" style="font-size:12.5px;font-weight:600;color:var(--vert);text-decoration:none">
        Accéder à la page complète de suivi →
      </a>
    </div>
  </div>
</section>

{{-- ========================================================================= --}}
{{-- ── 5. FOIRE AUX QUESTIONS (FAQ B.3) ──                                    --}}
{{-- ========================================================================= --}}
<section id="faq" class="sec" style="background:#fff;padding-top:56px;padding-bottom:56px">
  <div class="stag">5. Réponses aux Usagers</div>
  <h2 class="sh">Foire Aux Questions (FAQ)</h2>
  <p class="si">Les réponses détaillées aux interrogations les plus courantes sur le recours à la médiation financière.</p>

  <div style="max-width:920px;margin:32px auto 0">
    @foreach ($faqs as $index => $faq)
      <div class="med-faq-item {{ $index === 0 ? 'open' : '' }}" id="faq-item-{{ $index }}">
        <button type="button" class="med-faq-q" onclick="toggleFaq({{ $index }})" aria-expanded="{{ $index === 0 ? 'true' : 'false' }}">
          <span>{{ $faq['question'] }}</span>
          <svg viewBox="0 0 24 24"><path d="M6 9l6 6 6-6"/></svg>
        </button>
        <div class="med-faq-a">
          {{ $faq['reponse'] }}
        </div>
      </div>
    @endforeach
  </div>
</section>
@endsection

@push('scripts')
<script>
  function toggleFaq(index) {
    const item = document.getElementById('faq-item-' + index);
    if (!item) return;
    const isOpen = item.classList.contains('open');
    // Fermer les autres (optionnel) ou basculer
    item.classList.toggle('open');
    const btn = item.querySelector('.med-faq-q');
    if (btn) btn.setAttribute('aria-expanded', !isOpen);
  }
</script>
@endpush
