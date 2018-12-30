<?php
session_start();
unset($_SESSION);
session_destroy();

echo "<script>window.open('../dentist_login','_self')</script>";

?>