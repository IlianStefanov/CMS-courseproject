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
    <link rel="stylesheet" type="text/css" href="css/slick.css"/> 
    <link rel="stylesheet" href="js/sweetalert-master/dist/sweetalert.css">
    <link href="css/loader.css" rel="stylesheet" type="text/css">
    
    <script src="http://www.jacklmoore.com/colorbox/jquery.colorbox.js"></script>
    <script src="js/tinymce/js/tinymce.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropit/0.5.1/jquery.cropit.js"></script>


    <script>
    
      tinymce.init({
      selector: 'textarea',
      height: 200,
      theme: 'modern',
      plugins: [
        'advlist autolink lists link image charmap print preview hr anchor pagebreak',
        'searchreplace wordcount visualblocks visualchars code fullscreen',
        'insertdatetime media nonbreaking save table contextmenu directionality',
        'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc'
      ],
      toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
      toolbar2: 'print preview media | forecolor backcolor emoticons | codesample',
      image_advtab: true,
      templates: [
        { title: 'Test template 1', content: 'Test 1' },
        { title: 'Test template 2', content: 'Test 2' }
      ],
      content_css: [
        '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
        '//www.tinymce.com/css/codepen.min.css'
      ]
      });
        
    </script>
      
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

<body>
<a class="scrollToTop" href="#" style="display: inline;"><i class="fa fa-chevron-up"></i></a>
<div id="image-cropper" style="display:none;">
  <div class="cropit-preview"></div>
  
  <input type="range" class="cropit-image-zoom-input" />
  
  <!-- The actual file input will be hidden -->
  <input type="file" class="cropit-image-input" />
  <!-- And clicking on this button will open up select file dialog -->
  <div class="select-image-btn">Select new image</div>
</div>