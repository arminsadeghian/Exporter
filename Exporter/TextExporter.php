<?php

namespace App\Exporter;

class TextExporter extends BaseExporter
{
    protected string $format = '.txt';

    public function export(): string
    {
        $fileName = "text-file-" . rand(100000, 999999) . $this->format;
        $filePath = __DIR__ . "/../files/$fileName";
        file_put_contents($filePath, "{$this->data['title']}\n{$this->data['content']}");
        return "$fileName Successfully Created!\n";
    }
}