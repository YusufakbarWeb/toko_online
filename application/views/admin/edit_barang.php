<div class="container-fluid">
    <h3><i class="fas fa-edit">Edit Data</i></h3>

        <form action="<?= base_url('site/admin/barang/update'); ?>" method="post">
            <div class="form-group">
                <label>Nama Barang</label>
                <input type="hidden" name="id_brg" class="form-control" value="<?= $barang['id_brg'] ?>">
                <input type="text" name="nama_brg" class="form-control" value="<?= $barang['nama_brg'] ?>">
            </div>
            <div class="form-group">
                <label>Keterangan</label>
                <input type="text" name="keterangan" class="form-control" value="<?= $barang['keterangan'] ?>">
            </div>
            <div class="form-group">
                <label>Kategori</label>
                <input type="text" name="kategori" class="form-control" value="<?= $barang['keterangan'] ?>">
            </div>
            <div class="form-group">
                <label>harga</label>
                <input type="text" name="harga" class="form-control" value="<?= $barang['harga'] ?>">
            </div>
            <div class="form-group">
                <label>stok</label>
                <input type="text" name="stok" class="form-control" value="<?= $barang['stok']?>">
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
        </form>
</div>