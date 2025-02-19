<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(to bottom, #e0ebf0, #5d8aa8);
            margin: 0;
            font-family: 'Lexend';
        }
        .login-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            width: 100vw;
        }
        .login-container {
            background: #1f5b6ed2;
            padding: 80px;
            border-radius: 15px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 500px;
            color: white;
        }
        
        h1 {
            margin-bottom: 50px;
            font-size: xx-large;
            font-family:'Lexend';
        }
        label {
            display: block;
            text-align: left;
            margin-bottom: 7px;
            font-size: 20px;
            margin-left: 9%;
        }
        
        input {
            width: 80%;
            padding: 13px;
            margin-bottom: 18px;
            border: none;
            border-radius: 14px;
            text-align: left;
        }
        .login-button {
            background: #a5c6dc;
            border: none;
            padding: 12px;
            border-radius: 10px;
            cursor: pointer;
            font-size: 16px;
            width: 30%;
            margin-top: 10px;
        }
        .login-button:hover {
            background: #87afc7;
        }

    </style>
</head>
<body>
    
    <div class="login-wrapper">
        <div class="login-container">
            <h1>Welcome, Admin</h1>
            <form method="POST" action="">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" required>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
                <button type="submit" class="login-button">Login</button>
            </form>
        </div>
    </div>
</body>
</html>