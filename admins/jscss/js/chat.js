

$(document).ready(function () {


    var nameS;
    $('input, select').click( function(e){
        nameS = e.currentTarget.name;
            $(this).on("change",function () {
                sessionStorage.setItem((nameS+nameS), this.value);
            });
        });
    var map;
    $('input, select').each(function() {
         map = $(this).attr("name");
            if (sessionStorage.getItem(map+map)) {
                $(this).val(sessionStorage.getItem(map+map));
            };
    });

var textareaID;
var formId;
var sessionUser;

var chatID;

    $.validator.setDefaults({
        onkeyup: false,
        ignore: "hidden",
        messages: {
            FirstName: 'Please enter First Name',
            LastName: 'Please enter Last Name',
            Email: 'Please enter email'
        },
        rules: {
            FirstName: {required: true, letters: true, minlength: 2},
            LastName: {required: true, letters: true, minlength: 2},
            Email: {required: true, email: true}
        }
    });

    // user starting Chat
                $("#chatFormUser").validate({
                    submitHandler: function () {

                        setTimeout(function () {
                            var product_fields = $("#chatFormUser").serializeArray();

                            $.ajax({
                                url: 'php/phpChat/php.php',
                                data: product_fields,
                                type: 'POST',
                                async: false,
                                dataType: 'json',
                                success: function (response) {

                                    $("#inChatForm").hide();

                                    var last_id = JSON.parse(response.last_id); // last_id has the last insert id

                                    chatID = last_id;
                                    console.log('chatID: ' + chatID);
                                    $('input[name="chatID"]').attr('value', chatID);
                                    $('#typeMsg form').attr('id', chatID);
                                    $('#typeMsg textarea').attr('id', "btn"+chatID)


        sessionStorage.setItem('pass', last_id);
                sessionUser = 'sessionUser' + last_id;

//                        $("#chatFormUser").hide();
        window.load = checkCookie();
                                }

                            });
                        }, 2000);

                    }
                });

        $("#btnChatFormUser").click(function () {

            event.preventDefault();

            $("#chatFormUser").submit();
        });

var timeOutTitle;
var timeOutTitleSecond;
var intervalFlashNewMsg;
var executed;
var lastFormID = sessionStorage.getItem('pass');



    // refreshing Chat
            function refreshChat(){

            console.log("runFlash: " + chatID);
            console.log("runFlash2: " + lastFormID);
                 $.ajax({
                   url: 'php/phpChat/receive.php',
                   data: {chatID:lastFormID, restoreChat:changePage, lastFormID:lastFormID},
                   dataType: 'json',
                   success: function (response) {

                        $('#chatArea').empty();

                        $('#chatArea').append(response.newMsgGet);

                        if (response.adminSend == 'adminSend'+formId || response.adminSend == 'adminSend'+changePage){

                            if ($( '#chatArea').css( "background-color" ) != "rgb(0, 200, 200)"){

                            $('#chatArea').css('background-color', 'lime');

                            function soundChat() {

                                    if (executed == false) {

                                        executed = true;
                                        document.getElementById('soundChat').play();

                                    }
                            };

                            soundChat();

                                    timeOutTitle = setTimeout(function () {

                                    document.title = 'You have new message';
                                 }, 1000);
                                    timeOutTitleSecond = setTimeout(function () {

                                    document.title = 'TITLE';
                                 }, 3000);
                            }
                        }
                        console.log("chatIDchatID: " + lastFormID);
                        console.log("State: " + response.lastState);
                        if (response.lastState == 'close'){

                            delete_cookie();
                            myStopFunction();
                        document.title = 'TITLE';
                        $('#chatArea').empty();
                        $("#inChatForm").show();
                        sessionStorage.removeItem('pass');
                            location.reload();
                        }
                    },
                });
            }

function myStopFunction() {
        clearInterval(intervalFlashNewMsg);
        clearTimeout(timeOutTitle);
}

// Execute every 5 seconds to refresh Chat
    window.setInterval(refreshChat, 5000);

    // user send chat Message
        $(".sendWithEnter").keydown(function(event){

                formId = $(this).closest("form").attr('id');
                textareaID = this.id;

            myStopFunction();
            document.title = 'TITLE';

                $( '#chatArea').css('background-color', 'rgb(0, 200, 200)');

            if(event.keyCode == 13 && textareaID == "btn" + formId){
                              console.log("EnteR!!! : " + formId);
                $.ajax({
                    url: 'php/phpChat/connection.php',
                    data: {chatID:formId,userMsg:$("#"+textareaID).val(), userSend:'userSend'+formId},
                    type: 'POST',
                    async: false,
                    dataType: 'json',
                    success: function (response) {

                console.log("EnteR!!!");
//                        $( '#chatArea').css('background-color', 'rgb(100, 100, 250)');
                        $( '#chatArea').css('background-color', 'blue');

                        $('#chatArea').empty();
                        // $('#chatArea').append(JSON.parse(response.newMsg));
                        $('#chatArea').append(response.newMsg);
                        $('textarea').val(' ');

                        executed = false;
                    }
                });
            } else if (event.keyCode == 13) {

//                $('body').css('background', 'rgb(150, 100, 250)');
                $('body').css('background', 'green');
            }

        });

    // to show/hide chat box
    var changePage;

    $('#arrow').click(function(){

        var FID = sessionStorage.getItem('pass');
        changePage = FID;

        if ($('#userChat').css('bottom') == '-270px'){

                $('#userChat').css('bottom', '10px');
                $('#arrow img').css('transform', 'rotate(180deg)','-webkit-transform', 'rotate(180deg)');

            } else {

                $('#userChat').css('bottom', '-270px');
                $('#arrow img').css('transform', 'rotate(0deg)','-webkit-transform', 'rotate(0deg)');
            }

        $('input[name="chatID"]').attr('value', FID);
        $('#typeMsg form').attr('id', FID);
        $('#typeMsg textarea').attr('id', "btn"+FID);
    });


    // closing chat
        $('#topBar span').click(function(){

            var closeFormID = sessionStorage.getItem('pass');

            $.ajax({
                url: 'php/phpChat/receive.php',
                data: { chatIDClose:formId,state:'close', lastFormID:closeFormID},
                async: false,
                success: function () {

                    $('#userChat').css('bottom', '-270px');
                    $('#arrow img').css('transform', 'rotate(0deg)','-webkit-transform', 'rotate(0deg)');
                    $('#chatArea').empty();
                    $("#inChatForm").show();

                    sessionStorage.removeItem('pass');
                }
            });

            delete_cookie();
        });

    function setCookie(userChatCookie,userChatCookieValue) {

        document.cookie = userChatCookie+"="+userChatCookieValue+"; ";
    }

    function getCookie(userChatCookie) {
        var name = userChatCookie + "=";
        var arrayCookieChat = document.cookie.split(';');

        for(var i=0; i<arrayCookieChat.length; i++) {

            var everyCookie = arrayCookieChat[i];

            while (everyCookie.charAt(0)==' ') {

                everyCookie = everyCookie.substring(1);
            }
            if (everyCookie.indexOf(name) == 0) {

                return everyCookie.substring(name.length, everyCookie.length);
            }
        }
        return "";
    }

        var user = getCookie("username");

        function checkCookie() {

            if (user == 'sessionUser') {

                $("#inChatForm").hide();
                $("body").css("background", 'pink');

            } else {

               user = 'sessionUser';

               if (user != "" && user != null) {

                   setCookie("username", user, 30);
               }
            }
        }
//
        function checkUserSession() {

            if (user == 'sessionUser') {

                $("#inChatForm").hide();
                $("body").css("background", 'pink');
            }
        }
function delete_cookie() {
  document.cookie = 'username=; expires=Thu, 01 Jan 1970 00:00:01 GMT;"';
}
//
    window.load = checkUserSession();
});
