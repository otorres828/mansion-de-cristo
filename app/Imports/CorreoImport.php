<?php

namespace App\Imports;

use App\Models\EnviarCorreo;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class CorreoImport implements ToModel, WithHeadingRow, WithBatchInserts, WithChunkReading, WithValidation
{
    public function model(array $row)
    {
        return new EnviarCorreo([
            'correo' => $row['correo'],
        ]);
    }

    public function batchSize(): int
    {
        return 4000;
    }

    public function chunkSize(): int
    {
        return 4000;
    }

    public function rules(): array
    {
        return [
            '*.correo' => [
                'string',
                'required|unique:enviar_correos'
            ],
        ];
    }
}