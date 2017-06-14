<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog Home - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/blog-home.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="admin/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
    <!-- Slick slider -->
    <link rel="stylesheet" type="text/css" href="css/slick.css" />
    <link rel="stylesheet" href="js/sweetalert-master/dist/sweetalert.css">
    <link href="css/loader.css" rel="stylesheet" type="text/css">

    <script src="http://www.jacklmoore.com/colorbox/jquery.colorbox.js"></script>
    <script src="js/tinymce/js/tinymce.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropit/0.5.1/jquery.cropit.js"></script>




    <script>
        
        $('#image-cropper').cropit();

        // When user clicks select image button,
        // open select file dialog programmatically
        $('.select-image-btn').click(function() {
            $('.cropit-image-input').click();
        });

        // Handle rotation
        $('.rotate-cw-btn').click(function() {
            $('#image-cropper').cropit('rotateCW');
        });
        $('.rotate-ccw-btn').click(function() {
            $('#image-cropper').cropit('rotateCCW');
        });

    </script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="contacts_bg">
    <?php 
    include "includes/db.php"; 
    ob_start();
    session_start();
    include "admin/functions.php";

    
    // Navigation bar
    include "includes/navbar.php";
    send_emails();
?>
    <a class="scrollToTop" href="#" style="display: inline;"><i class="fa fa-chevron-up"></i></a>
    <div id="image-cropper" style="display:none;">
        <div class="cropit-preview"></div>

        <input type="range" class="cropit-image-zoom-input" />

        <!-- The actual file input will be hidden -->
        <input type="file" class="cropit-image-input" />
        <!-- And clicking on this button will open up select file dialog -->
        <div class="select-image-btn">Select new image</div>
    </div>



        
    <div class="container" id="header-container">
        <div class="row">
            <div class="col-md-8" id="contacts_header_col">
                <!--            <div class="box-effect"></div>-->
                <h1 class="contacts-header">
                    <span class="effect">Get in</span> Touch <br> <span class="effect2"> with us</span>
                </h1>


            </div>
        </div>
    </div>
    <div class="container" id="container-contacts">



        <div class="row inner-container">
            <div class="col-md-12" id="row">
                <form class="form-inline" id="email_form" action="" method="post" enctype="multipart/form-data">

                    <div class="form-group col-sm-12 col-xs-12">
                        <input type="text" class="contacts-style form-control" name="to"  placeholder="To">
                    </div>

                    <div class="form-group col-sm-12 col-xs-12">
                        <input type="text" class="contacts-style form-control" name="subject" placeholder="Subject">
                    </div>

                    <div class="form-group col-sm-12 col-xs-12">
                        <input type="email" class="contacts-style form-control" name="receive_email" placeholder="Email">
                    </div>

                     <div class="form-group col-sm-12 col-xs-12">
                        <textarea name="message" class="contacts-style form-control" id="message" cols="30" rows="4" placeholder="Message"></textarea>
                    </div>

                    <div class="send-button form-group col-sm-12">
                        <button type="submit" class="btn btn-default send-email" name="send_email_button">SEND</button>
                    </div>
                    
                </form>
            </div>

        </div>
    </div>

    <div class="container">
        
        <div class="row">
            <div class="col-xs-6 col-md-3">
                <a href="#" class="thumbnail">
                    <img src="http://i.imgur.com/JVX4l.jpg" alt="...">
                </a>
            </div>
            
            <div class="col-xs-6 col-md-3">
                <a href="#" class="thumbnail">
                    <img src="http://i.imgur.com/JVX4l.jpg" alt="...">
                </a>
            </div>
            
            <div class="col-xs-6 col-md-3">
                <a href="#" class="thumbnail">
                    <img src="http://i.imgur.com/JVX4l.jpg" alt="...">
                </a>
            </div>
            
            <div class="col-xs-6 col-md-3">
                <a href="#" class="thumbnail">
                    <img src="http://i.imgur.com/JVX4l.jpg" alt="...">
                </a>
            </div>
            
        </div>
        
    </div>

    <!-- /.row -->
    <!-- <hr> -->


    <?php include "includes/footer.php"; ?>
