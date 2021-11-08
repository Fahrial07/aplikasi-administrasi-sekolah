<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-primary"><?= $title; ?></h1>
    <div class="row">

        <!-- card -->
        <div class="card shadow mb-4 py-4 px-4 col-12">

            <form method="post" action="<?= base_url('admin/tambahiuran'); ?>">
                <div class="row">
                    <div class="col-lg">
                        <div class="form-group">
                            <label for="bulan_bayar">Pembayaran Untuk Bulan</label>
                            <select class="form-control" name="bulan_bayar" id="bulan_bayar" type="text">
                                <option value="" disabled selected>-- Pilih Bulan --</option>
                                <option value="01">Januari</option>
                                <option value="02">Februari</option>
                                <option value="03">Maret</option>
                                <option value="04">April</option>
                                <option value="05">Mei</option>
                                <option value="06">Juni</option>
                                <option value="07">Juli</option>
                                <option value="08">Agustus</option>
                                <option value="09">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                                <?php
                                // $bulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
                                // $jlh_bln = count($bulan);
                                // for ($c = 0; $c < $jlh_bln; $c += 1) {
                                //     echo "<option value=$bulan[$c]> $bulan[$c] </option>";
                                // }
                                ?>
                            </select>
                            <?= form_error('bulan_bayar', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="jmlh_bayar_lunas">Jumlah Bayar Lunas (Rp)</label>
                            <input type="number" class="form-control" id="jmlh_bayar_lunas" name="jmlh_bayar_lunas" value="<?= set_value('jmlh_bayar_lunas'); ?>">
                            <?= form_error('jmlh_bayar_lunas', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="tahun">Tahun</label>
                            <input type="number" class="form-control" id="tahun" name="tahun" maxlength="4" value="<?= set_value('tahun'); ?>">
                            <?= form_error('tahun', '<small class="text-danger pl-3">', '</small>'); ?>
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