<?php


namespace App\Tests\Pdf;

//include ('public/Files/dir2.php');
//include ('../_log/debug/dir.php');


class GeneratePdf
{
    public function Generate($tag,$filename)
    {
        $path = '/var/www/html/App/Tests/_log/debug/'.$tag.'/';
        $path1 = '/var/www/html/App/Screenshots/Files/';
        $images = array();
        $pdf = new \Imagick();
        $files = glob($path.'*.{jpeg,gif,png}', GLOB_BRACE);
        //scandir( "/var/www/html/acc/tests/_output/debug");
        foreach ($files as $fileToDisplay)
        {
            if (in_array($fileToDisplay, array('.','..'))) continue;

            array_push($images,$fileToDisplay);

        }

        natsort($images);
        $pdf->readImages($images);
        $pdf->setImageFormat('pdf');
        $pdf->writeImages('/var/www/html/public/Files/'.$filename.'.pdf', true);
    }

}