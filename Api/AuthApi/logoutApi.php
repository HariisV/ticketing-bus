<?php
include '../../Models/model_user.php';
$user = new User();
$auth = $user->logout();