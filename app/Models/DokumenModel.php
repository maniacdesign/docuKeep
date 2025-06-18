<?php

namespace App\Models;

use CodeIgniter\Model;

class DokumenModel extends Model
{
    protected $table            = 'infodokumen';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id',
        'no_rm',
        'nama',
        'diagnosa',
        'tahun',
        'keterangan',
        'origin_file_name',
        'unique_file_name',
        'size',
        'uploadFile'
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function uploadDokumen()
    {
        $builder = $this->db->table('infodokumen');
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        $builder->insert($data);
    }

    public function findDokumen($nomor_rm = null, $nama = null, $tahun = null, $diagnosa = null)
    {
        $builder = $this->db->table('infodokumen');

        if ($nomor_rm) {
            $builder->where('no_rm', $nomor_rm);
        }

        if ($nama) {
            $builder->like('nama', $nama, 'both');
        }

        if ($tahun) {
            $builder->where('tahun', $tahun);
        }

        if ($diagnosa) {
            $builder->like('diagnosa', $diagnosa, 'both');
        }

        $builder->orderBy('created_at', 'DESC');
        return $builder->get()->getResultArray();
    }

    public function getSumDokumen()
    {
        return $this->db->table('infodokumen')->countAllResults();
    }

    public function getHarianDokumen()
    {

        $today = date('Y-m-d');

        return $this->db->table('infodokumen')
            ->where('DATE(created_at)', $today)
            ->countAllResults();
    }

    public function getBulananDokumen()
    {

        $year = date('Y');
        $month = date('m');

        return $this->db->table('infodokumen')
            ->where('YEAR(created_at)', $year)
            ->where('MONTH(created_at)', $month)
            ->countAllResults();
    }
}
