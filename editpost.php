<?php

  $showErrorMessage = false;

  if ( isset( $_POST["submit"] ) ) {
    require 'includes/database.php';

    $update_id = htmlentities( mysqli_real_escape_string( $conn, $_POST["update-id"] ) );
    $title = htmlentities( mysqli_real_escape_string( $conn, $_POST["title"] ) );
    $body = htmlentities( mysqli_real_escape_string( $conn, $_POST["body"] ) );

    if ( trim( $title ) != "" && trim( $body ) != "" ) {
      $query = "update posts set title='$title', body='$body' where id=$update_id";

      mysqli_query( $conn, $query );
      header( 'Location: index.php' );
    } else {
      $showErrorMessage = true;
    }
  }

  if ( isset( $_GET['id'] ) ) {
    require 'includes/database.php';
    $id = htmlentities( mysqli_real_escape_string( $conn, $_GET['id'] ) );

    $query = "select * from posts where id=$id";

    $result = mysqli_query( $conn, $query );
    $postContent = mysqli_fetch_assoc( $result );
  }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dist\App.css">
    <link rel="stylesheet" href="dist\navbar.css">
    <link rel="stylesheet" href="dist\shared.css">
    <link rel="stylesheet" href="dist\newpost.css">

    <title>New Post</title>
</head>

<body>
    <?php require 'includes/navbar.php' ?>

    <div class="add-post-container">
        <h1>Edit this post</h1>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <div class="input-field">
                <label for="title">What do you want to change the title to?</label>
                <input type="text" name="title" id="title" value="<?php
                echo isset( $_POST["title"] ) ? $_POST["title"] : '';
                echo isset( $_GET["id"] ) ? $postContent["title"] : '';
                  ?>">
            </div>
            <div class="input-field">
                <label for="body">What do you want to add?</label>
                <textarea name="body" id="body" rows="7"><?php
                   echo isset( $_POST["body"] ) ? $_POST["body"] : '';
                   echo isset( $_GET['id'] ) ? $postContent["body"] : '';?></textarea>
            </div>
            <div class="error-box" style="display:<?php echo $showErrorMessage ? "block" : "none" ?>">
                <strong>
                    <p>Please fill all the fields.</p>
                </strong>
            </div>
            <input type="hidden" name="update-id" value="<?php echo $_GET['id'] ?>">
            <input class="submit-button" name="submit" type="submit" value="Edit">
        </form>
    </div>
</body>

</html>