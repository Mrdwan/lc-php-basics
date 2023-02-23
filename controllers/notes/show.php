<?php

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);

$currentUserId = 1;

$note = $db->query('select * from notes where id = :id', [
    'id' => $_GET['id']
])->findOrFail();

authorize((int) $note['user_id'] === $currentUserId);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db->query("delete from notes where id = :id", [
        'id' => $_GET['id']
    ]);

    header('Location: /notes');
    exit();
}

view("notes/show.view.php", [
    'heading' => 'Note',
    'note' => $note
]);