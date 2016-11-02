

$(document).ready(function () {

  // $('.pointsExtraText a').popover({ container: 'body', data-html: 'true' }) ;

$(".close").on("click", function (){
    $("#privacyModal").hide();
});
$("#privacyModal").on("blur", function (){
    $("#privacyModal").hide();
});

// for menu to prevent pushing content
    $.support.transition = false;
    
  $(function () {
      $('[data-toggle="popover"]').popover();
  })

$('a.preventGoToTop ').click(function() {
        event.preventDefault();
});

    //enable the pointer events only on click;
    $('#googleMap').addClass('scrolloff');
    $('#canvas1').on('click', function () {
        $('#googleMap').removeClass('scrolloff');
    });

    //to disable pointer events when the mouse leave the canvas area;
    $('#googleMap').mouseleave(function () {
        $('#googleMap').addClass('scrolloff');
    });


$("#mobileDate").on('click', function () {
    $("#mobileDate").addClass("true");

});
    $(function() {
        $(' a[href^="' + window.location.href.split("/").pop()+ '"]').addClass('activeA');
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
    (function ($) {
        "use strict";

        /*------------------------------
         Go Top
         ------------------------------*/
        $('a[href="#top"]').click(function () {
            $('html, body').animate({scrollTop: 0}, 800);
            return false;
        });
    })(jQuery);

    $("#contactForm").validate({
        submitHandler: function () {
            var product_fields = $("#contactForm").serializeArray();
            $("#contactForm").trigger('reset');

            $.ajax({url: 'libs/contact_send_email.php',
                data: product_fields,
                type: 'POST',
                async: false,
                success: function () {
                    console.log("User Send Msg - OK!");
                }
            });
        }
    });
    $("#contactSend").unbind('click').click(function (event) {

        event.preventDefault();
        $("#contactForm").submit();
    });

    if (window.location.href.split("/").pop() === 'home')  {

        // owl carousel
         var owlFirst = $('.faq');
            owlFirst.owlCarousel({
                loop: true,
                autoplay: true,
                autoplayTimeout: 3000,
                autoplaySpeed: 3000,
                autoplayHoverPause: true,
                nav:true,
                navText: ["<img src='jscss/images/left.png'>", "<img src='jscss/images/right.png'>"],
                dots: false,
                responsive:{
                    0:{
                        items:1,
                        margin:5
                    },
                    600:{
                        items:2,
                        margin:10
                    },
                    1000:{
                        items:3,
                        margin:10
                    }
                }
            });
        owlFirst.trigger('play.owlFirst.autoplay',[3000]);
            var owlTwo = $('.feedbacks');
            owlTwo.owlCarousel({
                items: 1,
                loop: true,
                autoplay: true,
                autoplayTimeout: 3000,
                autoplaySpeed: 3000,
                autoplayHoverPause: true,
                center: true
            });
        owlTwo.trigger('play.owlTwo.autoplay',[3000]);
      };
});
