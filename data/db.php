<?php

define('HOST', 'localhost');
define('USER', 'siakag');
define('PASS', '');
define('DB', 'test');

$connection = mysql_connect(HOST, USER, PASS) or die ('Connection to the server failed ' . mysql_error($connection) );

$link = mysql_select_db(DB, $connection) or die ('Connection to database failed' . mysql_error($link) );

// db.php
// Location: data/