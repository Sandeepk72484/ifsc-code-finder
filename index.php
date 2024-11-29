<?php include 'config/database.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/project/new/style.css">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <title>Document</title>
</head>



<body>
    <div class="nav-section">
        <h1> IFSC Finder</h1>
        <div class="admin-page">
            <a href="ifsc-finder.php">Find Banks Details</a>
            <a href="./public/admin.php">Go-To Admin</a>
        </div>
    </div>
    <div class="hero-section">
        <div class="article">
            <img src="./Pic/artical.jpg" alt="">
            <p><b>Indian Financial System Code (IFSC).</b> It is used for electronic payment applications like <b> Real Time Gross Settlement (RTGS), National Electronic Funds Transfer (NEFT), Immediate Payment Service, an interbank electronic instant mobile money transfer service (IMPS), and Centralised Funds Management System (CFMS)</b> developed by <b> Reserve Bank of India (RBI).</b> Code has eleven characters "Alpha Numeric" in nature. First four characters represent bank, fifth character is default "0" left for future use and last six characters represent branch. <br>

                <b>MICR Code:</b> Magnetic Ink Character Recognition as printed on cheque book to facilitate the processing of cheques.
            </p>
        </div>
        <form class="bank-search" method="post" action="index.php">
            <div class="bank-info">
                <div class="label-name">
                    <label for="bank_name">Bank Name:</label>
                    <label for="branch_name">Branch Name:</label>
                    <label for="state">State:</label>
                </div>
                <div class="input-f">
                    <input type="text" id="bank_name" name="bank_name">
                    <input type="text" id="branch_name" name="branch_name">
                    <input type="text" id="state" name="state">
                </div>
            </div>
            <div class="btn">
                <input type="submit" name="submit" value="Search IFSC">
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
                    $bankName = $_POST['bank_name'];
                    $branchName = $_POST['branch_name'];
                    $state = $_POST['state'];

                    $query = "SELECT * FROM `bank_details` WHERE `bank_name` = '$bankName' AND `bank_branch` = '$branchName' AND `bank_state` = '$state'";
                    $result = mysqli_query($conn, $query);
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
                ?>
            </table>
        </div>
        <div class="disclaimer">

            <p><b>Disclaimer: -</b> We have tried our best to keep the latest information updated as available from RBI, users are requested to confirm information with the respective bank before using the information provided. The author reserves the right not to be responsible for the topicality, correctness, completeness or quality of the information provided. Liability claims regarding damage caused by the use of any information provided, including any kind of information which is incomplete or incorrect, will therefore be rejected.</p>
        </div>
        <div class="more">
            <h3>List of Credit Card IFSC Code, MICR Code & SWIFT Code for Top Banks</h3>
            <p>In the case of the bank IFSC code, it varies from branch to branch. However, the credit card IFSC code for a particular bank will remain the same across the country. <br>

                The credit card IFSC code for some of the banks are mentioned in the table below:</p>
            <table>
                <thead>
                    <tr>
                        <th>Bank</th>
                        <th>IFSC</th>
                        <th>MICR</th>
                        <th>Swift</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>HDFC Bank</td>
                        <td>HDFC0000128</td>
                        <td>560240065</td>
                        <td>HDFCINBBBNG</td>
                    </tr>
                    <tr>
                        <td>Citibank</td>
                        <td>CITI0000003</td>
                        <td>560037002</td>
                        <td>CITIINBI</td>
                    </tr>
                    <tr>
                        <td>Axis Bank</td>
                        <td>UTIB0000400</td>
                        <td>560211061</td>
                        <td>AXISINBB194</td>
                    </tr>
                    <tr>
                        <td>HSBC Bank</td>
                        <td>HSBC0400002</td>
                        <td>NA</td>
                        <td>NA</td>
                    </tr>
                    <tr>
                        <td>Punjab National Bank</td>
                        <td>PUNB0112000</td>
                        <td>560024029</td>
                        <td>PUNBINBBBCY</td>
                    </tr>
                    <tr>
                        <td>IDBI Bank</td>
                        <td>IBKL0NEFT01</td>
                        <td>560259006</td>
                        <td>IBKLINBB008</td>
                    </tr>
                    <tr>
                        <td>Yes Bank</td>
                        <td>YESB0CMSNOC</td>
                        <td>561532028</td>
                        <td>YESBINBB</td>
                    </tr>
                    <tr>
                        <td>IndusInd Bank</td>
                        <td>INDB0000018</td>
                        <td>560234021</td>
                        <td>INDBINBBBGM</td>
                    </tr>
                    <tr>
                        <td>State Bank of India</td>
                        <td>SBIN00CARDS</td>
                        <td>560002021</td>
                        <td>SBININBB112</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="btn1">
            <button><a href="artical.php">Check Your Credit Score Free</a></button>
        </div>
        
        <div class="tarnsfer">

            <h1>Details of Fund Transfers Using IFSC</h1>
            <p>Here are the details for fund transfers using IFSC:</p>
            <table>
                <thead>
                    <tr>
                        <th>Transaction Charges</th>
                        <th>Amount</th>
                        <th>NEFT</th>
                        <th>RTGS</th>
                        <th>IMPS</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Up to Rs.10,000</td>
                        <td>Rs.2.50</td>
                        <td>-</td>
                        <td>Rs.5.00</td>
                    </tr>
                    <tr>
                        <td>Minimum: Rs.2 Lakh</td>
                        <td>-</td>
                        <td>Rs.15.00</td>
                        <td>Rs.26</td>
                        <td>Rs.10.00</td>
                    </tr>
                    <tr>
                        <td>Above Rs.2 Lakh</td>
                        <td>Rs.25.00</td>
                        <td>Rs.51</td>
                        <td>Rs.15.00</td>
                    </tr>
                </tbody>
            </table>
            <p class="note"><strong>Note:</strong> Customers must check the bank’s website for the most accurate and up-to-date charges.</p>
            <div class="operating-time">
                <h2>Operating Times</h2>
                <p>Here are the operating times for various fund transfer modes:</p>
                <ul>
                    <li><strong>NEFT:</strong> 8 A.M to 7 P.M (Weekdays)</li>
                    <li><strong>RTGS:</strong> 9 A.M to 4:30 P.M (Weekdays)</li>
                    <li><strong>IMPS:</strong> 24 hours 365 days</li>
                </ul>
            </div>
            <div class="how-to-find">
                <h2>How to Find IFSC Code</h2>
                <img src="./Pic/ch.webp" alt="">
                <p>The following are the ways to find the IFSC code:</p>
                <ul>
                    <li>Can be found on the bank passbook and cheque leaf of the respective bank.</li>
                    <li>From the Reserve Bank of India’s website, the list of IFSC codes of banks and their respective branches can be obtained.</li>
                    <li>Bank customers can also visit the banks’ official website to find the IFSC code of a particular bank.</li>
            </div>
</body>
<!-- <link rel="stylesheet" href="http://localhost/project/view/footer.php"> -->

</html>
<?php include './view/footer.php'; ?>