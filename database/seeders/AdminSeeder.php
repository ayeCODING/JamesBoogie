<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus user lama dengan email yang sama jika ada (Opsional)
        DB::table('users')->where('email', 'admin@gmail.com')->delete();

        // Cek apakah admin sudah ada
        if (!User::where('email', 'admin@gmail.com')->exists()) {
            User::create([
                'name' => 'Admin ',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('12345678'),
                'is_admin' => 1, // 1 = Admin
            ]);
        }

        // Buat akun user biasa (Opsional)
        if (!User::where('email', 'user@gmail.com')->exists()) {
            User::create([
                'name' => 'User',
                'email' => 'user@gmail.com',
                'password' => Hash::make('12345678'),
                'is_admin' => 0, // 0 = User
            ]);
        }
    }
}
