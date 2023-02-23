<?php

$heading = 'Create a note';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $config = require "config.php";
    $db = new Database($config['database']);
    $note = $db->query("insert into notes (body, user_id) values (:body, :user_id)", [
        'body' => $_POST['body'],
        'user_id' => 1
    ]);
}

require "views/notes-create.view.php";