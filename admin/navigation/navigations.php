<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Course Cloud | Admin</title>

  <!-- Bootstrap core CSS -->
  <link rel="icon" type="image/png" href="../adminMenu/images/icon.png" />
  <link href="<?php echo web_root; ?>css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo web_root; ?>css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen" />
  <link href="<?php echo web_root; ?>css/dataTables.bootstrap.css" rel="stylesheet" media="screen" />
  <link href="<?php echo web_root; ?>css/alumni.css" rel="stylesheet" media="screen" />
  <link href="<?php echo web_root; ?>fonts/font-awesome.min.css" rel="stylesheet" />
  <!-- <link href="<?php echo web_root; ?>admin/adminMenu/dist/metisMenu.min.css" rel="stylesheet"/>   -->

  <link rel="stylesheet" href="<?php echo web_root; ?>assets/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="<?php echo web_root; ?>css/jquery-ui.css">
  <!-- <link rel="stylesheet" href="<?php echo web_root; ?>web/viewer.css">  -->
  <!-- Plugins -->

  <style type="text/css">
    #navigation {
      margin-bottom: 40px;
    }

    #page-wrapper {
      min-height: 900px;
    }

    #page-footer {
      background-color: rgb(63, 155, 11);
      border-top: 1px solid #ddd;
      margin-top: -15px;
      padding: 10px;
    }

    */
    /* * { 
        font-family: 'Lucida Calligraphy';
     }
  </style>
  <!-- Custom styles for this template -->
  <!-- <link href="<?php echo web_root; ?>css/offcanvas.css" rel="stylesheet"> -->
  <?php
  admin_confirm_logged_in();
  ?>

<body>
  <section id="navigation">
    <nav class="navbar navbar-default  " role="navigation" style="margin-top: 0px">

      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo web_root; ?>admin/index.php">Course Cloud Admin</a>
      </div>

      <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-user fa-fw"></i> <?php echo $_SESSION['NAME']; ?>
          </a>

        </li>
        <li><a href="<?php echo web_root; ?>admin/logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
        </li>
      </ul>

      <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
          <ul class="nav" id="side-menu">
            <!--     <li>
                    <a href="<?php echo web_root; ?>admin/index.php"><i class="fa fa-dashboard fa-fw"></i> Statistic</a>
                </li> -->

            <li>
              <a href="<?php echo web_root; ?>admin/modules/lesson/index.php"><i class="fa fa-user fa-fw"></i> Lesson
              </a>
            </li>
            <li>
              <a href="<?php echo web_root; ?>admin/modules/exercises/index.php"><i class="fa fa-user fa-fw"></i>
                Exercises </a>
            </li>
            <li>
              <a href="<?php echo web_root; ?>admin/modules/modstudent/index.php"><i class="fa fa-user fa-fw"></i>
                Student </a>
            </li>
            <li><a href="<?php echo web_root; ?>admin/modules/user/index.php"><i class="fa fa-user fa-fw"></i> Manage
                Users</a></li>
          </ul>
        </div>
        <!-- /.sidebar-collapse -->
      </div>
    </nav>
  </section>


  <section id="page-wrapper">
    <?php check_message(); ?>
    <?php require_once $content; ?>
  </section>

  <section id="page-footer">
    <footer>
      <p align="center">&copy;2O24 <a style="color:white" href="https://github.com/Mr-Yash-beldar/Course-Cloud"> Course
          Cloud </a></p>
    </footer>
  </section>
  <!-- Plugins -->

  <script type="text/javascript" language="javascript" src="<?php echo web_root; ?>js/jquery.js"></script>
  <script src="<?php echo web_root; ?>js/bootstrap.min.js"></script>
  <script src="<?php echo web_root; ?>admin/adminMenu/dist/metisMenu.min.js"></script>

  <script src="<?php echo web_root; ?>js/jquery.dataTables.min.js"></script>/
  <script src="<?php echo web_root; ?>js/dataTables.bootstrap.min.js"></script>

  <script type="text/javascript" src="<?php echo web_root; ?>js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
  <script type="text/javascript" src="<?php echo web_root; ?>js/locales/bootstrap-datetimepicker.uk.js"
    charset="UTF-8"></script>

  <script type="text/javascript" language="javascript" src="<?php echo web_root; ?>js/kcctc.js"></script>
  <script src="<?php echo web_root; ?>assets/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
  <script type="text/javascript" src="<?php echo web_root; ?>js/jquery-ui.js"></script>
  <script type="text/javascript" src="<?php echo web_root; ?>js/autofunc.js"></script>

  <script type="text/javascript" charset="utf-8">
    $(document).ready(function () {
      var t = $('#example').DataTable({
        "bSort": false,
        "columnDefs": [{
          "searchable": false,
          "orderable": false,
          "targets": 0
        }],


        //vertical scroll
        // "scrollY":        "300px",

        // "scrollCollapse": true,

        //ordering start at column 1
        "order": [[1, 'desc']]
      });

      t.on('order.dt search.dt', function () {
        t.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
          cell.innerHTML = i + 1;
        });
      }).draw();
    });

  </script>


  <script>

    $(function () {
      $(".tds").each(function (i) {
        len = $(this).text().length;
        if (len > 80) {
          $(this).text($(this).text().substr(0, 80) + '...');
        }
      });
    });
    $(function () {
      //Add text editor 
      $("#ANNOUNCEMENT_WHAT").wysihtml5();
      $("#EVENT_WHAT").wysihtml5();
      $("#compose-textarea").wysihtml5();
    });
  </script>
  <script type="text/javascript">
    $(function () {
      $('#datetimepicker2').datetimepicker({
        locale: 'ru',
        autoclose: 1,
      });
    });
  </script>

  <script type="text/javascript">

    $("#retype_user_pass").focusout(function () {

      var pass = $("#user_pass").val();
      var repass = $(this).val();
      if (pass != repass) {
        alert("Password does not match");
      };
    });

    function validatedpass() {

      var pass = $("#user_pass").val();
      var repass = $("#retype_user_pass").val();
      if (pass != repass) {
        alert("Password does not match");
        return false
      } else {
        return true
      };
    }

    $('#date_pickerfrom').datetimepicker({
      format: 'yyyy',
      language: 'en',
      weekStart: 1,
      todayBtn: 1,
      autoclose: 1,
      todayHighlight: 1,
      startView: 4,
      minView: 4,
      forceParse: 0
    });


    $('#date_pickerto').datetimepicker({
      format: 'yyyy',
      language: 'en',
      weekStart: 1,
      todayBtn: 1,
      autoclose: 1,
      todayHighlight: 1,
      startView: 4,
      minView: 4,
      forceParse: 0
    });



  </script>


  <script>
    function checkall(selector) {
      if (document.getElementById('chkall').checked == true) {
        var chkelement = document.getElementsByName(selector);
        for (var i = 0; i < chkelement.length; i++) {
          chkelement.item(i).checked = true;
        }
      }
      else {
        var chkelement = document.getElementsByName(selector);
        for (var i = 0; i < chkelement.length; i++) {
          chkelement.item(i).checked = false;
        }
      }
    }
    function checkNumber(textBox) {
      while (textBox.value.length > 0 && isNaN(textBox.value)) {
        textBox.value = textBox.value.substring(0, textBox.value.length - 1)
      }
      textBox.value = trim(textBox.value);
    }
    //
    function checkText(textBox) {
      var alphaExp = /^[a-zA-Z]+$/;
      while (textBox.value.length > 0 && !textBox.value.match(alphaExp)) {
        textBox.value = textBox.value.substring(0, textBox.value.length - 1)
      }
      textBox.value = trim(textBox.value);
    }

  </script>

  <script type="text/javascript">



    // function truncateText(selector, maxLength) {
    //     var element = document.querySelector(selector),
    //         truncated = element.innerText;

    //     if (truncated.length > maxLength) {
    //         truncated = truncated.substr(0,maxLength) + '...';
    //     }
    //     return truncated;
    // }
    // //You can then call the function with something like what i have below.
    // document.querySelector('#tds').innerText = truncateText('#tds', 107);
  </script>

</body>

</html>