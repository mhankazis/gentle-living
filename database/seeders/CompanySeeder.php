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
                'phone' => '08123456789',
                'email' => 'farid@pabrikteknologi.com',
            ],
            [
                'name' => 'CV Berkah Jaya',
                'owner_name' => 'Muhammad Rayhan Gibran',
                'address' => 'Malang',
                'phone' => '08234567890',
                'email' => 'info@cvberkahjaya.com',
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
        ];

        foreach ($companies as $company) {
            \App\Models\Company::create($company);
        }
    }
}
