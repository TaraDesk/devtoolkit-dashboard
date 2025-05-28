<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Tool;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ToolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $file = database_path('data/tool.csv');

        if (!file_exists($file) || !is_readable($file)) {
            $this->command->error("CSV file not found or is not readable.");
            return;
        }

        $header = null;

        if (($handle = fopen($file, 'r')) !== false) {
            while (($row = fgetcsv($handle, 0, ';')) !== false) {
                if (!$header) {
                    $header = $row;
                } else {
                    $rowData = array_combine($header, $row);

                    $category = Category::firstOrCreate(['name' => $rowData['category']]);
                    $tags = explode(',', $rowData['tags']);

                    $tool = Tool::factory()->create([
                        'name' => $rowData['name'],
                        'summary' => $rowData['summary'],
                        'description' => $rowData['description'],
                        'link' => $rowData['links'],
                        'icon_url' => $rowData['icon_image_links'],
                        'category_id' => $category->id
                    ]);

                    foreach ($tags as $tag) {
                        $tool->tag($tag);
                    }
                }
            }
            fclose($handle);
        }
    }
}
