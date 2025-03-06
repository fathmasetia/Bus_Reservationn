<?php
include 'config.php';

include'.includes/header.php';

$ruteIdToEdit = $_GET['rute_id'];

$query = "SELECT * FROM rute WHERE rute_id = $ruteIdToEdit";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $post = $result->fetch_assoc();

} else {
    echo "Rute not found.";
    exit();
}
?>


<?php
include '.includes/footer.php';
?>
