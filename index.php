<?php
session_unset();
session_start();

if (!isset($_SESSION['userid'])) {
    $_SESSION['userid'] = 0;
}
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/lib/lib.php';
require_once __DIR__ . 'lib/db.php';

$connection=connection();

include_once __DIR__ . '/view/header.php';
include_once __DIR__ . '/view/menu.php';
include_once __DIR__ . '/view/default.php';
include_once __DIR__ . '/view/footer.php';