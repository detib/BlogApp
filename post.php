<?php
  require './includes/database.php';

  $id = htmlentities( mysqli_real_escape_string( $conn, $_GET['id'] ) );

  $query = "select * from posts where id=$id";

  $result = mysqli_query( $conn, $query );

  $post = mysqli_fetch_assoc( $result );
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
    <link rel="stylesheet" href="dist\post.css">
    <link rel="stylesheet" href="dist\timeline.css">

    <title>Post <?php echo $id ?></title>
</head>

<body>
    <?php require './includes/navbar.php' ?>
    <div class="post-wrapper">
        <div class="single-post-container post-container">
            <div class="post-header inline spread">
                <div class="image-container"><img src="https://picsum.photos/75/75" alt=""></div>
                <div class="post-title-user">
                    <h6 class="post-title"><?php echo $post["title"] ?></h6>
                    <p><?php echo $post["user"] ?></p>
                </div>
                <div class="time-of-post">
                    <p>
                        <?php
                          echo date( 'D-M-Y : H-i', strtotime( $post['date'] ) )
                        ?>
                    </p>
                </div>
            </div>
            <div class="post-body">
                <p><?php echo $post["body"] ?></p>
                <div class="edit-post">
                    <div class="go-to-post">
                        <a href="./editpost.php?id=<?php echo $post['id'] ?>">Edit Post</a>
                    </div>
                    <div class="go-to-post delete-post">
                        <a href="./deletepost.php?id=<?php echo $post['id'] ?>">Delete Post</a>
                    </div>
                </div>
            </div>
            <?php if ($post['date'] != $post['edit_date']): ?>
            
            <div class="last-edit">
                <p>Last edit on: <?php echo date( 'D-M-Y : H-i', strtotime( $post['edit_date'] ) )?></p>
            </div>
            <?php endif ?>
        </div>
    </div>
</body>

</html>