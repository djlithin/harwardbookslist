<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;


use DB;

use Illuminate\Support\Facades\Http;
 
use Illuminate\Database\Eloquent\Model;

class GetHarwardDataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'library:create {--author=} {--genre=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'imports harward data';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
            
        $author = $this->option('author');
        $genre = $this->option('genre');
        
        $authorParam = isset($author) ? '&name='.$author : '';
        $genreParam = isset($genre) ? '&genre='.$genre : '';
        
        $response = Http::withHeaders(['accept' => 'application/json'])->get('https://api.lib.harvard.edu/v2/items?limit=100'.$authorParam.$genreParam);
        
        $data = $response->json()['items']['mods'];
        $insertData = [];
        foreach($data as $item){
            // print_r($item['abstract']);
            $itemdata['title'] = count($item['titleInfo']) == count($item['titleInfo'], 1) ? $item['titleInfo']['title'] :  $item['titleInfo'][0]['title'];
            $itemdata['publisher'] = isset($item['originInfo']['publisher']) ? is_array($item['originInfo']['publisher']) ? 'N/A' : $item['originInfo']['publisher'] : 'N/A';
            if(isset($item['abstract'])) {
                if(is_array($item['abstract'])){
                    if(isset($item['abstract']['#text'])){
                        $itemdata['abstract'] = $item['abstract']['#text'];
                    } elseif(isset($item['abstract'][0])){
                        
                        $itemdata['abstract'] = $item['abstract'][0]['#text'];
                    } else{
                        $itemdata['abstract'] = 'N/A';
                    }
                } else {
                    $itemdata['abstract'] = $item['abstract'];
                }
            } else {
                
                $itemdata['abstract'] = 'N/A';
            }
            $insertData[] = $itemdata;
        }
        DB::table('books')->truncate();
        DB::table('books')->insert($insertData);
    }
}
