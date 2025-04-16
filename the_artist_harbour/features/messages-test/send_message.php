<?php
require_once __DIR__ . '/../../utilities/databaseHandler.php';

echo 'this is send_message';

$sql = "CALL SendMessage(5, 2, 'Hello, could I request your service?', 'pending')";

$result = DatabaseHandler::make_modify_query($sql);


?>