<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Chatbot Power Of Memory</title>
    <link rel="stylesheet" href="assets/css/chatbot.css" />
  </head>
  <body>
    <div class="chatbot-container">
      <div class="chatbot-header">
        <span class="back-arrow">‹</span>
        <span>Power Of Memory</span>
      </div>

      <div class="chatbot-messages">
        <div class="message">
          <div class="message-avatar">TM</div>
          <div class="message-content">
            <div class="message-bubble">
              <span class="emoji-icon">👋</span> Hey ! Bien joué Clément !
            </div>
            <div class="message-time">Il y a 2 minutes</div>
          </div>
        </div>

        <div class="message sent">
          <div class="message-avatar">CP</div>
          <div class="message-content">
            <div class="message-bubble">Yes ! Bien joué Clément !</div>
            <div class="message-time">Il y a 2 minutes</div>
          </div>
        </div>

        <div class="message">
          <div class="message-avatar">TM</div>
          <div class="message-content">
            <div class="message-bubble">Merci beaucoup !!</div>
            <div class="message-time">À l'instant</div>
          </div>
        </div>
      </div>

      <div class="chatbot-input-container">
        <div class="chatbot-input-wrapper">
          <input
            type="text"
            class="chatbot-input"
            placeholder="Votre message..."
          />
          <button class="send-button">➤</button>
        </div>
      </div>
    </div>
  </body>
</html>
