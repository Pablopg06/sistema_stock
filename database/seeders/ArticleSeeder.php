<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = 'articles';
        $file = public_path("/seeder/$table".".csv");

        //import CSV function
        function import_CSV($filename, $delimiter = ';'){
            if(!file_exists($filename) || !is_readable($filename))
            return false;
            $header = null;
            $data = array();
            if (($handle = fopen($filename, 'r')) !== false){
                while (($row = fgetcsv($handle, 1000, $delimiter)) !== false){
                    if(!$header)
                        $header = $row;
                    else
                        $data[] = array_combine($header, $row);
                }
                fclose($handle);
            }
            return $data;
        }

        // store returned data into array of records
        $records = import_CSV($file);
        
        foreach ($records as $key => $record) {

            $categoria = Category::where('nombre',$record['categoria'])->first();
            
            $subcategoria = SubCategory::where('nombre', $record['subcategoria'])->first();
            if($subcategoria){
                Article::create([
                    'nombre' => $record['nombre'],
                    'codigo' => $record['codigo'],
                    'stock' => $record['stock'],
                    'subcategory_id' => $subcategoria->id
                ]);
            }else{
                $subcategory = SubCategory::create([
                    'nombre' => $record['subcategoria'],
                    'category_id' => $categoria->id
                ]);
                Article::create([
                    'nombre' => $record['nombre'],
                    'codigo' => $record['codigo'],
                    'stock' => $record['stock'],
                    'subcategory_id' => $subcategory->id
                ]);
            }

            //Article::factory(200)->create();
        }
    }
}