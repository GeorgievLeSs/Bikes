
$(document).ready(function () {

// admin take chat
var adminId;

$("#refreshChats").click(function(event) {

        event.preventDefault();

    location.reload();
});

    $(".adminGetChat").click(function(event){

        event.preventDefault();
        var chatAdminId = $(this).closest("form").attr('id');
        adminId = chatAdminId.replace("admin", "");

        event.preventDefault();

        $("#adminChat" + adminId).submit();

        $.ajax({
            url: 'php/adminNamePHP.php',
            data: {chatID: adminId, FirstName:$("input[name='FirstName']").val(), LastName:$("input[name='LastName']").val()},
            type: 'POST',
            async: false,
            dataType: 'json',
            success: function (response) {

                $('#separateBox' + response.adminID).hide();
            }
        });
    });
});
