<?php

namespace App\Exporter;

use Dompdf\Dompdf as PDF;

class PdfExporter extends BaseExporter
{
    protected string $format = '.pdf';

    public function export(): string
    {
//        dd($this->data);
        $fileName = "pdf-file-" . rand(100000, 999999) . $this->format;
        $filePath = __DIR__ . "/../files/$fileName";

        // Dompdf package
        $pdf = new PDF();
        $pdf->loadHtml("Title: {$this->data['title']}<br> Content: {$this->data['content']}");
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();
        $output = $pdf->output();

        file_put_contents($filePath, $output);
        return "$fileName Created Successfully";
    }

}