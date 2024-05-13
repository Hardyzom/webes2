<?php 

function Decode()
{
    $content = file_get_contents("password.txt");
    $offsets = array(5,-14,31,-9,3);

    $result = "";

    foreach(explode("\n", $content) as $line)
    {
        if (strlen($line) == 0)
            continue;

        for($i = 0; $i < strlen($line); $i++)
        {
            $result .= chr(ord($line[$i]) - $offsets[$i % count($offsets)]);
        }
        $result .= "\n";
    }   

    return $result;
}


function Get_Color($LogInUser)
{

    $sname= "sql111.infinityfree.com";
    $uname= "if0_36523536";
    $password = "eYNcNku7UY";
    $db_name = "if0_36523536_adatok";

    try {
        $conn = mysqli_connect($sname, $uname, $password, $db_name);
    } catch (mysqli_sql_exception) {
        echo "Error: Could not connect to {$db_name} database. <br>";
    }
    
    
    $sql = "SELECT titkos FROM `tabla` WHERE username='$LogInUser'";

    $color = mysqli_query($conn, $sql);

    $color = mysqli_fetch_assoc($color);

    $color = $color['titkos'];

    $colors =array("piros" => "red", "zold" => "green","sarga" => "yellow", "kek" => "blue",  "fekete" => "black", "feher" => "white");

    $color = $colors[$color];

    return $color;
}



$LogInUser = $_POST['user'];
$LogInPassword = $_POST['password'];

$passwords = Decode();

$validUser = false;
$correctPassword = false;

foreach(explode("\n", $passwords) as $line)
{
    if (strlen($line) == 0)
        continue;

    $line = explode("*", $line);

    if ($line[0] == $LogInUser)
    {
        $validUser = true;
        if ($line[1] == $LogInPassword)
        {
            $correctPassword = true;
            break;
        }
    }
}

if ($validUser == false){
    header("Location: index.php?response=Hibás email cím!");
    exit;
}
else if ($correctPassword == false){
    header("Refresh: 3; url=police.hu");
    echo "Hibás jelszó! Az átirányítás 3 másodperc múlva megtörténik.";
        exit;

}else{
    $color = Get_Color($LogInUser);
    header("Location: index.php?response=Üdv újra!&color=$color&email=$LogInUser");
exit;
}

?>
