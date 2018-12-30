<?php
session_start();
unset($_SESSION);
session_destroy();

echo "<script>window.open('index.php','_self')</script>";

?>