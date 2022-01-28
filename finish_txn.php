<?php

require './inform.php';

$response = json_decode(file_get_contents('php://input'), TRUE);
inform($response);
inform($_SERVER);

?>