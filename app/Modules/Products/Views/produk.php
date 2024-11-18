<?= $this->extend('App\Modules\Dashboard\Views\template') ?>

<?= $this->section('title') ?>
Produk
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="card">
<div class="mb-3">
</div>
    <div class="card-header">
        <h3 class="card-title">Produk</h3>
        <a data-bs-href="<?php echo site_url('produk/modal/add-produk') ?>" data-bs-title="Tambah Produk" data-bs-remote="false" data-bs-toggle="modal" data-bs-target="#dinamicModal" data-bs-backdrop="static" data-bs-keyboard="false" title="Tambah Produk" class="btn btn-md btn-custom text-white btn-block">
        Tambah Produk
    </a>
    <a href="<?php echo site_url('produk/modal/add-produk') ?>">asdasda</a>
    <a data-bs-href="<?php echo site_url('modal/admin/add-produk') ?>" data-bs-title="Tambah Produk" data-bs-remote="false" data-bs-toggle="modal" data-bs-target="#dinamicModal" data-bs-backdrop="static" data-bs-keyboard="false" title="Tambah Produk" class="btn btn-md btn-custom text-white btn-block">
        Tambah Produk
    </a>

    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Produk</th>
                        <th>Gambar Produk</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                   $db = \Config\Database::connect();
                   $produk = $db->table('tb_produk')->get()->getResult();
                   $no = 1;

                    foreach ($produk as $item) {
                    ?>
                        <tr>
                            <th><?php echo $no++ ?></th>
                            <td><?php echo $item->produk_nama ?></td>
                            <td>
                                <a target="_blank" href="<?php echo base_url('assets/produk/' . $item->produk_image) ?>">
                                    <img src="<?php echo base_url('assets/produk/thumbnail/thumb_' . $item->produk_image); ?>" alt="" srcset="" alt='Gambar Produk <?php echo $item->produk_nama ?>' style='width:50px; height:50px;'>
                                </a>
                            </td>
                            <td>
                                <a href="#" data-bs-href="<?php echo site_url('produk/modal/edit-produk?code=' . $item->produk_code) ?>" data-bs-title="UPDATE DATA PRODUK" data-bs-remote="false" data-bs-toggle="modal" data-bs-target="#dinamicModal" data-bs-backdrop="static" data-bs-keyboard="false" class="btn btn-primary text-white mb-1">
                                    Update
                                </a>
                                <a href="javascript:void(0)" onclick="deleteProduk('<?php echo $item->produk_code ?>')" class="btn  btn-danger text-white mb-1">Hapus</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <div class="form-group">
                            <td colspan="8">
                            </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<script>
    function deleteProduk(code) {
        Swal.fire({
            allowOutsideClick: false,
            title: 'Apakah Anda yakin?',
            text: "Akan menghapus data Produk ini",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus',
            cancelButtonText: 'Batal',
        }).then((result) => {
            console.log('<?php echo csrf_hash(); ?>')
            if (result.value) {
                $.ajax({
                        url: '<?php echo site_url('postdata/admin_post/Produk/DeleteProduk'); ?>',
                        type: 'post',
                        dataType: 'json',
                        data: {
                            code: code,
                            csrf_app: '<?php echo csrf_hash(); ?>'
                        }
                    })
                    .done(function(data) {
                        updateCSRF(data.csrf_data);
                        Swal.fire(
                            data.heading,
                            data.message,
                            data.type,
                        ).then(function() {
                            if (data.status) {
                                window.location.reload();
                            }
                        });
                    });
            }
        });
    }
</script>
<?= $this->endSection() ?>