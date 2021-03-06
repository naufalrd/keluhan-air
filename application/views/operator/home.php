<div class="container mb-container">
    <div class="row mt-5 mx-5 p-5 shadow bg-white rounded">
        <h1 class="text-center">Keluhan</h1>
        <div class="container text-center overflow-auto">

            <table class="table">
                <thead>
                    <tr class="text-center">
                        <th scope="col">No</th>
                        <th scope="col">Nama Pelanggan</th>
                        <th scope="col">Keluhan</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php $no=1;
                foreach ($keluhan as $data) :?>
                    <tr class="text-center">
                        <th><?= $no++?></th>
                        <td><?= $data['nama_depan']." ".$data['nama_belakang']?></td>
                        <td><?= $data['judul']?></td>
                        <td><?= date_indo($data['tanggal_keluhan'])?></td>
                        <td><a href="<?= site_url(); ?>operator/teruskan/<?= $data['id_keluhan'] ?>" class="btn btn-sm btn-primary mx-1"><i class="bx bx-right-arrow"></i> Teruskan</a></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
                
            </table>
        </div>
    </div>
    <div class="row mt-5 mx-5 p-5 shadow bg-white rounded">
        <h1 class="text-center">Riwayat Keluhan</h1>
        <div class="container text-center overflow-auto">

            <table class="table">
                <thead>
                    <tr class="text-center">
                        <th scope="col">No</th>
                        <th scope="col">Nama Pelanggan</th>
                        <th scope="col">Keluhan</th>
                        <th scope="col">Tanggal Keluhan</th>
                        <th scope="col">Status</th>
                        <th scope="col">Bidang Penanggung Jawab</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $ni= 1; foreach ($selesai as $data3) :?>
                    <tr class="text-center">    
                        <th><?= $ni++?></th>
                        <td><?= $data3['nama_depan']." ".$data3['nama_belakang']?></td>
                        <td><?= $data3['judul']?></td>
                        <td><?= date_indo($data3['tanggal_keluhan'])?></td>
                        <td><?= $data3['status']?></td>
                        <td><?= $data3['nama_bidang']?></td>
                        <td><a href="<?= site_url(); ?>operator/details/<?= $data3['id_keluhan'] ?>" class="btn btn-sm <?= $data3['status'] == 'Ditinjau' ? 'btn-primary' : 'btn-success' ;?>"><i class="bx bx-message-<?= $data3['status'] == 'Ditinjau' ? 'error' : 'check' ;?>"></i> Detail</a></td>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>