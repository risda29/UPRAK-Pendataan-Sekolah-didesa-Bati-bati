<?php

namespace App\Controllers;

use App\Models\ModelLokasi;

class Lokasi extends BaseController
{
    protected $ModelLokasi;

    public function __construct()
    {
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
            'lokasi' => $this->ModelLokasi->getAllData(),
        
        ];
        return view('v_template', $data);
    }

    public function insertData()
    {
        // Validasi input
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
                'label' => 'Latitude',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong'
                ]
            ],
            'longitude' => [
                'label' => 'Longitude',
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
            // Ambil file foto dari form
            $foto_sekolah = $this->request->getFile('foto_sekolah');
            $nama_file_foto = $foto_sekolah->getRandomName();

            // Simpan data ke dalam array
            $data = [
                'nama_sekolah' => $this->request->getPost('nama_sekolah'),
                'jenis_sekolah' => $this->request->getPost('jenis_sekolah'),
                'latitude' => $this->request->getPost('latitude'),
                'longitude' => $this->request->getPost('longitude'),
                'foto_sekolah' => $nama_file_foto
            ];

            // Pindahkan file foto ke folder foto
            $foto_sekolah->move('foto', $nama_file_foto);

            // Panggil method insertData dari model dan masukkan data
            $this->ModelLokasi->insertData($data);

            // Set flashdata untuk pesan sukses
            session()->setFlashdata('pesan', 'Data Lokasi Berhasil ditambah');

            // Redirect ke halaman inputlokasi
            return redirect()->to('lokasi/pemetaanLokasi');
        } else {
            // Jika validasi gagal, kembalikan ke halaman inputlokasi dengan input sebelumnya
            return redirect()->to('inputlokasi')->withInput()->with('errors', $this->validator);
        }
    }

    // public function editlokasi($id_lokasi)
    // {
    //     // Ambil data lokasi berdasarkan id_lokasi
    //     $data = [
    //         'judul' => 'Edit Lokasi',
    //         'page' => 'lokasi/v_edit_lokasi',
    //         'lokasi' => $this->ModelLokasi->getDataById($id_lokasi),
    //     ];

    //     // Tampilkan view editlokasi dengan data yang sudah diambil
    //     return view('v_template', $data);
    // }


    public function editlokasi($id_lokasi)
    {
        // Ambil data lokasi berdasarkan id_lokasi
        $data = [
            'judul' => 'Edit Lokasi',
            'page' => 'lokasi/v_edit_lokasi',
            'lokasi' => $this->ModelLokasi->getDataById($id_lokasi),
        ];
    
        // Tampilkan view editlokasi dengan data yang sudah diambil
        return view('v_template', $data);
    }
    

    public function updateData($id_lokasi)
{
    // Validasi input
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
            'label' => 'Latitude',
            'rules' => 'required',
            'errors' => [
                'required' => '{field} Tidak Boleh Kosong'
            ]
        ],
        'longitude' => [
            'label' => 'Longitude',
            'rules' => 'required',
            'errors' => [
                'required' => '{field} Tidak Boleh Kosong'
            ]
        ],
    ])) {
        // Ambil data lokasi yang akan diupdate
        $lokasi = $this->ModelLokasi->getDataById($id_lokasi);

        // Ambil file foto dari form
        $foto_sekolah = $this->request->getFile('foto_sekolah');

        // Jika tidak ada file yang diunggah, gunakan nama file yang sudah ada
        if ($foto_sekolah->getError() == 4) {
            $nama_file_foto = $lokasi['foto_sekolah'];
        } else {
            $nama_file_foto = $foto_sekolah->getRandomName();
            // Pindahkan file foto ke folder foto
            $foto_sekolah->move('foto', $nama_file_foto);
        }

        // Data yang akan diupdate
        $data = [
            'id_lokasi' => $id_lokasi,
            'nama_sekolah' => $this->request->getPost('nama_sekolah'),
            'jenis_sekolah' => $this->request->getPost('jenis_sekolah'),
            'latitude' => $this->request->getPost('latitude'),
            'longitude' => $this->request->getPost('longitude'),
            'foto_sekolah' => $nama_file_foto
        ];

        // Update data menggunakan model
        $this->ModelLokasi->updateData($data);

        // Set flashdata untuk pesan sukses
        session()->setFlashdata('pesan', 'Data Lokasi Berhasil diupdate');

        // Redirect ke halaman inputlokasi
        return redirect()->to('lokasi/pemetaanLokasi');
    } else {
        // Jika validasi gagal, kembalikan ke halaman editlokasi dengan input sebelumnya
        return redirect()->to(base_url('Lokasi/editlokasi/' . $id_lokasi))->withInput()->with('errors', $this->validator);
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
   


    public function deleteLokasi($id_lokasi)
{
    // Cek apakah data dengan ID tersebut ada
    $lokasi = $this->ModelLokasi->getDataById($id_lokasi);
    if (!$lokasi) {
        session()->setFlashdata('error', 'Data tidak ditemukan');
        return redirect()->to(base_url('Lokasi/index'));
    }

    // Hapus data
    $this->ModelLokasi->deleteData($id_lokasi);
    session()->setFlashdata('pesan', 'Data Lokasi Berhasil Dihapus');
    return redirect()->to(base_url('Lokasi/index'));
}



}