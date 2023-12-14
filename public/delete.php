<?php
$dir = '/var/www/html/mscacceptancetests/public/Files/';
array_map('unlink', glob("{$dir}*.pdf"));
//array_map(unlink($_GET['file'],glob("{$dir}*.pdf")));
//unlink($_GET['file']);
?>