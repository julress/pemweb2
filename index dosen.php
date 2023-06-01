<!DOCTYPE html>
<html>
<head>
    <title>CRUD Dosen</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>CRUD Dosen</h2>
        <button class="btn btn-success" data-toggle="modal" data-target="#addModal">Tambah Dosen</button>
        <br><br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>NIDN</th>
                    <th>Jenjang Pendidikan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Koneksi ke database
                $conn = mysqli_connect("localhost", "root", " ", "siakad");

                // Mendapatkan data dosen dari database
                $query = mysqli_query($conn, "SELECT * FROM dosen");
                while ($row = mysqli_fetch_assoc($query)) {
                    echo "<tr>";
                    echo "<td>" . $row['ID'] . "</td>";
                    echo "<td>" . $row['Nama'] . "</td>";
                    echo "<td>" . $row['NIDN'] . "</td>";
                    echo "<td>" . $row['Jenjang_Pendidikan'] . "</td>";
                    echo "<td>";
                    echo "<button class='btn btn-primary btn-edit' data-id='" . $row['ID'] . "' data-nama='" . $row['Nama'] . "' data-nidn='" . $row['NIDN'] . "' data-jenjang='" . $row['Jenjang_Pendidikan'] . "'>Edit</button>";
                    echo "<button class='btn btn-danger btn-delete' data-id='" . $row['ID'] . "'>Hapus</button>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Modal Tambah Dosen -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="addModalLabel">Tambah Dosen</h4>
                </div>
                <div class="modal-body">
                    <form action="create_dosen.php" method="POST">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label>NIDN</label>
                            <input type="text" class="form-control" name="nidn" required>
                        </div>
                        <div class="form-group">
                            <label>Jenjang Pendidikan</label>
                            <select class="form-control" name="jenjang" required>
                                <option value="S2">S2</option>
                                <option value="S3">S3</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Dosen -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="editModalLabel">Edit Dosen</h4>
                </div>
                <div class="modal-body">
                    <form action="update_dosen.php" method="POST">
                        <input type="hidden" name="id" id="edit-id">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="nama" id="edit-nama" required>
                        </div>
                        <div class="form-group">
                            <label>NIDN</label>
                            <input type="text" class="form-control" name="nidn" id="edit-nidn" required>
                        </div>
                        <div class="form-group">
                            <label>Jenjang Pendidikan</label>
                            <select class="form-control" name="jenjang" id="edit-jenjang" required>
                                <option value="S2">S2</option>
                                <option value="S3">S3</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            // Mengisi data edit pada modal edit
            $('.btn-edit').click(function () {
                $('#edit-id').val($(this).data('id'));
                $('#edit-nama').val($(this).data('nama'));
                $('#edit-nidn').val($(this).data('nidn'));
                $('#edit-jenjang').val($(this).data('jenjang'));
                $('#editModal').modal('show');
            });

            // Menghapus data dosen
            $('.btn-delete').click(function () {
                var id = $(this).data('id');
                if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                    window.location.href = 'delete_dosen.php?id=' + id;
                }
            });
        });
    </script>
</body>
</html>
