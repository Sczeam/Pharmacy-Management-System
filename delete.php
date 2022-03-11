<?php
include "config.php";
$id=$_GET["id"];
mysqli_query($conn, "delete from user_form where id=$id");
?>

<script type="text/javascript">
    window.location="headadmin.php"
    </script>