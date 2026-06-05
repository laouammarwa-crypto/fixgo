<?php
$conn = mysqli_connect("localhost", "root", "", "fixgo_db");
if (!$conn) {
    die("فشل الاتصال: " . mysqli_connect_error());
}
?>