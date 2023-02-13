<?php
session_start();

require_once 'chat/TemplateRenderer.php';
echo $_SESSION['id'];
$users = ORM::for_table("user")->find_one( $_SESSION['id']);
$users->online = 0;
$users->save();
unset($_SESSION["belepouser"]);
session_destroy();

header("Location: index.php");
?>
