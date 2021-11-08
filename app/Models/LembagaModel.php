<?php

namespace App\Models;

use \Config\Database;
use CodeIgniter\Model;

class LembagaModel extends Model
{

    // protected $table = 'tblbapel';

    //  protected $db = \Config\Database::connect();

    public function getProfil($id)
    {


        if (session()->get('status_user') == '1') {
            $query = $this->db->query("select *, a.alamat, a.ketua, a.tgl_update, a.kode_prop, a.nama_bapel, b.nama as namakoord  
                                        from tblbakor a
                                        left join tbldasar b on a.nama_koord_penyuluh=b.nip 
                                        where a.kode_prop='$id' 
                                        ");
        } elseif (session()->get('status_user') == '4') {
            $query = $this->db->query("SELECT * FROM tblbapel where kabupaten = " . $id);
        } elseif (session()->get('status_user') == '200') {
            $query = $this->db->query("select *, a.id_gapoktan, a.alamat, a.ketua, a.tgl_update, a.nama_bapel, a.email, b.nama as namapns, c.nama as namathl
            from tblbapel a
            left join tbldasar b on a.nama_koord_penyuluh=b.nip and nip !=''
            left join tbldasar_thl c on a.nama_koord_penyuluh_thl=c.noktp and penyuluh_di='kabupaten' and sumber_dana='apbn'
            where kabupaten='$id'
            ");
        } elseif (session()->get('status_user') == '300') {
            $query = $this->db->query("SELECT * FROM tblbpp where kecamatan = $id");
        }

        $row   = $query->getRowArray();
        return $row;
    }

    public function saveProfil($data)
    {
        $db = db_connect();

        if (session()->get('status_user') == '200') {
            $builder = $db->table('tblbapel');
            $builder->where('kabupaten', session()->get('kodebapel'))->update($data);
        } elseif (session()->get('status_user') == '300') {
            $builder = $db->table('tblbpp');
            $builder->where('kecamatan', session()->get('kodebpp'))->update($data);
        }
    }

    public function getKoordinatBpp()
    {

        $query = $this->db->query("SELECT id, kecamatan, nama_bpp, alamat, ketua, email, koordinat_lokasi_bpp FROM tblbpp WHERE koordinat_lokasi_bpp <> '' ORDER BY id");

        $row   = $query->getResultArray();
        return $row;
    }
}
