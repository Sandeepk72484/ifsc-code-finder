<?php
$credit_score = null;
$error_message = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $pan = $_POST['pan'];

    // API endpoint for CIBIL credit score check
    $api_url = "https://api.cibil.com/credit-score";

    // API key for authentication (replace with your actual API key)
    $api_key = "YOUR_API_KEY";

    // Function to get credit score
    function getCreditScore($api_url, $api_key, $name, $dob, $pan) {
        $curl = curl_init($api_url);
        $data = json_encode([
            'name' => $name,
            'dob' => $dob,
            'pan' => $pan
        ]);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            "Authorization: Bearer $api_key",
            "Content-Type: application/json"
        ]);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($curl);
        if ($response === false) {
            return null;
        }
        curl_close($curl);
        return json_decode($response, true);
    }

    // Get credit score
    $credit_score = getCreditScore($api_url, $api_key, $name, $dob, $pan);

    // Handle error
    if (!$credit_score) {
        $error_message = "Error: Unable to retrieve credit score.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Free Credit Score Check</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-top: 10px;
            color: #333;
            font-weight: bold;
        }
        input[type="text"], input[type="date"], input[type="submit"] {
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .result {
            margin-top: 20px;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }
        .error {
            margin-top: 20px;
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Free Credit Score Check</h1>
        <form method="post" action="">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            
            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob" required>
            
            <label for="pan">PAN Card Number:</label>
            <input type="text" id="pan" name="pan" required>
            
            <input type="submit" value="Check Credit Score">
        </form>
        
        <?php if ($credit_score): ?>
            <div class="result">Your credit score is: <?php echo $credit_score['score']; ?></div>
        <?php elseif ($error_message): ?>
            <div class="error"><?php echo $error_message; ?></div>
        <?php endif; ?>
    </div>
</body>
</html>
