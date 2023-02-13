<?php
require_once 'TemplateRenderer.php';

$users = ORM::for_table("user")->find_many();

$id=1;
if (isset($_GET["id"])) {
   $id= $_GET["id"];
}

?><!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="utf-8">
    <title>Chat</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body style="background-color:#434651">
    
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
<div class="container">

<!--NAVBAR BEGINS -->
    
    <!--NAVBAR ENDS -->

    <!--CHAT BEGINS -->
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card chat-app">
                <div id="plist" class="people-list">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-search"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Keresés...">
                    </div>
                    <ul class="list-unstyled chat-list mt-2 mb-0">
                        <?php for ($i=0;$i < count($users);$i++) { ?>
                        <li class="clearfix">
                            <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="avatar">
                            <div class="about">
                                <div class="name"><?php echo $users[$i]->username ?></div>
                                <?php if ($users[$i]->online == 1) {?>
                                <div class="status" id="status_<?php echo $users[$i]->id ?>"><i class="fa fa-circle online"></i> online</div>
                                <?php } else { ?>
                                    <div class="status" id="status_<?php echo $users[$i]->id ?>"><i class="fa fa-circle offline"></i> offline</div>
                                <?php } ?>
                            </div>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="chat">
                    <div class="chat-header clearfix">
                        <div class="row">
                            <div class="col-lg-6">
                                <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="avatar">
                                </a>
                                <div class="chat-about">
                                    <h6 class="m-b-0">Aiden Chavez</h6>
                                    <small>Utoljára elérhető: 2 órája</small>
                                </div>
                            </div>
                            <div class="col-lg-6 hidden-sm text-right">
                                <a href="javascript:void(0);" class="btn btn-outline-secondary"><i
                                        class="fa fa-camera"></i></a>
                                <a href="javascript:void(0);" class="btn btn-outline-primary"><i
                                        class="fa fa-image"></i></a>
                                <a href="javascript:void(0);" class="btn btn-outline-info"><i
                                        class="fa fa-cogs"></i></a>
                                <a href="javascript:void(0);" class="btn btn-outline-warning"><i
                                        class="fa fa-question"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="chat-history">
                        <ul class="m-b-0" style="overflow-y: scroll; overflow-x: hidden;height: 400px;" id="chathistory">
                        </ul>
                    </div>
                    <div class="chat-message clearfix">
                        <div class="input-group mb-0">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-send"></i></span>
                            </div>
                            <input type="text" class="form-control" id="text" placeholder="Üzenet bevitele..." onclick="this.select()"
                                   onKeyDown="if(event.keyCode==13) send();">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--CHAT ENDS -->
</div>

<!-- CSS BEGINS-->
<style type="text/css">
    body {
        background-color: #f4f7f6;
        margin-top: 60px;
        background-color: #212529!important;
        /*background-color: #343a40!important;*/
    }

    .card {
        background: #fff;
        transition: .5s;
        border: 0;
        margin-bottom: 30px;
        border-radius: .55rem;
        position: relative;
        width: 100%;
        box-shadow: 0 1px 2px 0 rgb(0 0 0 / 10%);
    }

    .chat-app .people-list {
        width: 280px;
        position: absolute;
        left: 0;
        top: 0;
        padding: 20px;
        z-index: 7
    }

    .chat-app .chat {
        margin-left: 280px;
        border-left: 1px solid #eaeaea
    }

    .people-list {
        -moz-transition: .5s;
        -o-transition: .5s;
        -webkit-transition: .5s;
        transition: .5s
    }

    .people-list .chat-list li {
        padding: 10px 15px;
        list-style: none;
        border-radius: 3px
    }

    .people-list .chat-list li:hover {
        background: #efefef;
        cursor: pointer
    }

    .people-list .chat-list li.active {
        background: #efefef
    }

    .people-list .chat-list li .name {
        font-size: 15px
    }

    .people-list .chat-list img {
        width: 45px;
        border-radius: 50%
    }

    .people-list img {
        float: left;
        border-radius: 50%
    }

    .people-list .about {
        float: left;
        padding-left: 8px
    }

    .people-list .status {
        color: #999;
        font-size: 13px
    }

    .chat .chat-header {
        padding: 15px 20px;
        border-bottom: 2px solid #f4f7f6
    }

    .chat .chat-header img {
        float: left;
        border-radius: 40px;
        width: 40px
    }

    .chat .chat-header .chat-about {
        float: left;
        padding-left: 10px
    }

    .chat .chat-history {
        padding: 20px;
        border-bottom: 2px solid #fff
    }

    .chat .chat-history ul {
        padding: 0
    }

    .chat .chat-history ul li {
        list-style: none;
        margin-bottom: 30px
    }

    .chat .chat-history ul li:last-child {
        margin-bottom: 0px
    }

    .chat .chat-history .message-data {
        margin-bottom: 15px
    }

    .chat .chat-history .message-data img {
        border-radius: 40px;
        width: 40px
    }

    .chat .chat-history .message-data-time {
        color: #434651;
        padding-left: 6px
    }

    .chat .chat-history .message {
        color: #444;
        padding: 18px 20px;
        line-height: 26px;
        font-size: 16px;
        border-radius: 7px;
        display: inline-block;
        position: relative
    }

    .chat .chat-history .message:after {
        bottom: 100%;
        left: 7%;
        border: solid transparent;
        content: " ";
        height: 0;
        width: 0;
        position: absolute;
        pointer-events: none;
        border-bottom-color: #fff;
        border-width: 10px;
        margin-left: -10px
    }

    .chat .chat-history .my-message {
        background: #efefef
    }

    .chat .chat-history .my-message:after {
        bottom: 100%;
        left: 30px;
        border: solid transparent;
        content: " ";
        height: 0;
        width: 0;
        position: absolute;
        pointer-events: none;
        border-bottom-color: #efefef;
        border-width: 10px;
        margin-left: -10px
    }

    .chat .chat-history .other-message {
        background: #e8f1f3;
        text-align: right
    }

    .chat .chat-history .other-message:after {
        border-bottom-color: #e8f1f3;
        left: 93%
    }

    .chat .chat-message {
        padding: 20px
    }

    .online,
    .offline,
    .me {
        margin-right: 2px;
        font-size: 8px;
        vertical-align: middle
    }

    .online {
        color: #86c541
    }

    .offline {
        color: #e47297
    }

    .me {
        color: #1d8ecd
    }

    .float-right {
        float: right
    }

    .clearfix:after {
        visibility: hidden;
        display: block;
        font-size: 0;
        content: " ";
        clear: both;
        height: 0
    }

    @media only screen and (max-width: 767px) {
        .chat-app .people-list {
            height: 465px;
            width: 100%;
            overflow-x: auto;
            background: #fff;
            left: -400px;
            display: none
        }

        .chat-app .people-list.open {
            left: 0
        }

        .chat-app .chat {
            margin: 0
        }

        .chat-app .chat .chat-header {
            border-radius: 0.55rem 0.55rem 0 0
        }

        .chat-app .chat-history {
            height: 300px;
            overflow-x: auto
        }
    }

    @media only screen and (min-width: 768px) and (max-width: 992px) {
        .chat-app .chat-list {
            height: 650px;
            overflow-x: auto
        }

        .chat-app .chat-history {
            height: 600px;
            overflow-x: auto
        }
    }

    @media only screen and (min-device-width: 768px) and (max-device-width: 1024px) and (orientation: landscape) and (-webkit-min-device-pixel-ratio: 1) {
        .chat-app .chat-list {
            height: 480px;
            overflow-x: auto
        }

        .chat-app .chat-history {
            height: calc(100vh - 350px);
            overflow-x: auto
        }
    }
</style>
<!-- CSS ENDs-->

<!-- JS BEGINS-->

<script>
    function send() {
        $.ajax( {
            url: "chat/savetext.php",
            type: "post",
            data: {
                userid: <?php echo $id; ?>,
                text: $("#text").val()
            },
            success: function(response) {
                $("#text").val('');
            },
            error: function(response) {
                console.log(response);
                // alert("hiba:"+response);
            }
        });
    }

    function getChat() {
        
        $.ajax( {
            url: "chat/gettext.php",
            type: "post",
            success: function(response) {
                //var oldtext = $("#chat").html();
                $("#chathistory").html(response);
                var objDiv = document.getElementById("chathistory");
                objDiv.scrollTop = objDiv.scrollHeight;
            },
            error: function(response) {
                console.log(response);
                //alert("hiba:"+response);
            }
        });

    }
    function getUsersStatus() {

        $.ajax( {
            url: "chat/getuserstatus.php",
            type: "post",
            success: function(response) {
                $(".status").html("<i class='fa fa-circle offline'></i> offline");
                var ids = response.split(",");
                for (i = 0; i < ids.length; i++) {
                    if (Number(ids[i])) {
                        userstatusobj = "status_"+ids[i];
                        document.getElementById(userstatusobj).innerHTML = "<i class='fa fa-circle online'></i> online";
                    }
                }
            },
            error: function(response) {
                console.log(response);
                //alert("hiba:"+response);
            }
        });

    }

     setInterval(getChat, 1000);
     setInterval(getUsersStatus, 1000);


</script>
<!-- JS ENDS-->

</body>
</html>