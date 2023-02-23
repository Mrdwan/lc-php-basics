<?php

$heading = 'Create a note';
$config = require "config.php";
require "Validator.php";
$db = new Database($config['database']);
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (! Validator::string($_POST['body'])) {
        $errors['body'] = 'Note description is required and can not be more than 1000 characters';
    }

    if (empty($errors)) {
        $note = $db->query("insert into notes (body, user_id) values (:body, :user_id)", [
            'body' => $_POST['body'],
            'user_id' => 1
        ]);
    }
}

require "views/notes/create.view.php";