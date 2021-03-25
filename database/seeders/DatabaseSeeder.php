<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->createAdmin();
        // \App\Models\User::factory(10)->create();

        $this->call([
            CategorySeeder::class,
            EventSeeder::class,
            NewsletterSeeder::class,
            TestimonialSeeder::class,
        ]);
    }

    public function createAdmin()
    {
        \App\Models\User::firstOrCreate([
            'name' => 'Ibukun Ajimoti'
        ],[
            'email' => 'ibukunajimoti@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password,
            'email_verified_at' => now(),
        ]);
    }
}
