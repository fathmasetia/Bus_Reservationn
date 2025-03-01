<?php
include '.includes/header.php';
include '.includes/toast_notification.php';
?>
<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Tabel data rute -->
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4>RUTE</h4>
            <!-- Tombol untuk menambah rute baru -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addRute">Tambah Rute</button>
        </div>
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table id="datatable" class="table table-hover">
                    <thead>
                        <tr class="text-center">
                            <th width="50px">#</th>
                            <th>Kota Asal</th>
                            <th>Kota Tujuan</th>
                            <th>Harga</th>
                            <th width="150px">Opsi</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <!-- Mengambil data dari database -->
                        <?php
                        
                        $index = 1;
                        $query = "SELECT * FROM rute";
                        $exec = mysqli_query($conn, $query);
                        while ($rute = mysqli_fetch_assoc($exec)) :
                        ?>
                        <tr>
                            <!-- Menampilkan -->
                            <td><?= $index++; ?></td>
                            <td><?= $rute['kota_asal']; ?></td>
                            <td><?= $rute['kota_tujuan']; ?></td>
                            <td><?= $rute['harga']; ?></td>
                            <td>
                                <!-- Dropdown untuk opsi edit dan Delete -->
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editRute_<?= $rute['rute_id']; ?>"><i class="bx bx-edit-alt me-2"></i>Edit</a>
                                        <a href="#" class="dropdown-item" data-bs-toggle="modal"data-bs-target="#deleteRute_<?= $rute['rute_id']; ?>"><i class="bx bx-trash me-2"></i>Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <!-- Modal untuk Hapus Data rute -->
                        <div class="modal fade" id="deleteRute_<?= $rute['rute_id']; ?>" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Hapus Rute?</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="proses_rute.php" method="POST">
                                            <div>
                                                <p>Tindakan ini tidak bisa dibatalkan.</p>
                                                <input type="hidden" name="rute_id" value="<?= $rute['rute_id']; ?>">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" name="delete" class=btn btn-primary">Hapus</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal untuk Update Data rute -->
                        <div id="editRute_<?= $rute['rute_id']; ?>" class="modal fade" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Update Rute</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="proses_rute.php" method="POST">
                                            <!-- input tersembunyi untuk menyimpan update rute -->
                                                <input type="hidden" name="rute_id" value="<?= $rute['rute_id']; ?>">
                                            <div class="form-group">
                                            <div class="mb-3">
                                <input type="text" class="form-control" name="kota_asal" required placeholder="Masukkan kota Asal">
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" name="kota_tujuan" required placeholder="Masukkan kota Tujuan">
                            </div>
                            <div class="col-md">
                                <label class="text-light fw-semibold d-block">Pilih Jarak (±)</label>
                                <div class="form-check form-check-inline mt-3">
                                <input class="form-check-input" type="radio" name="harga" id="inlineRadio1" value="100000" <?= (isset($_POST['harga']) && $_POST['harga'] == '100000') ? 'checked' : '' ?>>
                                <label class="form-check-label" for="10km">10km</label>
                            </div>
                            <div class="form-check form-check-inline mt-3">
                                <input class="form-check-input" type="radio" name="harga" id="inlineRadio2" value="150000" <?= (isset($_POST['harga']) && $_POST['harga'] == '150000') ? 'checked' : '' ?>>
                                <label class="form-check-label" for="20km">20km</label>
                            </div>
                            <div class="form-check form-check-inline mt-3">
                                <input class="form-check-input" type="radio" name="harga" id="inlineRadio3" value="300000" <?= (isset($_POST['harga']) && $_POST['harga'] == '300000') ? 'checked' : '' ?>>
                                <label class="form-check-label" for="15km">15km</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="harga" id="inlineRadio4" value="450000" <?= (isset($_POST['harga']) && $_POST['harga'] == '450000') ? 'checked' : '' ?>>
                                <label class="form-check-label" for="30km">30km</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="harga" id="inlineRadio5" value="500000" <?= (isset($_POST['harga']) && $_POST['harga'] == '500000') ? 'checked' : '' ?>>
                                <label class="form-check-label" for="35km">35km</label>
                            </div>
                        </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" name="update" class="btn btn-warning">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
    <?php include '.includes/footer.php'; ?>
    <!-- Modal untuk Tambah Rute -->
    <div class="modal fade" id="addRute" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Rute</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="proses_rute.php" method="POST">
                        <!--<form action=".tambahan/tambahan.php" method="POST">-->
                            <div>
                                <label for="namaRute" class="form-label"></label>
                                <!-- Input untuk nama baru -->
                                
                            <div class="mb-3">
                                <input type="text" class="form-control" name="kota_asal" required placeholder="Masukkan kota Asal">
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" name="kota_tujuan" required placeholder="Masukkan kota Tujuan">
                            </div>
                            <div class="col-md">
                                <label class="text-light fw-semibold d-block">Pilih Jarak (±)</label>
                                <div class="form-check form-check-inline mt-3">
                                <input class="form-check-input" type="radio" name="harga" id="inlineRadio1" value="100000" <?= (isset($_POST['harga']) && $_POST['harga'] == '100000') ? 'checked' : '' ?>>
                                <label class="form-check-label" for="10km">10km</label>
                            </div>
                            <div class="form-check form-check-inline mt-3">
                                <input class="form-check-input" type="radio" name="harga" id="inlineRadio2" value="150000" <?= (isset($_POST['harga']) && $_POST['harga'] == '150000') ? 'checked' : '' ?>>
                                <label class="form-check-label" for="20km">20km</label>
                            </div>
                            <div class="form-check form-check-inline mt-3">
                                <input class="form-check-input" type="radio" name="harga" id="inlineRadio3" value="300000" <?= (isset($_POST['harga']) && $_POST['harga'] == '300000') ? 'checked' : '' ?>>
                                <label class="form-check-label" for="15km">15km</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="harga" id="inlineRadio4" value="450000" <?= (isset($_POST['harga']) && $_POST['harga'] == '450000') ? 'checked' : '' ?>>
                                <label class="form-check-label" for="30km">30km</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="harga" id="inlineRadio5" value="500000" <?= (isset($_POST['harga']) && $_POST['harga'] == '500000') ? 'checked' : '' ?>>
                                <label class="form-check-label" for="35km">35km</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" name="simpan" class="btn btn-primary" value="Get Selected Values">Simpan</button>
                        </div>
                    </form>
                    </form>
                </div>
            </div>
        </div>
    </div>