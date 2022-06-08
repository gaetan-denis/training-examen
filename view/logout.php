<?php

/**
 * === Capacité terminale ===
 *
 * Todo : Ce script déconnectera l'utilisateur connecté
 *
 * Estimation : max 5min
 */

session_unset();
session_destroy();
session_write_close();
header('Location: index.php');
die;