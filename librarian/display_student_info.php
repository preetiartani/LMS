<?php
session_start();
if(!isset($_SESSION["librarian"])){
    ?>
    <script>
        window.location="login.php";
    </script>
<?php
}
include "header.php";
include "connection.php";
?>

        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Student Info</h3>
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
                <div class="row" style="min-height:700px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Student Info</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
<?php
$res = mysqli_query($link,"select * from student_registration");
echo "<table class='table table-bordered'>";
echo "<tr>";
echo "<th>"; echo "Firstname"; echo "</th>";
echo "<th>"; echo "Lastname"; echo "</th>";
echo "<th>"; echo "Username"; echo "</th>";
echo "<th>"; echo "Email"; echo "</th>";
echo "<th>"; echo "Contact"; echo "</th>";
echo "<th>"; echo "Sem"; echo "</th>";
echo "<th>"; echo "Enrollment"; echo "</th>";
echo "<th>"; echo "Status"; echo "</th>";
echo "<th>"; echo "Approve"; echo "</th>";
echo "<th>"; echo "Disapprove"; echo "</th>";
echo "</tr>";
while($row=mysqli_fetch_array($res)){
    echo "<tr>";
    echo "<td>"; echo $row['firstname']; echo "</td>";
    echo "<td>"; echo $row['lastname']; echo "</td>";
    echo "<td>"; echo $row['username']; echo "</td>";
    echo "<td>"; echo $row['email']; echo "</td>";
    echo "<td>"; echo $row['contact']; echo "</td>";
    echo "<td>"; echo $row['sem']; echo "</td>";
    echo "<td>"; echo $row['enrollment']; echo "</td>";
    echo "<td>"; echo $row['status']; echo "</td>";
    echo "<td>"; ?><a style="color:red;" href="approve.php?id=<?php echo $row["id"]; ?>">Approve</a><?php echo "</td>";
    echo "<td>"; ?><a style="color:red;" href="notapprove.php?id=<?php echo $row["id"]; ?>">Disapprove</a><?php echo "</td>";
    echo "</tr>";
}
echo "</table>";
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
</div><div class="clearfix"></div>
            </div>
        </div>
        <!-- /page content -->

<script src="../vendors/jquery/jQuery-3.3.1-min.js" type="text/javascript"></script>
<script src="../vendors/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="bootstrap-modal/js/bootstrap-modal.js"></script>
<?php
include "footer.php";
?>