<?php
$now = date('YmdHis')
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title><?php echo JUDUL ?></title>
    <!-- Favicon-->
    <link rel="icon" href="<?php echo base_url('assets'); ?>/login/images/logokai.png?time=<?php echo $now ?>" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url('assets'); ?>/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo base_url('assets'); ?>/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo base_url('assets'); ?>/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?php echo base_url('assets'); ?>/css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?php echo base_url('assets'); ?>/css/themes/all-themes.css" rel="stylesheet" />

    <!-- baru ada -->
    <link href="<?php echo base_url('assets'); ?>/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url('assets'); ?>/plugins/sweetalert/sweetalert.css" rel="stylesheet" />
    <link href="<?php echo base_url('assets'); ?>/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />
    <link href="<?php echo base_url('assets'); ?>/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <!-- View Css -->
    <?php isset($css) ?  $this->load->view($css) : null; ?>
</head>

<body class="theme-purple">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="<?php echo base_url('assets'); ?>/index.html"><?php echo JUDUL ?></a>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <?php
                    if (file_exists('uploads/userimage/' . $this->session->id_user)) {
                        $pp = base_url() . '/uploads/userimage/' . $this->session->id_user;
                    } else {
                        $pp = base_url('assets') . '/images/user.png';
                    }
                    ?>
                    <img src="<?php echo $pp; ?>" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $this->session->nama != null ? $this->session->nama : 'Dian Susanti'; ?></div>
                    <div class="email"><?php echo $this->session->username != null ? $this->session->username : 'dians'; ?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="<?php echo base_url('profil'); ?>"><i class="material-icons">person</i>Profile</a></li>
                            <li role="seperator" class="divider"></li>
                            <li><a href="<?php echo base_url('logout'); ?>"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="active"></li>
                    <?php $this->load->view('template/menu'); ?>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; <?php echo date('Y'); ?> <a href="<?php echo base_url(); ?>"><?php echo JUDUL; ?></a>.
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <ol class="breadcrumb align-right">
                <?php
                if (isset($nav)) {
                    if (isset($data)) {
                        $this->load->view($nav,$data);
                    } else {
                        $this->load->view($nav);
                    }
                }
                ?>
            </ol>             
            <br>
            <?php isset($data) ?  $this->load->view($isi,$data) : $this->load->view($isi); ?>
        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="<?php echo base_url('assets'); ?>/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url('assets'); ?>/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="<?php echo base_url('assets'); ?>/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="<?php echo base_url('assets'); ?>/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url('assets'); ?>/plugins/node-waves/waves.js"></script>

    <!-- Custom Js -->
    <script src="<?php echo base_url('assets'); ?>/js/admin.js"></script>

    <!-- baru ada -->
    <script src="<?php echo base_url('assets'); ?>/plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="<?php echo base_url('assets'); ?>/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="<?php echo base_url('assets'); ?>/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url('assets'); ?>/plugins/sweetalert/sweetalert.min.js"></script>
    <script src="<?php echo base_url('assets'); ?>/plugins/momentjs/moment.js"></script>
    <script src="<?php echo base_url('assets'); ?>/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    <script src="<?php echo base_url('assets'); ?>/plugins/bootstrap-select/js/bootstrap-select.js"></script>
    <script src="<?php echo base_url('assets'); ?>/plugins/chartjs/Chart.bundle.js"></script>

    <!-- View Js -->
    <?php isset($js) ?  $this->load->view($js) : null; ?>
</body>

</html>