<?php
include '../../Models/model_user.php';
$user = new User();
$body = file_get_contents('php://input');
$insert = $user->insert($body);
echo json_encode(array("status" => "ok", "body" => $body, "data" => $insert));