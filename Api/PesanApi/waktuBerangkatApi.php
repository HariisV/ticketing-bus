<?php
include '../../Models/model_pesan.php';
$pesan  = new Pesan();
$body   = file_get_contents('php://input');
$get    = $pesan->getWaktuBerangkat($body);
echo json_encode(array("status" => "ok", "data" => $get));