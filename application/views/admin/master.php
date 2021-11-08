<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>

    <!-- menampilkan pesan -->
    <div class="row">
        <div class="col-6">
                                <div id="flashdata" onload="clearme();">
                                     <?= $this->session->flashdata('message'); ?>
                                </div>
        </div>
    </div>

    <!-- row untuk jadi satu baris card -->

    <!-- card data Iuran -->
    <div class="row">
        <div class="col">
            <div class="card shadow-lg mb-3">
                <div class="card-header">
                    <a href="<?= base_url('admin/tambahiuran') ?>" class="btn btn-primary" style="min-width: 200px;"><i class="fas fa-coins pr-2 fa-sm text-white-50"></i> Input Data Iuran</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="tableIuran">
                            <thead>
                                <tr>
                                    <th scope="col">Jumlah Pembayaran Lunas (Rp)</th>
                                    <th scope="col">Untuk Pembayaran Bulan</th>
                                    <th scope="col">Tahun</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($iuran as $i) : ?>
                                    <tr>
                                        <td>
                                            <?php $angka = $i['jmlh_bayar_lunas'];
                                            $rupiah = "Rp " . number_format($angka, 2, ',', '.');
                                            echo $rupiah;
                                            ?>
                                        </td>
                                        <td><?= $i['bulan_bayar']; ?></td>
                                        <td><?= $i['tahun']; ?></td>
                                        <td class="text-center">
                                            <a href="#editIuran<?= $i['id']; ?>" data-toggle="modal" class="badge badge-info mr-1"><i class="fas fa-edit fa-sm"></i> Edit</a>
                                            <a href="<?= base_url('admin/hapusiuran/' . $i['id']); ?>" class="badge badge-danger" onclick="return confirm('Yakin ingin menghapus data ini?');"><i class="fas fa-trash-alt fa-sm"></i> Hapus</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card data Iuran -->

    <!-- card data Kurikulum-->
    <div class="row">
        <div class="col">
            <div class="card shadow-lg mb-3">
                <div class="card-header">
                    <a href="<?= base_url('admin/tambahkurikulum'); ?>" class="btn btn-success" style="min-width: 200px;"><i class="fas fa-book-open pr-2 fa-sm text-white-50"></i>Input Data Kurikulum</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="tableSemester">
                            <thead>
                                <tr>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Tahun</th>
                                    <th scope="col">Semester</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($kurikulum as $kr) : ?>
                                    <tr>
                                        <td><?= $kr['nama']; ?></td>
                                        <td><?= $kr['tahun']; ?></td>
                                        <td><?= $kr['semester']; ?></td>
                                        <td class="text-center">
                                            <a href="#editKurikulum<?= $kr['id']; ?>" data-toggle="modal" class="badge badge-info mr-1"><i class="fas fa-edit fa-sm"></i> Edit</a>
                                            <a href="<?= base_url('admin/hapuskurikulum/' . $kr['id']); ?>" class="badge badge-danger" onclick="return confirm('Yakin ingin menghapus data ini?');">
                                                <i class="fas fa-trash-alt fa-sm"></i>
                                                Hapus
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card data Kurikulum -->

    <!-- card data Kelas -->
    <div class="row">
        <div class="col">
            <div class="card shadow-lg mb-3">
                <div class="card-header">
                    <a href="<?= base_url('admin/tambahkelas'); ?>" class="btn btn-info" style="min-width: 200px;"><i class="fas fa-book-reader pr-2 fa-sm text-white-50"></i> Input Data Kelas</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="tableKelas">
                            <thead>
                                <tr>
                                    <th scope="col">Nama Kelas</th>
                                    <th scope="col">Kurikulum</th>
                                    <th scope="col">Semester</th>
                                    <th scope="col">Tahun</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($kelas as $k) : ?>
                                    <tr>
                                        <td><?= $k['nama_kelas']; ?></td>
                                        <td><?= $k['nama']; ?></td>
                                        <td><?= $k['semester']; ?></td>
                                        <td><?= $k['tahun']; ?></td>
                                        <td class="text-center">
                                            <a href="#editKelas<?= $k['id']; ?>" data-toggle="modal" class="badge badge-info mr-1"><i class="fas fa-edit fa-sm"></i> Edit</a>
                                            <a href="<?= base_url('admin/hapuskelas/' . $k['id']); ?>" class="badge badge-danger" onclick="return confirm('Yakin ingin menghapus data ini?');">
                                                <i class="fas fa-trash-alt fa-sm"></i>
                                                Hapus
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card data kelas -->

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<!-- edit Iuran Modal-->
<?php foreach ($iuran as $i) : ?>
    <div class="modal fade" id="editIuran<?= $i['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data iuran</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">

                    <form method="post" action="<?= base_url('admin/editiuran'); ?>">
                        <input type="number" name="id" id="id" value="<?= $i['id']; ?>" hidden>
                        <div class="row">
                            <div class="col-lg">
                                <div class="form-group">
                                    <label for="bulan_bayar">Pembayaran Untuk Bulan</label>
                                    <input type="text" class="form-control" id="bulan_bayar" name="bulan_bayar" value="<?= $i['bulan_bayar']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="jmlh_bayar_lunas">Jumlah Bayar Lunas (Rp)</label>
                                    <input type="number" class="form-control" id="jmlh_bayar_lunas" name="jmlh_bayar_lunas" value="<?= $i['jmlh_bayar_lunas']; ?>">
                                    <?= form_error('jmlh_bayar_lunas', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="tahun">Tahun</label>
                                    <input type="number" class="form-control" id="tahun" name="tahun" maxlength="4" value="<?= $i['tahun']; ?>" readonly>
                                </div>
                                <div class="form-group float-right">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a class="btn btn-outline-secondary ml-2" role="button" href="<?= base_url('admin/master'); ?>">Batal</a>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- akhir form input -->

                </div>

                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- /.akhir edit Iuran Modal -->


<!-- edit Kurikulum Modal-->
<?php foreach ($kurikulum as $kr) : ?>
    <div class="modal fade" id="editKurikulum<?= $kr['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Kurikulum</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">

                    <form method="post" action="<?= base_url('admin/editkurikulum'); ?>">
                        <input type="number" name="id" id="id" value="<?= $kr['id']; ?>" hidden>
                        <div class="row">
                            <div class="col-lg">
                                <div class="form-group">
                                    <label for="nama">Nama Kurikulum</label>
                                    <select class="form-control" name="nama" id="nama" type="text">
                                        <option value="<?= $kr['nama'] ?>"><?= $kr['nama'] ?></option>
                                        <option value="K-2013 Paket">K-2013 Paket</option>
                                        <option value="K-2013 SKS">K-2013 SKS</option>
                                        <option value="K-2006 (KTSP)">K-2006 (KTSP)</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="semester">Semester</label>
                                    <select class="form-control" name="semester" id="semester" type="text">
                                        <option value="<?= $kr['semester'] ?>"><?= $kr['semester'] ?></option>
                                        <option value="Ganjil">Ganjil</option>
                                        <option value="Genap">Genap</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tahun">Tahun</label>
                                    <input type="number" class="form-control" id="tahun" name="tahun" value="<?= $kr['tahun']; ?>" readonly>
                                </div>
                                <div class="form-group float-right">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a class="btn btn-outline-secondary ml-2" role="button" href="<?= base_url('admin/master'); ?>">Batal</a>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- akhir form input -->

                </div>

                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- /.akhir edit Kurikulum Modal -->


<!-- edit Kelas Modal-->
<?php foreach ($kelas as $k) : ?>
    <div class="modal fade" id="editKelas<?= $k['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Kelas</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">

                    <form method="post" action="<?= base_url('admin/editkelas'); ?>">
                        <input type="number" name="id" value="<?= $k['id']; ?>" hidden>
                        <input type="number" name="id_kurikulum" value="<?= $k['id_kurikulum']; ?>" hidden>
                        <div class="row">
                            <div class="col-lg">
                                <div class="form-group">
                                    <label for="nama_kelas">Nama Kelas</label>
                                    <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" value="<?= $k['nama_kelas']; ?>">
                                    <?= form_error('nama_kelas', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group float-right">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a class="btn btn-outline-secondary ml-2" role="button" href="<?= base_url('admin/master'); ?>">Batal</a>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>

                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- /.akhir edit Kelas Modal -->