@extends('layouts.app')

@section('title', 'Contacts Utiles — Médiateur Financier & Régulateurs — CNEF Gabon')
@php($breadcrumb = 'Contacts utiles')

@section('content')
{{-- HERO CONTACTS --}}
<section class="sec" style="background:var(--vert-f);padding-top:48px;padding-bottom:52px">
  <div class="stag light">Rubrique Officielle B.6 · Permanence &amp; Institutions</div>
  <h1 class="sh light" style="font-size:clamp(26px,5vw,38px);margin-bottom:12px">
    Contacts Utiles de la Médiation Financière
  </h1>
  <p class="si light" style="max-width:820px;margin-bottom:24px">
    Retrouvez l'ensemble des coordonnées officielles du Secrétariat du Médiateur Financier, les horaires d'ouverture des guichets, ainsi que les contacts des autorités de régulation et de tutelle.
  </p>

  <div style="display:flex;gap:12px;flex-wrap:wrap">
    <a href="#secretariat" class="btn-or">
      Secrétariat du Médiateur
    </a>
    <a href="#regulateurs" class="btn-ghost" style="color:#fff;border-color:rgba(255,255,255,.3)">
      Autorités de Régulation
    </a>
    <a href="{{ route('mediation.recours') }}#formulaire" class="btn-ghost" style="color:#fff;border-color:rgba(255,255,255,.3)">
      Déposer une saisine →
    </a>
  </div>
</section>

{{-- ========================================================================= --}}
{{-- ── 1. COORDONNÉES OFFICIELLES DU SECRÉTARIAT DU MÉDIATEUR ──              --}}
{{-- ========================================================================= --}}
<section id="secretariat" class="sec" style="background:#fff;padding-top:56px;padding-bottom:56px">
  <div class="stag">Permanence Officielle</div>
  <h2 class="sh">Secrétariat Général du CNEF — Service de la Médiation</h2>
  <p class="si">Les services permanents vous accueillent pour le dépôt de vos pièces, la délivrance de récépissés et toute information procédurale.</p>

  <div style="display:grid;grid-template-columns:1.2fr 1fr;gap:36px;margin-top:32px" class="contact-grid">
    {{-- Fiche de contact principale --}}
    <div style="background:var(--gris);border:1px solid var(--brd);border-radius:var(--rl);padding:32px">
      <div style="display:flex;align-items:center;gap:14px;margin-bottom:22px">
        <div style="width:48px;height:48px;border-radius:12px;background:var(--vert-c);display:grid;place-items:center;color:var(--vert)">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
        </div>
        <div>
          <h3 style="font-family:'Space Grotesk',sans-serif;font-size:18px;font-weight:600;color:var(--txt);margin:0">
            Médiateur Financier en République Gabonaise
          </h3>
          <span style="font-size:12.5px;color:var(--txt3)">Secrétariat Général du CNEF</span>
        </div>
      </div>

      <div style="display:flex;flex-direction:column;gap:18px">
        <div style="display:flex;gap:14px;align-items:flex-start">
          <div style="width:34px;height:34px;border-radius:8px;background:#fff;border:1px solid var(--gris-m);display:grid;place-items:center;flex-shrink:0;color:var(--vert)">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z"/><circle cx="12" cy="9" r="2.5"/></svg>
          </div>
          <div>
            <div style="font-size:11px;font-weight:700;color:var(--txt3);text-transform:uppercase">Adresse physique &amp; postale</div>
            <div style="font-size:13.5px;color:var(--txt);font-weight:500;margin-top:2px">
              Direction Nationale de la BEAC pour le Gabon<br>
              Boulevard Triomphal Omar Bongo, B.P. 112 Libreville, Gabon
            </div>
          </div>
        </div>

        <div style="display:flex;gap:14px;align-items:flex-start">
          <div style="width:34px;height:34px;border-radius:8px;background:#fff;border:1px solid var(--gris-m);display:grid;place-items:center;flex-shrink:0;color:var(--vert)">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 3.07 9.81 19.79 19.79 0 0 1 .14 1.28 2 2 0 0 1 2.11 0h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L6.09 7.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 14.92v2z"/></svg>
          </div>
          <div>
            <div style="font-size:11px;font-weight:700;color:var(--txt3);text-transform:uppercase">Téléphones d'accueil</div>
            <div style="font-size:13.5px;color:var(--txt);font-weight:500;margin-top:2px">
              Standard CNEF : <strong>+241 11 72 20 00</strong><br>
              Ligne directe Médiation : <strong>+241 01 79 34 00</strong>
            </div>
          </div>
        </div>

        <div style="display:flex;gap:14px;align-items:flex-start">
          <div style="width:34px;height:34px;border-radius:8px;background:#fff;border:1px solid var(--gris-m);display:grid;place-items:center;flex-shrink:0;color:var(--vert)">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
          </div>
          <div>
            <div style="font-size:11px;font-weight:700;color:var(--txt3);text-transform:uppercase">Courriels électroniques</div>
            <div style="font-size:13.5px;color:var(--txt);margin-top:2px">
              Dépôt &amp; Saisines : <a href="mailto:mediation@cnef.ga" style="color:var(--vert);font-weight:600">mediation@cnef.ga</a><br>
              Secrétariat Général : <a href="mailto:contact@cnef.ga" style="color:var(--vert);font-weight:600">contact@cnef.ga</a>
            </div>
          </div>
        </div>

        <div style="display:flex;gap:14px;align-items:flex-start">
          <div style="width:34px;height:34px;border-radius:8px;background:#fff;border:1px solid var(--gris-m);display:grid;place-items:center;flex-shrink:0;color:var(--vert)">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
          </div>
          <div>
            <div style="font-size:11px;font-weight:700;color:var(--txt3);text-transform:uppercase">Horaires d'ouverture au public</div>
            <div style="font-size:13.5px;color:var(--txt);font-weight:500;margin-top:2px">
              Du lundi au vendredi : <strong>8h00 – 16h00</strong><br>
              Permanence téléphonique : <strong>7h30 – 16h30</strong>
            </div>
          </div>
        </div>
      </div>
    </div>

    {{-- Formulaire de contact rapide / demande d'information --}}
    <div style="background:#fff;border:1px solid var(--brd);border-radius:var(--rl);padding:32px">
      <h3 style="font-family:'Space Grotesk',sans-serif;font-size:18px;font-weight:600;color:var(--txt);margin-bottom:6px">
        Demande d'information préalable
      </h3>
      <p style="font-size:13px;color:var(--txt2);line-height:1.6;margin-bottom:20px">
        Vous avez une question sur votre éligibilité avant d'engager une saisine formelle ? Renseignez vos coordonnées ci-dessous :
      </p>

      <form method="POST" action="{{ route('contact.store') }}">
        @csrf
        <div class="fg">
          <label class="fl" style="color:var(--txt2)">Nom et Prénom *</label>
          <input type="text" name="nom" class="fi" style="background:#fff;border-color:var(--gris-d);color:var(--txt)" placeholder="Votre nom complet" required>
        </div>
        <div class="fg">
          <label class="fl" style="color:var(--txt2)">Email *</label>
          <input type="email" name="email" class="fi" style="background:#fff;border-color:var(--gris-d);color:var(--txt)" placeholder="votre.email@exemple.ga" required>
        </div>
        <div class="fg">
          <label class="fl" style="color:var(--txt2)">Objet *</label>
          <input type="text" name="objet" class="fi" style="background:#fff;border-color:var(--gris-d);color:var(--txt)" value="Information sur la Médiation Financière" required>
        </div>
        <div class="fg">
          <label class="fl" style="color:var(--txt2)">Votre message / question *</label>
          <textarea name="message" class="fta" rows="4" style="background:#fff;border-color:var(--gris-d);color:var(--txt)" placeholder="Précisez votre question ou la nature de votre démarche..." required></textarea>
        </div>
        <button type="submit" class="btn-or" style="width:100%;justify-content:center">
          Envoyer ma demande d'information
        </button>
      </form>
    </div>
  </div>
</section>

{{-- ========================================================================= --}}
{{-- ── 2. AUTORITÉS DE RÉGULATION & TUTELLES PARTENAIRES ──                   --}}
{{-- ========================================================================= --}}
<section id="regulateurs" class="sec" style="background:var(--gris);padding-top:56px;padding-bottom:56px">
  <div class="stag">Partenaires Institutionnels</div>
  <h2 class="sh">Autorités de Tutelle et de Régulation</h2>
  <p class="si">Les organismes prudentiels et ministériels supervisant les branches d'assujettissement de la médiation financière.</p>

  <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(min(100%, 320px),1fr));gap:20px;margin-top:32px">
    {{-- BEAC --}}
    <div class="contact-reg-card">
      <div style="width:44px;height:44px;border-radius:10px;background:var(--vert-c);color:var(--vert);display:grid;place-items:center;font-weight:800;font-size:13px;flex-shrink:0">
        BEAC
      </div>
      <div>
        <h4 style="font-family:'Space Grotesk',sans-serif;font-size:15px;font-weight:600;color:var(--txt);margin:0 0 2px">
          Banque des États de l'Afrique Centrale
        </h4>
        <div style="font-size:11.5px;color:var(--txt3);margin-bottom:4px">Direction Nationale pour le Gabon</div>
        <div style="font-size:12px;color:var(--txt2)">Boulevard Triomphal, Libreville · Tél : +241 11 72 20 00</div>
      </div>
    </div>

    {{-- COBAC --}}
    <div class="contact-reg-card">
      <div style="width:44px;height:44px;border-radius:10px;background:var(--vert-c);color:var(--vert);display:grid;place-items:center;font-weight:800;font-size:13px;flex-shrink:0">
        COBAC
      </div>
      <div>
        <h4 style="font-family:'Space Grotesk',sans-serif;font-size:15px;font-weight:600;color:var(--txt);margin:0 0 2px">
          Commission Bancaire de l'Afrique Centrale
        </h4>
        <div style="font-size:11.5px;color:var(--txt3);margin-bottom:4px">Supervision des Banques, EMF et Paiements</div>
        <div style="font-size:12px;color:var(--txt2)">Règlement R-2020/06 · Yaoundé / Libreville</div>
      </div>
    </div>

    {{-- CIMA / CRCA --}}
    <div class="contact-reg-card">
      <div style="width:44px;height:44px;border-radius:10px;background:var(--bleu-c);color:var(--bleu);display:grid;place-items:center;font-weight:800;font-size:13px;flex-shrink:0">
        CIMA
      </div>
      <div>
        <h4 style="font-family:'Space Grotesk',sans-serif;font-size:15px;font-weight:600;color:var(--txt);margin:0 0 2px">
          Conférence Interafricaine des Marchés d'Assurances
        </h4>
        <div style="font-size:11.5px;color:var(--txt3);margin-bottom:4px">Commission Régionale de Contrôle des Assurances (CRCA)</div>
        <div style="font-size:12px;color:var(--txt2)">Code CIMA consolidé · Libreville / Abidjan</div>
      </div>
    </div>

    {{-- COSUMAF --}}
    <div class="contact-reg-card">
      <div style="width:44px;height:44px;border-radius:10px;background:var(--or-p);color:var(--or-d);display:grid;place-items:center;font-weight:800;font-size:13px;flex-shrink:0">
        COSUMAF
      </div>
      <div>
        <h4 style="font-family:'Space Grotesk',sans-serif;font-size:15px;font-weight:600;color:var(--txt);margin:0 0 2px">
          Commission de Surveillance du Marché Financier
        </h4>
        <div style="font-size:11.5px;color:var(--txt3);margin-bottom:4px">Marché financier régional d'Afrique Centrale</div>
        <div style="font-size:12px;color:var(--txt2)">Siège : Libreville, Gabon · B.P. 14961</div>
      </div>
    </div>

    {{-- DGA --}}
    <div class="contact-reg-card">
      <div style="width:44px;height:44px;border-radius:10px;background:var(--gris);color:var(--txt);display:grid;place-items:center;font-weight:800;font-size:13px;flex-shrink:0">
        DGA
      </div>
      <div>
        <h4 style="font-family:'Space Grotesk',sans-serif;font-size:15px;font-weight:600;color:var(--txt);margin:0 0 2px">
          Direction Générale des Assurances (Gabon)
        </h4>
        <div style="font-size:11.5px;color:var(--txt3);margin-bottom:4px">Ministère de l'Économie et des Participations</div>
        <div style="font-size:12px;color:var(--txt2)">Immeuble Arambo, Libreville</div>
      </div>
    </div>

    {{-- CNC --}}
    <div class="contact-reg-card">
      <div style="width:44px;height:44px;border-radius:10px;background:var(--gris);color:var(--txt);display:grid;place-items:center;font-weight:800;font-size:13px;flex-shrink:0">
        CNC
      </div>
      <div>
        <h4 style="font-family:'Space Grotesk',sans-serif;font-size:15px;font-weight:600;color:var(--txt);margin:0 0 2px">
          Conseil National du Crédit du Gabon
        </h4>
        <div style="font-size:11.5px;color:var(--txt3);margin-bottom:4px">Secrétariat Général du CNEF</div>
        <div style="font-size:12px;color:var(--txt2)">Direction Nationale de la BEAC, Libreville</div>
      </div>
    </div>
  </div>
</section>
@endsection
