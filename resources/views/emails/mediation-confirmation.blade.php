<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Confirmation de saisine — Médiation Financière CNEF</title>
  <style>
    body { margin:0; padding:0; background-color:#F1F5F9; font-family:'Segoe UI',Roboto,Helvetica,Arial,sans-serif; color:#1E293B; line-height:1.6; }
    .email-container { max-width:600px; margin:24px auto; background:#ffffff; border-radius:12px; overflow:hidden; border:1px solid #E2E8F0; box-shadow:0 4px 12px rgba(0,0,0,0.05); }
    .email-header { background:#0A2518; padding:32px 24px; text-align:center; color:#ffffff; }
    .email-logo-title { font-size:20px; font-weight:800; letter-spacing:0.04em; margin-bottom:4px; color:#E8A317; text-transform:uppercase; }
    .email-subtitle { font-size:13px; color:rgba(255,255,255,0.75); margin:0; text-transform:uppercase; letter-spacing:0.06em; }
    .email-body { padding:32px 28px; }
    .code-box { background:#F8FAFC; border:2px dashed #059669; border-radius:10px; padding:20px; text-align:center; margin:24px 0; }
    .code-label { font-size:12px; font-weight:700; text-transform:uppercase; color:#64748B; letter-spacing:0.08em; margin-bottom:6px; }
    .code-value { font-size:24px; font-weight:800; color:#0A2518; letter-spacing:0.08em; font-family:monospace; }
    .info-table { width:100%; border-collapse:collapse; margin:20px 0; }
    .info-table td { padding:10px 12px; font-size:13.5px; border-bottom:1px solid #F1F5F9; }
    .info-table td.label { font-weight:600; color:#64748B; width:40%; }
    .info-table td.val { font-weight:500; color:#0F172A; }
    .btn-track { display:inline-block; background:#059669; color:#ffffff !important; text-decoration:none; padding:12px 28px; border-radius:8px; font-weight:700; font-size:14px; text-align:center; margin-top:12px; }
    .email-footer { background:#F8FAFC; padding:20px 24px; font-size:12px; color:#64748B; text-align:center; border-top:1px solid #E2E8F0; }
  </style>
</head>
<body>
  <div class="email-container">
    <div class="email-header">
      <div class="email-logo-title">Médiation Financière</div>
      <p class="email-subtitle">Conseil National du Crédit · République Gabonaise</p>
    </div>

    <div class="email-body">
      <h2 style="font-size:18px; color:#0F172A; margin-top:0;">Bonjour {{ $saisine->prenom }} {{ $saisine->nom }},</h2>
      <p style="font-size:14px; color:#334155;">
        Votre saisine a bien été enregistrée par le Secrétariat du Médiateur Financier du CNEF Gabon. 
        Conformément aux dispositions réglementaires en vigueur, la procédure est <strong>entièrement gratuite</strong> et conduite dans le respect du <strong>secret professionnel</strong>.
      </p>

      <div class="code-box">
        <div class="code-label">Votre Code Confidentiel de Suivi</div>
        <div class="code-value">{{ $saisine->reference }}</div>
        <p style="font-size:12px; color:#64748B; margin:8px 0 0 0;">Conservez précieusement ce code pour suivre l’état d’avancement de votre dossier.</p>
      </div>

      <table class="info-table">
        <tr>
          <td class="label">Date de soumission</td>
          <td class="val">{{ $saisine->created_at->format('d/m/Y à H:i') }}</td>
        </tr>
        <tr>
          <td class="label">Établissement concerné</td>
          <td class="val">{{ $saisine->etablissement }}</td>
        </tr>
        <tr>
          <td class="label">Nature du différend</td>
          <td class="val">{{ $saisine->nature_litige }}</td>
        </tr>
        <tr>
          <td class="label">Statut initial</td>
          <td class="val"><span style="display:inline-block; padding:3px 8px; border-radius:4px; font-size:12px; font-weight:700; background:#EFF6FF; color:#2563EB;">Dossier déposé / Reçu</span></td>
        </tr>
      </table>

      <div style="text-align:center; margin:28px 0;">
        <a href="{{ route('mediation.suivi', ['reference' => $saisine->reference]) }}" class="btn-track">
          Consulter l’état de mon dossier en direct
        </a>
      </div>

      <p style="font-size:13px; color:#64748B; margin-bottom:0;">
        <strong>Prochaine étape :</strong> Le Secrétariat étudie la recevabilité de votre demande sous un délai de 5 jours ouvrés. En cas de recevabilité, le Médiateur prendra contact avec l’établissement concerné pour instruire contradictoirement le dossier.
      </p>
    </div>

    <div class="email-footer">
      Secrétariat Général du CNEF Gabon — Direction Nationale de la BEAC, Libreville<br>
      Tél : +241 01 79 34 00 · Email : contact@cnef.ga<br>
      Ce message est automatique, merci de ne pas y répondre directement.
    </div>
  </div>
</body>
</html>
