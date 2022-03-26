<div class="timeline-post-container">
    <h1>Timeline</h1>
    <?php
      require 'database.php';

      $query = "select * from posts order by date desc";

      $result = mysqli_query( $conn, $query );

      $posts = mysqli_fetch_all( $result, MYSQLI_ASSOC );

      foreach ( $posts as $post ):
    ?>
    <div class="post-container">
        <div class="post-header inline spread">
            <div class="image-container"><img src="https://picsum.photos/75/75" alt=""></div>
            <div class="post-title-user">
                <h6 class="post-title"><?php echo $post["title"] ?></h6>
                <p><?php echo $post["user"] ?></p>
            </div>
            <div class="time-of-post">
                <p>
                    <?php
                      echo date( 'Y-M-D : H-i', strtotime( $post['date'] ) )
                    ?>
                </p>
            </div>
        </div>
        <div class="post-body">
            <p><?php echo $post["body"] ?></p>
            <div class="go-to-post">
                <a href="./post.php?id=<?php echo $post['id'] ?>">Read More</a>
            </div>
        </div>
    </div>

    <?php endforeach ?>
    <?php if(!$posts):?>
        <em><p>Currently there are no posts!</p></em>
    <?php endif ?>
</div>