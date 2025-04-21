<?php
include (".includes/header.php");
$title = "Beranda";
include '.includes/toast_notification.php';
?>

<?php
if($_SESSION['role'] != "user"){
    ?>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4>Pesanan</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table id="datatable" class="table table-hover">
                        <thead>
                        <tr class="text-center">
                                <th width="50px"></th>
                                <th>Nama</th>
                                <th>Kota Asal</th>
                                <th>Kota Tujuan</th>
                                <th>Harga</th>
                                <th>Tanggal Pemesanan</th>
                                <th width="150px">Pilihan</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            <?php
                            $index = 1; 
                            $query = "SELECT pemesanan.*, penumpang.nama, rute.kota_asal, rute.kota_tujuan, rute.harga FROM pemesanan INNER JOIN penumpang ON pemesanan.penumpang_id = penumpang.penumpang_id LEFT JOIN rute ON pemesanan.rute_id = rute.rute_id WHERE pemesanan.penumpang_id = $penumpangId";
                            $exec = mysqli_query($conn, $query);

                            while ($pemesanan = mysqli_fetch_assoc($exec)):
                                ?>

                                <tr>
                                    <td><?= $index++; ?></td>
                                    <td><?= $pemesanan['nama']; ?></td>
                                    <td><?= $pemesanan['kota_asal']; ?></td>
                                    <td><?= $pemesanan['kota_tujuan']; ?></td>
                                    <td><?= $pemesanan['harga']; ?></td>
                                    <td><?= $pemesanan['tanggal_pemesanan']; ?></td>
                                    <td>
                                    <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a href="edit_pesanan.php?pemesanan_id=<?= $pemesanan['pemesanan_id']; ?>" class="dropdown-item">
                                                    <i class="bx bx-edit-alt me-2"></i>Edit
                                                </a>
                                                <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deletePemesanan_<?= $pemesanan['pemesanan_id']; ?>">
                                                    <i class="bx bx-trash me-2"></i>Delete
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <div class="modal fade" id="deletePemesanan_<?= $pemesanan['pemesanan_id']; ?>" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Hapus Pemesanan?</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="proses_pesanan.php" method="POST">
                                                    <div>
                                                        <p>Tindakan ini tidak bisa dibatalkan.</p>
                                                        <input type="hidden" name="pemesananID" value="<?= $pemesanan['pemesanan_id']; ?>">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                                                        <button type="submit" name="delete" class="btn btn-primary">Hapus</button>
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
</div>
<?php
}?>

<?php
if($_SESSION['role'] != "admin"){
    ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4>Daftar Rute yang Tersedia</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table id="datatable" class="table table-hover">
                        <thead>
                        <tr class="text-center">
                                <th width="50px"></th>
                                <th>Kota Asal</th>
                                <th>Kota Tujuan</th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            <?php
                            $index = 1; 
                            $query = "SELECT * FROM rute"; 
                            $exec = mysqli_query($conn, $query);
                                ?>

                                    <?php
                                        $result = $conn->query($query); 
                                        if ($result->num_rows > 0){
                                            while ($row = $result->fetch_assoc()){ 
                                                echo "<tr>";
                                                echo "<td>" . $index++ . "</td>";
                                                echo "<td>" . $row['kota_asal'] . "</td>";
                                                echo "<td>" . $row['kota_tujuan'] . "</td>";
                                                echo "<td>" . $row['harga'] . "</td>";
                                                echo "</tr>";
                                            }
                                        }?>           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4>Pesanan Anda</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table id="datatable" class="table table-hover">
                        <thead>
                        <tr class="text-center">
                                <!--<th width="50px"></th>-->
                                <th>Nama</th>
                                <th>Kota Asal</th>
                                <th>Kota Tujuan</th>
                                <th>Harga</th>
                                <th>Tanggal Pemesanan</th>
                                <th width="150px">Pilihan</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            <?php
                            $index = 1; 
                            $query = "SELECT pemesanan.*, penumpang.nama, rute.kota_asal, rute.kota_tujuan, rute.harga FROM pemesanan INNER JOIN penumpang ON pemesanan.penumpang_id = penumpang.penumpang_id LEFT JOIN rute ON pemesanan.rute_id = rute.rute_id WHERE pemesanan.penumpang_id = $penumpangId";
                            $exec = mysqli_query($conn, $query);

                            while ($pemesanan = mysqli_fetch_assoc($exec)):
                                ?>

                                <tr class="text-center">
                                    <!--<td><//?= $index++; ?></td>-->
                                    <td><?= $pemesanan['nama']; ?></td>
                                    <td><?= $pemesanan['kota_asal']; ?></td>
                                    <td><?= $pemesanan['kota_tujuan']; ?></td>
                                    <td><?= $pemesanan['harga']; ?></td>
                                    <td><?= $pemesanan['tanggal_pemesanan']; ?></td>
                                    <td>
                                    <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a href="edit_pesanan.php?pemesanan_id=<?= $pemesanan['pemesanan_id']; ?>" class="dropdown-item">
                                                    <i class="bx bx-edit-alt me-2"></i>Edit
                                                </a>
                                                <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deletePemesanan_<?= $pemesanan['pemesanan_id']; ?>">
                                                    <i class="bx bx-trash me-2"></i>Delete
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <div class="modal fade" id="deletePemesanan_<?= $pemesanan['pemesanan_id']; ?>" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Hapus Pemesanan?</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="proses_pesanan.php" method="POST">
                                                    <div>
                                                        <p>Tindakan ini tidak bisa dibatalkan.</p>
                                                        <input type="hidden" name="pemesananID" value="<?= $pemesanan['pemesanan_id']; ?>">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                                                        <button type="submit" name="delete" class="btn btn-primary">Hapus</button>
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
    <a href="pesanan.php">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPemesanan">Buat Pesanan</button>
    </form>
</div>
<?php
}?>

<?php
include (".includes/footer.php");
?>