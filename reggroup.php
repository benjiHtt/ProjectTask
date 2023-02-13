<?php
session_start();

require_once 'chat/TemplateRenderer.php';


$users = ORM::for_table("csoport")->create();
$users->groupname = $_POST["reggroup"];
$users->save();

header("Location: admin.php");
?>
