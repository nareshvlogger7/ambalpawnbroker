<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Expense Data</title>
</head>
<body>
    <h1>Existing Expense Records</h1>

    <?php
   include('db_connection.php');

    // SQL query to select data
    $sql = "SELECT id, amount, category, name, note, date FROM expenses";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data as an HTML table
        echo "<table border='1'>
                <tr>
                    <th>ID</th>
                    <th>Amount</th>
                    <th>Category</th>
                    <th>Name</th>
                    <th>Note</th>
                    <th>Date</th>
                </tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['amount']}</td>
                    <td>{$row['category']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['note']}</td>
                    <td>{$row['date']}</td>
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
