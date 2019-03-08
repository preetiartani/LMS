<?php
session_start();
if(!isset($_SESSION["username"])){
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
                        <h3>My Issued Books</h3>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>My issued books</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                
                                <table class="table table-bordered">
                                    <th>
                                        Student enrollment no.
                                    </th>
                                    <th>
                                        Books name
                                    </th>
                                    <th>Books issue date</th>
                                    
                                    <?php  
                                    $res=mysqli_query($link,"select * from issue_books where student_user_name='$_SESSION[username]'");
                                    while($row=mysqli_fetch_array($res)){
                                        echo "<tr>";
                                        echo "<td>";
                                        echo $row["student_enrollment"];
                                        echo "</td>";
                                        echo "<td>";
                                        echo $row["books_name"];
                                        echo "</td>";
                                        echo "<td>";
                                        echo $row["books_issue_date"];
                                        echo "</td>";
                                    }
                                    
                                    ?>
                                    
                                    
                                </table>
                                
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->

<?php
include "footer.php";
?>