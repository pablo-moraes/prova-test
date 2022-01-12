<?php

namespace Database\Seeders;

use App\Models\Bee;
use Illuminate\Database\Seeder;

class BeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return string
     */
    public function run()
    {
        try {
            // Get all necessary data from json file
            $file_path = storage_path("json/species.json");
            if(!file_exists($file_path)) {
                dd([
                    "type" => "Error",
                    "message" => "Failed to get file contents. Seems this file doesn't exists. Please, verify if you typed the correct path."
                ]);
            }
            $species = file_get_contents($file_path);
            $species =  json_decode($species, true);

            Bee::factory()->createMany($species);
        } catch(\Throwable $e) {
            dd([
                'type' => 'Error',
                'code Error' => $e->getCode(),
                'message' => "Failed to make this action. read the message for more information:". PHP_EOL . $e->getMessage(),
            ]);
        }
    }
}
