<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
		
        body {
			background-image: url('BR-Ambedkar.jpe');
			background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
			height: 100vh;
            
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            
            
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            text-align: center;
        }

        h2 {
            color: white;
            background: #2a148a;
            padding: 10px;
            display: inline-block;
            border-radius: 5px;
        }

        .nav-links a, .class-links a {
            display: inline-block;
            margin: 10px;
            padding: 10px 15px;
            text-decoration: none;
            color: white;
            border-radius: 5px;
            transition: 0.3s;
        }

        .nav-links a { background: #26ff00; }
        .class-links a { background: #ff5733; }

        .nav-links a:hover, .class-links a:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>

    <h2>Welcome, Anil Durge</h2>

    <div class="nav-links">
        <a href="add_student.php">Add Student</a>
		<a href="logout.php">Logout</a>
        
    </div>

    <h3>View Students by Class</h3>
    <div class="class-links">
        <?php for ($i = 1; $i <= 10; $i++): ?>
            <a href="view_students.php?class=<?= $i ?>">Class <?= $i ?></a>
        <?php endfor; ?>
    </div>

</body>
</html>
