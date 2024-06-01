<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
    */

    
    public function run(): void
    {
        $data = $this->getCSVData(__DIR__ . '/items.csv');
        //
        foreach ($data as $index => $row) {
            if($index !== 0){
                $item = new Item;

                $item->name = $row[0];
                $item->slug = $row[1];
                $item->type = $row[2];
                $item->category = $row[3];
                $item->weight = $row[4];
                $item->cost = $row[5];
                $item->damage_dice = $row[6];
                $item->image = strtolower(str_replace(' ', '-', $item->category));
                $item->save();
                //dump($item);
            }
        }
    }


    public function getCSVData(string $path) {		
									
        $data = [];							
    									
        $file_stream = fopen($path, 'r');			
     									
        if($file_stream === false){				
            exit('Cannot open the file'. $path);		
        }								
                                        
        while(($row = fgetcsv($file_stream)) !== false){	

    	    var_dump($row);					
            $data[] = $row;					
        }								
    								
        fclose($file_stream);					
                                        
        return $data;						
     }
}
