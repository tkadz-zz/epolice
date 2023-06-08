<?php
session_start();
if(!isset($_SESSION['role'])) {
    echo "<script type='text/javascript'>
    window.location='signin.php';
    </script>";
}
else {
    $role = $_SESSION['role'];
    echo "<script type='text/javascript'>
      window.location='" . $role . "/dashboard.php';
      </script>";

}
?>
