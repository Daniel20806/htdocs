<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>評論測試</title>
    <link rel="stylesheet" href="comment.css">
</head>

<body>
    <form action="./comment.php" method="get">
        <h1 class="notice">《假設評論人為member1》</h1>
        <h2 class="test"> 《測試人員可以評論並檢查評論條目是否增加》</h2>
        當前時間：<span id="demo"></span>
        <script>
            var myVar = setInterval(myTimer, 1000);

            function myTimer() {
                var d = new Date();
                var t = d.toLocaleTimeString();
                document.getElementById("demo").innerHTML = t;
            }
        </script>
        <br><br>選擇電影：
        <select name="MName">
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
        在此評論->
        <textarea name="context" id=""></textarea>
        <br><br>
        <button type="submit" name="button1">送出</button>
        <button type="submit" name="button2">查看此電影的評論</button>
    </form>
    
</body>

</html>