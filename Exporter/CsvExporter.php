<?php

namespace App\Exporter;

class CsvExporter extends BaseExporter
{
    protected string $format = '.csv';

    public function export(): string
    {
        $fileName = "csv-file-" . rand(100000, 999999) . $this->format;
        $filePath = __DIR__ . "/../files/$fileName";
        file_put_contents($filePath, "{$this->data['title']},{$this->data['content']}");
        return "$fileName successfully Created!\n";
    }
}