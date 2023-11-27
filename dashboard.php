<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>店舗管理ダッシュボード</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            line-height: 1.6;
        }

        .content {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .content section {
            margin-bottom: 40px;
        }

        .content h2 {
            color: #333;
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
        }

        /* ここにフォームのスタイルを追加 */

    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>

    <div class="content">
        <section id="registered-shift">
            <h2>予約済み一覧</h2>
            <form>
                <!-- トレーナー登録フォームの内容 -->
            </form>
        </section>
    </div>
</body>
</html>
