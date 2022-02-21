    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Main Row -->
            <div class="row justify-content-center">
                <div class="col-10">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="d-lg-inline">Edit Data</h4>
                        </div>

                        <div class="card-body">
                            <form action="<?= site_url('kartu/edit/' . $data->id); ?>" method="POST" role="form">
                                <div class="form-group row">
                                    <label for="nama" class="col-sm-2 col-form-label">Nama Provider</label>
                                    <div class="col-10">
                                        <input type="text" name="nama" id="nama" class="form-control" value="<?= empty(set_value('nama')) ? $data->nama : set_value('nama'); ?>">
                                        <?= form_error('nama'); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="brand" class="col-sm-2 col-form-label">Durasi Hari</label>
                                    <div class="col-10">
                                        <input type="text" name="spesifikasi" id="spesifikasi" class="form-control" value="<?= empty(set_value('spesifikasi')) ? $data->spesifikasi : set_value('spesifikasi'); ?>">
                                        <?= form_error('spesifikasi'); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="brand" class="col-sm-2 col-form-label">Jumlah(GB)</label>
                                    <div class="col-10">
                                        <input type="text" name="brand" id="brand" class="form-control" value="<?= empty(set_value('brand')) ? $data->brand : set_value('brand'); ?>">
                                        <?= form_error('brand'); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="brand" class="col-sm-2 col-form-label">Stok</label>
                                    <div class="col-10">
                                        <input type="text" name="stok" id="stok" class="form-control" value="<?= empty(set_value('stok')) ? $data->stok : set_value('stok'); ?>">
                                        <?= form_error('stok'); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="price" class="col-sm-2 col-form-label">Harga</label>
                                    <div class="col-10">
                                        <input type="text" name="price" id="price" class="form-control" value="<?= empty(set_value('price')) ? $data->price : set_value('price'); ?>">
                                        <?= form_error('price'); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <button type="submit" class="btn btn-info btn-block      fas fa-check-square">Edit</button>
                                    <a href="<?= site_url('kartu'); ?>" class="btn btn-default btn-block fa fa-sign-out">Kembali</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Main Row End -->
        </div>
    </section>
    <!-- Main Content End -->
</div>