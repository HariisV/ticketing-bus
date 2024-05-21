<?php
include '../../Models/model_pesan.php';
$pesan  = new Pesan();
$body   = explode(',', file_get_contents('php://input'));
$insert = $pesan->insert($body);
echo json_encode(array("status" => "ok", "data" => $insert));