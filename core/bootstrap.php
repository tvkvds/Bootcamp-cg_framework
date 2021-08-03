<?php

require 'vendor/autoload.php';

// Starting a server PHP session
session_start();

// Using the Dotenv package for using the .env and the global $_ENV
$dotenv = \Dotenv\Dotenv::createImmutable($_SERVER['DOCUMENT_ROOT']);
$dotenv->load();

// Showing 'flash' messages if one is set in the session
$msg = new \Plasticbrain\FlashMessages\FlashMessages();
$msg->display();