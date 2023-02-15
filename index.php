<?php
require 'config/config.php';
require 'app/core/Core.php';
require 'vendor/autoload.php';
require 'app/packages/system32/Debug.php';
require 'app/packages/system32/Notificacao.php';
require 'app/packages/system32/Implementacoes.php';

$core = new Core;
$core->run();
?>