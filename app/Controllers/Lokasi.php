<?php

namespace App\Controllers;
use App\Models\ModelLokasi;

class Lokasi extends BaseController
{
    protected $ModelLokasi;

    public function __construct()
    {
        // parent::__construct(); // Memanggil konstruktor parent
        $this->ModelLokasi = new ModelLokasi();
    }

    public function index()
    {
        $data = [
            'judul' => 'Data Lokasi',
            'page' => 'lokasi/v_data_lokasi',
            'lokasi' => $this->ModelLokasi->getAllData(),
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

    public function insertData()
    {
        if ($this->validate([
            'nama_sekolah' => [
                'label' => 'Nama Sekolah',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong'
                ]
            ],
            'jenis_sekolah' => [
                'label' => 'Jenis Sekolah',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong'
                ]
            ],
            'latitude' => [
                'label' => 'latitude',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong'
                ]
            ],
            'longitude' => [
                'label' => 'longitude',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong'
                ]
            ],
            'foto_sekolah' => [
                'label' => 'Foto Lokasi',
                'rules' => 'uploaded[foto_sekolah]|max_size[foto_sekolah,1024]|mime_in[foto_sekolah,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => '{field} Tidak boleh kosong',
                    'max_size' => 'Ukuran {field} maksimal 1024 kb',
                    'mime_in' => 'Format {field} harus jpg, jpeg, png',
                ]
            ],
        ])) {
            $foto_sekolah = $this->request->getFile('foto_sekolah');
            $nama_file_foto = $foto_sekolah->getRandomName();
            $data = [
                'nama_sekolah' => $this->request->getPost('nama_sekolah'),
                'jenis_sekolah' => $this->request->getPost('jenis_sekolah'),
                'latitude' => $this->request->getPost('latitude'),
                'longitude' => $this->request->getPost('longitude'),
                'foto_sekolah' => $nama_file_foto
            ];
            $foto_sekolah->move('foto', $nama_file_foto);
            $this->ModelLokasi->insertData($data);
            session()->setFlashdata('pesan', 'Data Lokasi Berhasil ditambah');
            return redirect()->to('lokasi/inputlokasi');
            
        } else {
            return redirect()->to('lokasi/inputlokasi')->withInput();
        }
    }

    public function pemetaanLokasi()
    {
        $data = [
            'judul' => 'Pemetaan Lokasi',
            'page' => 'lokasi/v_pemetaan_lokasi',
            'lokasi' => $this->ModelLokasi->getAllData(),
        ];
        return view('v_template', $data);
    }

   

}
