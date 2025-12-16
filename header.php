<!DOCTYPE html>
<html lang="zxx">

<head>
 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="./gambar/sistem/logo.png">
    <title>BUG TRACKER</title>
    
    <meta name=googlebot content="index,follow" >
    <meta name=robots content="index,follow" >    

    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="assets2/css/bootstrap.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">
    <link rel="stylesheet" href="assets2/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="assets2/css/style.css" type="text/css">
    <link rel="stylesheet" href="assets2/css/bootstrap-datepicker.css" type="text/css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css" />
    <link href="assets2/css/carousel.css" rel="stylesheet" />
    <!-- <link href="assets2/css/style-hero.css" rel="stylesheet" /> -->

    

</head>

<body class="bg-light">
    <style type="text/css">
        body{
            font-family: "Open Sans";
            font-size: 0.9rem;
        }
    </style>

<style>
      .hero{
        min-height: 100vh;
      }

      .hero .hero-text{
        margin-top: 50px;
      }

      /* footer{
        position: relative;
        background-color: #006436;
      } */
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(0, 0, 0, 0.1);
        border: solid rgba(0, 0, 0, 0.15);
        border-width: 1px 0;
        box-shadow: inset 0 0.5em 1.5em rgba(0, 0, 0, 0.1),
          inset 0 0.125em 0.5em rgba(0, 0, 0, 0.15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -0.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }

      .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
      }

      .bd-mode-toggle {
        z-index: 1500;
      }

      .bd-mode-toggle .dropdown-menu .active .bi {
        display: block !important;
      }

      .navbar{
        position: fixed;
        z-index: 1000;
        width: 100%;
      }

      .bawah{
        /* background-color: #006436 !important; */
      }
    </style>

    <header>
    <div class="wrapper">
        <nav class="navbar navbar-expand-lg bg-gradient navbar-dark" style="border-bottom: 1px solid #006436;">
            <div class="container">
                <!--<a class="navbar-brand" href="index.php"><img style="height:20px" src="baru/images/h2logo.png" alt=""></a>-->
                <a class="navbar-brand" href="index.php"><img style="height:40px; width:40px" src="gambar/sistem/logo.png" alt="">
                <span style="font-size:14px; color:white">BUG TRACKER</span>
                </a>
                <button style="border: 1px solid; font-size:15px; color:white" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> 
                    <span class="navbar-toggler-icon"></span> Menu
                </button>
                <a class="nav-link text-white d-lg-none" href="login.php"> <i class="fa fa-sign-in"></i> Login/Masuk</a> 
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                   

                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active d-none  d-lg-block" href="login.php"> <i class="fa fa-sign-in"></i> Login/Masuk</a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
    </header>