<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "lalitha";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$class = isset($_GET['class']) ? intval($_GET['class']) : 1; // Default to Class 1
if (!in_array($class, range(1, 10))) {
    die("Invalid class selection!");
}

$table_name = "class_" . $class;
$sql = "SELECT * FROM $table_name";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Students - Class <?php echo $class; ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
        }

        h2 {
            background-color: #2a148a;
            color: white;
            padding: 10px;
            border-radius: 5px;
            display: inline-block;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #26ff00;
        }
    </style>
</head>
<body>

    <h2>Students in Class <?php echo $class; ?></h2>
    
    <table>
        <tr>
            <th>ID</th><th>First Name</th><th>Last Name</th><th>DOB</th><th>Gender</th><th>Address</th><th>Contact</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row["id"] ?></td>
                <td><?= $row["first_name"] ?></td>
                <td><?= $row["last_name"] ?></td>
                <td><?= $row["dob"] ?></td>
                <td><?= $row["gender"] ?></td>
                <td><?= $row["address"] ?></td>
                <td><?= $row["contact"] ?></td>
            </tr>
        <?php endwhile; ?>
    </table>

</body>
</html>

<?php $conn->close(); ?>
