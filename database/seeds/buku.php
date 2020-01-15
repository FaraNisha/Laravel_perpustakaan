<?php

use Illuminate\Database\Seeder;

class buku extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\ModelBuku::insert([
          [
            'judul' => 'Bulan',
            'penerbit' => 'Butterfly Media',
            'pengarang' => 'Fara Nisha',
            'foto' => '-',
            'created_at' => Date('Y-m-d H:i:s')
          ],
          [
            'judul' => 'Bintang',
            'penerbit' => 'Butterfly Media',
            'pengarang' => 'Fara Nisha',
            'foto' => '-',
            'created_at' => Date('Y-m-d H:i:s')
          ],
          [
            'judul' => 'Matahari',
            'penerbit' => 'Butterfly Media',
            'pengarang' => 'Fara Nisha',
            'foto' => '-',
            'created_at' => Date('Y-m-d H:i:s')
          ],
          [
            'judul' => 'Purple',
            'penerbit' => 'Butterfly Media',
            'pengarang' => 'Fara Nisha',
            'foto' => '-',
            'created_at' => Date('Y-m-d H:i:s')
          ],
          [
            'judul' => 'ARMY',
            'penerbit' => 'Butterfly Media',
            'pengarang' => 'Fara Nisha',
            'foto' => '-',
            'created_at' => Date('Y-m-d H:i:s')
          ],
        ]);
    }
}
