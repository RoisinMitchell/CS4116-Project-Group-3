<div id="chat-panel">
    <div class="chat-title-container">
        <p class="chat-title">Get Sender ID</p>
    </div>

    <div class="chat-messages-container">
        <?php if (isset($conversation['error'])): ?>
            <p class="alert-select-conversation"><?php echo $conversation['error']; ?></p>
        <?php else: ?>
            <?php foreach ($messages as $message): ?>
                <?php $status = $message['status']; ?>
                <?php if ($user_id === $message['sender_id']): ?>
                    <div class="user-message">
                        <?php echo $message['text']; ?>
                        <small><?php echo date('d-m-Y H:i', strtotime($message['created_at'])); ?></small>
                    </div>
                <?php else: ?>
                    <div class="other-user-message">
                        <?php echo $message['text']; ?>
                        <small><?php echo date('d-m-Y H:i', strtotime($message['created_at'])); ?></small>
                        <button type="button" class="btn btn-link p-0" data-bs-toggle="modal" data-bs-target="#reportModal"
                            data-message-id="<?php echo $message['id']; ?>" data-reported-id="<?php echo $message['sender_id']; ?>">
                            <i class="bi bi-flag" title="Report this message" style="color:red;"></i>
                        </button>
                    </div>
                <?php endif; ?>

            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <?php if ($status === 'accepted'): ?>
        <div class="chat-input-container">
            <form class="d-flex text-box" id="sendMessageForm" method="post" action="send_message.php">
                <input type="hidden" name="receiver_id" value="<?php echo $sender_id; ?>">
                <input type="text" class="form-control me-3" name="message_text" placeholder="Type your message..."
                    required>
                <button type="submit" class="btn me-4">
                    <i class="bi bi-send"></i>
                </button>
            </form>
        </div>
    <?php endif; ?>
</div>