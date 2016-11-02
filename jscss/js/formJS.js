

$(document).ready(function () {

$("#mobileDate").on('click', function () {
    $("#mobileDate").addClass("true");

});

// for inputs out of Form - sessionStorage
var setElementValue;
$('input, select').click( function(e){
    setElementValue = e.currentTarget.name;
        $(this).on("change",function () {
            sessionStorage.setItem((setElementValue+setElementValue), this.value);
        });
    });
var getElementValue;
$('input, select').each(function() {
     getElementValue = $(this).attr("name");
        if (sessionStorage.getItem(getElementValue+getElementValue)) {
            $(this).val(sessionStorage.getItem(getElementValue+getElementValue));
        };
});
    $("select").change( function(){
        var second = ["0", "1"];
        var leaveHere = +$('select[name=MonthsSinceLivingHere]').val() + +$('select[name=YearsSinceLivingHere]').val() * 12;
        var leaveHere1 = +$('select[name=MonthsSinceLivingHere]').val() + +$('select[name=YearsSinceLivingHere]').val() * 12 + +$('select[name=MonthsSinceLivingHere1]').val()
            + +$('select[name=YearsSinceLivingHere1]').val() * 12;
        if (($('select[name=MonthsSinceLivingHere]').val() != "") && ( leaveHere <= 36 )){
            $("#secondAddress").show('slow');
        } else {
            $("#secondAddress").hide('slow');
        }
        if (($('select[name=MonthsSinceLivingHere1]').val() != "") && ( leaveHere1 <= 36 )){
            $("#thirdAddress").show('slow');
        } else {
            $("#thirdAddress").hide('slow');
        }
        if (($('select[name=MonthsWithEmployer]').val() != "") && ($.inArray( $('select[name=YearsWithEmployer]').val(), second ) > -1)){
            $("#secondEmployement").show('slow');
        } else {
            $("#secondEmployement").hide('slow');
        }
    });

    $('#DateOfBirth').pickadate({
        format: 'dd/mm/yyyy',
        selectMonths: true,
        selectYears: 80,
        max: -6574
    });
    jQuery.extend(jQuery.validator.messages, {
        required: "Please, fill this field.",
        remote: "Please take attention at this field.",
        email: "It's not a valid email address.",
        date: "Something is wrong with date.",
        number: "It's not a number.",
        digits: "There must be only digits.",
        maxlength: jQuery.validator.format("Please enter no more than {0} characters."),
        minlength: jQuery.validator.format("Please enter at least {2} characters."),
        rangelength: jQuery.validator.format("Please enter a value between {0} and {1} characters long."),
        range: jQuery.validator.format("Please enter a value between {0} and {1}."),
        max: jQuery.validator.format("Please enter a value less than or equal to {0}."),
        min: jQuery.validator.format("Please enter a value greater than or equal to {0}.")
    });
    $.validator.setDefaults({
        onkeyup: false,
        ignore: [],
        invalidHandler: function (form, validator) {
            var errors = validator.numberOfInvalids();
            if (errors > '1') {
                var ErrMsg = 'fields';
            }
            if (errors === '1') {
                var ErrMsg = 'field';
            }
            var ErrMsg1 = validator.errorList[0].message;
            if (errors) {
                validator.errorList[0].element.focus();
            }
        },
        rules: {
            Salutation: {required: true},
            FirstName: {required: true, letters: true, minlength: 2},
            Surname: {required: true, letters: true, minlength: 2},
            DateOfBirth: {required: true},
            EmailAddress: {required: true, email: true},
            Telephone: {required: true, UKmobile: true},
            MaritalStatus: {required: true},
            LicenceType: {required: true},
            PostalCode: {required: true, UKpostcode: true},
            Street: {required: true},
            TownCity: {required: true},
            County: {required: true},
            HouseNo: {required: true},
            ResidentialStatus: {required: true},
            MonthsSinceLivingHere: {required: true},
            YearsSinceLivingHere: {required: true},
            PostalCode1: {required: true},
            Street1: {required: true},
            TownCity1: {required: true},
            County1: {required: true},
            HouseNo1: {required: true},
            ResidentialStatus1: {required: true},
            MonthsSinceLivingHere1: {required: true},
            YearsSinceLivingHere1: {required: true},
            PostalCode2: {required: true, UKpostcode: true},
            Street2: {required: true},
            TownCity2: {required: true},
            County2: {required: true},
            HouseNo2: {required: true},
            ResidentialStatus2: {required: true},
            MonthsSinceLivingHere2: {required: true},
            YearsSinceLivingHere2: {required: true},
            Occupation: {required: true},
            Employer: {required: true},
            EmploymentStatus: {required: true},
            AddressNameNumber: {required: true},
            Street3: {required: true},
            TownCity3: {required: true},
            PostalCode3: {required: true, UKpostcode: true},
            County3: {required: true},
            TakeHomePay: {required: true},
            PaymentFrequency: {required: true},
            MonthsWithEmployer: {required: true},
            YearsWithEmployer: {required: true},
            Occupation1: {required: true},
            Employer1: {required: true},
            EmploymentStatus1: {required: true},
            AddressNameNumber1: {required: true},
            Street4: {required: true},
            TownCity4: {required: true},
            PostalCode4: {required: true, UKpostcode: true},
            County4: {required: true},
            TakeHomePay1: {required: true},
            PaymentFrequency1: {required: true},
            MonthsWithEmployer1: {required: true},
            contact_name: {required: true},
            contact_email: {required: true, email: true},
            contact_content: {required: true},
            YearsWithEmployer1: {required: true}
        },
        highlight: function (element) {
            $(element).closest('input, select').addClass('has-error');
        },
        unhighlight: function (element) {
            $(element).closest('input, select').removeClass('has-error');
        },
        errorElement: 'span',
        errorClass: 'help-block',
        errorPlacement: function (error, element) {
            if (element.parent('fieldset').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        }
    });

    $("#firstApply").validate({
        ignore: ":hidden",
        submitHandler: function () {
            window.location = 'quote';
        }
    });

    $("#applyFirst").click(function () {
        event.preventDefault();
        $("#firstApply").submit();
    });

    $("#applyForm").validate({
        ignore: ":hidden",
        submitHandler: function () {

            setTimeout(function () {
                var product_fields = $("#applyForm").serializeArray();
                $("#applyForm").trigger('reset');

                $.ajax({
                    url: 'libs/send.php',
                    data: product_fields,
                    type: 'POST',
                    async: false,
                    success: function () {
                        window.location = 'thank_you';
                        sessionStorage.clear();
//                        create_cookie(cookie_name, 'succsses', 1, "/");
//                        $('#report_button').hide();
                    }
                });
            }, 2000);

        }
    });

    $("#apply").click(function () {

        event.preventDefault();
        $("#applyForm").submit();
    });
    $("#contactForm").validate({

        submitHandler: function () {
            var product_fields = $("#contactForm").serializeArray();
            $("#contactForm").trigger('reset');

            $.ajax({url: 'libs/contact_send_email.php',
                data: product_fields,
                type: 'POST',
                async: false,
                success: function () {
                    alert('Ho - Ho - Ho');
                }
            });
        }
    });

    $("#contactSend").unbind('click').click(function (event) {

        event.preventDefault();
        $("#contactForm").submit();

    });
    
});
