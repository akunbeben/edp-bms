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
                            <a class="btn btn-dark btn-sm" href="<?= base_url('complaint/tambah/'); ?>"><i class="fa fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="complaintTable" class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>ID Complaint</th>
                                    <th>Tanggal</th>
                                    <th>Toko</th>
                                    <th>Keluhan</th>
                                    <th>Catatan</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($complaint as $cmp) : ?>
                                <tr>
                                    <td><?= $cmp->id_complaint; ?></td>
                                    <td><?= date('d M Y H:i:s', strtotime($cmp->tanggal)); ?></td>
                                    <td><?= $cmp->toko; ?></td>
                                    <td><?= $cmp->keluhan; ?></td>
                                    <td><?= $cmp->catatan; ?></td>
                                    <td class="text-center"><?= $cmp->status == 0 ? '<span class="badge bg-danger">Pending</span>' : ($cmp->status == 1 ? '<span class="badge bg-success">Done</span>' : ''); ?></td>
                                    <td class="text-center" style="width: 120px;">
                                        <a class="btn btn-success btn-sm" href="<?= base_url('complaint/proses/') . $cmp->id; ?>"><i class="fas fa-paper-plane"></i></a>
                                        <a class="btn btn-warning btn-sm" href="<?= base_url('complaint/edit/') . $cmp->id; ?>"><i class="fas fa-pencil-alt"></i></a>
                                        <a class="btn btn-danger btn-sm" href="<?= base_url('complaint/hapus/') . $cmp->id; ?>"><i class="fas fa-trash"></i></a>
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