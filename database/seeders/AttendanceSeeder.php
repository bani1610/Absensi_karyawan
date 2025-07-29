<?php

namespace Database\Seeders;

use App\Models\Attendance;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AttendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Attendance dengan tombol (tanpa QR Code)
        $attendance1 = Attendance::create([
            'title' => 'Absensi Harian Kantor',
            'description' => 'Absensi harian untuk karyawan kantor pusat',
            'start_time' => '08:00:00',
            'batas_start_time' => '08:30:00',
            'end_time' => '17:00:00',
            'batas_end_time' => '17:30:00',
            'code' => null, // Tidak menggunakan QR Code
        ]);

        // Sync dengan semua positions
        $attendance1->positions()->sync([1, 2, 3, 4]);

        // Attendance dengan QR Code
        $attendance2 = Attendance::create([
            'title' => 'Absensi Lapangan QR Code',
            'description' => 'Absensi untuk karyawan lapangan menggunakan QR Code',
            'start_time' => '07:00:00',
            'batas_start_time' => '07:30:00',
            'end_time' => '16:00:00',
            'batas_end_time' => '16:30:00',
            'code' => Str::random(32), // Menggunakan QR Code
        ]);

        // Sync dengan positions tertentu
        $attendance2->positions()->sync([1, 2]);

        // Attendance QR Code untuk shift malam
        $attendance3 = Attendance::create([
            'title' => 'Absensi Shift Malam',
            'description' => 'Absensi shift malam dengan QR Code',
            'start_time' => '20:00:00',
            'batas_start_time' => '20:30:00',
            'end_time' => '04:00:00',
            'batas_end_time' => '04:30:00',
            'code' => Str::random(32), // Menggunakan QR Code
        ]);

        // Sync dengan positions tertentu
        $attendance3->positions()->sync([1, 3]);

        // Attendance tombol untuk management
        $attendance4 = Attendance::create([
            'title' => 'Absensi Management',
            'description' => 'Absensi khusus untuk level management',
            'start_time' => '09:00:00',
            'batas_start_time' => '09:15:00',
            'end_time' => '18:00:00',
            'batas_end_time' => '18:15:00',
            'code' => null, // Tidak menggunakan QR Code
        ]);

        // Sync dengan management positions
        $attendance4->positions()->sync([2, 3]);
    }
}
