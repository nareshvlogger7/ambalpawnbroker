<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Entry Form</title>
</head>
<body>
    <h1>Expense Entry Form</h1>

    <?php
           include('db_connection.php');

        // Collect form data and sanitize it
        $amount = mysqli_real_escape_string($conn, $_POST['amount']);
        $category = mysqli_real_escape_string($conn, $_POST['category']);
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $note = mysqli_real_escape_string($conn, $_POST['note']);
        $date = mysqli_real_escape_string($conn, $_POST['date']);

        // Insert data into the database
        $sql = "INSERT INTO expenses (amount, category, name, note, date)
                VALUES ('$amount', '$category', '$name', '$note', '$date')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully<br><br>";
        } else {
            echo "Error: " . $conn->error . "<br><br>";
        }

        $conn->close();
    ?>

    <form action="" method="post">
        <label for="amount">Amount:</label><br>
        <input type="number" id="amount" name="amount" required><br><br>

        <label for="category">Category:</label><br>
        <select id="category" name="category" required>
            <option value="Account">Account</option>
            <option value="Interest">Interest</option>
            <option value="Insurance">Insurance</option>
            <option value="Medical">Medical</option>
            <option value="Adars">Adars</option>
            <option value="Rent">Rent</option>
            <option value="Stationery">Stationery</option>
            <option value="Shopping">Shopping</option>
            <option value="Salary">Salary</option>
            <option value="Telephone Bill">Telephone Bill</option>
            <option value="Travelling">Travelling</option>
            <option value="Taxes">Taxes</option>
            <option value="Accounts">Accounts</option>
            <option value="Banking">Banking</option>
            <option value="Company">Company</option>
            <option value="Donation">Donation</option>
            <option value="Electricity Bill">Electricity Bill</option>
            <option value="Entertainment">Entertainment</option>
            <option value="Food">Food</option>
            <option value="Fuel">Fuel</option>
        </select><br><br>

        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br><br>

        <label for="note">Note:</label><br>
        <textarea id="note" name="note" rows="3"></textarea><br><br>

        <label for="date">Date:</label><br>
        <input type="date" id="date" name="date" required><br><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
