<?php

namespace App\Controllers;

use App\Models\CatatanPerjalanan_model;
use App\Models\UserModel;
use Config\Services;

class IsiData extends BaseController
{
    function __construct()
    {
        Services::session();
    }

    public function index()
    {
        if (!Services::session()->get("nik")) {
            return redirect()->to(base_url('/login'));
        }

        $userdata = UserModel::findByNIK(Services::session()->get("nik"));
        return view("isidata", ["userdata"=>$userdata]);
    }

    public function simpan() {
        Catatanperjalanan_model::tambah(
            $this->request->getVar("tanggal"),
            $this->request->getVar("waktu"),
            $this->request->getVar("lokasi"),
            $this->request->getVar("suhu")
        );

        Services::session()->setFlashdata("success", "Data berhasil disimpan");
        return redirect()->to(base_url('/isidata'));
    }
}