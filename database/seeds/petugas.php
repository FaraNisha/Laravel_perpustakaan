<?php

use Illuminate\Database\Seeder;

class petugas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\ModelPetugas::insert([
          [
            'nama_petugas' => 'Ninis',
            'alamat' => 'Di Kolong Jembatan',
            'no_hp' => '1234567890',
            'username' => 'Ninissssssss',
            'password' => '123456',
            'created_at' => Date('Y-m-d H:i:s')
          ],
          [
            'nama_petugas' => 'Angel',
            'alamat' => 'Di Lubang Tikus',
            'no_hp' => '07654321',
            'username' => 'Enjelllll',
            'password' => '123456',
            'created_at' => Date('Y-m-d H:i:s')
          ],
          [
            'nama_petugas' => 'Talitha',
            'alamat' => 'Di Sumur',
            'no_hp' => '0987123456',
            'username' => 'Talithonggggg',
            'password' => '123456',
            'created_at' => Date('Y-m-d H:i:s')
          ],
          [
            'nama_petugas' => 'Fara',
            'alamat' => 'Di Rumah seperti pada umumnya',
            'no_hp' => '0987654123',
            'username' => 'Faraaaaa',
            'password' => '123456',
            'created_at' => Date('Y-m-d H:i:s')
          ],
          [
            'nama_petugas' => 'Syifa',
            'alamat' => 'Di Selokan',
            'no_hp' => '0987123456',
            'username' => 'Syifaaaaaa',
            'password' => '123456',
            'created_at' => Date('Y-m-d H:i:s')
          ]
        ]);
    }
}
