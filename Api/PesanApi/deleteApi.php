<?php
include '../../Models/model_pesan.php';
$pesan  = new Pesan();
$body   = explode(',',file_get_contents('php://input'));
$delete = $pesan->delete($body);
echo json_encode(array("status" => "ok", "body" => $body, "data" => $delete));