<?php

/*
 * This file is part of the Webception package.
 *
 * (c) James Healey <jayhealey@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/*
|--------------------------------------------------------------------------
| Route: Dashboard
|--------------------------------------------------------------------------
|
| The dashboard is the homepage of Webception. It loads all the
| configuration and shows what tests are available to run.
|
*/

$app->get('/', function ($site = null) use ($app) {

    $tests       = FALSE;
    $test_count  = 0;
    $webception  = $app->config('webception');
    $codeception = $app->codeception;
    $environments = array();
    $images = array();

    if ($codeception->ready()) {

        $tests      = $codeception->getTests();

        $test_count = $codeception->getTestTally();
        if (isset($codeception->config['env'])) {
            $environments = $codeception->config['env'];
        }
    }
    $path = '/var/www/html/public/Files/';
    $pathResult = '/var/www/html/public/Files/result/';

    $files = glob($path.'*.{pdf}', GLOB_BRACE);
    /*foreach ($files as $fileToDisplay)
    {
        if (in_array($fileToDisplay, array('.','..'))) continue;

        array_push($images,$fileToDisplay);

    }*/
    $images = array_map('basename', glob($path . "*.{jpg,JPG,jpeg,JPEG,png,PNG,pdf}", GLOB_BRACE));
    $results = array_map('basename', glob($pathResult . "*.{jpg,JPG,jpeg,JPEG,png,PNG,pdf}", GLOB_BRACE));


    $app->render('dashboard.html', array(
        'name'        => $app->getName(),
        'webception'  => $webception,
        'codeception' => $codeception,
        'tests'       => $tests,
        'test_count'  => $test_count,
        'environments'=> $environments,
        'pdfs'=>  $images,
        'results' =>$results
    ));
});

