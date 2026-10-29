@extends('layouts.app')

@section('title', 'Candidature Médiateur — Médiation Financière')
@php($breadcrumb = 'Candidature Médiateur')

@section('content')
<section class="sec" style="background:var(--vert-f);padding-top:48px;padding-bottom:50px">
  <div class="stag light">Appel Public à Candidatures — République Gabonaise</div>
  <h1 class="sh light">Devenir Médiateur Financier</h1>
  <p class="si light">Rejoignez le dispositif national de médiation financière institué par le Décret N° 0121/PR/MEP et l'Arrêté N° 002.25 MEP pour exercer les fonctions de médiateur titulaire ou suppléant.</p>

  <div style="display:flex;gap:12px;flex-wrap:wrap;margin-top:24px">
    <a href="#formulaire-candidature" class="btn-or">
      <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M22 2L11 13M22 2l-7 20-4-9-9-4 20-7z"/></svg>
      Déposer ma candidature
    </a>
    <a href="{{ route('mediation.textes') }}" class="btn-ghost" style="color:#fff;border-color:rgba(255,255,255,.25)">
      Consulter l'Arrêté N° 002.25 MEP
    </a>
    <a href="{{ route('mediation.presentation') }}" class="btn-ghost" style="color:#fff;border-color:rgba(255,255,255,.25)">
      ← Présentation
    </a>
  </div>
</section>

{{-- ========================================================================= --}}
{{-- ── SECTION 1 : CADRE ET CONDITIONS D'ÉLIGIBILITÉ ──                       --}}
{{-- ========================================================================= --}}
<section class="sec" style="padding-top:56px;padding-bottom:56px;background:#fff">
  <div class="stag">Exigences Réglementaires</div>
  <h2 class="sh">Conditions d'éligibilité par branche de compétence</h2>
  <p class="si">Conformément aux articles 3 et suivants de l'Arrêté N° 002.25 MEP, les candidats doivent justifier d'un haut niveau d'expertise et d'une probité exemplaire.</p>

  <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(min(100%, 280px),1fr));gap:24px;margin-top:32px">
    <div style="background:var(--gris);border:1px solid var(--brd);border-radius:var(--rl);padding:26px">
      <span style="font-size:11px;font-weight:700;color:var(--vert);background:var(--vert-c);padding:4px 10px;border-radius:6px;text-transform:uppercase;letter-spacing:.08em">Branche 1</span>
      <h3 style="font-family:'Space Grotesk',sans-serif;font-size:17px;font-weight:600;color:var(--txt);margin:14px 0 10px">Crédit, Microfinance &amp; Paiement</h3>
      <div style="font-size:13px;color:var(--txt2);line-height:1.75">
        <strong>Diplômes requis :</strong> Titulaire d'un diplôme de niveau <em>Master II / BAC+5</em> avec au minimum <strong>5 années</strong> d'expérience en encadrement supérieur, <em>ou</em> d'une Licence (BAC+3) avec au moins <strong>10 années</strong> d'expérience dans les secteurs bancaire, financier ou microfinance.
      </div>
      <div style="margin-top:14px;font-size:12px;color:var(--txt3)">Supervision : COBAC</div>
    </div>

    <div style="background:var(--gris);border:1px solid var(--brd);border-radius:var(--rl);padding:26px">
      <span style="font-size:11px;font-weight:700;color:var(--vert);background:var(--vert-c);padding:4px 10px;border-radius:6px;text-transform:uppercase;letter-spacing:.08em">Branche 2</span>
      <h3 style="font-family:'Space Grotesk',sans-serif;font-size:17px;font-weight:600;color:var(--txt);margin:14px 0 10px">Compagnies d'assurance</h3>
      <div style="font-size:13px;color:var(--txt2);line-height:1.75">
        <strong>Diplômes requis :</strong> Mêmes niveaux académiques (Master + 5 ans ou Licence + 10 ans) avec une expertise reconnue dans le droit des assurances, le courtage ou la gestion des compagnies régies par le Code CIMA.
      </div>
      <div style="margin-top:14px;font-size:12px;color:var(--txt3)">Supervision : CIMA</div>
    </div>

    <div style="background:var(--gris);border:1px solid var(--brd);border-radius:var(--rl);padding:26px">
      <span style="font-size:11px;font-weight:700;color:var(--vert);background:var(--vert-c);padding:4px 10px;border-radius:6px;text-transform:uppercase;letter-spacing:.08em">Branche 3</span>
      <h3 style="font-family:'Space Grotesk',sans-serif;font-size:17px;font-weight:600;color:var(--txt);margin:14px 0 10px">Intermédiaires de marché</h3>
      <div style="font-size:13px;color:var(--txt2);line-height:1.75">
        <strong>Diplômes requis :</strong> Mêmes niveaux académiques (Master + 5 ans ou Licence + 10 ans) avec une solide pratique des marchés de capitaux, de la gestion de portefeuille ou de la régulation boursière CEMAC (COSUMAF).
      </div>
      <div style="margin-top:14px;font-size:12px;color:var(--txt3)">Supervision : COSUMAF</div>
    </div>
  </div>
</section>

{{-- ========================================================================= --}}
{{-- ── SECTION 2 : PIÈCES REQUISES ET INCOMPATIBILITÉS ──                     --}}
{{-- ========================================================================= --}}
<section class="sec" style="background:var(--gris);padding-top:56px;padding-bottom:56px">
  <div style="display:grid;grid-template-columns:1fr 1fr;gap:32px" class="contact-grid">
    <div style="background:#fff;border:1px solid var(--brd);border-radius:var(--rl);padding:28px">
      <div style="font-size:12px;font-weight:700;color:var(--vert);text-transform:uppercase;letter-spacing:.08em;margin-bottom:10px">Dossier de candidature (Art. 4)</div>
      <h3 style="font-size:16px;font-weight:600;color:var(--txt);margin-bottom:14px">Pièces constitutives à fournir</h3>
      <p style="font-size:13px;color:var(--txt2);line-height:1.75;margin-bottom:14px">
        Le dossier physique ou numérique complet doit comporter les documents justificatifs suivants :
      </p>
      <ul style="padding-left:18px;font-size:13px;color:var(--txt2);line-height:1.75;display:flex;flex-direction:column;gap:6px">
        <li>Lettre de motivation adressée à l'Autorité Monétaire</li>
        <li>Curriculum vitae détaillé et actualisé</li>
        <li>Copies certifiées conformes des diplômes universitaires</li>
        <li>Attestations d'emploi certifiant de l'expérience requise</li>
        <li>Copie certifiée de la pièce nationale d'identité</li>
        <li>Extrait de casier judiciaire (bulletin n° 3) de moins de 3 mois</li>
        <li>Déclaration sur l'honneur de non-condamnation et de probité</li>
        <li>Certificat d'imposition et attestation de non-faillite</li>
      </ul>
    </div>

    <div style="background:#fff;border:1px solid var(--brd);border-radius:var(--rl);padding:28px">
      <div style="font-size:12px;font-weight:700;color:#b91c1c;text-transform:uppercase;letter-spacing:.08em;margin-bottom:10px">Incompatibilités (Art. 17 Décret)</div>
      <h3 style="font-size:16px;font-weight:600;color:var(--txt);margin-bottom:14px">Règles d'indépendance stricte</h3>
      <p style="font-size:13px;color:var(--txt2);line-height:1.75;margin-bottom:14px">
        Afin de garantir l'impartialité absolue du dispositif, les fonctions de médiateur financier sont rigoureusement incompatibles avec :
      </p>
      <ul style="padding-left:18px;font-size:13px;color:var(--txt2);line-height:1.75;display:flex;flex-direction:column;gap:6px">
        <li>Tout poste d'administration, de direction ou d'emploi salarié en cours dans un établissement assujetti</li>
        <li>Toute condamnation pénale pour crime ou délit financier</li>
        <li>Toute fonction de commissaire aux comptes auprès d'une entité assujettie</li>
        <li>Tout mandat électif ou de conseil pouvant créer un conflit d'intérêts direct</li>
      </ul>
      <div style="margin-top:20px;padding:14px;background:#fef2f2;border:1px solid #fecaca;border-radius:8px;font-size:12.5px;color:#991b1b;line-height:1.6">
        <strong>Durée du mandat :</strong> Le mandat est fixé à <strong>trois (3) ans</strong>, renouvelable une seule fois.
      </div>
    </div>
  </div>
</section>

{{-- ========================================================================= --}}
{{-- ── SECTION 3 : FORMULAIRE DE CANDIDATURE EN LIGNE ──                      --}}
{{-- ========================================================================= --}}
<section id="formulaire-candidature" class="sec" style="padding-top:56px;padding-bottom:56px;background:#fff">
  <div style="max-width:800px;margin:0 auto">
    <div class="stag" style="text-align:center">Dépôt Numérique</div>
    <h2 class="sh" style="text-align:center">Formulaire de transmission de candidature</h2>
    <p class="si" style="text-align:center">Transmettez votre candidature et vos pièces constitutives au Secrétariat Général du CNEF.</p>

    <form method="POST" action="{{ route('mediation.candidature.store') }}" enctype="multipart/form-data" style="background:var(--gris);border-radius:var(--rl);padding:32px;margin-top:32px">
      @csrf
      <div class="frow">
        <div class="fg">
          <label class="fl">Prénom *</label>
          <input type="text" class="fi" name="prenom" value="{{ old('prenom') }}" placeholder="Jean-Baptiste" required>
          @error('prenom') <div class="form-error">{{ $message }}</div> @enderror
        </div>
        <div class="fg">
          <label class="fl">Nom *</label>
          <input type="text" class="fi" name="nom" value="{{ old('nom') }}" placeholder="Ndong" required>
          @error('nom') <div class="form-error">{{ $message }}</div> @enderror
        </div>
      </div>

      <div class="frow">
        <div class="fg">
          <label class="fl">Email *</label>
          <input type="email" class="fi" name="email" value="{{ old('email') }}" placeholder="candidat@email.com" required>
          @error('email') <div class="form-error">{{ $message }}</div> @enderror
        </div>
        <div class="fg">
          <label class="fl">Téléphone</label>
          <input type="tel" class="fi" name="telephone" value="{{ old('telephone') }}" placeholder="+241 06 00 00 00">
        </div>
      </div>

      <div class="fg">
        <label class="fl">Branche de spécialité choisie *</label>
        <select class="fsel" name="branche" required>
          <option value="">— Sélectionnez la branche —</option>
          @foreach ($branches as $b)
            @php($val = "Branche {$b['num']} — {$b['titre']}")
            <option value="{{ $val }}" @selected(old('branche') === $val)>{{ $val }} ({{ $b['supervision'] }})</option>
          @endforeach
        </select>
        @error('branche') <div class="form-error">{{ $message }}</div> @enderror
      </div>

      <div class="fg">
        <label class="fl">Lettre de motivation succincte / Présentation de votre parcours</label>
        <textarea class="fta" name="lettre_motivation" rows="4" placeholder="Exposez brièvement vos motivations, votre expertise professionnelle et votre vision de la médiation financière...">{{ old('lettre_motivation') }}</textarea>
        @error('lettre_motivation') <div class="form-error">{{ $message }}</div> @enderror
      </div>

      <div class="fg">
        <label class="fl">Pièces constitutives (CV, Diplômes, Attestations, Pièce d'identité...)</label>
        <div class="upload-zone" onclick="document.getElementById('candidature-file-input').click()"
             ondragover="dragOver(event,'candidature-upload-zone')" ondragleave="dragLeave(event,'candidature-upload-zone')"
             ondrop="dropFiles(event,'candidature-upload-zone','candidature-file-input')" id="candidature-upload-zone">
          <div class="upload-icon"><svg viewBox="0 0 24 24"><path d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg></div>
          <div class="upload-txt">Cliquez ou <strong>glissez-déposez</strong> vos fichiers</div>
          <div class="upload-sub">PDF, Word, JPG, PNG — 15 Mo maximum par fichier — jusqu'à 13 fichiers</div>
        </div>
        <input type="file" id="candidature-file-input" name="pieces[]" style="display:none" multiple accept=".pdf,.doc,.docx,.jpg,.jpeg,.png" onchange="renderFileList('candidature-file-input','candidature-file-input-list')">
        <div class="file-list" id="candidature-file-input-list"></div>
        @error('pieces.*') <div class="form-error">{{ $message }}</div> @enderror
      </div>

      <button type="submit" class="btn-or" style="width:100%;justify-content:center;margin-top:8px">
        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M22 2L11 13M22 2l-7 20-4-9-9-4 20-7z"/></svg>
        Transmettre mon dossier de candidature
      </button>
    </form>
  </div>
</section>
@endsection
