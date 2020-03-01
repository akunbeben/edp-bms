<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Form <?= $title; ?></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#"><?= $title; ?></a></li>
                    <li class="breadcrumb-item active">Form <?= $sub_title; ?></li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <form action="<?= base_url('users/tambah/'); ?>" method="post">
                            <div class="form-group">
                                <label for="teknisi">Teknisi</label>
                                <select class="form-control select-produk" id="teknisi" name="teknisi" required>
                                    <option value=""> -- Pilih Nama Teknisi -- </option>
                                    <?php foreach ($teknisi as $tk) : ?>
                                    <option value="<?= $tk->id; ?>"><?= $tk->nama; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="form-group">
                                <label for="level">Level</label>
                                <select class="form-control" id="level" name="level" required>
                                    <option value="1">Administrator</option>
                                    <option value="2">Teknisi</option>
                                </select>
                            </div>

                            <div class="row justify-content-end">
                            <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Simpan</button>&nbsp;
                            <button type="reset" class="btn btn-warning"><i class="fas fa-minus"></i> Batal</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>