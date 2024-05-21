<?php
include '../../Models/model_user.php';
$user = new User();
$body = file_get_contents('php://input');
$delete = $user->delete($body);
echo json_encode(array("status" => "ok", "body" => $body, "data" => $delete));