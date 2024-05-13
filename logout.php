<?php
$backgroundColor = "#2076aa"; 

$logoutMessage = "Sikeresen kijelentkezve!"; 

header("Refresh: 0; url=index.php?color=" . urlencode($backgroundColor) . "&response=" . urlencode($logoutMessage));
exit;
?>
