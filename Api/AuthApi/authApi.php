<?php
include '../../Models/model_user.php';
$user = new User();
$body = explode('&',file_get_contents('php://input'));
$auth = $user->auth($body);
var_dump(array("data" => $auth));