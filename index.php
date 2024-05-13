<?php
if (isset($_GET["redirect"]) && isset($_GET["delay"])) {
    header("Refresh: " . $_GET["delay"] . "; url=https://" . $_GET["redirect"]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        
        body {
    background-color: #2076aa;
    color: #333;
    font-family: 'Roboto', Arial, sans-serif;
    margin: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
}

#everything {
    width: 90%;
    max-width: 480px;
    background-color: #ffffff;
    border-radius: 16px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    overflow: hidden;
}

.container {
    padding: 40px;
}

#info-container {
    background-color: #4CAF50;
    color: #fff;
    text-align: center;
    border-radius: 16px 16px 0 0;
}

#info-container h1 {
    margin: 20px 0;
    font-size: 36px;
}

#info-container p {
    margin: 10px 0;
    font-size: 18px;
}

#response-container,
#login-container {
    background-color: #ffffff;
    text-align: center;
}

#login-container {
    border-radius: 0 0 16px 16px;
}

#login-container h1 {
    margin: 30px 0;
    font-size: 32px;
}

input[type=text],
input[type=password],
input[type=submit] {
    width: calc(100% - 24px);
    margin: 16px 0;
    box-sizing: border-box;
    border-radius: 8px;
    background-color: #f2f2f2;
    color: #333;
    padding: 14px;
    border: 1px solid #ccc;
    font-size: 16px;
}

input[type=submit] {
    background-color: #4CAF50;
    color: #fff;
    border: none;
    cursor: pointer;
    transition: background-color 0.3s;
}

input[type=submit]:hover {
    background-color: #45a049;
}

form {
    width: 100%;
}

#footer {
    background-color: #4CAF50;
    color: #fff;
    text-align: center;
    padding: 20px;
    border-radius: 0 0 16px 16px;
    margin-top: 20px;
}

h1, h2, h3, h4, h5, h6 {
    margin: 0;
    font-size: 28px;
}

p {
    margin: 10px 0;
    font-size: 16px;
}

    
    </style>
</head>
<body>
    <div id="everything">
    <div id="info-container" class="container">
    <?php if (isset($_GET["color"]) && isset($_GET["response"]) && $_GET["response"] == "Üdv újra!") : ?>
        <h1>Welcome, <span style="font-size: smaller;"><?= htmlspecialchars($_GET["email"]); ?>!</span></h1>
    <?php else : ?>
        <h1>Login</h1>
    <?php endif; ?>
</div>

        <div id="response-container" class="container">
            <?php
            if(isset($_GET["response"])) {
                echo "<p>{$_GET["response"]}</p>";
            } else {
                echo "<p>Kérjük, jelentkezzen be a tartalom eléréséhez.</p>";
            }
            ?>
        </div>

        <div id="login-container" class="container">
            <?php if (isset($_GET["color"]) && isset($_GET["response"]) && $_GET["response"] == "<p>Üdv újra!</p>") : ?>
                <form action="logout.php" method="post">
                    <input type="submit" value="Logout">
                </form>
            <?php else : ?>
                <form action="login.php" method="post">
                    <input type="text" name="user" placeholder="Email cím"><br>
                    <input type="password" name="password" placeholder="Jelszó"><br>
                    <input type="submit" value="Bejelentkezés">
                </form>
            <?php endif; ?>
        </div>
        <div id="footer">
    <p style="font-weight: bold; font-size: 1.2em;">Készítette:</p>
    <p style="font-size: 1.1em;">Pasch Alex Károly</p>
    <p style="font-size: 1em;">CXT2U5</p>
    </div>
    </div>
</body>
</html>
