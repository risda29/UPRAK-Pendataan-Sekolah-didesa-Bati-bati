<?php

namespace App\Controllers;

class Lokasi extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'Data Lokasi',
            'page' => 'v_data_lokasi',
        ];
        return view('v_template', $data);
    }
    public function inputlokasi()
    {
        $data = [
            'judul' => 'Input Lokasi',
            'page' => 'lokasi/v_input_lokasi',
        ];
        return view('v_template', $data);
    }



}
