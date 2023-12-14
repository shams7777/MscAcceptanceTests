<?php
$contents = file_get_contents('/var/www/html/mscacceptancetests/public/run.sh');
echo shell_exec($contents);