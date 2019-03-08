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

if(isset($_GET["id"])){
    $id = $_GET["id"];
mysqli_query($link,"update add_books set is_deleted=1 where id=$id && books_qty=available_qty");
?>
<script type="text/javascript">
    window.location="display_books.php";
</script>
<?php
}
else{
    ?>
    <script type="text/javascript">
    window.location="display_books.php";
</script>
<?php
}
?>