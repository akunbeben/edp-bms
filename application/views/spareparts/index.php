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
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <h1 class="card-title">Data <?= $title; ?></h1>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-dark btn-sm" href="<?= base_url('spareparts/tambah/'); ?>"><i class="fa fa-plus"></i></a>
                            <a class="btn btn-dark btn-sm" href="<?= base_url('spareparts/stok-masuk/'); ?>"><i class="fa fa-download"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="complaintTable" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Stok</th>
                                    <th>Kategori</th>
                                    <th>Satuan</th>
                                    <th>Harga</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($spareparts as $spr) : ?>
                                <tr>
                                    <td><?= $spr->kode; ?></td>
                                    <td><?= $spr->nama; ?></td>
                                    <td><?= $spr->stok; ?></td>
                                    <td><?= $spr->kategori; ?></td>
                                    <td><?= $spr->satuan; ?></td>
                                    <td><?= rupiah($spr->harga); ?></td>
                                    <td class="text-center" style="max-width: 50px;">
                                        <a class="btn btn-warning btn-sm" href="<?= base_url('spareparts/edit/') . $spr->id; ?>"><i class="fas fa-pencil-alt"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->