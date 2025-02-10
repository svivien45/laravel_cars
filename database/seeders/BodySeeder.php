<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Body;

class BodySeeder extends Seeder
{
    const ITEMS = [
    'Crossover',
    'Fastback',
    'Hardtop',
    'Hatchback',
    'Kabrió',
    'Kombi',
    'Kupé',
    'Liftback',
    'Limuzin',
    'Minivan',
    'Pickup',
    'Roadster',
    'Szedán',
    'Targa',
];
    public function run(): void
    {
        foreach (self::ITEMS as $item) {
            $body = new Body();
	    $body->name = $item;
            $body->save();
        }
    }
}
