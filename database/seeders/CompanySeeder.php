<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $companies = [
            [
                'name' => 'Pabrik Teknologi',
                'owner_name' => 'Farid Angga',
                'address' => 'Jl. Kapi Sraba Raya 12A 22 Sawojjajar 2',
                'phone' => '081357046700',
                'email' => 'noobs0789@gmail.com',
            ],
            [
                'name' => 'CV Berkah Jaya',
                'owner_name' => 'Muhammad Rayhan Gibran',
                'address' => 'Malang',
                'phone' => '78787845',
                'email' => 'berkahjaya@gmail.com',
            ],
            [
                'name' => 'PT Sukses Makmur',
                'owner_name' => 'Budi Santoso',
                'address' => 'Jl. Merdeka No. 15, Surabaya',
                'phone' => '08345678901',
                'email' => 'budi@suksesmakmur.com',
            ],
            [
                'name' => 'UD Cahaya Mandiri',
                'owner_name' => 'Siti Nurhaliza',
                'address' => 'Jl. Diponegoro No. 8, Yogyakarta',
                'phone' => '08456789012',
                'email' => 'siti@cahayamandiri.com',
            ],
            [
                'name' => 'CV Maju Bersama',
                'owner_name' => 'Ahmad Wijaya',
                'address' => 'Jl. Sudirman No. 25, Bandung',
                'phone' => '08567890123',
                'email' => 'ahmad@majubersama.com',
            ],
            [
                'name' => 'PT Karya Utama',
                'owner_name' => 'Dewi Sartika',
                'address' => 'Jl. Gatot Subroto No. 12, Jakarta',
                'phone' => '08678901234',
                'email' => 'dewi@karyautama.com',
            ],
        ];

        foreach ($companies as $company) {
            \App\Models\Company::create($company);
        }
    }
}
