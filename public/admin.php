<?php include '../config/database.php'; ?>


<?php
// Insert data
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['insert'])) {
    $bank_name = $_POST['bank_name'];
    $branch_name = $_POST['branch_name'];
    $ifsc_code = $_POST['ifsc_code'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];

    $stmt = $conn->prepare("INSERT INTO banks (bank_name, branch_name, ifsc_code, address, city, state) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $bank_name, $branch_name, $ifsc_code, $address, $city, $state);
    $stmt->execute();
    $stmt->close();
}

// Delete data
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete'])) {
    $ifsc_code = $_POST['ifsc_code'];

    $stmt = $conn->prepare("DELETE FROM banks WHERE ifsc_code = ?");
    $stmt->bind_param("s", $ifsc_code);
    $stmt->execute();
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Form</title>
    <link rel="stylesheet" href="http://localhost/project/new/style/style_admin.css">
</head>
<body>
    <div class="form-container">
        <h2>Insert New Bank Data</h2>
        <form class="insert-form" method="post" action="admin.php">
            <label for="bank_name">Bank Name:</label>
            <input type="text" id="bank_name" name="bank_name">
            <label for="branch_name">Branch Name:</label>
            <input type="text" id="branch_name" name="branch_name">
            <label for="ifsc_code">IFSC Code:</label>
            <input type="text" id="ifsc_code" name="ifsc_code">
            <label for="address">Address:</label>
            <input type="text" id="address" name="address">
            <label for="city">City:</label>
            <input type="text" id="city" name="city">
            <label for="state">State:</label>
            <input type="text" id="state" name="state">
            <input type="submit" name="insert" value="Insert">
            <a href="../index.php">Back To Page</a>
        </form>
        
        <h2>Delete Bank Data</h2>
        <form method="post" action="admin.php">
            <label for="ifsc_code">IFSC Code:</label>
            <input type="text" id="ifsc_code" name="ifsc_code">
            <input type="submit" name="delete" value="Delete">
        </form>
    </div>
</body>
</html>
