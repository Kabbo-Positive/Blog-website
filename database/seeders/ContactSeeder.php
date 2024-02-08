<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Contact;
use Illuminate\Database\Seeder;

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
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'subject' => Str::random(10),
            'message' => Str::random(10),
            'service' => Str::random(10),
            'status' => 'unread',
            'file' => Str::random(10),
            'email' => Str::random(10),
        ]);

    }
}
