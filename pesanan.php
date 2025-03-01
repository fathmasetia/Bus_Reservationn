<?php
//Menyertakan header halaman
include '.includes/header.php';
?>
<div class="container-xxl flex grow-1 container-p-y">
    <!--- Judul halaman -->
    <div class="row">
        <!-- Form untuk menambahkan pesanan baru -->
        <div class="col-md-10">
            <div class="card mb-4">
                <div class="card-body">
                    <form method="POST" action="proses_post.php" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Pemesan</label>
                            <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Anda" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Alamat Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Masukkan Email Anda (name@example.com)">
                        </div>
                        <div class="mb-3">
                            <label for="nomor_telepon" class="col-md-2 col-form-label">Nomor Telepon</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="tel" value="+62" id="html5-tel-input">
                                </div>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal Pesanan</label>
                            <div class="col-md-10">
                            <input class="form-control" type="date" value="" id="tanggal">
                        </div>
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
                                <div class="seat occupied" id="nomor">3</div>
                                <div class="seat" id="nomor">4</div>
                            </div>
                        </div>
                        
                        <div class="row1">
                            <div class="column">
                                    <div class="seat" id="5">5</div>
                                    <div class="seat" id="6">6</div>
                                </div>
                                <div class="column">
                                    <div class="seat occupied" id="7">7</div>
                                    <div class="seat occupied" id="8">8</div>
                                </div>
                            </div>

                            <div class="row1">
                                <div class="column">
                                    <div class="seat" id="9">9</div>
                                    <div class="seat occupied" id="10">10</div>
                                </div>
                                <div class="column">
                                    <div class="seat" id="11">11</div>
                                    <div class="seat" id="12">12</div>
                                </div>
                            </div>
                            
                            <div class="row1">
                                <div class="column">
                                    <div class="seat" id="13">13</div>
                                    <div class="seat" id="14">14</div>
                                </div>
                                <div class="column">
                                    <div class="seat occupied" id="15">15</div>
                                    <div class="seat" id="16">16</div>
                                </div>
                            </div>
                            <div class="row1">
                                <div class="column">
                                    <div class="seat" id="17">17</div>
                                    <div class="seat" id="18">18</div>
                                </div>
                                <div class="column">
                                    <div class="seat" id="19">19</div>
                                    <div class="seat occupied" id="20">20</div>
                                </div>
                            </div>
                        </div>
                        <p class="text" style="text-align:center">Kamu memilih <span id="totalseat">0</span> kursi.</p>
                            <script>
                                const container = document.querySelector('.container');
                                const seats = document.querySelectorAll('.row1 .seat:not(.occupied)');
                                function updateSelectedCount() {
                                    const selectedSeats = document.querySelectorAll('.row .seat.selected');
                                    //const selectedNomor = document.getElementById("nomor");
                                    const selectedSeatsCount = selectedSeats.length;
                                    //const selectedNomorKursi = selectedNomor.selected;
    
                                    totalseat.innerText = selectedSeatsCount;
                                    //nomor.innerText = selectedNomorKursi;

                                }
                                container.addEventListener('click', e => {
                                if (e.target.classList.contains('seat') && !e.target.classList.contains('occupied')) {
                                e.target.classList.toggle('selected');
                                updateSelectedCount();
                                }

                                });
                        </script>
                    </body>
                        <button type="submit" name="simpan" class="btn btn-primary">Buat Pesanan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
// Meneyratkan footer halaman
include '.includes/footer.php';
?>