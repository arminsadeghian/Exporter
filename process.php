<?php

require __DIR__ . '/vendor/autoload.php';

require __DIR__ . '/vendor/larapack/dd/src/helper.php';

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    return;
}

// form submit is OK
[$title, $content, $format] = [$_POST['title'], $_POST['content'], $_POST['format']];

$allowedFileFormat = ['Text', 'Pdf', 'Json', 'Csv'];

if (!in_array($format, $allowedFileFormat)) {
    echo "Invalid Format !";
    return;
}

$className = "App\\Exporter\\{$format}Exporter";
//dd($className);

if (class_exists($className)) {
    $exporter = new $className(['title' => $title, 'content' => $content]);
    echo $exporter->export();
}
