<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Excel IT</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <!--link rel="stylesheet" type="text/css" media="screen" href="css/styles.css" /-->
    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap-datetimepicker.min.css" />
     
    <script type="text/javascript" src="js/jquery.min.js"></script>

    <script type="text/javascript">
                             $(function () {
                                $('#datetimepicker1').datetimepicker();
                            });
                              $(function () {
                                $('#datetimepicker2').datetimepicker();
                            });

                        </script>
</head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="#">Excel IT</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li ><a href="dashboard">Questions</a></li>
              <li ><a href="answer.php">Answer</a></li>
              <li class="active"><a href="list.php">Winner List</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">
     <!-- Example row of columns -->
      <div class="row">
                <form action="" method="post">
          
        <div class="span12">
            <table class="table table-bordered table-striped">
              <tr><th>Question number</th><th>Question</th><th>Winner</th><th>date</th><tr>
                <?php
                                    include("database.php");
                                    $query = "select * from  winner";
                                    $res_port = mysql_query($query);
                                    if ($res_port) {
                                       while ($row_port = mysql_fetch_array($res_port)) {
                                        $question=$row_port['question_no'];
                                        $query1 = "select * from  question where id='$question'";
                                         $res_port1 = mysql_query($query1);
                                        $row_port1 = mysql_fetch_array($res_port1);
                                        echo '<tr >';
                                        echo '<td >'. $row_port1['id'] . '</td>';
                                        echo '<td class=" ">'. $row_port1['question'] . '</td>';
                                        echo '<td class=" ">'. $row_port['winner'] . '</td>';
                                        echo '<td class=" ">'. $row_port['date'] . '</td>';
                                        echo '</tr>';
                                         }
                                       }
                                       ?>
                              
            </table>       
        
         </form>
      </div>

      <hr>

      <footer>
        <p>&copy; Excel IT 2014</p>
      </footer>

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
   <script type="text/javascript" src="js/bootstrap.min.js"></script>
   <script type="text/javascript" src="js/moment-2.4.0.js"></script>
   
     <script type="text/javascript" src="js/bootstrap-datetimepicker.js"></script>
     
  </body>
</html>
