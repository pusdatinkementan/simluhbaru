<?php

namespace App\Models\KelembagaanPelakuUtama\KelompokTani;

use CodeIgniter\Model;
use \Config\Database;

class KelompokTaniModel extends Model
{
    protected $table      = 'penyuluh';
   


    protected $useTimestamps = false;


    public function getKelompokTaniTotal($kode_kab)
    {
        $db = Database::connect();
        $query = $db->query("select nama_dati2 as nama_kab from tbldati2 where id_dati2='$kode_kab'");
        $row   = $query->getRow();
        
        $query2 = $db->query("SELECT count(id_poktan) as jum_poktan FROM tb_poktan where kode_kab ='$kode_kab'");
        $row2   = $query2->getRow();
        
        $query3   = $db->query("select id_daerah, deskripsi, count(id_gap) as jum 
                                from tbldaerah a
                                left join tb_poktan b on a.id_daerah=b.kode_kec and b.kode_kab='$kode_kab'
                                where id_dati2='$kode_kab'
                                group by id_daerah, deskripsi
                                order by deskripsi");
        $results = $query3->getResultArray();

        $data =  [
            'jum_poktan' => $row2->jum_poktan,
            'nama_kab' => $row->nama_kab,
            'table_data' => $results,
        ];

        return $data;
    }
}
