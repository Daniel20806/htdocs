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
            <br>
            <label for="release_date">修改電影上映日期：</label>
            <input type="datetime-local" name="release_date" id="release_date" required>
            <br>
            <label for="duration">修改電影片長：</label>
            <input type="number" name="duration" id="duration" required>
            <br>
            <label for="rated">修改電影分級：</label>
            <select name="rated" id="rated" required>
                <option value="限制級">限制級</option>
                <option value="輔導級">輔導級</option>
                <option value="保護級">保護級</option>
                <option value="普遍級">普遍級</option>
            </select>
            <br>
            <label for="introduction">修改電影簡介：</label>
            <textarea name="introduction" id="introduction" required></textarea>
            <br>
            <label for="image">修改圖片：</label>
            <input type="file" name="image" id="image" required>
            <br>
            <button type="submit">確認修改</button>
</div>
</form>
<script>
