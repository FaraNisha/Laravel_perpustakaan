<?php

use Illuminate\Database\Seeder;

class anggota extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\ModelAnggota::insert([
        [
          'nama_anggota' => 'Kim Taehyung',
          'alamat' => 'Daegu',
          'no_hp' => '0987654321',
          'created_at' => Date('Y-m-d H:i:s')
        ],
        [  'nama_anggota' => 'Fara Nisha',
           'alamat' => 'Daegu',
           'no_hp' => '0987612345',
           'created_at' => Date('Y-m-d H:i:s')
        ],
        [  'nama_anggota' => 'Jeon Jungkook',
           'alamat' => 'Seoul',
           'no_hp' => '0981234567',
           'created_at' => Date('Y-m-d H:i:s')
        ],
        [  'nama_anggota' => 'Park Jimin',
           'alamat' => 'Seoul',
           'no_hp' => '0987654312',
           'created_at' => Date('Y-m-d H:i:s')
        ],
        [  'nama_anggota' => 'Min Yoongi',
           'alamat' => 'Seoul',
           'no_hp' => '09876123098',
           'created_at' => Date('Y-m-d H:i:s')
        ]
      ]);
    }
}
