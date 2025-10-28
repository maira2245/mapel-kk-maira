<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #ffe6f0; /* pink soft background */
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .login-container {
      background: #fff0f6;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
      text-align: center;
      width: 320px;
      position: relative;
    }

    .login-container h2 {
      margin-bottom: 20px;
      color: #d63384;
    }

    .form-group {
      margin-bottom: 15px;
      text-align: left;
    }

    label {
      font-weight: bold;
      color: #d63384;
    }

    input[type="text"], input[type="password"] {
      width: 100%;
      padding: 10px;
      border: 2px solid #f78fb3;
      border-radius: 8px;
      outline: none;
      margin-top: 5px;
    }

    input[type="text"]:focus, input[type="password"]:focus {
      border-color: #ff4da6;
      box-shadow: 0 0 5px #ff4da6;
    }

    input[type="submit"] {
      background: #ff4da6;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 20px;
      cursor: pointer;
      font-weight: bold;
      transition: 0.3s;
    }

    input[type="submit"]:hover {
      background: #d63384;
    }

    /* pita dekorasi */
    .pita {
      width: 0; 
      height: 0; 
      border-left: 60px solid transparent;
      border-right: 60px solid transparent;
      border-bottom: 60px solid #ff4da6;
      position: absolute;
      top: -30px;
      left: calc(50% - 60px);
    }

    .pita:after {
      content: "";
      position: absolute;
      top: 60px;
      left: -60px;
      border-left: 30px solid transparent;
      border-right: 30px solid transparent;
      border-top: 30px solid #ff4da6;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <div class="pita"></div>
    <h2>Login Form</h2>
    <form action="proses_login.php" method="post">
      <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
      </div>
      <div class="form-group"> 
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
      </div>
      <input type="submit" value="Login">
    </form>
  </div>
</body>
</html>
