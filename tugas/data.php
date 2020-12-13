<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <td>No</td>
            <td>Nama Mahasiswa</td>
            <td>NIM</td>
            <td>Prodi</td>
            <td>Angkatank</td>
            <td>Action</td>
        </tr>
    </thead>
    <tbody>
        <?php
            include 'koneksi.php';
            $no = 1;
            $query = "SELECT * FROM mahasiswa ORDER BY id DESC";
            $root = $db1->prepare($query);
            $root->execute();
            $res = $root->get_result();
 
            if ($res1->num_rows > 0) {
                while ($row = $res1->fetch_assoc()) {
                    $nama_mahasiswa = $row['nama_mahasiswa'];
                    $NIM = $row['NIM'];
                    $prdi = $row['prodi'];
                    $angkatan = $row['angkatan'];
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $nama_mahasiswa; ?></td>
                <td><?php echo $NIM; ?></td>
                <td><?php echo $prodi; ?></td>
                <td><?php echo $angkatan; ?></td>
                <td>
                    <button id="<?php echo $id; ?>" class="btn btn-success btn-sm edit_data"> <i class="fa fa-edit"></i> Edit </button>
                    <button id="<?php echo $id; ?>" class="btn btn-danger btn-sm hapus_data"> <i class="fa fa-trash"></i> Hapus </button>
                </td>
            </tr>
        <?php } } else { ?> 
            <tr>
                <td colspan='7'>Tidak ada data ditemukan</td>
            </tr>
        <?php } ?>
    </tbody>
</table>
 
 
<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>