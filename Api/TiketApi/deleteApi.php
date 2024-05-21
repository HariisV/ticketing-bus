<?php
include '../../Models/model_tiket.php';
$tiket = new Tiket();
$body = file_get_contents('php://input');
$delete = $tiket->delete($body);
echo json_encode(array("status" => "ok", "data" => $delete));