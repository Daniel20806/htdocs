<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>修改電影資訊</title>
</head>
<body>
    


<h2>修改電影資訊</h2>
<form action="./edit_movie.php" method="get">
<div>
選擇要修改電影：<select name="MName">
            <?php
            $host = 'localhost';
            $db = 'final';
            $user = 's1114580';
            $pass = '1114580';

            // 建立連接
            $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);

            // 執行SQL查詢
            $sql = 'SELECT name FROM movie';
            $stmt = $pdo->prepare($sql);
            $stmt->execute();

            // 獲取查詢結果
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($results as $row): ?>
              <option value="<?= $row['name']; ?>"><?= $row['name']; ?></option>
            <?php endforeach; ?>
        </select>
    <br><br>
    修改成：<input type="text" name="newName" id="">
    <br><br>
    <label for="ticketPrice">新票價:</label>
    <input type="text" id="ticketPrice" name="ticketPrice"><br><br>
    
    <label for="releaseDate">上檔日期:</label>
    <input type="date" id="releaseDate" name="releaseDate"><br><br>

    <label for="endDate">下檔日期:</label>
    <input type="date" id="endDate" name="endDate"><br><br>

    <label for="bookingOpen">訂票是否開放:</label>
    <input type="checkbox" id="bookingOpen" name="bookingOpen"><br><br>

    <button type="submit">儲存變更</button>
</div>
</form>
<script>
