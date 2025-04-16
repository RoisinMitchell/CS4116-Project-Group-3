<!-- Inbox Panel -->
<div>
    <div class="inbox-title-container">
        <p class="inbox-title">Inbox</p>
    </div>

    <div class="inbox-item-container">
        <!-- List of Conversations by Sender -->
        <ul id="inbox">
            <?php if (!empty($conversations)): ?>
                <?php foreach ($conversations as $conversation): ?>

                    <li class="sender-item">
                        <a href="?conversation_id=<?php echo $conversation['conversation_id']; ?>" class="btn">
                            <div class="btn-body">
                                <div><span><?php echo $conversation['other_user']; ?></span></div>
                                <span
                                    class="message-time"><?php echo date('d-m-Y H:i', strtotime($conversation['latest_message_time'])); ?></span>
                            </div>
                        </a>
                    </li>

                <?php endforeach; ?>
            <?php else: ?>
                <li>Inbox is Empty!</li>
            <?php endif; ?>
        </ul>
    </div>

</div>