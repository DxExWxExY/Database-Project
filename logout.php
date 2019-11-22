<?php
require_once "database_viewer.php";

session_start();
$_SESSION = array();
session_destroy();
header('Location:index.php');