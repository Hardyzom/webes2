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
            background-color: <?= isset($_GET["color"]) ? $_GET["color"] : "#2076aa" ?>;
            color: #333;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            height: 100vh;
        }

        #everything {
            width: 80%;
            max-width: 400px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .container {
            padding: 20px;
        }

        #info-container {
            background-color: #3498db;
            color: #fff;
            text-align: center;
            border-radius: 8px 8px 0 0;
        }

        #info-container h1 {
            margin: 10px 0;
            font-size: 36px;
            letter-spacing: 1px; /* Betűköz növelése */
        }

        #info-container p {
            margin: 5px 0;
            font-size: 16px;
        }

        #response-container,
        #login-container {
            background-color: #fff;
            text-align: center;
            border-bottom: 1px solid #ddd;
            border-radius: 0;
        }

        #login-container {
            border-radius: 0 0 8px 8px;
        }

        #login-container h1 {
            margin: 20px 0;
            font-size: 28px;
            letter-spacing: 1px; /* Betűköz növelése */
        }

        #login-container p {
            margin: 10px 0;
            font-size: 14px;
        }

        input[type=text],
        input[type=password],
        input[type=submit] {
            width: calc(100% - 24px);
            margin: 8px 0;
            box-sizing: border-box;
            border-radius: 4px;
            background-color: #f8f8f8;
            color: #333;
            padding: 12px;
            border: 1px solid #ccc;
            letter-spacing: 1px; /* Betűköz növelése */
        }

        input[type=submit] {
            background-color: #3498db;
            color: #fff;
            padding: 14px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type=submit]:hover {
            background-color: #2181b5;
        }

        form {
            width: 100%;
        }

        #footer {
            background-color: #3498db;
            color: #fff;
            text-align: center;
            padding: 10px;
            border-radius: 0 0 8px 8px;
            margin-top: 20px;
        }

        h1, h2, h3, h4, h5, h6 {
            margin: 0;
            font-size: 24px;
        }

        p {
            margin: 5px 0; /* Kisebb margó a láblécben */
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div id="everything">
    <div id="info-container" class="container">
    <?php if (isset($_GET["color"]) && isset($_GET["response"]) && $_GET["response"] == "We are glad to have you here again!") : ?>
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
                echo "<p>Please log in to access the content.</p>";
            }
            ?>
        </div>

        <div id="login-container" class="container">
            <?php if (isset($_GET["color"]) && isset($_GET["response"]) && $_GET["response"] == "We are glad to have you here again!") : ?>
                <form action="logout.php" method="post">
                    <input type="submit" value="Logout">
                </form>
            <?php else : ?>
                <form action="login.php" method="post">
                    <input type="text" name="user" placeholder="Enter your email"><br>
                    <input type="password" name="password" placeholder="Enter your password"><br>
                    <input type="submit" value="Login">
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
