<?php
session_start();
include_once('./dynamodb.php');

// preview(getTable('MatchingDetails'));
// echo"------------------------------";
// preview(getTable('userinfo'));


preview($api->getMatch(302917025));
