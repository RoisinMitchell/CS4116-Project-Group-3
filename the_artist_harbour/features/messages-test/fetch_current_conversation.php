<?php
require_once __DIR__ . '/../../utilities/databaseHandler.php';

$conversation_id = isset($_GET['conversation_id']) ? (int) $_GET['conversation_id'] : null;

$sql = "
    SELECT 
        m.id,
        m.sender_id,
        m.receiver_id,
        m.text,
        m.status,
        m.created_at,
        m.conversation_id,
        CONCAT(sender.first_name, ' ', sender.last_name) AS sender_name,
        CONCAT(receiver.first_name, ' ', receiver.last_name) AS receiver_name
    FROM messages m
    JOIN users sender ON sender.id = m.sender_id
    JOIN users receiver ON receiver.id = m.receiver_id
    WHERE m.conversation_id = $conversation_id
    ORDER BY m.created_at ASC
";

$messages = DatabaseHandler::make_select_query($sql);
return $messages;
?>