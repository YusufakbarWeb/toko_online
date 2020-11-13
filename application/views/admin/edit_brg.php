<div class="container-fluid">
    <h3><i class="fas fa-edit">Edit Data</i></h3>
    <?php foreach ($barang as $brg) : ?>
        <form action="post" method="<?php base_url() . 'admin/data_barang/update' ?>">
            <div class="for-group">
                <label>Nama Barang</label>
                <input type="text" name="nama_brg" class="form-control" value="<?php echo $brg->nama_brg ?>">
            </div>
        </form>
    <?php endforeach; ?>
</div>