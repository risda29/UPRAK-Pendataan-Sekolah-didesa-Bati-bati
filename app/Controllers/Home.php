<?php

namespace App\Controllers;

use App\Models\PetaModel;
use App\Models\SigModel;

class Home extends BaseController
{
    protected $petaModel;
    protected $sigModel;

    public function __construct()
    {
        $this->petaModel = new PetaModel();
        $this->sigModel = new SigModel();
    }

    public function index(): string
    {
        $petas = $this->petaModel->findAll();
        $features = [];
        $dataPeta = [];

        foreach ($petas as $key) {
            $gis = $this->sigModel->where('id_peta', $key['id_peta'])->findAll();
            foreach ($gis as $row) {
                $name = $row['name'];
                $coordinates = json_decode($row['coordinat']);
                $type = $row['type'];

                $feature = [
                    'type' => 'Feature',
                    'properties' => [
                        'name' => $name,
                    ],
                    'geometry' => [
                        'coordinates' => $coordinates,
                        'type' => $type,
                    ],
                    'id' => count($features),
                ];

                array_push($features, $feature);
            }
            $geoJson = [
                'type' => 'FeatureCollection',
                'features' => $features,
            ];

            $dataPeta[] = [
                'nama_peta' => $key['nama_peta'],
                'id_peta' => $key['id_peta'],
                'geoJson' => json_encode($geoJson),
            ];
        }

        $data = [
            'peta' => $dataPeta,
            'geoJson' => json_encode($geoJson),
        ];

        return view('index', $data);
    }

    public function detail($id): string
    {
        $petas = $this->petaModel->where('id_peta', $id)->findAll();
        $features = [];
        $dataPeta = [];

        foreach ($petas as $key) {
            $gis = $this->sigModel->where('id_peta', $key['id_peta'])->findAll();
            foreach ($gis as $row) {
                $name = $row['name'];
                $coordinates = json_decode($row['coordinat']);
                $type = $row['type'];

                $feature = [
                    'type' => 'Feature',
                    'properties' => [
                        'name' => $name,
                    ],
                    'geometry' => [
                        'coordinates' => $coordinates,
                        'type' => $type,
                    ],
                    'id' => count($features),
                ];

                array_push($features, $feature);
            }
            $geoJson = [
                'type' => 'FeatureCollection',
                'features' => $features,
            ];

            $dataPeta = [
                'nama_peta' => $key['nama_peta'],
                'id_peta' => $key['id_peta'],
                'geoJson' => json_encode($geoJson),
            ];
        }

        return view('detail', $dataPeta);
    }

    public function tambahData()
    {
        $dataPost = $this->request->getVar();
        $dataPeta = [
            'nama_peta' => $dataPost['nama-peta'],
        ];

        $this->petaModel->save($dataPeta);

        $idPeta = $this->petaModel->orderBy('id_peta', 'DESC')->first();
        $geoJson = $this->request->getPost('geojson');
        $data = json_decode($dataPost['geojson']);

        foreach ($data->features as $feature) {
            $name = $feature->properties->name;
            $coordinates = json_encode($feature->geometry->coordinates);
            $type = $feature->geometry->type;
            $dataToSave = [
                'name' => $name,
                'coordinat' => $coordinates,
                'type' => $type,
                'id_peta' => $idPeta['id_peta'],
            ];
            $this->sigModel->save($dataToSave);
        }

        session()->setFlashData('success', 'Data Berhasil disimpan');
        return redirect()->to('/');
    }

    public function edit()
    {
        $dataPost = $this->request->getVar();
        $dataPeta = [
            'nama_peta' => $dataPost['nama-peta'],
        ];

        $this->petaModel->update($dataPost['id'], $dataPeta);
        $this->sigModel->where('id_peta', $dataPost['id'])->delete();

        $geoJson = $this->request->getPost('geojson');
        $data = json_decode($dataPost['geojson']);

        foreach ($data->features as $feature) {
            $name = $feature->properties->name;
            $coordinates = json_encode($feature->geometry->coordinates);
            $type = $feature->geometry->type;

            $dataToSave = [
                'name' => $name,
                'coordinat' => $coordinates,
                'type' => $type,
                'id_peta' => $dataPost['id'],
            ];

            $this->sigModel->save($dataToSave);
        }

        session()->setFlashData('success', 'Data Berhasil diubah');
        return redirect()->to('/');
    }

    public function delete($id)
    {
        $this->sigModel->where('id_peta', $id)->delete();
        $this->petaModel->delete($id);
        session()->setFlashData('success', 'Data Berhasil dihapus');
        return redirect()->to('/');
    }
}
