<?php
$dir = '/var/www/html/public/Files/';
$a = array_map('basename', glob($dir . "*.{jpg,JPG,jpeg,JPEG,png,PNG,pdf}", GLOB_BRACE));

$b=count($a);
$res = '';
$links = array();
$files = glob($dir.'*.{pdf}', GLOB_BRACE);
//scandir( "/var/www/html/acc/tests/_output/debug");
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

foreach ($files as $fileToDisplay)
{
    if (in_array($fileToDisplay, array('.','..'))) continue;

    array_push($links,'/var/www/html/public/Files/'.basename($fileToDisplay));

}

for($x=0;$x<$b;$x++)
{

    $res.= "
<div class='row1'>
            <div class='column1' >
                <label class='resultfilename'>
                    <a id='file' class='filename' href='Files/result/$a[$x]'  target='_blank'><strong> $a[$x] </strong></a>
                </label>
                
            </div>
            <div class='column1' >
                <span class='tiny label   secondary right'>
            <strong><a class='download_btn' href='Files/result/$a[$x]' download='$a[$x]'>Download</a></strong>
                    </span>
            </div>
        </div>
        ";


}



echo $res;
?>
