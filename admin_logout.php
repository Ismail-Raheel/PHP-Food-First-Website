<?php

require("connect.php");

session_start();
$_SESSION = [];
session_unset();
session_destroy();
header('Location: Admin_Login.php');


?> 