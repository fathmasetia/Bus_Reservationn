<?php
include 'config.php';

include'.includes/header.php';

$postIdToEdit = $_GET['rute_id'];

$query = "SELECT * FROM rute WHERE rute_id = $postIdToEdit";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $post = $result->fetch_assoc();

} else {
    echo "Post not found.";
    exit();
}
?>

<div class="container-xxl flex-grow-1 container-p-y">
 <div class="row">
  <div class="col-md-10">
   <div class="card mb-4">
    <div class="card-body">
     <form method="RUTE" action="proses_rute.php" enctype="multipart/form-data">
      <input type="hidden" name="rute_id" value="<?php echo $postIdToEdit; ?>">

      <div class="mb-3">
     <label for="post_title" class="form-label">Kota Asal</label>
    <input type="text" class="form-control" id="kota_asal" name="kota_asal" value="<?php echo $post['kota_asal']; ?>" required>
  </div>

<div class="mb-3">
 <label for="category_id" class="form-label">Kota Tujuan</label>
  <input type="text" class="form-control" id="kota_tujuan" name="kota_tujuan" required>
 
        
       
    <div class="mb-3">
  <label for="content" class="form-label">Harga</label>
<selected_val class="form-control" id="harga" name="harga" required><?php echo $post['harga']; ?>
 </div>
  <button type="submit" name="update" class="btn btn-primary">Update</button>
    </form>
        </div>
            </div>
                </div>
                     </div>
                         </div>
<?php
include '.includes/footer.php';
?>
