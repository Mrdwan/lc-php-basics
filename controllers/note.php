<?php

$heading = 'Notes';

$config = require "config.php";
require "Response.php";

$db = new Database($config['database']);
$note = $db->query("select * from notes where user_id = :user id = :id", [
    'user' => 1,
    'id' => $_GET['id']
])->findOrFail();

$currentUser = 1;
authorize($note['user_id'] === $currentUser);

require "views/note.view.php";