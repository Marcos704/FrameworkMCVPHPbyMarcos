<?php
require 'config/config.php';
require 'app/core/Core.php';
require 'vendor/autoload.php';
require 'app/packages/system/sys_run.php';

$core = new Core;
$core->run();
?>