<div class="cnef-chat" id="cnef-chat" data-endpoint="{{ route('chatbot.respond') }}">
  <section class="chat-panel" id="chat-panel" aria-label="Assistant CNEF" aria-hidden="true">
    <header class="chat-head">
      <div class="chat-avatar" aria-hidden="true">C</div>
      <div><strong>Assistant CNEF</strong><span><i></i> Service d’orientation</span></div>
      <button type="button" class="chat-close" aria-label="Fermer l’assistant">×</button>
    </header>
    <div class="chat-messages" id="chat-messages" role="log" aria-live="polite">
      <div class="chat-bubble bot">Bonjour, je suis l’assistant du CNEF Gabon. Comment puis-je vous orienter ?</div>
      <div class="chat-suggestions" aria-label="Questions suggérées">
        <button type="button">Déposer une réclamation</button><button type="button">Obtenir un agrément</button>
        <button type="button">Trouver un texte réglementaire</button><button type="button">Contacter le CNEF</button>
      </div>
    </div>
    <form class="chat-form" id="chat-form">
      <label class="sr-only" for="chat-input">Votre question</label>
      <input id="chat-input" maxlength="800" autocomplete="off" placeholder="Écrivez votre question…" required>
      <button type="submit" aria-label="Envoyer la question"><svg viewBox="0 0 24 24"><path d="M22 2L11 13M22 2l-7 20-4-9-9-4 20-7z"/></svg></button>
    </form>
    <p class="chat-note">Assistant d’information générale — ne remplace pas une réponse officielle du CNEF.</p>
  </section>
  <button type="button" class="chat-launcher" id="chat-launcher" aria-expanded="false" aria-controls="chat-panel">
    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M21 15a4 4 0 01-4 4H8l-5 3V7a4 4 0 014-4h10a4 4 0 014 4z"/><path d="M8 9h8M8 13h5"/></svg><span>Besoin d’aide ?</span>
  </button>
</div>
