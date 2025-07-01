<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<?php
if (session()->getFlashData('success')) {
?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <?= session()->getFlashData('success') ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
}
?>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Manajemen Data Pembelian</h5>

        <div class="table-responsive">
            <table class="table datatable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">ID Pembelian</th>
                        <th scope="col">Username</th>
                        <th scope="col">Waktu Pembelian</th>
                        <th scope="col">Total Bayar</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pembelian as $index => $item) : ?>
                    <tr>
                        <th scope="row"><?php echo $index + 1 ?></th>
                        <td><?php echo $item['id'] ?></td>
                        <td><?php echo $item['username'] ?></td>
                        <td><?php echo $item['created_at'] ?></td>
                        <td><?php echo number_to_currency($item['total_harga'], 'IDR') ?></td>
                        <td><?php echo $item['alamat'] ?></td>
                        <td>
                            <?php if ($item['status'] == 1) : ?>
                            <span class="text-success">Sudah Selesai</span>
                            <?php else : ?>
                            <span class="text-danger">Belum Selesai</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="<?= base_url('pembelian/updateStatus/' . $item['id']) ?>"
                                class="btn btn-warning btn-sm"
                                onclick="return confirm('Apakah Anda yakin ingin mengubah status pesanan ini?')">
                                Ubah Status
                            </a>
                            <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                                data-bs-target="#detailModal-<?= $item['id'] ?>">
                                Detail
                            </button>
                        </td>
                    </tr>

                    <div class="modal fade" id="detailModal-<?= $item['id'] ?>" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Detail Pesanan (ID: <?= $item['id'] ?>)</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p><strong>Alamat Pengiriman:</strong> <?= $item['alamat'] ?></p>
                                    <hr>
                                    <?php if (!empty($details[$item['id']])) : ?>
                                    <?php foreach ($details[$item['id']] as $item2) : ?>
                                    <div class="row mb-3 align-items-center">
                                        <div class="col-md-2">
                                            <?php if ($item2['foto'] != '' && file_exists("img/" . $item2['foto'])) : ?>
                                            <img src="<?php echo base_url("img/" . $item2['foto']) ?>"
                                                class="img-fluid rounded">
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-md-6">
                                            <strong><?= $item2['nama'] ?></strong><br>
                                            <span>Harga Satuan:
                                                <?= number_to_currency($item2['harga'], 'IDR') ?></span><br>
                                            <span>Jumlah: <?= $item2['jumlah'] ?> pcs</span>
                                        </div>
                                        <div class="col-md-4 text-end">
                                            <strong>Subtotal:
                                                <?= number_to_currency($item2['subtotal_harga'], 'IDR') ?></strong>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                    <?php else : ?>
                                    <p>Detail produk tidak ditemukan.</p>
                                    <?php endif; ?>
                                    <hr>
                                    <div class="text-end">
                                        <h6>Ongkir: <?= number_to_currency($item['ongkir'], 'IDR') ?></h6>
                                        <h5 class="mt-2">Total Keseluruhan:
                                            <?= number_to_currency($item['total_harga'], 'IDR') ?></h5>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>

    </div>
</div>

<?= $this->endSection() ?>