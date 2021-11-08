<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-primary"><?= $title; ?></h1>

    <!-- card -->
    <div class="card shadow mb-4 py-4 px-4">

        <form method="post" action="<?= base_url('siswa/tambahtransaksi'); ?>">
            <input type="number" name="id" value="<?= $siswa['id']; ?>" hidden>
            <input type="text" name="nama_petugas" value="<?= $user['name']; ?>" hidden>
            <div class="row">
                <div class="col-lg">
                    <div class="form-group">
                        <label for="nama_siswa">Nama Siswa</label>
                        <input type="text" class="form-control" name="nama_siswa" id="nama_siswa" value="<?= $siswa['nama_siswa']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="bulan_bayar">Untuk Pembayaran Bulan</label>
                        <select name="bulan_bayar" id="bulan_bayar" class="form-control">
                            <option value="">-- Pilih Bulan --</option>
                            <?php foreach ($iuran as $i) : ?>
                                <option value="<?= $i['bulan_bayar']; ?>"><?= $i['bulan_bayar']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?= form_error('bulan_bayar', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="tahun_bayar">Untuk Pembayaran Tahun</label>
                        <input type="number" class="form-control" name="tahun_bayar" id="tahun_bayar" value="<?= set_value('tahun_bayar'); ?>">
                        <?= form_error('tahun_bayar', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="jmlh_bayar">Jumlah Bayar</label>
                        <input type="number" class="form-control" name="jmlh_bayar" id="jmlh_bayar" value="<?= set_value('jmlh_bayar'); ?>">
                        <?= form_error('jmlh_bayar', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a class="btn btn-outline-secondary ml-2" role="button" href="<?= base_url('siswa'); ?>">Batal</a>
                    </div>
                </div>
            </div>

        </form>
        <!-- akhir form input -->

    </div>
    <!-- /.card -->

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->