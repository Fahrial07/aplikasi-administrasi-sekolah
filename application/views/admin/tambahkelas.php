<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>
    <div class="row">

        <!-- card -->
        <div class="card shadow mb-4 py-4 px-4 col-12">

            <form method="post" action="<?= base_url('admin/tambahkelas'); ?>">
                <div class="row">
                    <div class="col-lg">
                        <div class="form-group">
                            <label for="nama_kelas">Nama Kelas</label>
                            <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" value="<?= set_value('nama_kelas'); ?>">
                            <?= form_error('nama_kelas', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="id_kurikulum">Nama Kurikulum</label>
                            <select class="form-control" name="id_kurikulum" id="id_kurikulum" type="text">
                                <option value="">-- Pilih kurikulum --</option>
                                <?php foreach ($kurikulums as $k) : ?>
                                    <option value="<?= $k['id'] ?>"><?= $k['nama'] . '&nbsp;| Semester ' . $k['semester'] . '&nbsp;| Tahun ' . $k['tahun'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?= form_error('id_kurikulum', '<small class="text-danger pl-3">', '</small>'); ?>
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