<?php
require_once("../util/dao-loader.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Everest</title>
    <link rel="icon" type="imagem/png" href="../web/images/logo_everest.png" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="../web/css/everest.css">
    <link rel="stylesheet" href="../web/css/home.css">
    <link rel="stylesheet" href="../web/css/about-us.css">
    <link rel="stylesheet" href="../web/css/forum.css">
    <script src="https://kit.fontawesome.com/5b48296146.js" crossorigin="anonymous"></script>
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />

    <script src="https://platform.linkedin.com/badges/js/profile.js" async defer type="text/javascript"></script>
</head>
<body class="my-bg-main">
    

    <div class="small-line-top">
    </div>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg bg-transparent">
    <div class="container-fluid">
        <a class="navbar-brand ms-5" href="../">Everest</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        </ul>
        <div class="d-flex">
            <ul class="navbar-nav me-5 mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./about-us.php">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./forum-everest.php">F??rum</a>
                </li>
                <li class="nav-item">
                    <a href="../#download-everest">
                        <button type="button" class="button-nav-everest">
                            Come??ar
                        </button>
                    </a>
                </li>
            </ul>
        </div>
        </div>
    </div>
    </nav>
    <!-- NAVBAR -->
    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" id="everestNotificationToast">
      <div class="toast-header">
        <img src="../web/images/logo_everest.png" id="logoToast" class="rounded me-2" alt="...">
        <strong class="me-auto">Everest</strong>
        <small>Now</small>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body">
        
      </div>
    </div>