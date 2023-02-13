<?php
session_start();

require_once 'chat/TemplateRenderer.php';


$users = ORM::for_table("user")->where('username',$_POST["regusername"])->where('password',$_POST["reguserpw"])->find_one();
$users->delete();

header("Location: ".$_POST["caller"]);
?>
