<div class="container-fluid">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="btn btn-sm btn-primary ">
                <?php
                $grand_total = 0;
                if ($keranjang = $this->cart->contents()) {
                    foreach ($keranjang as $items) {
                        $grand_total = $grand_total + $items['subtotal'];

                        echo "<h4>Total Pembayaran: Rp. " . number_format($grand_total, 0, ',', '.');
                    }
                ?>
            </div><br><br><br>
            <h3>Masukkan Alamat Pengiriman dan Pembayaran</h3>

            <form action="<?php echo base_url('dashboard/proses_pesan'); ?>">
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input class="form-control" type="text" name="nama" placeholder="Nama Lengkap">
                </div>
                <div class="form-group">
                    <label>Alamat Lengkap</label>
                    <input class="form-control" type="text" name="alamat" placeholder="Alamat Lengkap">
                </div>
                <div class="form-group">
                    <label>No.Telp</label>
                    <input class="form-control" type="text" name="no_telp" placeholder="No. Telp Anda">
                </div>
                <div class="form-group">
                    <label>Metode Pengiriman</label>
                    <select class="form-control">
                        <option>JNE Express</option>
                        <option>Pos Indonesia</option>
                        <option>TIKI</option>
                        <option>J&T Express</option>
                        <option>Go-Send</option>
                        <option>Si Cepat Ekspres</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Metode Pembayaran</label>
                    <select class="form-control">
                        <option>BRI</option>
                        <option>BNI</option>
                        <option>MANDIRI</option>
                        <option>BCA</option>
                        <option>BANK MEGA</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success btn-sm">Pesan</button>
            </form>
        <?php
                } else {
                    echo "Keranjang Belanja Anda Masih Kosong....Harap Pilih Barang yg Akan Anda Beli";
                }
        ?>

        </div>
        <div class="col-md-2"></div>
    </div>
</div>