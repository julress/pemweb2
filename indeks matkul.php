<!DOCTYPE html>
<html>
<head>
    <title>CRUD Matakuliah</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css
</head>
<body>
    <div class="container">
        <h2>CRUD Matakuliah</h2>
        <button class="btn btn-success" data-toggle="modal" data-target="#addModal">Tambah Matakuliah</button>
        <br><br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Kode Matakuliah</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Koneksi ke database
                $conn = mysqli_connect("localhost", "root", " ", "siakad");

                // Mendapatkan data matakuliah dari database
                $query = mysqli_query($conn, "SELECT * FROM matakuliah");
                while ($row = mysqli_fetch_assoc($query)) {
                    echo "<tr>";
                    echo "<td>" . $row['ID'] . "</td>";
                    echo "<td>" . $row['Nama'] . "</td>";
                    echo "<td>" . $row['Kode_Matakuliah'] . "</td>";
                    echo "<td>" . $row['Deskripsi'] . "</td>";
                    echo "<td>";
                    echo "<button class='btn btn-primary btn-edit' data-id='" . $row['ID'] . "' data-nama='" . $row['Nama'] . "' data-kode='" . $row['Kode_Matakuliah'] . "' data-deskripsi='" . $row['Deskripsi'] . "'>Edit</button>";
                    echo "<button class='btn btn-danger btn-delete' data-id='" . $row['ID'] . "'>Hapus</button>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Modal Tambah Matakuliah -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="addModalLabel">Tambah Matakuliah</h4>
                </div>
                <div class="modal-body">
                    <form action="create.php" method="POST">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label>Kode Matakuliah</label>
                            <input type="text" class="form-control" name="kode" required>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Matakuliah -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="editModalLabel">Edit Matakuliah</h4>
                </div>
                <div class="modal-body">
                    <form action="update.php" method="POST">
                        <input type="hidden" name="id" id="edit-id">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="nama" id="edit-nama" required>
                        </div>
                        <div class="form-group">
                            <label>Kode Matakuliah</label>
                            <input type="text" class="form-control" name="kode" id="edit-kode" required>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" id="edit-deskripsi" required></textarea>
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
                $('#edit-kode').val($(this).data('kode'));
                $('#edit-deskripsi').val($(this).data('deskripsi'));
                $('#editModal').modal('show');
            });

            // Menghapus data matakuliah
            $('.btn-delete').click(function () {
                var id = $(this).data('id');
                if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                    window.location.href = 'delete.php?id=' + id;
                }
            });
        });
    </script>
</body>
</html>
