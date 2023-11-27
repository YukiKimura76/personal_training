<?php
// ファイルからセッションデータを読み込む
$sessions = file("data/sessions.txt");

/* 帰りのメールアドレス */
$userEmail = "yukikimura76@ggmail.com";

function displaySessions($sessions, $userEmail) {
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>日付</th><th>セッション名</th><th>開始時間</th><th>終了時間</th><th>予約</th></tr>";

    foreach ($sessions as $session) {
        list($id, $date, $name, $startTime, $endTime) = explode(",", trim($session));
        echo "<tr>";
        echo "<td>$id</td>";
        echo "<td>$date</td>";
        echo "<td>$name</td>";
        echo "<td>$startTime</td>";
        echo "<td>$endTime</td>";
        echo "<td>";
        echo "<form method='post' action='reserve.php'>";
        echo "<input type='hidden' name='email' value='$userEmail'>";
        echo "<input type='hidden' name='sessionId' value='$id'>";
        echo "<input type='hidden' name='sessionName' value='$name'>";
        echo "<input type='hidden' name='startTime' value='$startTime'>";
        echo "<input type='hidden' name='endTime' value='$endTime'>";
        echo "<input type='submit' value='予約'>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }

    echo "</table>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>トレーニングセッション一覧</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
            padding-top: 70px;
            margin: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>
<?php include 'client_navbar.php'; ?>
    <h1>開催予定レッスン一覧</h1>
    <!-- <h2>トレーニングセッション一覧</h2> -->
    <?php displaySessions($sessions, $userEmail); ?>
    <!-- 予約情報を表示するページへのリンク -->
    <!-- <a href="view_reservations.php" style="margin-top: 20px; display: inline-block; background-color: #4CAF50; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">予約済一覧</a> -->
</body>
</body>
</html>
