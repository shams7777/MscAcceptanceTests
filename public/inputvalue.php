<?php
$path =(dirname(dirname(__FILE__))) . '/App/Tests/_log/email-config.txt';
$list= array();
if(file_exists($path)) {
    $txt_file = fopen($path, 'r');
    $a = 1;
    while ($line = fgets($txt_file)) {
        //echo($a." ".$line)."<br>";
        array_push($list,$line);
        $a++;
    }
    fclose($txt_file);
}

$str = implode(',',$list);
/*foreach ($list as $item):
    $str = $str.$item;
if(next($list)){echo ',';}
endforeach;*/
echo $str;
