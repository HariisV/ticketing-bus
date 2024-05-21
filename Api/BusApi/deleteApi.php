<?php
include '../../Models/model_bus.php';
$bus    = new Bus();
$body   = explode(',',file_get_contents('php://input'));
$delete = $bus->delete($body);
echo json_encode(array("status" => "ok", "body" => $body, "data" => $delete));