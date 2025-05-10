<?php
session_start();
$msg = $_GET['msg'] ?? "No message";
$type = $_GET['type'] ?? "default";
$data = $_SESSION['sqli_data'] ?? null;
unset($_SESSION['sqli_data']); // Clear after use
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Result</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background: #f2f2f2;
            margin: 0;
            padding: 50px;
        }

        .result-box {
            display: inline-block;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px #aaa;
        }

        .success { color: green; }
        .error { color: red; }
        .dump {
            margin-top: 20px;
            background: #eee;
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="result-box">
        <h2 class="<?php echo $type === 'error' ? 'error' : 'success'; ?>"><?php echo htmlspecialchars($msg); ?></h2>

        <?php if ($type === 'union' && $data): ?>
            <div class="dump">
                <h3>🧪 Extracted Data:</h3>
                <?php foreach ($data as $entry): ?>
                    <p>👤 <strong><?php echo htmlspecialchars($entry['username']); ?></strong> | 🔐 <?php echo htmlspecialchars($entry['password']); ?></p>
                <?php endforeach; ?>
            </div>
        <?php elseif ($type === 'classic'): ?>
            <p>✔️ Bypassed login without showing user data (Classical SQLi).</p>
        <?php endif; ?>
    </div>
</body>
</html>
