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
                        <h3>Return Book </h3>
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
                                <h2>Return Book</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <form action="" method="post" name="form1">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td>
                                                <select name="enr" class="form-control">
                                                  <?php
                                                    $res=mysqli_query($link,"select student_enrollment from issue_books where books_return_date=''");
                                                    while($row=mysqli_fetch_array($res)){
                                                        echo "<option>";
                                                        echo $row["student_enrollment"];
                                                        echo "</option>";
                                                    }
                                                   ?>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="submit" name="submit1" value="Search" class="form-control btn btn-default" style="background-color: #258977; color: white;">
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                                <?php
                                
                                if(isset($_POST["submit1"])){
                                    
                                    $res= mysqli_query($link,"select * from issue_books where student_enrollment='$_POST[enr]' && books_return_date=''");
                                    echo "<table class='table table-bordered'>";
                                    echo "<th>"; echo "Student enrollment"; echo "</th>";
                                    echo "<th>"; echo "Student name"; echo "</th>";
                                    echo "<th>"; echo "Student sem"; echo "</th>";
                                    echo "<th>"; echo "Student contact"; echo "</th>";
                                    echo "<th>"; echo "Student email"; echo "</th>";
                                    echo "<th>"; echo "Books name"; echo "</th>";
                                    echo "<th>"; echo "Books issue date"; echo "</th>";
                                    echo "<th>"; echo "Return book"; echo "</th>";
                                    while($row=mysqli_fetch_array($res)){
                                        echo "<tr>";
                                        echo "<td>";
                                        echo $row["student_enrollment"];
                                        echo "</td>";
                                        echo "<td>";
                                        echo $row["student_name"];
                                        echo "</td>";
                                        echo "<td>";
                                        echo $row["student_sem"];
                                        echo "</td>";
                                        echo "<td>";
                                        echo $row["student_contact"];
                                        echo "</td>";
                                        echo "<td>";
                                        echo $row["student_email"];
                                        echo "</td>";
                                        echo "<td>";
                                        echo $row["books_name"];
                                        echo "</td>";
                                        echo "<td>";
                                        echo $row["books_issue_date"];
                                        echo "</td>";
                                        echo "<td>";
                                        ?><a style="color:red;" href="return.php?id=<?php echo $row["id"];?>">Return Book</a><?php
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                    echo "</table>";
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