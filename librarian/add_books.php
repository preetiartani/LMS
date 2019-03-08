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
                        <h3>Add Books</h3>
                    </div>

                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                    <span class="input-group-btn">
                      <button type="button" class="btn" style="background-color:#258977;color:white;" data-toggle="modal" data-target="#myModal">Send Message</button>
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
                                <h2>Add Books Info</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                              <form action="" method ="post" name="form1" class="col-lg-6" enctype="multipart/form-data">
                                  
                              <table class="table table-bordered">
                                   <tr>
                                       <td><input type="text" class="form-control" placeholder="Books name" name="booksname" required=""></td>
                                   </tr>
                                   <tr>
                                       <td>
                                       Books image
                                       <input type="file" name="f1" required=""></td>
                                   </tr>
                                   <tr>
                                       <td><input type="text" class="form-control" placeholder="Books author name" name="bauthorname" required=""></td>
                                   </tr>
                                   <tr>
                                       <td><input type="text" class="form-control" placeholder="Publication name" name="pname" required=""></td>
                                   </tr>
                                   <tr>
                                       <td><input type="text" class="form-control" placeholder="Books purchase date" name="bpurchasedt" required=""></td>
                                   </tr>
                                   <tr>
                                       <td><input type="text" class="form-control" placeholder="Books price" name="bprice" required=""></td>
                                   </tr>
                                   <tr>
                                       <td><input type="text" class="form-control" placeholder="Books quantity" name="bqty" required=""></td>
                                   </tr>
                                   <tr>
                                       <td><input type="text" class="form-control" placeholder="Available quantity" name="aqty" required=""></td>
                                   </tr>
                                   <tr>
                                       <td><input type="submit" name="submit1" class="btn btn-default submit" value="Insert book details" style="background-color: #258977; color:white;"></td>
                                   </tr>
                               </table>
                               </form>    
                               
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

if(isset($_POST["submit1"])){
    $tm = md5(time());
    $fnm = $_FILES["f1"]["name"];
    $dst = "./books_image/".$tm.$fnm;
    $dst1 = "books_image/".$tm.$fnm;
    move_uploaded_file($_FILES["f1"]["tmp_name"],$dst);
    
    mysqli_query($link,"insert into add_books values('','$_POST[booksname]','$dst1','$_POST[bauthorname]','$_POST[pname]','$_POST[bpurchasedt]','$_POST[bprice]','$_POST[bqty]','$_POST[aqty]','$_SESSION[librarian]','')");
?>

    <script type="text/javascript">
        alert("Books inserted successfully");
    </script>
<?php
}

?>
<?php
include "footer.php";
?>