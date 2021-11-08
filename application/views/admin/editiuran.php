<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>
    <div class="row">

        <!-- card -->
        <div class="card shadow mb-4 py-4 px-4 col-12">

            <form method="post" action="<?= base_url('admin/editiuran'); ?>">
                <input type="number" name="id" value="<?= $editiuran['id']; ?>" hidden>
                <div class="row">
                    <div class="col-lg">
                        <div class="form-group">
                            <label for="bulan_bayar">Pembayaran Untuk Bulan</label>
                            <input type="text" class="form-control" id="bulan_bayar" name="bulan_bayar" value="<?= $editiuran['bulan_bayar']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="jmlh_bayar_lunas">Jumlah Bayar Lunas (Rp)</label>
                            <input type="number" class="form-control" id="jmlh_bayar_lunas" name="jmlh_bayar_lunas" value="<?= $editiuran['jmlh_bayar_lunas']; ?>">
                            <?= form_error('jmlh_bayar_lunas', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="tahun">Tahun</label>
                            <input type="number" class="form-control" id="tahun" name="tahun" maxlength="4" value="<?= $editiuran['tahun']; ?>" readonly>
                        </div>
                        <div class="form-group float-right">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a class="btn btn-outline-secondary ml-2" role="button" href="<?= base_url('admin/master'); ?>">Batal</a>
                        </div>
                    </div>
                </div>
            </form>

        </div>
        <!-- /.card -->

    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->