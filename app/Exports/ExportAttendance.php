<?php

namespace App\Exports;

use App\Models\Attendance;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ExportAttendance implements FromQuery, ShouldAutoSize, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;
    public function query()
    {
        $attendance = Attendance::with('user');
        return $attendance;
    }

    public function map($attendance): array {
        return [
            $attendance->user->nomor_induk,
            $attendance->user->name,
            $attendance->tanggal_masuk,
            $attendance->tanggal_keluar,
            $attendance->jam_masuk,
            $attendance->jam_keluar,
            $attendance->lat_in,
            $attendance->long_in,
            $attendance->lat_out,
            $attendance->long_out,
        ];
    }

    public function headings(): array
    {
        return [
            'Nomor Induk',
            'Nama',
            'Tanggal Masuk',
            'Tanggal Keluar',
            'Jam Masuk',
            'Jam Keluar',
            'Lat In',
            'Long In',
            'Lat Out',
            'Long Out',
        ];
    }
}
