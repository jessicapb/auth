<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTER</title>
</head>
<body>
    <h1><?=$title?></h1>
    Register
    <div>
        <form action="reg" method="POST">
            <div>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>
            </div>

            <div>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>
            </div>
            
            <div>
                <button type="submit">Register</button>
            </div>
        </form>
    </div>
</body>
</html>