<?php
require_once 'TemplateRenderer.php';

$data = ORM::for_table("chat")->find_many();


$owntext = "
            <li class='clearfix'>
            <div class='message-data text-right'>
            <span class='message-data-time'>{datetime}</span>
        <img src='https://bootdey.com/img/Content/avatar/avatar7.png' alt='avatar'>
        </div>
        <div class='message other-message float-right'>{text}</div>
    </li>
        ";
$othertext = "
 <li class='clearfix'>
                                <div class='message-data'>
                                    <span class='message-data-time'>{datetime}</span>
                                </div>
                                <div class='message my-message'>{text}</div>
                            </li>
";
for ($i=0;$i < count($data);$i++) {
    if ($i%2 == 0) {
        $text = $othertext;
    } else {
        $text = $owntext;
    }
    $text = str_replace("{datetime}",$data[$i]->datetime,$text);
    $text = str_replace("{text}",$data[$i]->txt,$text);
    $response = $response.$text;
}
echo $response;