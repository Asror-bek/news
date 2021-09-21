<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Contact;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        DB::table('contacts')->insert([
            'Phone' => '998907396859',
            'Address' => 'umid',
            'Email' => 'asrorgapparov29@gmail.com',
            'Text' => 'hello world',
            'Media' => 'clouds-486929.jpg'
        ]);
    }
}
