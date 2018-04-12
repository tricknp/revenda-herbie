<?php

use Illuminate\Database\Seeder;

class CarrosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('carros')->insert([
            'modelo' => 'Sandero',
            'marca_id' => 3,
            'ano' => 2015,
            'preco' => '25800',
            'cor' => 'Prata',
            'Combustivel' => 'F',
            'created_at' => date('Y-d-m h:i:s'),
            'updated_at' => date('Y-d-m h:i:s'),
            
        ]);
        
        DB::table('carros')->insert([
            'modelo' => 'Logan',
            'marca_id' => 3,
            'ano' => 2017,
            'preco' => '45800',
            'cor' => 'Preto',
            'Combustivel' => 'F',
            'created_at' => date('Y-d-m h:i:s'),
            'updated_at' => date('Y-d-m h:i:s'),
            
        ]);
    }
}
