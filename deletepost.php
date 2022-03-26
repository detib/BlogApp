<?php
    require './includes/database.php';  

    $id = $_GET['id'];

    $id = htmlentities( mysqli_real_escape_string( $conn, $_GET['id'] ) );

    $query = "delete from posts where id=$id";

    $result = mysqli_query( $conn, $query );

    header('Location: index.php');
?>