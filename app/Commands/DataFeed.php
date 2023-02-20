<?php

namespace App\Commands;

use Exception;
use Illuminate\Support\Facades\Log;
use LaravelZero\Framework\Commands\Command;
use DB;


class DataFeed extends Command
{

    protected $signature = 'datafeed {fileName?}';

    protected $description = 'Read XML file and Save data into DB';

    public function handle()
    {
        $this->saveXMLData();
    }
   public function saveXMLData()
   {
       if(! $this->argument('fileName')) {
           $filePath = storage_path("feed.xml");
       }
       else {
           $filePath = storage_path($this->argument('fileName'));
       }

       try {
           $xml = simplexml_load_file($filePath);

           foreach ($xml->children() as $items) {

               DB::table('catalogues')->insert([

                   'entity_id' => $items->entity_id,
                   'CategoryName' => $items->CategoryName,
                   'sku' => $items->sku,
                   'name' => $items->name,
                   'shortdesc' => $items->shortdesc,
                   'price' => $items->price,
                   'link' => $items->link,
                   'image' => $items->image,
                   'Brand' => $items->Brand,
                   'Rating' => $items->Rating,
                   'CaffeineType' => $items->CaffeineType,
                   'Count' => $items->Count,
                   'Flavored' => $items->Flavored,
                   'Seasonal' => $items->Seasonal,
                   'Instock' => $items->Instock,
                   'Facebook' => $items->Facebook,
                   'IsKCup' => $items->IsKCup,
               ]);
           }

           Log::notice("XML content saved into database");
       }

       catch (Exception $exc) {
           Log::error($exc->getMessage());
       }

   }

}
