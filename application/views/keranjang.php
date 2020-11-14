<div class="container-fluid">
    <h4>Keranjang Belanja</h4>
    <table class="table table-bordered table-striped table-hover">
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Sub-Total</th>
        </tr>
        <?php $nomor = 1;
        foreach ($this->cart->contents() as $items) : ?>
            <tr>
                <td><?php echo $nomor++; ?></td>
                <td><?php echo $items['name'] ?></td>
                <td><?php echo $items['qty'] ?></td>
                <td>Rp. <?php echo number_format($items['price'], 0, ',', '.') ?></td>
                <td>Rp. <?php echo number_format($items['subtotal'], 0, ',', '.') ?></td>
            </tr>

        <?php endforeach; ?>
        <tr>
            <td colspan="4"></td>
            <td>Rp. <?php echo number_format($this->cart->Total(), 0, ',', '.'); ?></td>
        </tr>
    </table>
    <div align="right">
        <a href="<?php echo base_url('dashboard/hapus_keranjang') ?>">
            <div class="btn btn-sm btn-danger">Hapus</div>
        </a>
        <a href="<?php echo base_url('dashboard/index') ?>">
            <div class="btn btn-sm btn-primary">Kembali</div>
            <a href="<?php echo base_url('dashboard/pembayaran') ?>">
                <div class="btn btn-sm btn-success">Pembayaran</div>
            </a>
        </a>
    </div>
</div>