<?php

$heading = 'Notes';

$config = require "config.php";
require "Response.php";

$db = new Database($config['database']);
$note = $db->query("select * from notes where user_id = :user id = :id", [
    'user' => 1,
    'id' => $_GET['id']
])->fetch();

if (! $note) {
    abort();
}

if ($note['user_id'] !== 1) {
    abort(Response::FORBIDDEN);
}

require "views/note.view.php";