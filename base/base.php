<?php

require_once 'classes/Boot/Loader.php';

BasePhp\Boot\Loader::loadFunctions();
BasePhp\Boot\Loader::loadClasses();

BasePhp\Interaction\Api::loadEndpoint(
    $_SERVER['REQUEST_URI']
);