<?php

$source = file_get_contents( './assets/test.jpg' );
$base64 = base64_encode( $source );

echo "<img src='data:image/jpg; base64, $base64'>";

?>