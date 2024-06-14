<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>瞭解更多</title>
    <style>
        .container {
            padding: 20px;
            display: flex;
            justify-content: center;
        }

        .movie-card {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            width: 800px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            display: flex;
        }

        .movie-card img {
            width: 300px;
            height: 450px;
            object-fit: cover;
            margin-right: 20px;
        }

        .movie-details {
            flex: 1;
        }

        .movie-details h2 {
            margin: 0 0 10px 0;
            font-size: 2em;
        }

        .movie-details p {
            margin: 10px 0;
            font-size: 1.2em;
        }

        .movie-details button {
            background-color: #6f42c1;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1.2em;
            margin-top: 20px;
            margin-right: 10px;
        }

        .movie-details button:hover {
            background-color: #5a34a1;
        }
        .movie-details form {
            display: flex;
            gap: 10px;
        }
        
    </style>
</head>
<body>
<div class="container">

<?php
$servername = "localhost";
$username = "root";
$password = "1114576";
$dbname = "final";

$name = $_GET["name"];

$pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "SELECT * FROM movie WHERE Name = :name";
$stmt = $pdo->prepare($sql);
$stmt->execute(['name' => $name]);

$row = $stmt->fetch(PDO::FETCH_ASSOC);

if ($row) {
    echo "<div class='movie-card'>";
    echo "<img src='../movie_back/" . htmlspecialchars($row['image']) . "' alt='電影海報'>";
    echo "<div class='movie-details'>";
    echo "<h2>" . htmlspecialchars($row['Name']) . "</h2>";
    echo "<p><strong>評價:</strong> " . htmlspecialchars($row['movie_rating']) . "</p>";
    echo "<p><strong>分級:</strong> " . htmlspecialchars($row['rated']) . "</p>";
    echo "<p><strong>時長:</strong> " . htmlspecialchars($row['duration']) . "分鐘</p>";
    echo "<p><strong>上映日期:</strong> " . htmlspecialchars($row['release_date']) . "</p>";
    echo "<p><strong>電影介紹:</strong> " . htmlspecialchars($row['introduction']) . "</p>";
    echo "<form action='./comment.php' method='GET'>";
    echo "<input type='hidden' name='name' value='" . htmlspecialchars($row['Name']) . "'>";
    echo "<button type='submit' name='button3'>查看評論</button>";
    echo "<button type='submit' name='button4'>評論此電影</button>";
    echo "</form>";
    echo "</div>";
    echo "</div>";
} else {
    echo "<p>找不到電影資訊。</p>";
}
?>

</div>
</body>
</html>

