<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>SQL Injection Demo</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<h1 class="heading">
  🧪 <span>SQL Injection Demo:</span>
  <span class="highlight">See the Difference</span> Between
  <span class="secure">Secure</span> and
  <span class="vulnerable">Vulnerable</span> Logins
</h1>

  <div class="container">
    <div class="panel safe">
      <h2>🛡️ Secure Admin Panel</h2>
      <form action="secure_login.php" method="POST">
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="text" name="password" placeholder="Password" required><br>
        <button type="submit">Login</button>
      </form>
      <div class="result">
        <?php if (isset($_GET['safe_msg'])) echo htmlspecialchars($_GET['safe_msg']); ?>
      </div>
    </div>

    <div class="panel vulnerable">
      <h2>🔥 Vulnerable Admin Panel</h2>
      <form action="vulnerable_login.php" method="POST">
        <input type="text" name="username" placeholder="Username"><br>
        <input type="text" name="password" placeholder="Password"><br>
        <button type="submit">Login</button>
      </form>
      <div class="result">
        <?php if (isset($_GET['vuln_msg'])) echo htmlspecialchars($_GET['vuln_msg']); ?>
      </div>
    </div>
  </div>
</body>
</html>
