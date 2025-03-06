<?php
include 'config.php';
include '.includes/header.php';
$pemesananIdEdit = $_GET['pemesanan_id']; 


$query = "SELECT * FROM pemesanan WHERE pemesanan_id = $pemesananIdEdit";
$result = $conn->query($query);

if ($result->num_rows > 0){
    $post = $result->fetch_assoc();
}else{
    echo "Pemesanan not found.";
    exit();
}
?>
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-md-10">
            <div class="card mb-4">
                <div class="card-body">
                    <form method="POST" action="proses_pesanan.php" enctype="multipart/form-data">
                        <input type="hidden" name="pemesanan_id" value="<?php echo $pemesananIdEdit; ?>">
                        <div class="mb-3">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Pemesan</label>
                                <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Anda" >
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Alamat Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Masukkan Email Anda (name@example.com)">
                        </div>
                        <div class="mb-3">
                            <label for="rute_id" class="form-label">Pilih Rute</label>
                            <select class="form-select" name="rute_id" required>
                                <option value="" selected disabled>Pilih salah satu</option>
                                <?php
                                $query = "SELECT * FROM rute"; 
                                $result = $conn->query($query); 
                                if ($result->num_rows > 0){
                                    while ($row = $result->fetch_assoc()){ 
                                        echo "<option value='" . $row["rute_id"] ."'>" . $row["kota_asal"] . " - " . $row["kota_tujuan"] . " / " . $row["harga"] . "</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <body>
                            <link rel="stylesheet" href="kursi/style.css">
                            <div class="container">     
                        <label for="kursi" >Pilih Kursi</label>
                        
                        <div class="row1">
                            <div class="column">
                                <div class="seat" id="nomor" value="1">1</div>
                                <div class="seat" id="nomor" value="2">2</div>
                            </div>
                            <div class="column">
                                <div class="seat occupied" id="nomor" value="3">3</div>
                                <div class="seat" id="nomor" value="4">4</div>
                            </div>
                        </div>
                        
                        <div class="row1">
                            <div class="column">
                                    <div class="seat" id="nomor" value="5">5</div>
                                    <div class="seat" id="nomor" value="6">6</div>
                                </div>
                                <div class="column">
                                    <div class="seat occupied" id="nomor" value="7">7</div>
                                    <div class="seat occupied" id="nomor" value="8">8</div>
                                </div>
                            </div>

                            <div class="row1">
                                <div class="column">
                                    <div class="seat" id="nomor" value="9">9</div>
                                    <div class="seat occupied" id="nomor" value="10">10</div>
                                </div>
                                <div class="column">
                                    <div class="seat" id="nomor" value="11">11</div>
                                    <div class="seat" id="nomor" value="12">12</div>
                                </div>
                            </div>
                            
                            <div class="row1">
                                <div class="column">
                                    <div class="seat" id="nomor" value="13">13</div>
                                    <div class="seat" id="nomor" value="14">14</div>
                                </div>
                                <div class="column">
                                    <div class="seat occupied" id="nomor" value="15">15</div>
                                    <div class="seat" id="nomor" value="16">16</div>
                                </div>
                            </div>
                            <div class="row1">
                                <div class="column">
                                    <div class="seat" id="nomor" value="17">17</div>
                                    <div class="seat" id="nomor" value="18">18</div>
                                </div>
                                <div class="column">
                                    <div class="seat" id="nomor" value="19">19</div>
                                    <div class="seat occupied" id="nomor" value="20">20</div>
                                </div>
                            </div>
                        </div>
                        <p class="text" style="text-align:center">Kamu memilih <span id="totalseat">0</span> kursi.</p>
                            <script>
                                const container = document.querySelector('.container');
                                const seats = document.querySelectorAll('.row1 .seat:not(.occupied)');
                                function updateSelectedCount() {
                                    const selectedSeats = document.querySelectorAll('.row .seat.selected');
                                    const selectedSeatsCount = selectedSeats.length;
    
                                    totalseat.innerText = selectedSeatsCount;

                                }
                                container.addEventListener('click', e => {
                                if (e.target.classList.contains('seat') && !e.target.classList.contains('occupied')) {
                                e.target.classList.toggle('selected');
                                updateSelectedCount();
                                }

                                });
                        </script>
                    </body>
                            <button type="submit" name="update" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include '.includes/footer.php'
?>