<?php

namespace Database\Seeders;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create roles and permissions first
        $superAdminRole = Role::firstOrCreate(['name' => 'super_admin']);
        $staffRole = Role::firstOrCreate(['name' => 'staff']);
        
        // Create permissions for hiking equipment rental
        $permissions = [
            'view_categories',
            'create_categories',
            'edit_categories',
            'delete_categories',
            'view_hiking_equipments',
            'create_hiking_equipments',
            'edit_hiking_equipments',
            'delete_hiking_equipments',
            'view_customers',
            'create_customers',
            'edit_customers',
            'delete_customers',
            'view_rentals',
            'create_rentals',
            'edit_rentals',
            'delete_rentals',
            'view_payments',
            'create_payments',
            'edit_payments',
            'delete_payments',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Assign all permissions to super admin
        $superAdminRole->syncPermissions(Permission::all());
        
        // Assign limited permissions to staff
        $staffPermissions = [
            'view_categories',
            'view_hiking_equipments',
            'view_customers',
            'create_customers',
            'edit_customers',
            'view_rentals',
            'create_rentals',
            'edit_rentals',
            'view_payments',
            'create_payments',
        ];
        $staffRole->syncPermissions($staffPermissions);

        // Create users
        $user = \App\Models\User::firstOrCreate(
            ['email' => 'admin@admin.com'],
            [
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('password'),
            ]
        );

        $user->assignRole('super_admin');

        // Create Staff User
        $staff = \App\Models\User::firstOrCreate(
            ['email' => 'staff@rental.com'],
            [
                'name' => 'Staff Rental',
                'email' => 'staff@rental.com',
                'password' => bcrypt('password'),
            ]
        );
        
        $staff->assignRole('staff');

        $this->call([
            CategorySeeder::class,
            HikingEquipmentSeeder::class,
            CustomerSeeder::class,
            TestSeeder::class,
            ProductSeeder::class,
        ]);
    }
}
