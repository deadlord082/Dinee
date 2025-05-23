<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            [
                'name' => 'Italian',
                'image' => 'https://www.charlottemagazine.com/content/uploads/2023/03/s/h/08-12-21-jimmny-cltmag-0673.jpg',
            ],
            [
                'name' => 'Mexicain',
                'image' => 'https://www.toute-la-franchise.com/images/zoom/vdlf/tgrd/25892.jpg',
            ],
            [
                'name' => 'Creperie',
                'image' => 'https://resize-elle.ladmedia.fr/rcrop/638,,forcex/img/var/plain_site/storage/images/loisirs/sorties/restaurants/creperie/creperie-a-nantes/92544790-1-fre-FR/Creperie-a-Nantes.jpg',
            ],
            [
                'name' => 'Burger',
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRn7t0NUdtorioaJiX0mM4vJ_ceYG0gk9vxqw&s',
            ],
            [
                'name' => 'Fast-food',
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQdzWGgtU4-QHA6gDHwcIESL0ykheVvTcF1aQ&s',
            ],
            [
                'name' => 'Chinois',
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRqFF-xgJBYuQKZe-F-hq29u6g6H8Vbj12DPg&s',
            ],
        ];
        foreach($types as $type){
            Type::factory()->create([
                'name' => $type['name'],
                'image' => $type['image'],
            ]);
        }
    }
}
