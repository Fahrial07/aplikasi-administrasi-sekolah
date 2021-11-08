<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>
    <div class="row">

        <!-- card -->
        <div class="card shadow mb-4 py-4 px-4 col-12">

            <form method="post" action="<?= base_url('siswa/editsiswa'); ?>">
                <div class="form-group">
                    <label for="nik">Nomor Induk Kependudakan (NIK)</label>
                    <input type="text" class="form-control" id="nik" name="nik" value="<?= $siswa['nik']; ?>" maxlength="16" readonly>
                </div>
                <div class="form-group">
                    <label for="nok">Nomor KK (NOK)</label>
                    <input type="text" class="form-control" id="nok" name="nok" maxlength="16" value="<?= $siswa['nok']; ?>">
                    <?= form_error('nok', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="nama_siswa">Nama Siswa</label>
                    <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" value="<?= $siswa['nama_siswa']; ?>">
                    <?= form_error('nama_siswa', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" type="text">
                        <option value="<?= $siswa['jenis_kelamin']; ?>" selected><?= $siswa['jenis_kelamin']; ?></option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="kelas_id">Kelas</label>
                    <select class="form-control" id="kelas_id" name="kelas_id" type="text">
                        <option value="">-- Pilih Kelas --</option>
                        <?php foreach ($kelas as $k) : ?>
                            <option value="<?= $k['id']; ?>"><?= $k['nama_kelas']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?= form_error('kelas_id', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="nama_ayah">Nama Ayah</label>
                    <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" value="<?= $siswa['nama_ayah']; ?>">
                </div>
                <div class="form-group">
                    <label for="nama_ibu">Nama Ibu</label>
                    <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" value="<?= $siswa['nama_ibu']; ?>">
                    <?= form_error('nama_ibu', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="alamat_ortu">Alamat Lengkap Orang Tua</label>
                    <textarea class="form-control" id="alamat_ortu" name="alamat_ortu" rows="3"><?= $siswa['alamat_ortu']; ?></textarea>
                </div>
                <div class="form-group float-right">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a class="btn btn-outline-secondary ml-2" role="button" href="<?= base_url('siswa'); ?>">Batal</a>
                </div>
            </form>
            <!-- akhir form input -->

        </div>
        <!-- /.card -->

    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->