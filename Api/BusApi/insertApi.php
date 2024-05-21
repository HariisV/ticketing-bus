<?php
include '../../Models/model_bus.php';
$bus = new Bus();
$body = explode(',',file_get_contents('php://input'));
$insert = $bus->insert($body);
echo json_encode(array("status" => "ok", "body" => $body, "data" => $insert));