<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Admin User
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@absensi.com',
            'password' => Hash::make('password'),
            'role_id' => User::ADMIN_ROLE_ID, // 1
            'position_id' => 3, // Direktur position
            'phone' => '081234567890',
        ]);

        // Operator User
        User::create([
            'name' => 'Operator',
            'email' => 'operator@absensi.com',
            'password' => Hash::make('password'),
            'role_id' => User::OPERATOR_ROLE_ID, // 2
            'position_id' => 4, // Operator position
            'phone' => '081234567891',
        ]);

        // Regular Users (Employees)
        User::create([
            'name' => 'John Doe',
            'email' => 'john.doe@absensi.com',
            'password' => Hash::make('password'),
            'role_id' => User::USER_ROLE_ID, // 3
            'position_id' => 1, // Pegawai Biasa position
            'phone' => '081234567892',
        ]);

        User::create([
            'name' => 'Jane Smith',
            'email' => 'jane.smith@absensi.com',
            'password' => Hash::make('password'),
            'role_id' => User::USER_ROLE_ID, // 3
            'position_id' => 2, // Manager position
            'phone' => '081234567893',
        ]);

        User::create([
            'name' => 'Bob Johnson',
            'email' => 'bob.johnson@absensi.com',
            'password' => Hash::make('password'),
            'role_id' => User::USER_ROLE_ID, // 3
            'position_id' => 1, // Pegawai Biasa position
            'phone' => '081234567894',
        ]);

        User::create([
            'name' => 'Alice Brown',
            'email' => 'alice.brown@absensi.com',
            'password' => Hash::make('password'),
            'role_id' => User::USER_ROLE_ID, // 3
            'position_id' => 2, // Manager position
            'phone' => '081234567895',
        ]);

        User::create([
            'name' => 'Charlie Wilson',
            'email' => 'charlie.wilson@absensi.com',
            'password' => Hash::make('password'),
            'role_id' => User::USER_ROLE_ID, // 3
            'position_id' => 1, // Pegawai Biasa position
            'phone' => '081234567896',
        ]);

        User::create([
            'name' => 'Diana Davis',
            'email' => 'diana.davis@absensi.com',
            'password' => Hash::make('password'),
            'role_id' => User::USER_ROLE_ID, // 3
            'position_id' => 2, // Manager position
            'phone' => '081234567897',
        ]);

        // Additional test users
        User::create([
            'name' => 'Test Employee 1',
            'email' => 'test1@absensi.com',
            'password' => Hash::make('password'),
            'role_id' => User::USER_ROLE_ID, // 3
            'position_id' => 1, // Pegawai Biasa position
            'phone' => '081234567898',
        ]);

        User::create([
            'name' => 'Test Employee 2',
            'email' => 'test2@absensi.com',
            'password' => Hash::make('password'),
            'role_id' => User::USER_ROLE_ID, // 3
            'position_id' => 1, // Pegawai Biasa position
            'phone' => '081234567899',
        ]);
    }
}
