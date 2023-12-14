<?php
if (isset($_POST['email']) && !empty($_POST['email'])) {
    $path = dirname(dirname(__FILE__)) . '/App/Tests/_log/email-config.txt';
   // if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $explode = explode(',',$_POST['email']); // Explodes the emails by the comma
    $valid = false;
    $list = array();
    foreach($explode as $email) {
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $valid = true;
            array_push($list,$email);


        }else {
            $msg[]=['Invalid E-Mail address!, Counld not save email', 'Mailerror'];
        }
    }
    $saved = file_put_contents($path,implode(PHP_EOL, $list));
    if ($saved) {
        $msg[]=['Email successfully saved', 'Mailsuccess'];
    } /*else {
        $msg[]=['Counld not save email', 'Mailerror'];
    }*/


} else {
    $msg[]=['Please enter E-Mail', 'Mailerror'];
}
if (isset($msg)) {
    foreach ($msg as $item) {

        echo '<div class="'.$item[1].'">
                 <p class="msg">'.$item[0].'</p>
              </div>
        ';
    }
}
?>

