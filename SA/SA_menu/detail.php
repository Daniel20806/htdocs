<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>店家_客戶明細</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
        .header {     /* 背景 */
            background-color: rgb(223, 107, 29);
            height: 80px;
            width: 100%;
            z-index: 1;
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: white;
            font-size: 1.5em; 
            font-weight: bold;
            padding-left: 20px; 
            box-sizing: border-box;
        }
        .container {
            padding: 20px;
        }
        .search-bar {
            width: 75%;
            margin: 20px auto;
            display: flex;
            justify-content: center;
        }
        .search-bar input {
            width: 100%;
            padding: 10px;
            font-size: 1em;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        table {
            width: 75%;
            margin: 0 auto;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        .back {
            position: fixed;
            top: 20px;
            right: 40px;
        }
    </style>
</head>
<body>
    <div class="header">客戶明細</div>
    <a class="back" href="main.html"><img width="50" height="50" src="./image/home.png" alt="返回首頁"></a>
    <div class="container">
        <form action="./detail_more.php" method="get">
        <div class="search-bar">
            <input type="text" name = "id" id="searchInput" onkeyup="filterTable()" placeholder="請輸入訂單編號查詢...">
            <button type="submit">搜尋</button>
        </div>
        </form>
        <!--<table id="detailsTable">
            <thead>
                <tr>
                    <th>訂單編號</th>
                    <th>餐點編號</th>
                    <th>數量</th>
                    <th>訂單日期</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>001</td>
                    <td>A01</td>
                    <td>2</td>
                    <td>2023-01-01</td>
                </tr>
                <tr>
                    <td>002</td>
                    <td>B02</td>
                    <td>1</td>
                    <td>2023-01-02</td>
                </tr>
                <tr>
                    <td>003</td>
                    <td>C03</td>
                    <td>3</td>
                    <td>2023-01-03</td>
                </tr>
                <tr>
                    <td>004</td>
                    <td>D04</td>
                    <td>4</td>
                    <td>2023-01-04</td>
                </tr>
            </tbody>
        </table>
    </div>

    <script>
        function filterTable() {
            const input = document.getElementById('searchInput');
            const filter = input.value.toUpperCase();
            const table = document.getElementById('detailsTable');
            const tr = table.getElementsByTagName('tr');

            for (let i = 1; i < tr.length; i++) {
                const td = tr[i].getElementsByTagName('td')[0];
                if (td) {
                    const txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = '';
                    } else {
                        tr[i].style.display = 'none';
                    }
                }
            }
        }
    </script>-->
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "1114576";
    $dbname = "sa";

    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    $sql = "SELECT * FROM c_order";
    $stmt = $pdo->query($sql);

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "<table>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>訂單編號</th>";
    echo "<th>訂單時間</th>";
    echo "<th>總金額</th>";
    echo "<th>電話</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    foreach ($results as $row) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['time'] . "</td>";
        echo "<td>" . $row['price'] . "</td>";
        echo "<td>" . $row['phone_number'] . "</td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
    ?>
</body>
</html>
