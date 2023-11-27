<!DOCTYPE html>
<html>
<head>
    <title>セッション追加</title>
    <link rel="stylesheet" href="style.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            line-height: 1.6;
        }

        .container {
            width: 80%;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        h1 {
            text-align: center;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input[type="text"],
        .form-group input[type="date"],
        .form-group input[type="time"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        input[type="submit"] {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #5cb85c;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #4cae4c;
        }

    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>
    <div class="container">
        <h1>セッション追加</h1>
        <form action="add_sessions.php" method="post">
            <div class="form-group">
                <label for="sessionName">セッション名:</label>
                <input type="text" id="sessionName" name="sessionName" required>
            </div>
            <div class="form-group">
                <label for="date">日付:</label>
                <input type="date" id="date" name="date" required>
            </div>
            <div class="form-group">
                <label for="startTime">開始時間:</label>
                <input type="time" id="startTime" name="startTime" required>
            </div>
            <div class="form-group">
                <label for="endTime">終了時間:</label>
                <input type="time" id="endTime" name="endTime" required>
            </div>
            <input type="submit" value="追加">
        </form>
    </div>
</body>
</html>
