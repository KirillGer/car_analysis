<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

use App\Controller\FrontendController;

$main = new FrontendController();
$main();
