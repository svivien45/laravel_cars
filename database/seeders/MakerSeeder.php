<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Maker;


class MakerSeeder extends Seeder
{
    const ITEMS = [
        "Audi",
        "BMW",
        "Opel",
        "Suzuki",
        "Dacia",
        "Ford",
        "Volkswagen"
    ];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (self::ITEMS as $item) {
            $maker = new Maker();
	        $maker->name = $item;
            $maker->save();
        }
    }
}
