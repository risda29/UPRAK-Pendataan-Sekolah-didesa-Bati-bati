<div class="row mb-3">
    <div class="col-12 d-flex justify-content-between align-items-center">
        <a href="<?= base_url('lokasi/tambah') ?>" class="btn btn-success">Tambah Data</a>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <table class="table table-bordered" id="datatablesSimple">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Sekolah</th>
                    <th>Jenis Sekolah</th>
                    <th>Langitude</th>
                    <th>Longitude</th>
                    <th>Foto Sekolah</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
            foreach ($lokasi as $key => $value) { ?>
                    <tr>
                    <td><?= $no++ ?> </td>
                        <td> <?= $value['nama_sekolah'] ?> </td>
                        <td> <?= $value['jenis_sekolah'] ?> </td>
                        <td> <?= $value['latitude'] ?> </td>
                        <td> <?= $value['longitude'] ?> </td>
                        <td><img src="<?= base_url('foto/'. $value['foto_sekolah'])?>" width="150px"></td>
                        <td>
                        <a href="<?= base_url('lokasi/editlokasi/'. $value['id_lokasi']) ?>"class="btn btn-warning"> Edit</a>
                        <a href="<?= base_url('lokasi/deleteLokasi/'. $value['id_lokasi']) ?>"class="btn btn-danger" onclick="return confirm('Anda Yakin Akan Menghapus Lokasi Ini')"> Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>