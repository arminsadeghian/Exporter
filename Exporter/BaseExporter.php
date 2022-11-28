<?php

namespace App\Exporter;

abstract class BaseExporter implements Exportable
{
    protected string $format;
    protected array $data;

    public function __construct($data)
    {
        $this->data = $data;
        if (!$this->isValid()) {
            die("Invalid Data!");
        }
    }

    public function isValid(): bool
    {
        foreach ($this->data as $field) {
            if (empty($field)) {
                return false;
            }
        }
        return true;
    }

}
