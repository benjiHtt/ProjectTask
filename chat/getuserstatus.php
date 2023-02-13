<?php
require_once 'TemplateRenderer.php';

$data = ORM::for_table("user")->where('online', 1)->find_many();

$response = '';
for ($i=0;$i < count($data);$i++) {
    $response = $response . $data[$i]->id . ',';
}
echo $response;