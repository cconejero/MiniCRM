<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Client;
use App\Models\Company;
use App\Models\Product;
use App\Models\User;
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
        // Create an admin user
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'test@example.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);

        // Create top 10 companies
        $cocaCola = Company::factory()->create([
            'name' => 'Coca Cola',
            'email' => 'admin@coca-cola.com',
            'logo' => 'images/1.png',
            'website' => 'www.coca-cola.com',
        ]);

        Product::factory(5)->create([
            'company_id' => $cocaCola->id,
        ]);

        $walmart = Company::factory()->create([
            'name' => 'Walmart',
            'email' => 'admin@walmart.com',
            'logo' => 'images/2.jpg',
            'website' => 'www.walmart.com',
        ]);

        Product::factory(5)->create([
            'company_id' => $walmart->id,
        ]);

        $amazon = Company::factory()->create([
            'name' => 'Amazon',
            'email' => 'admin@amazon.com',
            'logo' => 'images/3.png',
            'website' => 'www.amazon.com',
        ]);

        Product::factory(5)->create([
            'company_id' => $amazon->id,
        ]);

        $apple = Company::factory()->create([
            'name' => 'Apple',
            'email' => 'admin@apple.com',
            'logo' => 'images/4.png',
            'website' => 'www.apple.com',
        ]);

        Product::factory(5)->create([
            'company_id' => $apple->id,
        ]);

        $cvs = Company::factory()->create([
            'name' => 'CVS Health Corp',
            'email' => 'admin@cvs.com',
            'logo' => 'images/5.png',
            'website' => 'www.cvs.com',
        ]);

        Product::factory(5)->create([
            'company_id' => $cvs->id,
        ]);

        $shell = Company::factory()->create([
            'name' => 'Royal Dutch Shell',
            'email' => 'admin@shell.com',
            'logo' => 'images/6.svg',
            'website' => 'www.shell.com',
        ]);

        Product::factory(5)->create([
            'company_id' => $shell->id,
        ]);

        $bhhs = Company::factory()->create([
            'name' => 'Berkshire Hathaway Home Services',
            'email' => 'admin@bhhs.com',
            'logo' => 'images/7.png',
            'website' => 'www.bhhs.com',
        ]);

        Product::factory(5)->create([
            'company_id' => $bhhs->id,
        ]);

        Client::factory(50)->create();
    }
}
