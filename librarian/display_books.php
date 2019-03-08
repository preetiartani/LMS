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
                        <h3>Display Books</h3>
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
                                <h2>Display & Search Books</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
  
                                <form action="" name="form1" method="post">
                                <input type="text" name="t1" class="form-control" placeholder="Enter Book name">
                                <input type="submit" name="submit1" value="Search Book" class="btn btn-default">
                            </form>
<?php
if(isset($_POST["submit1"])){
$res = mysqli_query($link,"select * from add_books where books_name like ('%$_POST[t1]%') && is_deleted=0");
echo "<table class='table table-bordered'>";
echo "<tr>";
echo "<th>"; echo "Book Image"; echo "</th>";
echo "<th>"; echo "Book Name"; echo "</th>";
echo "<th>"; echo "Author Name"; echo "</th>";
echo "<th>"; echo "Publication"; echo "</th>";
echo "<th>"; echo "Purchase Date"; echo "</th>";
echo "<th>"; echo "Book Price"; echo "</th>";
echo "<th>"; echo "Book Quantity"; echo "</th>";
echo "<th>"; echo "Available Quantity"; echo "</th>";
echo "<th>"; echo "Delete Book"; echo "</th>";
echo "</tr>";
while($row=mysqli_fetch_array($res)){
    echo "<tr>";
    echo "<td>"; ?><img src="<?php echo $row["books_image"]; ?>" alt="book" height="50" width="50"><?php echo "</td>";
    echo "<td>"; echo $row['books_name']; echo "</td>";
    echo "<td>"; echo $row['books_author_name']; echo "</td>";
    echo "<td>"; echo $row['books_publication_name']; echo "</td>";
    echo "<td>"; echo $row['books_purchase_date']; echo "</td>";
    echo "<td>"; echo $row['books_price']; echo "</td>";
    echo "<td>"; echo $row['books_qty']; echo "</td>";
    echo "<td>"; echo $row['available_qty']; echo "</td>";
    echo "<td>"; ?><a href="delete_books.php?id=<?php echo $row["id"];?>">Delete</a><?php echo "</td>";
    echo "</tr>";
}
echo "</table>";

    
}
else{
$res = mysqli_query($link,"select * from add_books where is_deleted=0");
echo "<table class='table table-bordered'>";
echo "<tr>";
echo "<th>"; echo "Book Image"; echo "</th>";
echo "<th>"; echo "Book Name"; echo "</th>";
echo "<th>"; echo "Author Name"; echo "</th>";
echo "<th>"; echo "Publication"; echo "</th>";
echo "<th>"; echo "Purchase Date"; echo "</th>";
echo "<th>"; echo "Book Price"; echo "</th>";
echo "<th>"; echo "Book Quantity"; echo "</th>";
echo "<th>"; echo "Available Quantity"; echo "</th>";
echo "<th>"; echo "Delete Book"; echo "</th>";
echo "</tr>";
while($row=mysqli_fetch_array($res)){
    echo "<tr>";
    echo "<td>"; ?><img src="<?php echo $row["books_image"]; ?>" alt="book" height="50" width="50"><?php echo "</td>";
    echo "<td>"; echo $row['books_name']; echo "</td>";
    echo "<td>"; echo $row['books_author_name']; echo "</td>";
    echo "<td>"; echo $row['books_publication_name']; echo "</td>";
    echo "<td>"; echo $row['books_purchase_date']; echo "</td>";
    echo "<td>"; echo $row['books_price']; echo "</td>";
    echo "<td>"; echo $row['books_qty']; echo "</td>";
    echo "<td>"; echo $row['available_qty']; echo "</td>";
    echo "<td>"; ?><a href="delete_books.php?id=<?php echo $row["id"];?>">Delete</a><?php echo "</td>";
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