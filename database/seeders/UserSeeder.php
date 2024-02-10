<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
public function run(): void
  {
    // 🔽 3ユーザ作成する
    User::create([
      'name' => 'test1',
      'email' => 'test1@example.com',
      'password' => Hash::make('password'),
    ]);
    User::create([
      'name' => 'test2',
      'email' => 'test2@example.com',
      'password' => Hash::make('password'),
    ]);
    User::create([
      'name' => 'test3',
      'email' => 'test3@example.com',
      'password' => Hash::make('password'),
    ]);
  }
}
