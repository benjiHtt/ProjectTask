function send() {
    $.ajax( {
        url: "https://www.hdev.hu/chat/savetext",
        type: "post",
        data: {
            userid: $name,
            text: $("#text").val()
        },
        success: function(response) {
            $("#text").val('');
        },
        error: function(response) {
            alert("hiba:"+response);
        }
    });
}

function getChat() {
    
    $.ajax( {
        url: "https://www.hdev.hu/chat/gettext",
        type: "post",
        success: function(response) {
            //var oldtext = $("#chat").html();
            $("#chathistory").html(response);
            var objDiv = document.getElementById("chathistory");
            objDiv.scrollTop = objDiv.scrollHeight;
        },
        error: function(response) {
            console.log(response);
            alert("hiba:"+response);
        }
    });

}

// setInterval(getChat, 1000);

