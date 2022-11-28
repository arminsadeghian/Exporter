<?php

namespace App\Exporter;

class JsonExporter extends BaseExporter
{
    protected string $format = '.json';

    public function export(): string
    {
        $fileName = "json-file-" . rand(100000, 999999) . $this->format;
        $filePath = __DIR__ . "/../files/$fileName";
        file_put_contents($filePath, json_encode($this->data));
        return "$fileName Successfully Created!\n";
    }
}