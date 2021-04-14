<?php

use Illuminate\Database\Seeder;

class PawonganSeeding extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pawongans')->insert( [
        
        ['nama' => 'Supri','alamat' => 'Krangkeng','user_id' => '1'],
        ['nama' => 'Dede','alamat' => 'Karangampel','user_id' => '2'],
        ['nama' => 'Riyanto','alamat' => 'Mundu','user_id' => '2'],
        
        ] );
    }
}
