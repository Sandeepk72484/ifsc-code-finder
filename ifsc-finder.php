<?php include 'config/database.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="http://localhost/project/new/style/ofsc-finder.css"> -->
     <link rel="stylesheet" href="./style/ifsc-finder.css">
    <title>Document</title>
</head>
<body>
<div class="nav-section">
        <h1> IFSC Finder</h1>
        <div class="admin-page">
            <a href="index.php">Find IFSC Details</a>
            <a href="./public/admin.php">Go-To Admin</a>
        </div>
    </div>
    
<div class="find-header">
        <h2>Find IFSC Code</h2>
    </div>
    <form method="post" action="ifsc-finder.php" class="ifsc-form">
        <div class="form-group">
            <label for="ifsc">Enter IFSC Code:</label>
            <input type="text" id="ifsc" name="bank_ifsc" placeholder="e.g. SBIN0000001">
        </div>
        <div class="form-group">
            <input type="submit" name="submit" value="Search">
        </div>
    </form>
    <div class="result">
        <table>
            <tr>
                <th>Bank Name</th>
                <th>Branch Name</th>
                <th>IFSC Code</th>
                <th>Address</th>
                <th>City</th>
                <th>State</th>
            </tr>
            <?php
            if (isset($_POST['submit'])) {

              $IFSC = $_POST['bank_ifsc'];
              $query = "SELECT * FROM `bank_details` WHERE `bank_ifsc` = '$IFSC'";
              $result = mysqli_query($conn , $query);

                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                   echo "<tr>";
                    echo "<td>" . $row['bank_name'] . "</td>";
                    echo "<td>" . $row['bank_branch'] . "</td>";
                    echo "<td>" . $row['bank_ifsc'] . "</td>";
                    echo "<td>" . $row['bank_address'] . "</td>";
                    echo "<td>" . $row['bank_city'] . "</td>";
                    echo "<td>" . $row['bank_state'] . "</td>";
                    echo "</tr>";
                } else {
                    echo "<tr>";
                    echo "<td colspan='6'>No results found.</td>";
                    echo "</tr>";
                }

                
            }
            $conn->close();
            ?>
        </table>
    </div>
</body>
</html>
<?php include './view/footer.php' ?>