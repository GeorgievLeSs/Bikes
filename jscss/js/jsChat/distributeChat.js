
$(document).ready(function () {
    
// admin take chat
var adminId;

    $(".adminGetChat").click(function(){
        
        event.preventDefault();
        var chatAdminId = $(this).closest("form").attr('id');
        adminId = chatAdminId.replace("admin", "")

        event.preventDefault();
        $("#admin" + adminId).submit();
        $.ajax({
            url: 'php/phpChat/adminNamePHP.php',
            data: {chatID:adminId, FirstName:$("input[name='FirstName']").val(), LastName:$("input[name='LastName']").val()},
            type: 'POST',
            async: false,
            success: function () {
                
                $('#separateBox' + adminId).hide();
            }
        });
    });
});

