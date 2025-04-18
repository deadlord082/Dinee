<?php

namespace Database\Seeders;

use App\Models\Dishe;
use App\Models\RestaurantType;
use App\Models\User;
use App\Models\Type;
use App\Models\Statut;
use App\Models\Booking;
use App\Models\Restaurant;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        User::factory(10)->create();

        $types = ['Italian','Mexicain','Brasserie','Creperie','Burger','Fast-food','Greques','Chinois'];
        foreach($types as $type){
            Type::factory()->create([
                'name' => $type,
            ]);
        }

        Restaurant::factory(10)->create();

        RestaurantType::factory(50)->create();

        Statut::factory()->create([
            'status' => 'En attentes',
        ]);
        Statut::factory()->create([
            'status' => 'En cours',
        ]);
        Statut::factory()->create([
            'status' => 'Terminés',
        ]);

        Booking::factory(100)->create();
        Dishe::factory(100)->create();
    }
}
