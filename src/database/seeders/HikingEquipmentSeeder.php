<?php

namespace Database\Seeders;

use App\Models\HikingEquipment;
use App\Models\Category;
use Illuminate\Database\Seeder;

class HikingEquipmentSeeder extends Seeder
{
    public function run(): void
    {
        $tasGunungCategory = Category::where('slug', 'tas-gunung')->first();
        $tendaCategory = Category::where('slug', 'tenda')->first();
        $sleepingGearCategory = Category::where('slug', 'sleeping-gear')->first();
        $pakaianCategory = Category::where('slug', 'pakaian')->first();
        $sepatuCategory = Category::where('slug', 'sepatu-sandal')->first();
        $cookingCategory = Category::where('slug', 'cooking-gear')->first();
        $navigasiCategory = Category::where('slug', 'navigasi-penerangan')->first();
        $climbingCategory = Category::where('slug', 'climbing-gear')->first();
        $aksesoriCategory = Category::where('slug', 'aksesori')->first();

        $equipments = [
            // Tas Gunung
            [
                'name' => 'Carrier Eiger 60L',
                'description' => 'Tas carrier 60 liter dengan frame internal, cocok untuk pendakian 2-3 hari. Dilengkapi dengan rain cover dan ventilasi punggung.',
                'category_id' => $tasGunungCategory->id,
                'price_per_day' => 25000,
                'stock_total' => 5,
                'stock_available' => 5,
                'brand' => 'Eiger',
                'condition' => 'good',
                'size' => 'L',
                'weight' => 2.5,
                'specifications' => [
                    'kapasitas' => '60 liter',
                    'material' => 'Ripstop Nylon',
                    'frame' => 'Internal',
                    'fitur' => ['Rain cover', 'Hip belt', 'Chest strap', 'Side pocket']
                ],
                'images' => [
                    '/images/equipment/carrier-placeholder.svg',
                    'https://images.unsplash.com/photo-1551698618-1dfe5d97d256?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'
                ],
                'rental_terms' => 'Tas harus dikembalikan dalam kondisi bersih dan kering',
                'is_featured' => true,
                'security_deposit' => 200000,
                'min_rental_days' => 1,
                'max_rental_days' => 7,
            ],
            [
                'name' => 'Daypack Consina 35L',
                'description' => 'Daypack 35 liter untuk day hiking atau pendakian ringan. Desain ergonomis dengan multiple compartment.',
                'category_id' => $tasGunungCategory->id,
                'price_per_day' => 15000,
                'stock_total' => 8,
                'stock_available' => 8,
                'brand' => 'Consina',
                'condition' => 'excellent',
                'size' => 'M',
                'weight' => 1.2,
                'specifications' => [
                    'kapasitas' => '35 liter',
                    'material' => 'Polyester 600D',
                    'fitur' => ['Hydration compatible', 'Side pocket', 'Front pocket']
                ],
                'images' => [
                    '/images/equipment/carrier-placeholder.svg',
                    'https://images.unsplash.com/photo-1578662996442-48f60103fc96?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'
                ],
                'rental_terms' => 'Cocok untuk pendakian harian',
                'is_featured' => false,
                'security_deposit' => 150000,
                'min_rental_days' => 1,
                'max_rental_days' => 5,
            ],

            // Tenda
            [
                'name' => 'Tenda Dome Lafuma 2P',
                'description' => 'Tenda dome 2 person dengan double layer, tahan angin dan hujan. Mudah dipasang dan cocok untuk 4 season.',
                'category_id' => $tendaCategory->id,
                'price_per_day' => 50000,
                'stock_total' => 3,
                'stock_available' => 3,
                'brand' => 'Lafuma',
                'condition' => 'excellent',
                'size' => '2P',
                'weight' => 3.2,
                'specifications' => [
                    'kapasitas' => '2 orang',
                    'material' => 'Polyester 75D',
                    'waterproof' => '3000mm',
                    'season' => '4 season',
                    'fitur' => ['Double layer', 'Vestibule', 'Ventilasi ganda']
                ],
                'images' => [
                    '/images/equipment/tenda-placeholder.svg',
                    'https://images.unsplash.com/photo-1504280390367-361c6d9f38f4?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'
                ],
                'rental_terms' => 'Harus dikembalikan dalam kondisi kering dan bersih. Ganti rugi jika robek atau hilang.',
                'is_featured' => true,
                'security_deposit' => 500000,
                'min_rental_days' => 1,
                'max_rental_days' => 10,
            ],
            [
                'name' => 'Tenda Ultralight MSR 1P',
                'description' => 'Tenda ultralight 1 person untuk solo hiking. Sangat ringan dan compact, cocok untuk backpacker.',
                'category_id' => $tendaCategory->id,
                'price_per_day' => 75000,
                'stock_total' => 2,
                'stock_available' => 2,
                'brand' => 'MSR',
                'condition' => 'excellent',
                'size' => '1P',
                'weight' => 1.8,
                'specifications' => [
                    'kapasitas' => '1 orang',
                    'material' => 'Nylon 20D',
                    'waterproof' => '3000mm',
                    'season' => '3 season',
                    'fitur' => ['Ultralight', 'Freestanding', 'Easy setup']
                ],
                'images' => [
                    '/images/equipment/tenda-placeholder.svg',
                    'https://images.unsplash.com/photo-1487730116645-74489c95b41b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'
                ],
                'rental_terms' => 'Untuk pendaki berpengalaman. Extra hati-hati karena material tipis.',
                'is_featured' => true,
                'security_deposit' => 800000,
                'min_rental_days' => 1,
                'max_rental_days' => 7,
            ],

            // Sleeping Gear
            [
                'name' => 'Sleeping Bag Deuter -5°C',
                'description' => 'Sleeping bag dengan temperature rating -5°C, cocok untuk pendakian di gunung tinggi. Filling synthetic yang mudah dirawat.',
                'category_id' => $sleepingGearCategory->id,
                'price_per_day' => 30000,
                'stock_total' => 6,
                'stock_available' => 6,
                'brand' => 'Deuter',
                'condition' => 'good',
                'size' => 'Regular',
                'weight' => 1.8,
                'specifications' => [
                    'temperature_rating' => '-5°C',
                    'filling' => 'Synthetic',
                    'shape' => 'Mummy',
                    'length' => '210cm',
                    'fitur' => ['Compression sack', 'Hood', 'Draft collar']
                ],
                'images' => [
                    '/images/equipment/sleeping-bag-placeholder.svg',
                    'https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'
                ],
                'rental_terms' => 'Harus menggunakan sleeping pad. Dilarang makan di dalam sleeping bag.',
                'is_featured' => false,
                'security_deposit' => 300000,
                'min_rental_days' => 1,
                'max_rental_days' => 10,
            ],
            [
                'name' => 'Matras Therm-a-Rest',
                'description' => 'Sleeping pad self-inflating dengan R-value tinggi. Nyaman dan hangat untuk tidur di gunung.',
                'category_id' => $sleepingGearCategory->id,
                'price_per_day' => 20000,
                'stock_total' => 10,
                'stock_available' => 10,
                'brand' => 'Therm-a-Rest',
                'condition' => 'good',
                'size' => 'Regular',
                'weight' => 0.8,
                'specifications' => [
                    'r_value' => '4.2',
                    'thickness' => '5cm',
                    'material' => 'Polyester',
                    'fitur' => ['Self-inflating', 'Repair kit included']
                ],
                'images' => ['/images/matras-thermarest.jpg'],
                'rental_terms' => 'Jangan menggunakan benda tajam di sekitar matras',
                'is_featured' => false,
                'security_deposit' => 200000,
                'min_rental_days' => 1,
                'max_rental_days' => 10,
            ],

            // Pakaian
            [
                'name' => 'Jaket Gunung The North Face',
                'description' => 'Jaket soft shell windproof dan water resistant. Cocok untuk layer sistem dalam cuaca dingin.',
                'category_id' => $pakaianCategory->id,
                'price_per_day' => 35000,
                'stock_total' => 4,
                'stock_available' => 4,
                'brand' => 'The North Face',
                'condition' => 'excellent',
                'size' => 'L',
                'weight' => 0.6,
                'specifications' => [
                    'material' => 'Soft shell',
                    'waterproof' => 'DWR coating',
                    'breathable' => 'Yes',
                    'fitur' => ['Hood', 'Zip pockets', 'Adjustable cuffs']
                ],
                'images' => ['/images/jaket-tnf.jpg'],
                'rental_terms' => 'Harus dikembalikan dalam kondisi bersih',
                'is_featured' => true,
                'security_deposit' => 400000,
                'min_rental_days' => 1,
                'max_rental_days' => 7,
            ],

            // Sepatu
            [
                'name' => 'Sepatu Hiking Salomon GTX',
                'description' => 'Sepatu hiking mid-cut dengan Gore-Tex membrane. Grip excellent dan support ankle yang baik.',
                'category_id' => $sepatuCategory->id,
                'price_per_day' => 40000,
                'stock_total' => 6,
                'stock_available' => 6,
                'brand' => 'Salomon',
                'condition' => 'good',
                'size' => '42',
                'weight' => 1.2,
                'specifications' => [
                    'cut' => 'Mid-cut',
                    'waterproof' => 'Gore-Tex',
                    'sole' => 'Vibram',
                    'fitur' => ['Ankle support', 'Quick lace', 'Protective toe cap']
                ],
                'images' => ['/images/sepatu-salomon.jpg'],
                'rental_terms' => 'Gunakan kaos kaki tebal. Harus dibersihkan setelah pakai.',
                'is_featured' => true,
                'security_deposit' => 600000,
                'min_rental_days' => 1,
                'max_rental_days' => 5,
            ],

            // Cooking Gear
            [
                'name' => 'Kompor Gas Jetboil',
                'description' => 'Kompor gas portable dengan sistem integrated. Efisien dan cepat untuk memasak air.',
                'category_id' => $cookingCategory->id,
                'price_per_day' => 25000,
                'stock_total' => 4,
                'stock_available' => 4,
                'brand' => 'Jetboil',
                'condition' => 'excellent',
                'size' => 'Compact',
                'weight' => 0.5,
                'specifications' => [
                    'fuel' => 'Gas canister',
                    'boil_time' => '2.5 menit/500ml',
                    'fitur' => ['Auto-ignition', 'Heat indicator', 'Insulated cup']
                ],
                'images' => ['/images/kompor-jetboil.jpg'],
                'rental_terms' => 'Gas canister tidak disediakan. Hanya untuk outdoor use.',
                'is_featured' => false,
                'security_deposit' => 300000,
                'min_rental_days' => 1,
                'max_rental_days' => 10,
            ],

            // Navigasi & Penerangan
            [
                'name' => 'Headlamp Petzl 300 Lumens',
                'description' => 'Headlamp dengan output 300 lumens. Multiple mode dan tahan air IPX4. Baterai rechargeable.',
                'category_id' => $navigasiCategory->id,
                'price_per_day' => 15000,
                'stock_total' => 12,
                'stock_available' => 12,
                'brand' => 'Petzl',
                'condition' => 'excellent',
                'size' => 'One Size',
                'weight' => 0.3,
                'specifications' => [
                    'lumens' => '300',
                    'battery' => 'Rechargeable Li-ion',
                    'runtime' => '8 hours',
                    'waterproof' => 'IPX4',
                    'fitur' => ['Red light mode', 'SOS signal', 'Memory function']
                ],
                'images' => ['/images/headlamp-petzl.jpg'],
                'rental_terms' => 'Charger disediakan. Harus dikembalikan dalam kondisi full charge.',
                'is_featured' => false,
                'security_deposit' => 150000,
                'min_rental_days' => 1,
                'max_rental_days' => 10,
            ],

            // Climbing Gear
            [
                'name' => 'Harness Black Diamond',
                'description' => 'Climbing harness untuk via ferrata dan rock climbing. Adjustable dan comfortable untuk penggunaan lama.',
                'category_id' => $climbingCategory->id,
                'price_per_day' => 30000,
                'stock_total' => 3,
                'stock_available' => 3,
                'brand' => 'Black Diamond',
                'condition' => 'good',
                'size' => 'M',
                'weight' => 0.4,
                'specifications' => [
                    'type' => 'Sport climbing',
                    'gear_loops' => '4',
                    'adjustable' => 'Waist & legs',
                    'fitur' => ['Auto-locking buckle', 'Belay loop', 'Haul loop']
                ],
                'images' => ['/images/harness-bd.jpg'],
                'rental_terms' => 'Hanya untuk penggunaan dengan guide bersertifikat. Inspeksi keamanan wajib.',
                'is_featured' => false,
                'security_deposit' => 400000,
                'min_rental_days' => 1,
                'max_rental_days' => 3,
            ],

            // Aksesori
            [
                'name' => 'Trekking Pole Carbon Fiber',
                'description' => 'Trekking pole carbon fiber adjustable. Sangat ringan dan kuat. Dilengkapi dengan berbagai tip.',
                'category_id' => $aksesoriCategory->id,
                'price_per_day' => 20000,
                'stock_total' => 8,
                'stock_available' => 8,
                'brand' => 'Leki',
                'condition' => 'excellent',
                'size' => 'Adjustable',
                'weight' => 0.5,
                'specifications' => [
                    'material' => 'Carbon fiber',
                    'sections' => '3',
                    'collapsed_length' => '65cm',
                    'max_length' => '135cm',
                    'fitur' => ['Quick lock', 'Interchangeable tips', 'Wrist strap']
                ],
                'images' => ['/images/trekking-pole-leki.jpg'],
                'rental_terms' => 'Periksa lock mechanism sebelum digunakan. Hati-hati dengan carbon fiber.',
                'is_featured' => false,
                'security_deposit' => 250000,
                'min_rental_days' => 1,
                'max_rental_days' => 7,
            ],
        ];

        foreach ($equipments as $equipment) {
            HikingEquipment::firstOrCreate(
                ['name' => $equipment['name']],
                $equipment
            );
        }
    }
}
