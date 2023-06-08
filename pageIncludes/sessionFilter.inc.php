<?php
if (!isset($_SESSION['id'])) {
    echo "<script type='text/javascript'>
                    window.location='signin.php';
                </script>";
}