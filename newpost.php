<?php

  $showErrorMessage = false;

  if ( isset( $_POST["submit"] ) ) {
    require 'includes/database.php';

    $title = htmlentities( mysqli_real_escape_string( $conn, $_POST["title"] ) );
    $body = htmlentities( mysqli_real_escape_string( $conn, $_POST["body"] ) );

    if ( trim( $title ) != "" && trim( $body ) != "" ) {
      $query = "insert into posts(title, user, body) values ('$title','Deti', '$body')";

      mysqli_query( $conn, $query );
      header( 'Location: index.php' );
    } else {
      $showErrorMessage = true;
    }
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
        <h1>Add a new post</h1>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <div class="input-field">
                <label for="title">What is the title of your post?</label>
                <input type="text" name="title" id="title"
                    value="<?php echo isset( $_POST["title"] ) ? $_POST["title"] : ''?>">
            </div>
            <div class="input-field">
                <label for="body">What do you want to add?</label>
                <textarea name="body" id="body"
                    rows="7"><?php echo isset( $_POST["body"] ) ? $_POST["body"] : ''; ?></textarea>
            </div>
            <div class="error-box" style="display:<?php echo $showErrorMessage ? "block" : "none" ?>">
                <strong>
                    <p>Please fill all the fields.</p>
                </strong>
            </div>
            <input class="submit-button" name="submit" type="submit" value="Add">
        </form>
    </div>
</body>

</html>