
<?php include '../config/database.php'; ?>
<?php include '../view/header.php'; ?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ifsc = $_POST['ifsc'];

    $stmt = $conn->prepare("SELECT * FROM banks WHERE ifsc_code = ?");
    $stmt->bind_param("s", $ifsc);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "Bank: " . $row['bank_name'] . "<br>";
        echo "Branch: " . $row['branch_name'] . "<br>";
        echo "IFSC Code: " . $row['ifsc_code'] . "<br>";
        echo "Address: " . $row['address'] . "<br>";
        echo "City: " . $row['city'] . "<br>";
        echo "State: " . $row['state'] . "<br>";
    } else {
        echo "No results found.";
    }
    $stmt->close();
}
$conn->close();
?>

<?php include '../view/find_form.php'; ?>
<?php include '../view/footer.php'; ?>
