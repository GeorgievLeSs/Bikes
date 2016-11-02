


$(document).ready(function () {
    var name = "Crows";
    var userID;
        if ($("#FirstName").val() != " "){
            $("input[name='FirstName']").change(function(){

                name = $("#FirstName").val() + "  " + $("input[name=SurName]").val();
                console.log("Second: "+$("#FirstName").val());
                userID =  $("input[name=Email]").val();
                var userIDOne =  $("input[name=Email]").val() + "One";
                $("#chat-wrap").attr('id', userIDOne);
                $("#sendie").attr('id', userID);

                // display name on page
                $("#name-area").html("You are: <span>" + name + "</span>");

            });
        } else {
            name = "Crows";
        }
        console.log("First: "+$("#FirstName").val());

    	// kick off chat
        var userIDSend = '"#' + userID + '"';
        var chat =  new Chat();
    	$(function() {

            $('textarea').click(function(){
//    		 console.log(userIDSend);
        var idUser = this.id;
    		 console.log("Before: " + this.id);
    		 console.log("BeforeA: " + idUser);

    		 chat.getState();
    		 // watch textarea for key presses
             $('"#' + this.id + '"').keydown(function(event) {
    		 console.log("Key down: " + this.id);
    		 console.log("Key downA: " + idUser);

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
//     $(document).on("load", function(){
         console.log("work");
//     });

        $(function() {

      //      console.log("setNewDate: " + setNewDate);
          $("#datepicker").datepicker({
                  changeMonth: true,
                  changeYear: true,
              dateFormat: "dd-M-yy",
              onSelect: function (date) {
                  var date2 = $('#datepicker').datepicker('getDate');
                  date2.setDate(date2.getDate() + 1);
                  $('#secondDate').datepicker('setDate', date2);
                  //sets minDate to dt1 date + 1
                  $('#secondDate').datepicker('option', 'minDate', date2);
              }
          });
          $('#secondDate').datepicker({
                  changeMonth: true,
                  changeYear: true,
              dateFormat: "dd-M-yy",
              onClose: function () {
                  var dt1 = $('#datepicker').datepicker('getDate');
                  var dt2 = $('#secondDate').datepicker('getDate');
                  //check to prevent a user from entering a date below date of dt1
                  if (dt2 <= dt1) {
                      var minDate = $('#secondDate').datepicker('option', 'minDate');
                      $('#secondDate').datepicker('setDate', minDate);
                  }
              }
          });

        });
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
        //// catching all input names:
//        $(":input").each(function(){
//            var allInputs = $(this); // This is the jquery object of the input, do what you will
//    console.log (allInputs.attr('name'));
//           });
    $.validator.setDefaults({
        onkeyup: false,
        ignore: "hidden",
        messages: {
            Salutation: 'Please enter title',
            FirstName: 'Please enter first name',
            Surname: 'Please enter surname',
            Telephone: 'Please enter mobile number',
            Birth_Date: 'Please enter birthday',
            EmailAddress: 'Please enter email',
            MaritalStatus: 'Please enter house number',
            LicenceType: 'Please enter daytime number',
            PostalCode: 'Please enter post code'
        },
        rules: {
            Salutation: {required: true},
            FirstName: {required: true, letters: true, minlength: 2},
            Surname: {required: true, letters: true, minlength: 2},
            Birth_Date: {required: true},
            EmailAddress: {required: true, email: true},
            Telephone: {required: true, UKmobile: true},
            MaritalStatus: {required: true},
            LicenceType: {required: true},
            PostalCode: {required: true},
            Street: {required: true},
            TownCity: {required: true},
            County: {required: true},
            HouseNo: {required: true},
            ResidentialStatus: {required: true},
            MonthsSinceLivingHere: {required: true},
            First_Name: {required: true},
            Last_Name: {required: true},
            City: {required: true},
            Country: {required: true},
            Mobile_Phone: {required: true},
            Second_Phone: {required: true},
            Color: {required: true},
            Car: {required: true},
            Motorcicle: {required: true},
            Music: {required: true},
            Partners: {required: true},
            Vacation: {required: true},
            Best_Vacation: {required: true},
            Job: {required: true},
            Best_Salary: {required: true},
            Your_Age: {required: true},
            Best_Friends: {required: true},
            Top_Speed: {required: true},
            Are_You_Smoke: {required: true},
            How_Long: {required: true},
            apply_form: {required: true}
        }
    });

    $("#firstApply").validate({
        submitHandler: function () {

            setTimeout(function () {
                var product_fields = $("#firstApply").serializeArray();

                $.ajax({
                    url: 'php/phpChat/php.php',
                    data: product_fields,
                    type: 'POST',
                    async: false,
                    success: function () {
                        window.location = 'error';
                    }
                });
            }, 2000);

        }
    });

    $("#applyFirst").click(function () {
        event.preventDefault();
        $("#firstApply").submit();
    });

    $("#chatForm").validate({
        submitHandler: function () {

            setTimeout(function () {
                var product_fields = $("#chatForm").serializeArray();

                $.ajax({
                    url: 'php/phpChat/php.php',
//                    url: 'php/process.php',
                    data: product_fields,
                    type: 'POST',
                    async: false,
                    success: function () {
                        $("#chatFormUser").hide();
                    }
                });
            }, 2000);

        }
    });

    $("#btnChatForm").click(function () {
        event.preventDefault();
        $("#chatForm").submit();
    });
});
