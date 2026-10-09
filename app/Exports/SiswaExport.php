<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class SiswaExport implements FromCollection, WithHeadings, WithMapping, WithStyles, ShouldAutoSize
{
    public function collection(): Collection
    {
        return User::query()
            ->where('role', 'siswa')
            ->orderBy('name')
            ->get([
                'id',
                'name',
                'nama',
                'email',
                'nis',
                'kelas',
                'no_hp',
            ]);
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama',
            'Email',
            'NIS',
            'Kelas',
            'No HP',
        ];
    }

    public function map($siswa): array
    {
        return [
            $siswa->id,
            $siswa->nama ?: $siswa->name,
            $siswa->email,
            (string) ($siswa->nis ?? ''),
            $siswa->kelas,
            (string) ($siswa->no_hp ?? ''),
        ];
    }

    public function styles(Worksheet $sheet): array
    {
        $sheet->getStyle('A1:F1')->applyFromArray([
            'font' => [
                'bold' => true,
                'color' => ['rgb' => 'FFFFFF'],
                'size' => 11,
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['rgb' => '1F2937'],
            ],
            'alignment' => [
                'horizontal' => 'center',
                'vertical' => 'center',
            ],
        ]);

        $lastRow = $sheet->getHighestRow();

        if ($lastRow >= 2) {
            $sheet->getStyle("A2:F{$lastRow}")
                ->getAlignment()
                ->setVertical('center');

            $sheet->getStyle("A1:F{$lastRow}")
                ->getBorders()
                ->getAllBorders()
                ->setBorderStyle(Border::BORDER_THIN);

            $sheet->getStyle("D2:D{$lastRow}")
                ->getNumberFormat()
                ->setFormatCode('@');

            $sheet->getStyle("F2:F{$lastRow}")
                ->getNumberFormat()
                ->setFormatCode('@');
        }

        $sheet->freezePane('A2');
        $sheet->setAutoFilter("A1:F{$lastRow}");
        $sheet->getRowDimension(1)->setRowHeight(25);

        return [];
    }
}