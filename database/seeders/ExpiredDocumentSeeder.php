<?php

namespace Database\Seeders;

use App\Models\v1\ExpiredDocument;
use Illuminate\Database\Seeder;

class ExpiredDocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ExpiredDocument::factory()->count(10)->create();
    }
}
