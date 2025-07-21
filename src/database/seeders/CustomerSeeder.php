<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    public function run(): void
    {
        $customers = [
            [
                'name' => 'Ahmad Fauzi',
                'email' => 'ahmad.fauzi@example.com',
                'phone' => '081234567890',
                'address' => 'Jl. Gunung Bromo No. 15, Malang, Jawa Timur',
                'birth_date' => '1990-05-15',
                'id_number' => '3507121505900001',
                'emergency_contact_name' => 'Siti Fauzi',
                'emergency_contact_phone' => '081234567891',
                'status' => 'active',
            ],
            [
                'name' => 'Sarah Wijaya',
                'email' => 'sarah.wijaya@example.com',
                'phone' => '081345678901',
                'address' => 'Jl. Semeru Raya No. 28, Batu, Jawa Timur',
                'birth_date' => '1992-08-22',
                'id_number' => '3507126208920002',
                'emergency_contact_name' => 'Budi Wijaya',
                'emergency_contact_phone' => '081345678902',
                'status' => 'active',
            ],
            [
                'name' => 'Rahman Hidayat',
                'email' => 'rahman.hidayat@example.com',
                'phone' => '081456789012',
                'address' => 'Jl. Panderman No. 42, Batu, Jawa Timur',
                'birth_date' => '1988-12-10',
                'id_number' => '3507121012880003',
                'emergency_contact_name' => 'Nina Hidayat',
                'emergency_contact_phone' => '081456789013',
                'status' => 'active',
            ],
            [
                'name' => 'Lisa Permata',
                'email' => 'lisa.permata@example.com',
                'phone' => '081567890123',
                'address' => 'Jl. Arjuno No. 7, Malang, Jawa Timur',
                'birth_date' => '1995-03-18',
                'id_number' => '3507125803950004',
                'emergency_contact_name' => 'Andi Permata',
                'emergency_contact_phone' => '081567890124',
                'status' => 'active',
            ],
            [
                'name' => 'Dicky Pratama',
                'email' => 'dicky.pratama@example.com',
                'phone' => '081678901234',
                'address' => 'Jl. Welirang No. 33, Batu, Jawa Timur',
                'birth_date' => '1991-07-25',
                'id_number' => '3507122507910005',
                'emergency_contact_name' => 'Maya Pratama',
                'emergency_contact_phone' => '081678901235',
                'status' => 'active',
            ],
        ];

        foreach ($customers as $customer) {
            Customer::firstOrCreate(
                ['email' => $customer['email']],
                $customer
            );
        }
    }
}
