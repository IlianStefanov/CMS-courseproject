var div_box = "<div id='load-screen'><div id='loading'></div></div>";

$("body").prepend(div_box);

$("#load-screen").delay(700).fadeOut(600, function() {
    $(this).remove();
});


$(document).on('click','send-email', function() {
    $('.send-email').preventDefault();
    
});

jQuery(window).scroll(function () {
    if ($(this).scrollTop() > 400) {
        $('.scrollToTop').fadeIn();
    } else {
        $('.scrollToTop').fadeOut();
    }
});

//Click event to scroll to top

jQuery('.scrollToTop').click(function () {
    $('html, body').animate({
        scrollTop: 0
    }, 800);
    return false;
});

wow = new WOW({
    animateClass: 'animated',
    offset: 100,
    callback: function (box) {
        console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
    }
});
wow.init();



$(function () {
    var footerColSocial = $(".footer-social");
    var footerColSearch = $(".footer-ns");
    $(window).resize(function () {
        var width = $(window).width();

        if (width <= 500) {
            footerColSocial.removeClass('col-xs-6').addClass("col-xs-12");
            footerColSearch.removeClass('col-xs-6').addClass("col-xs-12");
        } else {
            footerColSocial.removeClass("col-xs-12").addClass('col-xs-6');
            footerColSearch.removeClass('col-xs-12').addClass("col-xs-6");
        }
    });
});


$(document).ready(function () {
    var sidebars = $('.fixed-sidebar');
    sidebars.each(function (i) {
        var summary = $(sidebars[i]);
        var next = sidebars[i + 1];

        summary.scrollToFixed({
            marginTop: $('.navbar').outerHeight(true) + 10,
            limit: function () {
                var limit = 0;
                if (next) {
                    limit = $(next).offset().top - $(this).outerHeight(true) - 30;
                } else {
                    limit = $('.footer-bs').offset().top - $(this).outerHeight(true) - 10;
                }
                return limit;
            },
            zIndex: 999
        });
    });
});




$(document).ready(function () {
    $('#simple_error').click(function () {
        sweetAlert("Error", "Simple Error Message!", "error");
    });

    $('#simple_success').click(function () {
        sweetAlert("Success", "Simple Success Message!", "success");
});




    $('#add_user').on('submit', function (e) {
        e.preventDefault();
        sweetAlert("Success", "Simple Success Message!", "success", {
            title: "Auto close alert!",
            text: "I will close in 2 seconds.",
            timer: 2000,
            showConfirmButton: false
        });


    });


    $('#simple_warning').click(function () {
        sweetAlert("Warning", "You Are Doing Something Dangerous!", "warning");
    });

    $('#simple_msg').click(function () {
        sweetAlert("Just Message");
    });


    $('#confirm_btn1').click(function () {
        sweetAlert({
                title: "Are you sure?",
                text: "You will not be able to recover this imaginary file!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Ok",
                closeOnConfirm: false
            },
            function () {
                sweetAlert("Deleted!", "Your imaginary file has been deleted.", "success");
            });
    })

    $('#confirm_btn2').click(function () {
        sweetAlert({
                title: "Are you sure?",
                text: "You will not be able to recover this imaginary file!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Ok",
                cancelButtonText: "Cancel",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function (isConfirm) {
                if (isConfirm) {
                    sweetAlert("Deleted!", "Your imaginary file has been deleted.", "success");
                } else {
                    sweetAlert("Cancelled", "Your imaginary file is safe :)", "error");
                }
            });
    });

    $('#custom_content1').click(function () {
        sweetAlert({
            title: "Custom Image",
            imageUrl: "http://tech4bros.com/wp-content/uploads/2015/08/unblock-blocked-websites.png"
        });
    });

    $('#custom_content2').click(function () {
        sweetAlert({
            title: "HTML <small>Title</small>!",
            text: 'A custom <span style="color:#F8BB86">html<span> message.',
            html: true
        });
    });

    $('#auto_close').click(function () {
        sweetAlert({
            title: "Auto close alert!",
            text: "I will close in 2 seconds.",
            timer: 2000,
            showConfirmButton: false
        });
    });
    
    
    

    $('#prompt').click(function () {
        sweetAlert({
                title: "An input!",
                text: "Write something interesting:",
                type: "input",
                showCancelButton: true,
                closeOnConfirm: false,
                animation: "slide-from-top",
                inputPlaceholder: "Write something"
            },
            function (inputValue) {
                if (inputValue === false) return false;

                if (inputValue === "") {
                    sweetAlert.showInputError("You need to write something!");
                    return false
                }

                sweetAlert("Nice!", "You wrote: " + inputValue, "success");
            });
    });

    $('#ajax_request').click(function () {
        sweetAlert({
                title: "Ajax request example",
                text: "Submit to run ajax request",
                type: "info",
                showCancelButton: true,
                closeOnConfirm: false,
                showLoaderOnConfirm: true,
            },
            function () {
                setTimeout(function () {
                    sweetAlert("Ajax request finished!");
                }, 2000);
            });
    })
});





$(document).ready(function() {
    $('#selectAllBoxes').click(function(event) {
        if(this.checked) {
            $('.checkBoxes').each(function() {
                this.checked = true;
            });
        } else {
            $('.checkBoxes').each(function() {
                this.checked = false;
            });
        }
    }); 
});



$(document).ready(function () {
	$('.ellipsis').trunk8({
        lines: 10
    });
});

$(document).on('click','pagination-item', function() {
    $('.pagination-link').preventDefault();
    if ($(this).hasClass('is-active')) {
        $(this).removeClass('active');
    } else {
        $(this).addClass('is-active');
    }
});


$(document).ready(function () {
    var sidebars = $('.sticky-pagination');
    sidebars.each(function (i) {
        var summary = $(sidebars[i]);
        var next = sidebars[i + 1];

        summary.scrollToFixed({
            marginTop: $('.navbar').outerHeight(true),
            limit: function () {
                var limit = 0;
                if (next) {
                    limit = $(next).offset().top - $(this).outerHeight(true) - 30;
                } else {
                    limit = $('.footer-bs').offset().top - $(this).outerHeight(true) - 10;  
                }
                return limit;
            },
            zIndex: 999
        });
    });
});


var div_box = "<div id='load-screen'><div id='loading'></div></div>";

$("body").prepend(div_box);

$("#load-screen").delay(700).fadeOut(600, function() {
    $(this).remove();
});


//function loadUsersOnline() {
//    $.get("functions.php?onlineusers=result", function(data) {
//        $(".usersonline").text(data); 
//    });
//}
//
//
//setInterval(function() {
//    loadUsersOnline();
//}, 500);




















































































//
//$("#reg_form").submit(function(e){
//    e.preventDefault();
//    $("#mymodal1").modal("show");
//    // get value from ajax call here, update html and href in form.
//    
//    return false;
//});
//$(document).ready(function ($) {
//    // Defining a function to set size for #hero 
//    function fullscreen() {
//        vpw = $(window).width();
//        vph = $(window).height();
//        $('#enquirypopup').height(vph);
//    }
//
//    fullscreen();
//    // Run the function in case of window resize
//    jQuery(window).resize(function () {
//        fullscreen();
//    });
//});

//<div class="container">
//<div class="row">
//        <div class="com-md-12">
//<div class="notification login-alert">
//  Please Enter Your Username And Password!
//</div>
//<div class="notification notification-success logged-out">
//  You logged out successfully!
//</div>
//          <div class="well welcome-text">
//                Hello, to access our app please <button class="btn btn-default btn-login">Log in</button> or <button class="btn btn-default btn-register" disabled="disabled">Register</button>
//            </div>
//        </div>
//    </div>
//</div>
//<div class="container">
//    <div class="row">
//        <div class="col-md-12">
//            <div class="well login-box">
//                <form action="">
//                    <legend>Login</legend>
//                    <div class="form-group">
//                        <label for="username-email">E-mail or Username</label>
//                        <input value='' id="username-email" placeholder="E-mail or Username" type="text" class="form-control" />
//                    </div>
//                    <div class="form-group">
//                        <label for="password">Password</label>
//                        <input id="password" value='' placeholder="Password" type="text" class="form-control" />
//                    </div>
//                    <div class="form-group text-center">
//                        <button class="btn btn-danger btn-cancel-action">Cancel</button>
//                        <input type="submit" class="btn btn-success btn-login-submit" value="Login" />
//                    </div>
//                </form>
//            </div>
//          <div class="logged-in well">
//            <h1>You are loged in! <div class="pull-right"><button class="btn-logout btn btn-danger"><span class="glyphicon glyphicon-off"></span> Logout</button></div></h1>
//          </div>
//        </div>
//    </div>
//</div>

//$(document).ready(function() {
//    function varticalCenterStuff() {
//        var windowHeight = $(window).height();
//        var loginBoxHeight = $('.modal-dialog').innerHeight();
//    //    var welcomeTextHeight = $('.welcome-text').innerHeight();
//    //    var loggedIn = $('.logged-in').innerHeight();
//
//        var mathLogin = (windowHeight / 2) - (loginBoxHeight / 2);
//    //    var mathWelcomeText = (windowHeight / 2) - (welcomeTextHeight / 2);
//    //    var mathLoggedIn = (windowHeight / 2) - (loggedIn / 2);
//        $('.modal-dialog').css('margin-top', mathLogin);
//    //    $('.welcome-text').css('margin-top', mathWelcomeText);
//    //    $('.logged-in').css('margin-top', mathLoggedIn);
//    }
//    $(window).resize(function () {
//        varticalCenterStuff();
//    });
//    varticalCenterStuff();
//
//     //awesomeness
//    $('.btn-login').click(function(){
//        $(this).parent().fadeOut(function(){
//            $('.login-box').fadeIn();
//        })
//    });
//
//    $('.btn-cancel-action').click(function(e){
//        e.preventDefault();
//        $(this).parent().parent().parent().fadeOut(function(){
//            $('.welcome-text').fadeIn();
//        })
//    });
//
//    $('.btn-login-submit').click(function(e){
//      e.preventDefault();
//
//      var element = $(this).parent().parent().parent();
//
//      var usernameEmail = $('#exampleInputEmail2').val();
//      var password = $('#exampleInputPassword2').val();
//
//      if(usernameEmail == '' || password == ''){
//
//        // wigle and show notification
//        // Wigle
//        var element = $(this).parent().parent().parent();
//        $(element).addClass('animated rubberBand');  
//        $(element).one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
//          $(element).removeClass('animated rubberBand');
//        });
//
//        // Notification
//        // reset
//        $('.notification.login-alert').removeClass('bounceOutRight notification-show animated bounceInRight');
//        // show notification
//        $('.notification.login-alert').addClass('notification-show animated bounceInRight');
//
//        $('.notification.login-alert').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
//            setTimeout(function(){
//                $('.notification.login-alert').addClass('animated bounceOutRight');
//            }, 2000);
//        });
//      }else{
//        $(element).fadeOut(function(){
//          $('.logged-in').fadeIn();
//        });
//      }//endif
//    });
//
//
//    $('a.btn-logout').click(function(){
//         
//       $('.logged-in').fadeOut(function(){
//             });
//        
//         $('.welcome-text').fadeIn();
//         // Notification
//         $('.notification.logged-out').removeClass('bounceOutRight notification-show animated bounceInRight');
//        // show notification
//        $('.notification.logged-out').addClass('notification-show animated bounceInRight');
//
//        $('.notification.logged-out').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
//            setTimeout(function(){
//                $('.notification.logged-out').addClass('animated bounceOutRight');
//            }, 2000);
//        });
//
//     
//    });
//    
//    $('.btn-login-submit').click(function(){
//         var alertSuccessLogin = $('.notification');
//       $('.logged-in').fadeOut(function(){
//             });
//        
//         $('.welcome-text').fadeIn();
//         // Notification
//         $('.notification.logged-out').removeClass('bounceOutRight notification-show animated bounceInRight');
//        // show notification
//        alertSuccessLogin
//        $('.notification.logged-out').addClass('notification-show animated bounceInRight');
//
//        $('.notification.logged-out').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
//            setTimeout(function(){
//                $('.notification.logged-out').addClass('animated bounceOutRight');
//            }, 2000);
//        });
//
//     
//    });
//
//  });

//$(document).ready(function() {
//    $( ".btn-login-submit" ).click(function() {
////        $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );
//          var successAlert = $('.notification');
//          successAlert.removeClass('logged-out');
//          successAlert.addClass('logged-in animated bounceInRight');
//    });

//    $( "#login_btn" ).click(function() {
//        $( "div.failure" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );
//    });
//
//    $( "#warning-btn" ).click(function() {
//        $( "div.warning" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );
//    });
//});   