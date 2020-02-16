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
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <?= form_open_multipart('teknisi/edit/' . $teknisi->id); ?>
                            <div class="form-group">
                                <label for="nik">NIK</label>
                                <input type="hidden" id="id" name="id" value="<?= $teknisi->id; ?>">
                                <input type="number" class="form-control" id="nik" name="nik" value="<?= $teknisi->nik; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="<?= $teknisi->nama; ?>">
                            </div>
                            <div class="form-group">
                                <label for="jabatan">Jabatan</label>
                                <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?= $teknisi->jabatan; ?>">
                            </div>
                            <div class="form-group">
                                <label for="area_kerja">Area Kerja</label>
                                <input type="text" class="form-control" id="area_kerja" name="area_kerja" value="<?= $teknisi->area_kerja; ?>">
                            </div>
                            <div class="form-group">
                                <label for="telepon">No. Telepon</label>
                                <input type="number" class="form-control" id="telepon" name="telepon" value="<?= $teknisi->telepon; ?>">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $teknisi->alamat; ?>">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Foto</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="foto" name="foto" aria-describedby="inputGroupFileAddon01">
                                    <label class="custom-file-label" for="foto">Pilih Foto</label>
                                </div>
                            </div>

                            <img style="max-width: 100px;" src="<?= base_url('uploads/' . $teknisi->foto ); ?>" class="img-thumbnail">

                            <div class="row justify-content-end">
                                <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Simpan</button>&nbsp;
                                <a type="a" class="btn btn-warning" href="<?= base_url('teknisi/'); ?>"><i class="fas fa-minus"></i> Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>