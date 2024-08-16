<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="keyword" content="" />
    <meta name="author" content="theme_ocean" />
    <!--! The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags !-->
    <!--! BEGIN: Apps Title-->
    <title>ADMANA</title>
    <!--! END:  Apps Title-->
    <!--! BEGIN: Favicon-->
    <link rel="shortcut icon" type="image/x-icon" href="/assets/images/logo-admana.png" />
    <!--! END: Favicon-->
    <!--! BEGIN: Bootstrap CSS-->
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css" />
    <!--! END: Bootstrap CSS-->
    <!--! BEGIN: Vendors CSS-->
    <link rel="stylesheet" type="text/css" href="../assets/vendors/css/vendors.min.css" />
    <link rel="stylesheet" type="text/css" href="../assets/vendors/css/daterangepicker.min.css" />
    <!--! END: Vendors CSS-->
    <!--! BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../assets/css/theme.min.css" />
    <!--! END: Custom CSS-->
    <!--! HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries !-->
    <!--! WARNING: Respond.js doesn"t work if you view the page via file: !-->
    <!--[if lt IE 9]>
			<script src="https:oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https:oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->




    
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keyword" content="">
    <meta name="author" content="theme_ocean">
    <!--! The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags !-->
    <!--! BEGIN: Apps Title-->
    <title>Duralux || Customers Create</title>
    <!--! END:  Apps Title-->
    <!--! BEGIN: Favicon-->
    <link rel="shortcut icon" type="image/x-icon" href="../assets/images/favicon.ico">
    <!--! END: Favicon-->
    <!--! BEGIN: Bootstrap CSS-->
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <!--! END: Bootstrap CSS-->
    <!--! BEGIN: Vendors CSS-->
    <link rel="stylesheet" type="text/css" href="../assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/vendors/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/vendors/css/select2-theme.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/vendors/css/datepicker.min.css">
    <!--! END: Vendors CSS-->
    <!--! BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../assets/css/theme.min.css">
    <!--! END: Custom CSS-->
    <!--! HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries !-->
    <!--! WARNING: Respond.js doesn"t work if you view the page via file: !-->
    <!--[if lt IE 9]>
			<script src="https:oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https:oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
</head>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animated Slideshow Background</title>
    <style>
        .main-content {
            position: relative;
            height: 100vh;
        }
        .background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            transition: filter 0.3s ease, opacity 1s ease-in-out;
            opacity: 0;
        }
        .background.active {
            opacity: 1;
        }
        .card:hover .background {
            filter: blur(8px);
        }
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
        }
        .card-body {
            position: relative;
            z-index: 1;
            text-align: center;
            color: white;**
            display: flex;
            flex-direction: column;
            justify-content: center;
            height: 100%;
        }
        .card-body h2,
        .card-body img {
          opacity: 0;
          animation: fadeInText 2s ease-in-out forwards;
          color: white; /* Explicitly setting text color to white */
          text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7); /* Adding text shadow */
        }

        .card-body img {
          animation-delay: 2s;
          box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7); /* Adding box shadow to the image */
        }

        .card-body h2:nth-of-type(1) {
            animation-delay: 1s;
        }
        .card-body img {
            animation-delay: 2s;
        }
        .card-body h2:nth-of-type(2) {
            animation-delay: 3s;
        }
        @keyframes fadeInText {
            0% { opacity: 0; transform: translateY(-20px); }
            100% { opacity: 1; transform: translateY(0); }
        }

    </style>

    <style>
    .card-header-btn {
        display: flex;
        gap: 10px;
    }

    .btn-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .btn-icon i {
        font-size: 18px;
        color: #fff;
    }

    .btn-icon:hover {
        transform: scale(1.1);
    }

    .tooltip-wrapper {
        position: relative;
    }

    .tooltip-wrapper:hover .btn-icon {
        background-color: #333;
    }
    </style>

    <!-- Include Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-d49XyWwIs9y+2XzMn/K1/+DY+BqYz2JMR2gxEXlElDe/x9DWvpuwApt1/6NJ/+Trw6UAlkIw+ppT+Faf+ROccA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>