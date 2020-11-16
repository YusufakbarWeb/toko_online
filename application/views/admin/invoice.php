<div class="container-fluid">
    <h3>Infoice Pemesanan</h3>
    <table class="table table-bordered table-hover table-striped">
        <tr>
            <th>Id Invoice</th>
            <th>Nama Pemesan</th>
            <th>Alamat</th>
            <th>Tanggal Pesan</th>
            <th>Batas Bayar</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($invoice as $inv) : ?>
            <tr>
                <td><?php echo $inv->id ?></td>
                <td><?php echo $inv->nama ?></td>
                <td><?php echo $inv->alamat ?></td>
                <td><?php echo $inv->tgl_pesan ?></td>
                <td><?php echo $inv->batas_byr ?></td>
                <td>
                    <div class="btn btn-sm btn-primary">Detail</div>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
</div>