<?php

namespace App\Models;

class CatatanPerjalanan_model extends BaseModel  {
    public static function tambah($tanggal,$waktu,$lokasi,$suhu) {
        $data = BaseModel::csvFileToJson("CatatanPerjalanan.csv");
        file_put_contents("CatatanPerjalanan.csv","\r\n".$tanggal.",".$waktu.",".$lokasi.",".$suhu,FILE_APPEND);
        return true;
    }

    public static function getAll() {
        $data = BaseModel::csvFileToJson("CatatanPerjalanan.csv");
        return $data;
    }
}