<?php
session_start();
if(!isset($_SESSION["librarian"])){
    ?>
    <script>
        window.location="login.php";
    </script>
<?php
}
include "connection.php";
include "header.php";
?>

        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3> Issue Book </h3>
                    </div>

                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                
                    <span class="input-group-btn">
                      <button type="button" class="btn btn-default" style="background-color:#258977;color:white;" data-toggle="modal" data-target="#myModal">Send Message</button>
                    </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2> Issue Book </h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                                <form action="" name="form1" method="post">
                                    <table>
                                        <tr>
                                            <td>
                                                <select  name="enr" class="form-control selectpicker">
                                                    
                                                    <?php
                                                    $res = mysqli_query($link,"select enrollment from student_registration");
                                                    while($row=mysqli_fetch_array($res)){
                                                        echo "<option>";
                                                        echo $row["enrollment"];
                                                        echo "</option>";
                                                    }
                                                    ?>
                                                    
                                                </select>
                                            </td>
                                            <td>
                                                <input type="submit" value="Search" name="submit1" class="form-control btn btn-default" style="margin-top: 5px; margin-left: 15px;background-color:#258977;color:white;">
                                            </td>
                                        </tr>
                                    </table>
                                
                                <?php
                                
                                if(isset($_POST["submit1"])){
                                    $res = mysqli_query($link,"select * from student_registration where enrollment='$_POST[enr]'");
                                    while($row=mysqli_fetch_array($res)){
                                        $firstname=$row["firstname"];
                                        $lastname=$row["lastname"];
                                        $username=$row["username"];
                                        $email=$row["email"];
                                        $contact=$row["contact"];
                                        $sem=$row["sem"];
                                        $enrollment=$row["enrollment"];
                                        $_SESSION["enrollment"]=$enrollment;
                                        $_SESSION["stusername"]=$username;
                                    
                                    }
                                    ?>
                                    <table class="table table-bordered">
                                   <tr>
                                       <td><input type="text" class="form-control" placeholder="Enrollment no" value="<?php echo $enrollment; ?>" name="enrollment" disabled></td>
                                   </tr>
                                   <tr>
                                       <td><input type="text" class="form-control" placeholder="Student name" value="<?php echo $firstname.' '.$lastname; ?>" name="studentname" required=""></td>
                                   </tr>
                                   <tr>
                                       <td><input value="<?php echo $sem; ?>" type="text" class="form-control" placeholder="Student sem" name="studentsem" required=""></td>
                                   </tr>
                                   <tr>
                                       <td><input type="text" value="<?php echo $contact; ?>" class="form-control" placeholder="Student contact" name="studentcontact" required=""></td>
                                   </tr>
                                   <tr>
                                       <td><input type="text" class="form-control" value="<?php echo $email; ?>" placeholder="Student email" name="studentemail" required=""></td>
                                   </tr>
                                   <tr>
                                       <td>
                                           <select name="booksname" class="form-control selectpicker">
                                               <?php
                                    $res = mysqli_query($link,"select books_name from add_books where is_deleted=0");
                                    while($row = mysqli_fetch_array($res)){
                                        echo "<option>";
                                        echo  $row["books_name"];
                                        echo "</option>";
                                    }
                                                ?>
                                           </select>
                                       </td>
                                   </tr>
                                   <tr>
                                       <td><input value="<?php echo date("d-m-y"); ?>" type="text" class="form-control" placeholder="Issue date" name="booksissuedate" required=""></td>
                                   </tr>
                                   <tr>
                                       <td><input type="text" class="form-control" value="<?php echo $username; ?>" placeholder="Student user name" name="studentusername" disabled></td>
                                   </tr>
                                   <tr>
                                       <td><input type="submit" class="btn btn-default form-control" value="Issue Book" name="submit2" style="background-color:#aabb11; color:white;" required=""></td>
                                   </tr>
                                    </table>
                                    <?php
                                }
                                
                                ?>
                                
                               </form> 
                               
                               <?php 
                                if(isset($_POST["submit2"]))
                                {
                                    $qty=0;
                                    $res=mysqli_query($link,"select * from add_books where books_name='$_POST[booksname]' && is_deleted=0");
                                    while($row=mysqli_fetch_array($res)){
                                        $qty = $row["available_qty"];
                                    }
                                    if($qty==0){
                                        ?>
                                        <div class="alert alert-danger col-lg-6 col-lg-push-3">
           <strong style="color:white">Oops! This book is not available...</strong>
       </div>
                               <?php
                                
                                    }else{
                                    mysqli_query($link,"insert into issue_books values('','$_SESSION[enrollment]','$_POST[studentname]','$_POST[studentsem]','$_POST[studentcontact]','$_POST[studentemail]','$_POST[booksname]','$_POST[booksissuedate]','','$_SESSION[stusername]')");
                                        
                                        
                                       $date =  date("d-m-Y",strtotime("7 days"));
                                       //var_dump($date);
//                                        $var=date_add($datetime,$date);
//                                        var_dump($var);
                                        //$date=date('Y-m-d',strtotime($today_date.'+ 7 days'));
                                 mysqli_query($link,"insert into message values('$_POST[booksissuedate]','$date','$_SESSION[stusername]')");
                                  mysqli_query($link,"update add_books set available_qty=available_qty-1 where books_name='$_POST[booksname]'");
                                    ?>
                                    

                                    <script type="text/javascript">
                                      window.alert("Book issued successfully");
                                       window.location="issue_books.php";
                                    </script>

                                    
                                    <?php
                                    }
                                }
                                
                                ?>
                               
                               
                            </div>
                        </div>
                    </div>
                </div>
                <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Send Message</h4>
      </div>
      <div class="modal-body">
        <p>Send students a message.</p>
      </div>
      <div class="modal-footer">
       <form action="http://localhost/phplms/librarian/msg.php" method = "POST">
        <button type="submit" class="btn btn-default" name="submit2">Send</button>
        <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
        </form>
      </div><div class="clearfix"></div>
    </div>

  </div>
</div>
                
            </div>
        </div>
        <!-- /page content -->
<script src="../vendors/jquery/jQuery-3.3.1-min.js" type="text/javascript"></script>
<script src="../vendors/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="bootstrap-modal/js/bootstrap-modal.js"></script>
<?php
include "footer.php";
?>