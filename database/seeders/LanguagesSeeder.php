<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguagesSeeder extends Seeder
{

    public function run(): void
    {
        $handle = fopen("resources/movies-dataset/movies_metadata.csv", "r");
        if ($handle) {

            echo "Inserting data in languages table: ";

            while (($lineValues = fgetcsv($handle, 0 , ",")) !== false) {
                static $index = 0; //count iterations to calculate percentage of completion

                $languageShort = $lineValues[7]; //save the language column value

                //if languageShort has an invalid value, go to next iteration
                if (!ctype_alpha($languageShort) || strlen($languageShort) != 2){
                    $index++;
                    continue;
                }

                //Jump the first line of the csv file (it has heading not values)
                if ($index == 0) {
                    $index++;
                    continue;
                }

                //Loading bar to be saw in bash
                // ==========> 100% Completed.
                $percentage = ($index/45575)*100;

                static $actual = 0; //save actual percentage completion through iterations

                if ($percentage-$actual >= 10) { //every 10% of completion
                    echo "=";                   //print "=" to extend loading bar
                    $actual = $percentage;     //save new percentage in actual
                }

                static $completed = false;

                if ($percentage >= 99 && !$completed) {
                    echo "> 100% completed.\n";
                    $completed = true;  //save completed in static variable to not trigger previous echo anymore
                }
                //End loading bar

                $index++;


                //if language is already in the table, go to next iteration
                if (Language::query()->where('short', $languageShort)->exists()) {
                    continue;
                }

                Language::query()->create(['short' => $languageShort]);

            }
        };
        fclose($handle);
    }
}
