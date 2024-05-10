<?php
$backgroundColor = "#2076aa"; 

$logoutMessage = "You have been successfully logged out. Please log in again!"; 

header("Refresh: 0; url=index.php?color=" . urlencode($backgroundColor) . "&response=" . urlencode($logoutMessage));
exit;
?>
