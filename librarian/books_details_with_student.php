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
                        <h3>Books with details</h3>
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
                                <h2>Books with details</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                               <?php
                               $i=0;
                                $res=mysqli_query($link, "select * from add_books where available_qty>0 && is_deleted=0");
                                echo "<table class='table table-bordered'>";
                                echo "<tr>";
                                while($row=mysqli_fetch_array($res)){
                                    $i = $i+1;
                                    echo "<td>";
                                    ?> <img src="../librarian/<?php echo $row["books_image"];?>" height="100" width="100"><?php
                                    echo "<br>";
                                    echo "<b>".$row["books_name"]."<b>";
                                    echo "<br>";
                                    echo "<b> Total Books: ".$row["books_qty"]."<b>";
                                    echo "<br>";
                                    echo "<b> Available: ".$row["available_qty"]."</b>";
                                    echo "<br>";?>
                                    <a href="all_students_of_this_book.php?books_name=<?php echo $row["books_name"];?>" style="color: red;">Record of students with this book</a>
                                    <?php
                                    echo "</td>";
                                    
                                    if($i==3){
                                        echo "</tr>";
                                        echo "<tr>";
                                        $i=0;
                                    }
                                 }
                                    echo "</tr>";
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