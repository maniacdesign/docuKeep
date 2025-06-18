<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class DokumenController extends BaseController
{
    protected $dokumenModel;
    public function __construct()
    {
        $this->dokumenModel = model('App\Models\DokumenModel');
    }
    public function upload()
    {
        return view('input/upload');
    }

    public function uploadDokumen()
    {
        $rules = [
            'nomor_rm' => 'required|numeric',
            'nama' => 'required|string|max_length[100]',
            'diagnosa' => 'required',
            'tahun' => 'required|integer|max_length[4]',
            'keterangan' => 'permit_empty|string',
            'uploadFile' => [
                'rules' => 'uploaded[uploadFile]|ext_in[uploadFile,pdf]',
                'errors' => [
                    'uploaded' => 'File harus diunggah.',
                    'ext_in' => 'File harus berformat PDF.'
                ]
            ],
        ];
        if (!$this->validate($rules)) {
            return redirect()->to('/dokumen/upload')->withInput()->with('errors', $this->validator->getErrors());
        }
        $file = $this->request->getFile('uploadFile');
        if ($file->isValid() && !$file->hasMoved()) {
            $originFileName = $file->getName();
            $sizeFile = $file->getSize('kb');
            $uniqueFileName = $file->getRandomName();
            $file->move('uploads/dokumen', $uniqueFileName);
            $data = [
                'no_rm' => $this->request->getPost('nomor_rm'),
                'nama' => $this->request->getPost('nama'),
                'diagnosa' => $this->request->getPost('diagnosa'),
                'tahun' => $this->request->getPost('tahun'),
                'keterangan' => $this->request->getPost('keterangan'),
                'origin_file_name' => $originFileName,
                'unique_file_name' => $uniqueFileName,
                'size' => $sizeFile,
            ];
            $this->dokumenModel->insert($data);
            return redirect()->to('/input/upload')->with('success', 'Dokumen berhasil diunggah.');
        }
        return redirect()->to('/input/upload')->with('success', 'Dokumen berhasil diunggah.');
    }

    public function findDokumen()
    {
        $nomor_rm = $this->request->getGet('nomor_rm');
        $nama = $this->request->getGet('nama');
        $tahun = $this->request->getGet('tahun');
        $diagnosa = $this->request->getGet('diagnosa');

        $result = $this->dokumenModel->findDokumen($nomor_rm, $nama, $tahun, $diagnosa);
        $data = [
            'result' => $result,
        ];
        return view('preview/lihat', $data);
    }
}
