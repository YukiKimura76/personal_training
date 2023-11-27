<?php
// DB接続
$pdo = new PDO('mysql:dbname=pt_db;charset=utf8;host=localhost', 'root', '');

// 予約済みシフト情報を取得
$sql = "SELECT ts.shift_id, ts.trainer_id, ts.shift_date, ts.work_hour, pt.tname
        FROM trainer_shifts ts
        JOIN pt_trainers pt ON ts.trainer_id = pt.trainer_id
        WHERE ts.is_booked = 1
        ORDER BY ts.shift_date DESC, ts.work_hour ASC";
$stmt = $pdo->query($sql);
$reservations = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>予約済み一覧</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            color: black;
        }

        .delete-button {
            background-color: red;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<?php include 'client_navbar.php'; ?>
    <h2>予約済み一覧</h2>
    <table>
        <tr>
            <th>トレーナー名</th>
            <th>日付</th>
            <th>開始時間</th>
            <th>終了時間</th>
            <th>操作</th>
        </tr>
        <?php foreach ($reservations as $reservation): ?>
            <tr>
                <td><?php echo htmlspecialchars($reservation['tname']); ?></td>
                <td><?php echo htmlspecialchars($reservation['shift_date']); ?></td>
                <td><?php echo htmlspecialchars($reservation['work_hour']); ?></td>
                <td><?php echo date('H:i:s', strtotime($reservation['work_hour'] . ' +1 hour')); ?></td>
                <td>
                    <form action="delete_reservation.php" method="post" onsubmit="return confirmDelete();">
                        <input type="hidden" name="shift_id" value="<?php echo $reservation['shift_id']; ?>">
                        <input type="submit" value="削除" class="delete-button">
                    </form>
                    <script>
                        function confirmDelete() {
                            if (confirm("本当に削除しますか？")) {
                                // ユーザーがOKをクリックした場合
                                return true;
                            } else {
                                // ユーザーがキャンセルをクリックした場合
                                return false;
                            }
                        }
                    </script>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

   
</body>
</html>
