<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['system_logged_status'])&&$_SESSION['system_logged_status']!=true){?>
    <script type="text/javascript">
        window.location.replace("index.php");
    </script>
    <?php
}
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="bootstrap admin template">
    <meta name="author" content="">
    <title>Morecard | Dashboard</title>
    <link rel="apple-touch-icon" href="assets/images/apple-touch-icon.png">
    <link rel="shortcut icon" href="../images/More Logo.png">
    <!-- Stylesheets -->
    <link rel="stylesheet" href="resources/css/bootstrap.min.css">
    <link rel="stylesheet" href="resources/css/bootstrap-extend.min.css">
    <link rel="stylesheet" href="assets/css/site.min.css">
    <link rel="stylesheet" href="assets/css/site.css">
    <!-- Plugins -->
    <link rel="stylesheet" href="assets/examples/css/dashboard/v1.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
    <!-- Fonts -->
    <link rel="stylesheet" href="resources/fonts/weather-icons/weather-icons.css">
    <link rel="stylesheet" href="resources/fonts/web-icons/web-icons.min.css">
    <link rel="stylesheet" href="resources/fonts/brand-icons/brand-icons.min.css">
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>
    <!--[if lt IE 9]>
    <script src="resources/vendor/html5shiv/html5shiv.min.js"></script>
    <![endif]-->
    <!--[if lt IE 10]>
    <script src="resources/vendor/media-match/media.match.min.js"></script>
    <script src="resources/vendor/respond/respond.min.js"></script>
    <link rel="stylesheet" href="assets/examples/css/forms/advanced.css">
    <![endif]-->
    <!-- Scripts -->
    <script src="resources/vendor/breakpoints/breakpoints.js"></script>
    <script>
        Breakpoints();
    </script>
    <script src="//code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="../app/fancybox/jquery.fancybox.min.css" />
    <script src="../app/fancybox/jquery.fancybox.min.js"></script>
    <script src="../app/ckeditor/ckeditor.js"></script>
    <style>
        .table td, .table th {
            padding: 0.2rem !important;
            vertical-align: top;
            border-top: 1px solid #e4eaec;
        }
    </style>
    <script>
        ClassicEditor.create();
    </script>
</head>