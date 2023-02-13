<?php
session_start();

require_once 'chat/TemplateRenderer.php';


$users = ORM::for_table("user")->create();
$users->username = $_POST["regusername"];
$users->privilege = $_POST["reguserprivilege"];
$users->groupid = $_POST["regusergroup"];
$users->password = $_POST["reguserpw"];
$users->online = 0;
$users->save();

header("Location: ".$_POST["caller"]);
?>
