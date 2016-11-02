


$(document).ready(function () {
    var name = "Crows";
    var userID;
        // if ($("#FirstName").val() != " "){
        //     $("input[name='FirstName']").change(function(){
        //
        //         name = $("#FirstName").val() + "  " + $("input[name=SurName]").val();
        //         userID =  $("input[name=Email]").val();
        //         var userIDOne =  $("input[name=Email]").val() + "One";
        //         $("#chat-wrap").attr('id', userIDOne);
        //         $("#sendie").attr('id', userID);
        //
        //         // display name on page
        //         $("#name-area").html("You are: <span>" + name + "</span>");
        //
        //     });
        // } else {
        //     name = "Crows";
        // }

    	// kick off chat
        var userIDSend = '"#' + userID + '"';
        var chat =  new Chat();
    	$(function() {

            $('textarea').click(function(){

        var idUser = this.id;

    		 chat.getState();
    		 // watch textarea for key presses
             $('"#' + this.id + '"').keydown(function(event) {

                 var key = event.which;

                 //all keys including return.
                 if (key >= 33) {

                     var maxLength = $(this).attr("maxlength");
                     var length = this.value.length;

                     // don't allow new content if length is maxed out
                     if (length >= maxLength) {
                         event.preventDefault();
                     }
                  }
                });
    		 // watch textarea for release of key press
    		 $(this.id).keyup(function(e) {

                    if (e.keyCode == 13) {

                        var text = $(this).val();
                        var maxLength = $(this).attr("maxlength");
                        var length = text.length;

                          // send
                          if (length <= maxLength + 1) {

                            chat.send(text, name);
                            $(this).val("");
                            chat.update();

                          } else {
                            $(this).val(text.substring(0, maxLength));
                          }
                    }
             });

    	});
    	});



         setInterval(function(){
             chat.update();
         }, 1000);

        // $(function() {

      // //      console.log("setNewDate: " + setNewDate);
      //     $("#datepicker").datepicker({
      //             changeMonth: true,
      //             changeYear: true,
      //         dateFormat: "dd-M-yy",
      //         onSelect: function (date) {
      //             var date2 = $('#datepicker').datepicker('getDate');
      //             date2.setDate(date2.getDate() + 1);
      //             $('#secondDate').datepicker('setDate', date2);
      //             //sets minDate to dt1 date + 1
      //             $('#secondDate').datepicker('option', 'minDate', date2);
      //         }
      //     });
      //     $('#secondDate').datepicker({
      //             changeMonth: true,
      //             changeYear: true,
      //         dateFormat: "dd-M-yy",
      //         onClose: function () {
      //             var dt1 = $('#datepicker').datepicker('getDate');
      //             var dt2 = $('#secondDate').datepicker('getDate');
      //             //check to prevent a user from entering a date below date of dt1
      //             if (dt2 <= dt1) {
      //                 var minDate = $('#secondDate').datepicker('option', 'minDate');
      //                 $('#secondDate').datepicker('setDate', minDate);
      //             }
      //         }
      //     });
      //
      //   });
        // for inputs out of Form - sessionStorage
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

});
