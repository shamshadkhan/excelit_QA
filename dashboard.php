<?php
session_start();
include("database.php");
if(isset($_POST['save'])=='Submit')
{
    $postDate=date('d/m/Y');
    $user=$_SESSION['username123'];
    $question=$_POST['question'];
    $startdate1=$_POST['startdate'];
    $enddate1=$_POST['enddate'];
    $startdate2 = strtotime($startdate1);
    $startdate = date('m/d/Y', $startdate2); // d.m.YYYY
    $enddate2 = strtotime($enddate1);
    $enddate = date('m/d/Y', $enddate2); // d.m.YYYY
    
    if($question == "" && $startdate == "" && $enddate == "")
    {
        $f=3;
        $message3="Atleast a field required";
    }
    else 
    {
        $insert = 'INSERT INTO question(question,startdate,enddate,date,user)
        VALUES("'.$question.'","'.$startdate.'","'.$enddate.'","'.$postDate.'","'.$user.'")';
        
        if(mysql_query($insert))
        {
            $f=1;
            $message1="Congratulation! A new information has been added successfully.";
        }
        else
        {   
            $f=2;
            $message2="There seems to have been an issue!Please try again.";
        }
    }
}
if(!empty($_SESSION['username123']))
{
?>
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
              <li ><a href="dashboard.php">Questions</a></li>
              <li ><a href="answer.php">Answer</a></li>
              <li><a href="list.php">Winner List</a></li>
            </ul>
            <form class="navbar-form pull-right">
              <a href="index.php" class="btn">Sign Out</a>
            </form>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">
      <?php
        if($f==1)
        {
          ?>
          <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong><?php echo $message1; ?></strong> 
        </div>
<?php
        }
        if($f==2)
        {
          ?>
          <div class="alert alert-error">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong><?php echo $message2; ?></strong> 
        </div>
<?php
        }
      ?>
     <!-- Example row of columns -->
      <div class="row">
                <form action="" method="post">
          
        <div class="span12">
            <label>Question</label>
            <div class="input-group">
            <textarea rows="3" class="span6" name="question"></textarea>
            </div>
            </div>
            <div class="span6">
              <label>Start Date</label>
                                <div class="input-group date" id="datetimepicker1">
                                    <input type="text" class="span6" name="startdate">
                                    <i class="icon-calendar" style="float: right;margin-top: -35px;margin-right: -21px;"></i>
                                    <span class="input-group-addon" style="opacity:0"><span class="glyphicon-calendar glyphicon" style="float: right;margin-top: -35px;margin-right: -21px;"></span>
                                    </span>
                                </div>
                            </div>
               <div class="span6">
              <label>End Date</label>
                                <div class="input-group date" id="datetimepicker2">
                                    <input type="text" class="span6" name="enddate">
                                    <i class="icon-calendar" style="float: right;margin-top: -35px;margin-right: -21px;"></i>
                                    <span class="input-group-addon" style="opacity:0"><span class="glyphicon-calendar glyphicon" style="float: right;margin-top: -35px;margin-right: -21px;"></span>
                                    </span>
                                </div>
                            </div>
                     
                
            <div class="span12">
              <button type="submit" class="btn" name="save">Submit</button>
            
            </div>
         
        
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
<?php
}
else
echo "<script>javascript:window.location = 'index.php'</script>";
?>