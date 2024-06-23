
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jewellery Data</title>
</head>
<body>
    <h1>Jewellery Records</h1>

    <?php
    include('db_connection.php');
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['delete'])) {
            // Delete record
            $jewelryId = $_POST['jewelry_id'];

            $deleteSql = "DELETE FROM jewellery_data WHERE id = $jewelryId";

            if ($conn->query($deleteSql) === TRUE) {
                echo "Record deleted successfully<br><br>";
            } else {
                echo "Error deleting record: " . $conn->error . "<br><br>";
            }
        }

        if (isset($_POST['update_status'])) {
            // Update status
            $jewelryId = $_POST['jewelry_id'];
            $status = $_POST['status'];

            $updateStatusSql = "UPDATE jewellery_data SET status = '$status' WHERE id = $jewelryId";

            if ($conn->query($updateStatusSql) === TRUE) {
                echo "Status updated successfully<br><br>";
            } else {
                echo "Error updating status: " . $conn->error . "<br><br>";
            }
        }

        if (isset($_POST['update_money'])) {
            // Update money received
            $jewelryId = $_POST['jewelry_id'];
            $moneyReceived = $_POST['money_received'];

            $updateMoneyReceivedSql = "UPDATE jewellery_data SET money_received = '$moneyReceived' WHERE id = $jewelryId";

            if ($conn->query($updateMoneyReceivedSql) === TRUE) {
                echo "Money Received updated successfully<br><br>";
            } else {
                echo "Error updating Money Received: " . $conn->error . "<br><br>";
            }
        }

        if (isset($_POST['update_received_date'])) {
            // Update received date
            $jewelryId = $_POST['jewelry_id'];
            $receivedDate = $_POST['received_date'];

            $updateReceivedDateSql = "UPDATE jewellery_data SET received_date = '$receivedDate' WHERE id = $jewelryId";

            if ($conn->query($updateReceivedDateSql) === TRUE) {
                echo "Received Date updated successfully<br><br>";
            } else {
                echo "Error updating Received Date: " . $conn->error . "<br><br>";
            }
        }
    }

    // SQL query to select data
    $sql = "SELECT id, fname, phone_number, address, jewellery_type, material, weight, entry_date, amount, money_received, status, received_date FROM jewellery_data";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data as an HTML table
        echo "<table border='1'>
                <tr>
                    <th>Entry Date</th>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Phone Number</th>
                    <th>Address</th>
                    <th>Amount</th>
                    <th>Jewellery Type</th>
                    <th>Material</th>
                    <th>Weight</th>
                    <th>Money Received</th>
                    <th>Status</th>
                    <th>Received Date</th>
                    <th>Update Status</th>
                    <th>Update Money Received</th>
                    <th>Update Received Date</th>
                    <th>Delete</th>
                </tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['entry_date']}</td>
                    <td>{$row['id']}</td>
                    <td>{$row['fname']}</td>
                    <td>{$row['phone_number']}</td>
                    <td>{$row['address']}</td>
                    <td>{$row['amount']}</td>
                    <td>{$row['jewellery_type']}</td>
                    <td>{$row['material']}</td>
                    <td>{$row['weight']}</td>
                    <td>{$row['money_received']}</td>
                    <td>{$row['status']}</td>
                    <td>{$row['received_date']}</td>
                    <td>
                        <form action='' method='post'>
                            <input type='radio' name='status' value='With Customer' " . ($row['status'] == 'With Customer' ? 'checked' : '') . "> With Customer
                            <input type='radio' name='status' value='With Us' " . ($row['status'] == 'With Us' ? 'checked' : '') . "> With Us
                            <input type='hidden' name='jewelry_id' value='" . $row['id'] . "'>
                            <input type='submit' name='update_status' value='Update Status'>
                        </form>
                    </td>
                    <td>
                        <form action='' method='post'>
                            <input type='text' name='money_received' placeholder='Enter Money Received' required>
                            <input type='hidden' name='jewelry_id' value='" . $row['id'] . "'>
                            <input type='submit' name='update_money' value='Update Money Received'>
                        </form>
                    </td>
                    <td>
                        <form action='' method='post'>
                            <input type='date' name='received_date' value='" . $row['received_date'] . "' required>
                            <input type='hidden' name='jewelry_id' value='" . $row['id'] . "'>
                            <input type='submit' name='update_received_date' value='Update Received Date'>
                        </form>
                    </td>
                    <td>
                        <form action='' method='post'>
                            <input type='hidden' name='jewelry_id' value='" . $row['id'] . "'>
                            <input type='submit' name='delete' value='Delete'>
                        </form>
                    </td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }

    $conn->close();
    ?>
</body>
</html>