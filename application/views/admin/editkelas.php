<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>
    <div class="row">

        <!-- card -->
        <div class="card shadow mb-4 py-4 px-4 col-12">

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
        <!-- /.card -->

    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->