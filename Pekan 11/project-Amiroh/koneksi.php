<?php
$conn = mysqli_connect("localhost", "root", "", "kampus_db");

if (!$conn) {
    echo mysqli_connect_error();
}
?>