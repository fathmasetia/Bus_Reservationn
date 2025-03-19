<?php
include (".includes/header.php");
$title = "Beranda";
include '.includes/toast_notification.php';
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


<?php
include (".includes/footer.php");
?>