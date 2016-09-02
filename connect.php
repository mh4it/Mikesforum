<?php


$db = new mysqli("ricebran.db.7074516.hostedresource.com","ricebran", "u%73641Lepaistereo", "ricebran");

if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}

$db2 = new mysqli("ricebran.db.7074516.hostedresource.com","ricebran", "u%73641Lepaistereo", "ricebran");

if($db2->connect_errno > 0){
    die('Unable to connect to database [' . $db2->connect_error . ']');
}


?>
