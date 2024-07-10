  <?php function login_header()
    {
        defined('BASEPATH') or exit('No direct script access allowed');
        $ci = &get_instance();
    ?>
  <!DOCTYPE html>
  <html>

  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title><?php echo $ci->config->item('system_tab_name') ?> - Log in</title>
      <link rel="icon" href="<?php echo base_url() ?>assets/img/Sagay_Logo.png">
      <!-- Tell the browser to be responsive to screen width -->
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
      <!-- Bootstrap 3.3.7 -->
      <link rel="stylesheet"
          href="<?php echo base_url() ?>assets/theme/bower_components/bootstrap/dist/css/bootstrap.min.css">
      <!-- Font Awesome -->
      <link rel="stylesheet"
          href="<?php echo base_url() ?>assets/theme/bower_components/font-awesome/css/font-awesome.min.css">
      <!-- Ionicons -->
      <link rel="stylesheet" href="<?php echo base_url() ?>assets/theme/bower_components/Ionicons/css/ionicons.min.css">
      <!-- Theme style -->
      <link rel="stylesheet" href="<?php echo base_url() ?>assets/theme/dist/css/AdminLTE.min.css">
      <!-- iCheck -->
      <link rel="stylesheet" href="<?php echo base_url() ?>assets/theme/plugins/iCheck/square/blue.css">
      <!-- jQuery -->
      <script language="javascript" src="<?php echo base_url() ?>assets/jquery-3.2.1.js"></script>
      <!-- Theme style -->
      <link rel="stylesheet" href="<?php echo base_url() ?>assets/theme/dist/css/AdminLTE.min.css">
      <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
      <link rel="stylesheet" href="<?php echo base_url() ?>assets/theme/dist/css/skins/_all-skins.min.css">
      <!-- Pace style -->
      <link rel="stylesheet" href="<?php echo base_url() ?>/assets/theme/plugins/pace/pace.min.css">
      <!-- Google Font -->
      <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
      <style type="text/css">
      body {
          overflow-y: hidden;
      }

      img.center {
          content: url("<?php echo base_url() ?>assets/img/Sagay_logo.png");
          position: absolute;
          left: 1.5vw;
          top: 2vh;
          height: 110vh;
          opacity: 0.1;
          pointer-events: none;
      }

      .blis {
          position: absolute;
          left: 4.3vw;
          font-family: "Century Gothic";
          pointer-events: none;
      }

      #blis1 {
          top: 40vh;
          font-size: 10vh;
          font-weight: bold;
      }

      #blis2 {
          top: 49vh;
          font-size: 9vh;
      }
      </style>

      <head>

      <body class="hold-transition skin-green-light layout-top-nav">
          <div class="wrapper">

              <header class="main-header">
                  <nav class="navbar navbar-static-top">
                      <span class="logo" style="width:30vw;text-align:left">
                          <i class="fa fa-inbox"></i>&ensp;<?php echo $ci->config->item('department_long') ?>
                      </span>
                  </nav>
              </header>

              <div class="content-wrapper">
                  <div class="container">
                      <img class="center">
                      <p class="blis" id="blis1">BUSINESS LICENSING</p>
                      <p class="blis" id="blis2">INFORMATION SYSTEM</p>
                      <?php
                    }

                    function login_footer()
                    {
                        ?>

                      <!-- jQuery 3 -->
                      <script src="<?php echo base_url() ?>assets/theme/bower_components/jquery/dist/jquery.min.js">
                      </script>
                      <!-- Bootstrap 3.3.7 -->
                      <script
                          src="<?php echo base_url() ?>assets/theme/bower_components/bootstrap/dist/js/bootstrap.min.js">
                      </script>
                      <!-- iCheck -->
                      <script src="<?php echo base_url() ?>assets/theme/plugins/iCheck/icheck.min.js"></script>
                      <script>
                      $(function() {
                          $('input').iCheck({
                              checkboxClass: 'icheckbox_square-blue',
                              radioClass: 'iradio_square-blue',
                              increaseArea: '20%' /* optional */
                          });
                      });
                      </script>

      </body>

  </html>
  <?php
                    }
                    // start here
                    function retype_header()
                    {

                        $ci = &get_instance();
                        if (empty($_SESSION['User_details_retype_password']) && empty($_SESSION['User_modules_retype_password'])) {
                            redirect(base_url());
                            exit();
                        }

                        $user =  $_SESSION['User_details_retype_password'];
                        $modules = $_SESSION['User_modules_retype_password'];
                        $permission = false;
                        foreach ($modules as $key => $value) {
                            if (!(bool)@$value->Restrict_access && @$value->Module_details->Module_name == $ci->config->item('department_short')) {
                                $permission = true;
                            }
                        }
                        if (!$permission) {
                            redirect(base_url());
                            exit();
                        }
    ?>

  <?php
                        defined('BASEPATH') or exit('No direct script access allowed');
                        $ci = &get_instance();
        ?>

  <!DOCTYPE html>
  <html>

  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title><?php echo $ci->config->item('system_tab_name') ?> - Log in</title>
      <link rel="icon" href="<?php echo base_url() ?>assets/img/murcia_logo.png">
      <!-- Tell the browser to be responsive to screen width -->
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
      <!-- Bootstrap 3.3.7 -->
      <link rel="stylesheet"
          href="<?php echo base_url() ?>assets/theme/bower_components/bootstrap/dist/css/bootstrap.min.css">
      <!-- Font Awesome -->
      <link rel="stylesheet"
          href="<?php echo base_url() ?>assets/theme/bower_components/font-awesome/css/font-awesome.min.css">
      <!-- Ionicons -->
      <link rel="stylesheet" href="<?php echo base_url() ?>assets/theme/bower_components/Ionicons/css/ionicons.min.css">
      <!-- Theme style -->
      <link rel="stylesheet" href="<?php echo base_url() ?>assets/theme/dist/css/AdminLTE.min.css">
      <!-- iCheck -->
      <link rel="stylesheet" href="<?php echo base_url() ?>assets/theme/plugins/iCheck/square/blue.css">
      <!-- jQuery -->
      <script language="javascript" src="<?php echo base_url() ?>assets/jquery-3.2.1.js"></script>
      <!-- Theme style -->
      <link rel="stylesheet" href="<?php echo base_url() ?>assets/theme/dist/css/AdminLTE.min.css">
      <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
      <link rel="stylesheet" href="<?php echo base_url() ?>assets/theme/dist/css/skins/_all-skins.min.css">
      <!-- Pace style -->
      <link rel="stylesheet" href="<?php echo base_url() ?>/assets/theme/plugins/pace/pace.min.css">

      <!-- Google Font -->
      <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
      <style type="text/css">
      body {
          overflow-y: hidden;
      }
      </style>

      <head>

      <body class="hold-transition skin-green-light layout-top-nav">
          <div class="wrapper">

              <header class="main-header">
                  <nav class="navbar navbar-static-top">
                      <span class="logo" style="width:30vw;text-align:left">
                          <i class="fa fa-inbox"></i>&ensp;<?php echo $ci->config->item('department_long'); ?>
                      </span>
                  </nav>
              </header>

              <div class="content-wrapper">
                  <div class="container">

                      <?php
                    }

                    function retype_footer()
                    {
                        ?>
                  </div>
              </div>

          </div>
          <!-- PACE -->
          <script src="<?php echo base_url() ?>assets/theme/bower_components/pace/pace.min.js"></script>
          <!-- jQuery 3 -->
          <script src="<?php echo base_url() ?>assets/theme/bower_components/jquery/dist/jquery.min.js"></script>
          <!-- Bootstrap 3.3.7 -->
          <script src="<?php echo base_url() ?>assets/theme/bower_components/bootstrap/dist/js/bootstrap.min.js">
          </script>
          <!-- iCheck -->
          <script src="<?php echo base_url() ?>assets/theme/plugins/iCheck/icheck.min.js"></script>

          <script>
          $(function() {
              $('input').iCheck();

              // handle inputs only inside $('.block')
              $('.block input').iCheck();

              // handle only checkboxes inside $('.test')
              $('.test input').iCheck({
                  handle: 'checkbox'
              });

              // handle .vote class elements (will search inside the element, if it's not an input)
              $('.vote').iCheck();

              // you can also change options after inputs are customized
              $('input.some').iCheck({
                  // different options
              });

              $('input').iCheck({
                  checkboxClass: 'icheckbox_square-blue',
                  radioClass: 'iradio_square-blue',
                  increaseArea: '20%' /* optional */
              });



          });
          </script>

      </body>

  </html>
  <?php
                    }
                    //end here
                    function main_header()
                    {
                        $ci = &get_instance();

                        if (empty($_SESSION['User_details']) && empty($_SESSION['User_modules'])) {
                            redirect(base_url());
                            exit();
                        }

                        $user =  $_SESSION['User_details'];
                        $modules = $_SESSION['User_modules'];
                        $permission = false;
                        foreach ($modules as $key => $value) {
                            if (!(bool)$value->Restrict_access && $value->Module_details->Module_name == $ci->config->item('department_short')) {
                                $permission = true;
                            }
                        }

                        if (!$permission) {
                            redirect(base_url());
                            exit();
                        }
    ?>

  <!DOCTYPE html>
  <html>

  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title><?php echo $ci->config->item('system_tab_name') ?></title>
      <link rel="icon" href="<?php echo base_url() ?>assets/img/murcia_logo.png">
      <!-- Tell the browser to be responsive to screen width -->
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
      <!-- Bootstrap 3.3.7 -->
      <link rel="stylesheet"
          href="<?php echo base_url() ?>assets/theme/bower_components/bootstrap/dist/css/bootstrap.min.css">
      <!-- Font Awesome -->
      <link rel="stylesheet"
          href="<?php echo base_url() ?>assets/theme/bower_components/font-awesome/css/font-awesome.min.css">
      <!-- Ionicons -->
      <link rel="stylesheet" href="<?php echo base_url() ?>assets/theme/bower_components/Ionicons/css/ionicons.min.css">
      <!-- iCheck -->
      <link rel="stylesheet" href="<?php echo base_url() ?>assets/theme/plugins/iCheck/square/blue.css">
      <!-- Select2 -->
      <link rel="stylesheet"
          href="<?php echo base_url() ?>assets/theme/bower_components/select2/dist/css/select2.min.css">
      <!-- Theme style -->
      <link rel="stylesheet" href="<?php echo base_url() ?>assets/theme/dist/css/AdminLTE.min.css">
      <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
      <link rel="stylesheet" href="<?php echo base_url() ?>assets/theme/dist/css/skins/_all-skins.min.css">
      <!-- Datepicker -->
      <link rel="stylesheet"
          href="<?php echo base_url() ?>assets/theme/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
      <!-- Custom CSS -->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/noPostBack.css">

      <!-- <link rel="stylesheet" href="<?php echo base_url() ?>assets/theme/bower_components/select2/dist/css/select2.min.css"> -->

      <script>
      var baseUrl = '<?php echo base_url() ?>';
      </script>

  </head>

  <body class="hold-transition skin-green-light fixed sidebar-mini">
      <!-- Idle Modal karl alob 5/2 -->
      <div class="modal fade" id="idle-modal" tabindex="-1" role="dialog" aria-labelledby="idle-modal-label"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="idle-modal-label">Idle Warning</h5>
                  </div>
                  <div class="modal-body">
                      <p id="pModal" style="color:white;">YOU WILL BE LOGGED OUT IN 30 SECONDS. MOVE YOUR MOUSE OR
                          REFRESH THE PAGE.</p>
                  </div>
                  <div class="modal-footer">
                      <button id="bModal" type="button" class="btn btn-secondary" data-dismiss="modal"
                          disabled>OKAY</button>
                  </div>
              </div>
          </div>
      </div>

      <!-- Expired Modal -->
      <div class="modal fade" id="expired-modal" tabindex="-1" role="dialog" aria-labelledby="expired-modal-label"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="expired-modal-label">Session Expired</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <p>Your session has expired. Please log in again.</p>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
              </div>
          </div>
      </div>

      <!-- end -->
      <div class="wrapper">
          <header class="main-header">

              <!-- Logo -->
              <a href="index2.html" class="logo">
                  <!-- mini logo for sidebar mini 50x50 pixels -->
                  <span class="logo-mini"><?php echo $ci->config->item('system_name_short') ?></span>
                  <!-- logo for regular state and mobile devices -->
                  <h4><?php echo $ci->config->item('system_name') ?></h4>
              </a>

              <!-- Header Navbar: style can be found in header.less -->
              <nav class="navbar navbar-static-top">
                  <!-- Sidebar toggle button-->
                  <!-- <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a> -->
                  <span class="logo" style="width:30vw;text-align:left">
                      <i class="fa fa-inbox"></i>&ensp;<?php echo $ci->config->item('department_long') ?>
                  </span>
                  <!-- Navbar Right Menu -->
                  <div class="navbar-custom-menu">
                      <ul class="nav navbar-nav">
                          <!-- Messages: style can be found in dropdown.less-->
                          <li class="dropdown user user-menu">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                  <span class="hidden-xs"><?= ucwords(@$user->First_name) . " " .
                                                                    ucwords(@$user->Last_name); ?></span>
                              </a>
                              <ul class="dropdown-menu">
                                  <li class="user-header">
                                      <img src="<?php echo base_url() ?>uploads/images/no-image.gif" class="img-circle"
                                          alt="User Image">
                                      <p>
                                          <?php if (@$user->Middle_name == '') {
                                                    echo ucwords(@$user->First_name) . " " . ucwords(@$user->Last_name);
                                                } else {
                                                    echo ucwords(@$user->First_name) . " " . ucwords(@$user->Middle_name)[0] .
                                                        ". " . ucwords(@$user->Last_name);
                                                } ?>
                                          <small><?= @$user->Position; ?></small>
                                          <small><?= $ci->config->item('department_long'); ?></small>
                                      </p>
                                  </li>
                                  <!-- Menu Footer-->
                                  <li class="user-footer">
                                      <div class="pull-right">
                                          <a href="<?php echo base_url() ?>" id="sign-out"
                                              class="btn btn-default btn-flat">Sign out</a>
                                      </div>
                                  </li>
                              </ul>
                          </li>
                      </ul>
                  </div>

              </nav>
          </header>
          <?php
                    }

                    function main_footer()
                    {
                        $ci = &get_instance();
            ?>
          <!-- <script language="javascript">
        $('#sign-out').on('click', function(){
            window.location = "<?php echo base_url() ?>";
        });
    </script> -->

          <footer class="main-footer">
              <div class="pull-right hidden-xs">
                  <b>Version</b> <?= $ci->config->item('version') ?>
              </div>
              <strong>Copyright &copy; 2018 <a href="#">Business Licensing Information System</a>.</strong> All rights
              reserved.
          </footer>


          <!-- jQuery -->
          <script language="javascript" src="<?php echo base_url() ?>assets/jquery-3.2.1.js"></script>

          <!-- Custom JS -->
          <script language="javascript" src="<?php echo base_url() ?>assets/scripts/jquery-3.2.1.js"></script>

          <!-- jQuery 3 -->
          <script src="<?php echo base_url() ?>assets/theme/bower_components/jquery/dist/jquery.min.js"></script>
          <!-- Bootstrap 3.3.7 -->
          <script src="<?php echo base_url() ?>assets/theme/bower_components/bootstrap/dist/js/bootstrap.min.js">
          </script>
          <!-- Select2 -->
          <script src="<?php echo base_url() ?>assets/theme/bower_components/select2/dist/js/select2.full.min.js">
          </script>
          <!-- FastClick -->
          <script src="<?php echo base_url() ?>assets/theme/bower_components/fastclick/lib/fastclick.js"></script>
          <!-- AdminLTE App -->
          <script src="<?php echo base_url() ?>assets/theme/dist/js/adminlte.min.js"></script>
          <!-- Sparkline -->
          <script
              src="<?php echo base_url() ?>assets/theme/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js">
          </script>
          <!-- jvectormap  -->
          <script src="<?php echo base_url() ?>assets/theme/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
          <script src="<?php echo base_url() ?>assets/theme/plugins/jvectormap/jquery-jvectormap-world-mill-en.js">
          </script>

          <!-- SlimScroll -->
          <script
              src="<?php echo base_url() ?>assets/theme/bower_components/jquery-slimscroll/jquery.slimscroll.min.js">
          </script>
          <!-- ChartJS -->
          <script src="<?php echo base_url() ?>assets/theme/bower_components/chart.js/Chart.js"></script>
          <!-- Custom JS -->
          <script language="javascript" src="<?php echo base_url() ?>assets/scripts/noPostBack.js"></script>
          <script language="javascript" src="<?php echo base_url() ?>assets/printThis.js"></script>
          <!-- Socket.IO -->
          <script
              src="<?php echo $ci->config->item('socket_url') ?>node_modules/socket.io/node_modules/socket.io-client/socket.io.js">
          </script>
          <!-- Socket.IO Data-->
          <script src="<?php echo base_url() ?>assets/scripts/socket/index.js"></script>
  </body>

  </html>

  <?php
                    }

                    function footer_print()
                    {
                        $ci = &get_instance();
    ?>

  </body>
  <script language="javascript" src="<?php echo base_url() ?>assets/scripts/jquery-3.2.1.js"></script>

  </html>

  <?php
                    }

                    function sidebar($module, $submenu = '')
                    {
                        $ci = &get_instance();
                        $user =  $_SESSION['User_details'];
    ?>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu" data-widget="tree">
              <li class="header">MAIN NAVIGATION</li>
              <li class="treeview <?php echo ($module == 'applicant') || ($module == 'collection') || ($module == 'receipts') ||
                                            ($module == 'abstract') || ($module == 'payments') ? 'active' : ''; ?>">
                  <a href="#">
                      <i class="fa fa-money"></i>
                      <span style="font-size: 13px;"> BPLO COLLECTION </span>
                      <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                      </span>
                  </a>
                  <ul class="treeview-menu">
                      <!---------------------------- 02-18-2020 ---------------------------->
                      <li class="<?php echo ($module == 'abstract') ? 'active' : ''; ?>">
                          <a href="<?php echo base_url() ?>treasurers/abstract">
                              <i class="fa fa-file-text"></i>
                              <span style="font-size: 12px;"> ABSTRACT </span>
                          </a>
                      </li>
                      <!---------------------------- 01-16-2020 ---------------------------->
                      <li class="<?php echo ($module == 'collection') ? 'active' : ''; ?>">
                          <a href="<?php echo base_url() ?>treasurers/collection">
                              <i class="fa fa-inbox"></i>
                              <span style="font-size: 12px;"> COLLECTIONS </span>
                          </a>
                      </li>
                      <!---------------------------- 02-18-2020 ---------------------------->
                      <li class="<?php echo ($module == 'applicant') ? 'active' : ''; ?>">
                          <a href="<?php echo base_url() ?>treasurers/applicant_search">
                              <i class="fa fa-building-o"></i>
                              <span style="font-size: 12px;"> BUSINESS PAYMENT </span>
                          </a>
                      </li>
                      <!---------------------------- 01-16-2020 ---------------------------->
                      <li class="<?php echo ($module == 'receipts') ? 'active' : ''; ?>">
                          <a href="<?php echo base_url() ?>treasurers/OR_search">
                              <i class="fa fa-search"></i>
                              <span style="font-size: 12px;"> SEARCH OR NUMBER </span>
                          </a>
                      </li>


                  </ul>
              </li>

              <li
                  class="treeview <?php echo ($module == 'general_collection') || ($module == 'trust_collection') || ($module == 'dashboard')
                                            || ($module == 'payments') || ($module == 'port_col') || ($module == 'dashboard') || ($module == 'reports')
                                            || ($module == 'void') || ($module == 'rpt') || ($module == 'add-payer') || ($module == 'oop') || ($module == 'fees_charges') ? 'active' : ''; ?>">
                  <!-- <a href="#">
                            <i class="fa fa-money"></i>
                            <span style="font-size: 13px;"> GENERAL COLLECTION </span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a> -->
                  <ul class="treeview-menu">
                      <li class="<?php echo ($module == 'dashboard') ? 'active' : ''; ?>">
                          <a href="<?php echo base_url() ?>dashboard">
                              <i class="fa fa-dashboard"></i>
                              <span style="font-size: 12px;"> DASHBOARD </span>
                          </a>
                      </li>

                      <li class="<?php echo ($module == 'general_collection') ? 'active' : ''; ?>">
                          <a href="<?php echo base_url() ?>general_collection/index/gen??">
                              <i class="fa fa-file-text-o"></i>
                              <span style="font-size: 12px;"> GEN. COLLECTION </span>
                          </a>
                      </li>

                      <li class="<?php echo ($module == 'trust_collection') ? 'active' : ''; ?>">
                          <a href="<?php echo base_url() ?>trust_collection/index/trust??">
                              <i class="fa fa-file-text-o"></i>
                              <span style="font-size: 12px;"> TRUST COLLECTION </span>
                          </a>
                      </li>

                      <li class="<?php echo ($module == 'oop') ? 'active' : ''; ?>">
                          <a href="<?php echo base_url() ?>order_of_payment">
                              <i class="fa fa-file-text-o"></i>
                              <span style="font-size: 12px;"> ORDER OF PAYMENT </span>
                          </a>
                      </li>

                      <li class="<?php echo ($module == 'reports') ? 'active' : ''; ?>">
                          <a href="<?php echo base_url() ?>reports">
                              <i class="fa fa-bar-chart"></i>
                              <span style="font-size: 12px;"> GENERAL REPORT </span>
                          </a>
                      </li>

                      <li <?= $user->ID == 51 ? '' : 'hidden' ?>
                          class="<?php echo ($module == 'fees_charges') ? 'active' : ''; ?>">
                          <a href="<?php echo base_url() ?>general_collection/fees_charges">
                              <i class="fa fa-file-text-o"></i>
                              <span style="font-size: 12px;"> FEES AND CHARGES </span>
                          </a>
                      </li>

                      <li class="<?php echo ($module == 'void') ? 'active' : ''; ?>">
                          <a href="<?php echo base_url() ?>void_receipt">
                              <i class="fa fa-file-text-o"></i>
                              <span style="font-size: 12px;"> SEARCH OR NUMBER </span>
                          </a>
                      </li>

                      <li class="<?php echo ($module == 'add-payer') ? 'active' : ''; ?>">
                          <a href="<?php echo base_url() ?>add-payer">
                              <i class="fa fa-user"></i>
                              <span style="font-size: 12px;"> PAYOR MANAGEMENT </span>
                          </a>
                      </li>
                  </ul>
              </li>

              <!-- ADDED BY KYLE 10-26-2023 -->

              <!-- <li class="<?php echo ($module == 'edit_or') ? 'active' : ''; ?>">
                        <a href="<?php echo base_url() ?>edit_or_number">
                            <i class="fa fa-file-text-o"></i>
                            <span style="font-size: 12px;"> EDIT O.R. SERIES </span>
                        </a>
                    </li> -->

              <hr>
              <style>
              .header-queue {
                  height: 100px !important;
              }
              </style>

              <li class="active">
                  <a>
                      <div class="row form-inline" style="margin:0 auto">
                          <label>Window&ensp;</label>
                          <select id="assessors-window" class="form-control input-sm">
                              <?php for ($i = 0; $i < 10; $i++) : ?>
                              <option value="<?= $i + 1 ?>"><?= $i + 1 ?></option>
                              <?php endfor; ?>
                          </select>
                      </div>
                  </a>
                  <a>
                      <div id="">
                          <button style="display:none;" class="btn btn-danger flat btn-sm queue-status"
                              data-queue-status="0"><i class="fa fa-circle"></i> OFFLINE</button>
                          <button style="display:none;" class="btn btn-success flat btn-sm queue-status"
                              data-queue-status="1"><i class="fa fa-wifi"></i> ONLINE</button>
                          <button style="display:none;" class="btn btn-warning flat btn-sm queue-bell"><i
                                  class="fa fa-bell"></i></button>

                      </div>
                  </a>
                  <a>
                      <div style="margin-top:-10px; text-align:left">
                          <p>SERVING :</p>
                          <p style="color:red; font-size:30pt; margin-top: -5px;" id="now-serving"></p>
                          <!-- <p id="business-name-q"></p> -->
                      </div>
                  </a>
                  <div class="queue-menu" style="display:none;">

                      <div class="col-sm-6">
                          <button data-menu="pass" class="btn flat btn-default btn-queue-menu">PASS</button>
                      </div>
                      <div class="col-sm-6">
                          <button data-menu="next" class="btn flat btn-primary btn-queue-menu">NEXT</button>
                      </div>
                  </div>
              </li>
          </ul>
          <script>
          var current_user = <?= $_SESSION['User_details']->ID ?>;
          </script>
      </section>
      <!-- /.sidebar -->
      <strong>
          <p style="padding-left: 10px;max-width: 200px;" id="business-name-q"></p>
      </strong>
      <script>
      var now_serving = false;
      </script>

      <script language="javascript" src="<?php echo base_url() ?>assets/scripts/jquery-3.2.1.js"></script>
      <script language="javascript" src="<?php echo base_url() ?>assets/scripts/queueing/index.js"></script>
  </aside>
  <?php

                    }