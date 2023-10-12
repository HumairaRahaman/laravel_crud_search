<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;
use Meilisearch\Client;

class IndexData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'index:data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Index data into MeiliSearch';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $client = new Client(env('MEILISEARCH_HOST'), env('MEILISEARCH_KEY'));
        $index = $client->index('products_index');
        $products = Product::all();


        $client->index('products_index')->addDocuments([
            [
                'id' => 287947,
                'name' => 'Shazam',
                'description' => 'A boy is given the ability to become an adult superhero in times of need with a single magic word.',
            ]
        ]);

//        add
//        $products->searchable();

//// Index data from your model
//        $index->update($products);

        $this->info('Data has been indexed.');
    }
}
