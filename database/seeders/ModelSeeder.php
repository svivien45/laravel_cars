<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Models;


class ModelSeeder extends Seeder
{
    const ITEMS = [
        "Ford" => ["Focus", "Mondeo", "Fiesta", "Mustang", "GT"],
        "Audi" => ["A1", "R8", "RS6", "TT"],
        "BMW" => ["E30", "E90", "i7", "i8"],
        "Volkswagen" => ["Golf", "Scirocco", "Passat", "Polo", "Jetta"],
        "Opel" => ["Corsa", "GT", "Speedster", "Tigra"],
    ];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (self::ITEMS as $maker => $models) {
            foreach ($models as $modelName){
                Models::create([
                    'maker' => $maker,
                    'name' => $modelName
                ]);
            }
        }
    }
}
