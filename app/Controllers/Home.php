<?php

namespace App\Controllers;

class Home extends BaseController
{
    protected $dokumenModel;

    public function __construct()
    {
        $this->dokumenModel = model('App\Models\DokumenModel');
    }
    public function index(): string
    {
        $totalDokumen = $this->dokumenModel->getSumDokumen();
        $harianDokumen = $this->dokumenModel->getharianDokumen();
        $bulananDokumen = $this->dokumenModel->getBulananDokumen();
        $data = [
            'totalDokumen' => $totalDokumen,
            'harianDokumen' => $harianDokumen,
            'bulananDokumen' => $bulananDokumen,
        ];
        return view('home', $data);
    }


}
