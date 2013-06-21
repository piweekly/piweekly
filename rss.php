<?php
header('Content-type: text/xml');
$homepage = file_get_contents('http://us7.campaign-archive2.com/feed?u=a3e42d3ea4355ad45198b39ba&id=2141506785');
echo $homepage;
?>