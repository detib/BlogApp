<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dist\App.css">
    <link rel="stylesheet" href="dist\index.css">
    <link rel="stylesheet" href="dist\shared.css">
    <link rel="stylesheet" href="dist\navbar.css">
    <link rel="stylesheet" href="dist\timeline.css">
    <link rel="stylesheet" href="dist\goToPost.css">
    <script src="js\index.js" defer></script>
    <title>Blog App</title>
</head>

<body>
    <?php require 'includes/navbar.php' ?>
    <div class="main-content">
        <?php require 'includes/goToPost.php' ?>
        <?php require 'includes/timeline.php' ?>
    </div>

</body>

</html>