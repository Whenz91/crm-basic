<?php 
session_destroy();

session_start();

unset($_SESSION["userName"]);

header("location: index.php?message=logedout");

?>