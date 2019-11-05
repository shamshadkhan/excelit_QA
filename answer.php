<?php
session_start();
include("database.php");
if(isset($_POST['save'])=='Submit')
{
    $postDate=date('d/m/Y');
    $user=$_SESSION['username123'];
    $question=$_POST['question'];
    $answer=$_POST['answer'];
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    if($question == "" && $answer == "")
    {
        $f=3;
        $message3="Atleast a field required";
    }
    else 
    {
        $insert = 'INSERT INTO answer(question_no,answer,submitter_name,phone,email,date,user)
        VALUES("'.$question.'","'.$answer.'","'.$name.'","'.$phone.'","'.$email.'","'.$postDate.'","'.$user.'")';
        
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
              <li class="active"><a href="answer.php">Answer</a></li>
              <li><a href="list.php">Winner List</a></li>
            </ul>
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
          
        <div class="span6">
            <label>Question</label>
            <div class="input-group">
            <select class="form-control span6" name="question" id="source">
              <option value="">Select a Question</option>
                                    <?php 
                                      $date=date('m/d/Y');
                                    $res_qual=mysql_query("select * from question where '$date' between startdate and enddate");
                                        while($row_qual=mysql_fetch_assoc($res_qual))
                                        {
                                    ?>
                                        <option value="<?php echo $row_qual['id'];?>"><?php echo $row_qual['question'];?></option>
                                    <?php
                                        }
                                    ?></select>
            </div>
            </div>
            <div class="span12">
            <label>Answer</label>
            <div class="input-group">
            <textarea rows="3" class="span6" name="answer"></textarea>
            </div>
            </div>
            <div class="span12">
            <label>User Name</label>
            <div class="input-group">
            <input class="span6" type="text" name="name">
            </div>
            </div>
            
            <div class="span12">
            <label>Phone</label>
            <div class="input-group">
            <input class="span6" type="text" name="phone">
            </div>
            </div>
            
            <div class="span12">
            <label>Email</label>
            <div class="input-group">
            <input class="span6" type="email" name="email">
            </div>
            </div>
            
            <div class="span12">
              <button type="submit" class="btn" name="save">Submit</button>
            
            </div>
         
        
         </form>
         <div class="span12">
            <table class="table table-bordered table-striped">
              <tr><th>Serial No</th><th>Name</th><th>Phone</th><th>Email</th><th>Question</th><th>Answer</th><th>date</th><th>Winner</th><tr>
                <?php
                                    include("database.php");
                                    $query = "select * from  answer";
                                    $res_port = mysql_query($query);
                                    if ($res_port) {
                                       while ($row_port = mysql_fetch_array($res_port)) {
                                        $question=$row_port['question_no'];
                                        $query1 = "select * from  question where id='$question'";
                                         $res_port1 = mysql_query($query1);
                                        $row_port1 = mysql_fetch_array($res_port1);
                                        echo '<tr >';
                                        echo '<td >'. $row_port['id'] . '</td>';
                                        echo '<td class=" ">'. $row_port['submitter_name'] . '</td>';
                                        echo '<td class=" ">'. $row_port['phone'] . '</td>';
                                        echo '<td class=" ">'. $row_port['email'] . '</td>';
                                        echo '<td class=" ">'. $row_port1['question'] . '</td>';
                                        echo '<td class=" ">'. $row_port['answer'] . '</td>';
                                        echo '<td class=" ">'. $row_port['date'] . '</td>';
                                        echo '<td class=" "><a href="winner.php?id='.$row_port['id'].'">Winner</td>';
                                        echo '</tr>';
                                         }
                                       }
                                       ?>
                              
            </table>       
        
      </div>

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