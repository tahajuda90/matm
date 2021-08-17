<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->

    
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistem Pengawasan Proses Minum Obat</title>
    <meta name="description" content="Sistem Pengawasan Proses Minum Obat Secara Elektronik">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--<link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">-->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/ela/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/ela/css/lib/datatable/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/ela/css/style.css">
    <!--<link rel="stylesheet" href="<?= base_url()?>assets/ela/css/datepicker.css">-->
    <link rel="stylesheet" href="<?= base_url()?>assets/ela/css/lib/chosen/chosen.min.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>
     <?php $this->load->view('part/'.$sidebar);?>
     <!-- Right Panel -->
     <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="./"><img src="<?= base_url()?>assets/ela/images/logo_pmo.png" alt="Logo"></a>
                    <!--<a class="navbar-brand hidden" href="./"><img src="<?= base_url()?>assets/ela/images/logo2.png" alt="Logo"></a>-->
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">

                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="<?= base_url()?>assets/ela/images/admin.jpg" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="<?= site_url('Auth/logout')?>"><i class="fa fa-power-off"></i>Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </header><!-- /header -->
        <!-- Header-->
 

        <div class="content">
            <div class="animated fadeIn">
                <?php $this->load->view('page/'.$page)?>
            </div><!-- .animated -->
        </div><!-- .content -->


        <div class="clearfix"></div>

        <footer class="site-footer">
            <div class="footer-inner bg-white">
                <div class="row">
                    <div class="col-sm-6">
                        Copyright &copy; 2018 Ela Admin
                    </div>
                    <div class="col-sm-6 text-right">
                        Designed by <a href="https://colorlib.com">Colorlib</a>
                    </div>
                </div>
            </div>
        </footer>

    </div><!-- /#right-panel -->
    
        <!-- Right Panel -->

    <!-- Scripts -->

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="<?= base_url()?>assets/ela/js/main.js"></script>


    <script src="<?= base_url()?>assets/ela/js/lib/data-table/datatables.min.js"></script>
    <script src="<?= base_url()?>assets/ela/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="<?= base_url()?>assets/ela/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="<?= base_url()?>assets/ela/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="<?= base_url()?>assets/ela/js/lib/data-table/jszip.min.js"></script>
    <script src="<?= base_url()?>assets/ela/js/lib/data-table/vfs_fonts.js"></script>
    <script src="<?= base_url()?>assets/ela/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="<?= base_url()?>assets/ela/js/lib/data-table/buttons.print.min.js"></script>
    <script src="<?= base_url()?>assets/ela/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="<?= base_url()?>assets/ela/js/init/datatables-init.js"></script>
    
    <script src="<?= base_url()?>assets/ela/js/lib/chosen/chosen.jquery.min.js"></script>
    <!--<script src="<?= base_url()?>assets/ela/js/bootstrap-datepicker.js"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>


    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
      } );
  </script>
  
  <script>
    jQuery(document).ready(function() {
        jQuery(".standardSelect").chosen({
            disable_search_threshold: 10,
            no_results_text: "Oops, nothing found!",
            width: "100%"
        });
    });
</script>
</body>
</html>