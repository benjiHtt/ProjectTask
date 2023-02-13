<?php
require_once 'TemplateRenderer.php';

$name=$_REQUEST["userid"];

$data = Model::factory('Chat')->create();
$data->set("user_id", $name);
$data->set("txt", $_REQUEST["text"]);
$data->save();

//$data = Model::factory('Chat')->create();
//$data->set("user", 'teszt');
//$data->set("txt", 'valami szöveg');
//$data->save();