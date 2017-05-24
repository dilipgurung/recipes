<?php

namespace App\Console\Commands;

use Gousto\Models\Recipe;
use Illuminate\Console\Command;
use League\Csv\Reader;
use Symfony\Component\Console\Input\InputOption;

/**
 * Class IngestDataCommand
 *
 * @package App\Console\Commands
 */
class IngestDataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'ingest:data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Ingest Recipe data to the application';

    /**
     * CSV file path to import the DATA from
     *
     * @var string
     */
    protected $csvImportFilePath;



    /**
     * IngestDataCommand constructor.
     */
    public function __construct()
    {
        $this->csvImportFilePath = realpath(storage_path(env('DATA_IMPORT_PATH', 'gousto/datastore/recipe-data.csv')));

        parent::__construct();

        if (!ini_get("auto_detect_line_endings")) {
            ini_set("auto_detect_line_endings", '1');
        }
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function fire()
    {
        $csvFile = $this->input->getOption('path');
        $reader = Reader::createFromPath($csvFile);

        foreach ($reader as $index => $row) {
            if ($index == 0) {
                continue;
            }

            Recipe::create([
                'box_type' => $row[3],
                'title' => $row[4],
                'slug' => $row[5],
                'short_title' => $row[6],
                'marketing_description' => $row[7],
                'calories_kcal' => (int) $row[8],
                'protein_grams' => (int) $row[9],
                'fat_grams' => (int) $row[10],
                'carbs_grams' => (int) $row[11],
                'bulletpoint1' => $row[12],
                'bulletpoint2' => $row[13],
                'bulletpoint3' => $row[14],
                'recipe_diet_type_id' => $row[15],
                'season' => $row[16],
                'base' => $row[17],
                'protein_source' => $row[18],
                'preparation_time_minutes' => (int) $row[19],
                'shelf_life_days' => (int) $row[20],
                'equipment_needed' => $row[21],
                'origin_country' => $row[22],
                'recipe_cuisine' => $row[23],
                'in_your_box' => $row[24],
                'gousto_reference' => $row[25],
            ]);
        }

        $this->info('Data import successful');
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['path', null, InputOption::VALUE_OPTIONAL, 'The CSV file path to import the data from', $this->csvImportFilePath]
        ];
    }
}