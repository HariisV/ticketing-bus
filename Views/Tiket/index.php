<?php 
    error_reporting(E_ALL & ~E_NOTICE);
    session_start();
    if(isset($_SESSION['email'])){ //if login in session is not set
       
    }else{
        header("Location: ../Auth/signin.php");
    }
 ?>
<html>
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
<title>Tiket Online | Tiket</title>
<link rel="preconnect" href="https://fonts.gstatic.com/" />
<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;700&amp;display=swap" rel="stylesheet" />
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&amp;display=swap" rel="stylesheet" />
<link rel="stylesheet" href="../../Public/font/CS-Interface/style.css" />
<link rel="stylesheet" href="../../Public/css/vendor/bootstrap.min.css" />
<link rel="stylesheet" href="../../Public/css/vendor/OverlayScrollbars.min.css" />
<link rel="stylesheet" href="../../Public/css/styles.css" />
<link rel="stylesheet" href="../../Public/css/main.css" />
<link rel="stylesheet" href="../../Public/js/datatable/datatables.min.css">
<script src="../../Public/js/base/loader.js"></script>

</head>
<body>
<div id="root">
    <div id="nav" class="nav-container d-flex">
        <div class="nav-content d-flex">
        <div class="logo position-relative">
        <a href="index.html">
            <div class=""></div>
        </a>
    </div>
    <!-- Logo End -->

    <!-- User Menu Start -->
    <?php include('../Master/usermenu.php') ?>
    <!-- User Menu End -->

    <!-- Icons Menu Start -->
    <ul class="list-unstyled list-inline text-center menu-icons">
        <li class="list-inline-item">
            <a href="#" data-bs-toggle="modal" data-bs-target="#searchPagesModal">
                <i data-acorn-icon="search" data-acorn-size="18"></i>
            </a>
        </li>
        <li class="list-inline-item">
            <a href="#" id="pinButton" class="pin-button">
                <i data-acorn-icon="lock-on" class="unpin" data-acorn-size="18"></i>
                <i data-acorn-icon="lock-off" class="pin" data-acorn-size="18"></i>
            </a>
        </li>
        <li class="list-inline-item">
            <a href="#" id="colorButton">
                <i data-acorn-icon="light-on" class="light" data-acorn-size="18"></i>
                <i data-acorn-icon="light-off" class="dark" data-acorn-size="18"></i>
            </a>
        </li>
      
    </ul>
    <!-- Icons Menu End -->

    <?php include('../Master/menu.php') ?>

    <!-- Mobile Buttons Start -->
    <div class="mobile-buttons-container">
        <!-- Menu Button Start -->
        <a href="#" id="mobileMenuButton" class="menu-button">
            <i data-acorn-icon="menu"></i>
        </a>
        <!-- Menu Button End -->
    </div>
    <!-- Mobile Buttons End -->
</div>
<div class="nav-shadow"></div>
    </div>
    <main>
        <div class="container">
        <!-- Title and Top Buttons Start -->
        <div class="page-title-container">
            <div class="row">
                <!-- Title Start -->
                <div class="col-12 ">
                    <a class="muted-link pb-2 d-inline-block hidden" href="#">
                        <span class="align-middle lh-1 text-small">&nbsp;</span>
                    </a>
                    <h1 class="mb-0 pb-0 display-4" id="title">Halaman Tiket anda</h1>
                </div>
                <!-- Title End -->
            </div>
        </div>
        <!-- Title and Top Buttons End -->
        <div>
            <?php 
                include '../../Models/model_tiket.php';
                $tiket = new Tiket();
                // var_dump($tiket->select()->fetch_assoc());
            ?>
            <div class="row d-flex justify-content-center">
            <?php foreach ($tiket->select() as $item) { ?>
            <div class="pb-3 mx-2 my-2 col-sm-4 bg-info text-uppercase" style="position: relative;">
                <p class="pt-2" style="font-size: 16px;"> <?php echo $item['id_bus'] . ' | ' . $item['nama_bus'] ?> </p>
                <p class="lead text-white" style="font-size: 13px;">Nama pemesan : <?php echo $item['nama_pemesan'] ?> </p>
                <p class="lead text-white" style="font-size: 13px;">Jumlah bangku : <?php echo $item['jml_bangku'] ?> </p>
                <p class="lead text-white" style="font-size: 13px;">Waktu berangkat : <?php echo $item['waktu_brngkt'] ?> </p>
                <p class="lead text-white" style="font-size: 13px;"><?php echo $item['dari']?> - <?php echo $item['ke'] ?> </p>
                <a onclick="hapus(this)" class="px-3 py-1 bg-danger" style="cursor: pointer;">HAPUS TIKET</a>
            </div>       
           <?php } ?>
            </div>
        </div>

        </div>
    </main>
    <!-- Layout Footer Start -->
<footer>
    <div class="footer-content">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <p class="mb-0 text-muted text-medium">Colored Strategies 2021</p>
                </div>
                <div class="col-sm-6 d-none d-sm-block">
                    <ul class="breadcrumb pt-0 pe-0 mb-0 float-end">
                        <li class="breadcrumb-item mb-0 text-medium">
                            <a href="https://1.envato.market/BX5oGy" target="_blank" class="btn-link">Review</a>
                        </li>
                        <li class="breadcrumb-item mb-0 text-medium">
                            <a href="https://1.envato.market/BX5oGy" target="_blank" class="btn-link">Purchase</a>
                        </li>
                        <li class="breadcrumb-item mb-0 text-medium"><a href="https://acorn-html-docs.coloredstrategies.com/" target="_blank" class="btn-link">Docs</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Layout Footer End -->
</div>
   
</div>
<!-- Niches Modal End -->

<?php include('../Master/theme.php') ?>

<script src="../../Public/js/vendor/jquery-3.5.1.min.js"></script>
<script src="../../Public/js/vendor/bootstrap.bundle.min.js"></script>
<script src="../../Public/js/datatable/datatables.min.js"></script>
<script src="../../Public/js/datatable/pdfmake.min.js"></script>
<script src="../../Public/js/datatable/vfs_fonts.js"></script>
<script src="script.js"></script>
<script src="../../Public/js/vendor/OverlayScrollbars.min.js"></script>
<script src="../../Public/js/vendor/autoComplete.min.js"></script>
<script src="../../Public/js/vendor/clamp.min.js"></script>
<script src="../../Public/icon/acorn-icons.js"></script>
<script src="../../Public/icon/acorn-icons-interface.js"></script>
<script src="../../Public/icon/acorn-icons-commerce.js"></script>
<script src="../../Public/js/vendor/Chart.bundle.min.js"></script>
<script src="../../Public/js/vendor/chartjs-plugin-rounded-bar.min.js"></script>
<script src="../../Public/js/vendor/jquery.barrating.min.js"></script>
<script src="../../Public/js/base/helpers.js"></script>
<script src="../../Public/js/base/globals.js"></script>
<script src="../../Public/js/base/nav.js"></script>
<script src="../../Public/js/base/search.js"></script>
<script src="../../Public/js/base/settings.js"></script>
<script src="../../Public/js/cs/charts.extend.js"></script>
<script src="../../Public/js/pages/dashboard.js"></script>
<script src="../../Public/js/common.js"></script>
<script src="../../Public/js/scripts.js"></script>
<script src="../../Public/js/tata-master/dist/tata.js"></script>
</body>
</html>
