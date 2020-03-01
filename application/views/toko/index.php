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
                            <a class="btn btn-dark btn-sm" href="<?= base_url('toko/tambah/'); ?>"><i class="fa fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="complaintTable" class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Kode Toko</th>
                                    <th>Nama Toko</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($toko as $tk) : ?>
                                <tr>
                                    <td><?= $tk->kode_toko; ?></td>
                                    <td><?= $tk->nama_toko; ?></td>
                                    <td class="text-center" style="width: 120px;">
                                        <a class="btn btn-warning btn-sm" href="<?= base_url('toko/edit/') . $tk->id; ?>"><i class="fas fa-pencil-alt"></i></a>
                                        <a class="btn btn-danger btn-sm" href="<?= base_url('toko/hapus/') . $tk->id; ?>"><i class="fas fa-trash"></i></a>
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