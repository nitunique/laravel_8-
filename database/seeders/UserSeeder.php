<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // $count = 100;
        // for($j = 0; $j < 10; $j++){
        //     factory(Usermodel::class, $count)->create();
        // }

        $no_of_data = 100000;
        $test_data = array();
        for ($i = 0; $i < $no_of_data; $i++){
           $test_data[$i]['name'] = Str::random(10);
           $test_data[$i]['email'] = Str::random(10).'@gmail.com';
           $test_data[$i]['address'] = Str::random(10);
           $test_data[$i]['role_id'] = rand(1,3);
        }
        $chunk_data = array_chunk($test_data, 8000);
        if (isset($chunk_data) && !empty($chunk_data))
        {
            foreach ($chunk_data as $chunk_data_val)
            {
            DB::table('usermodels')->insert($chunk_data_val);
            }
        }
    }
}
