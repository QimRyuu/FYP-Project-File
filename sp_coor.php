<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactpage - Feha Edu.Hub</title>
    <link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>

<nav>
  <div class="logo">
    <img src="feha.jpeg" alt="Logo" class="logo-image">
    <a href="search.html">FEHA Edu.Hub</a>
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input type="checkbox" id="nav-toggle">
  <label for="nav-toggle" class="nav-toggle-label">&#9776;</label>
  <ul class="menu">
    <li><a href="search.html">Home</a></li>
    <li><a href="files.php">Files</a></li>
    <li><a href="sp_coor.php">Supervisor/Coordinator Details</a></li>
    <li><a href="Menu.html">Menu</a></li>
    <li><a href="faq.html">FAQ</a></li>
  </ul>
</nav>

<div class="content">
  <p style="text-align:center;"><img src="feha.jpeg"width="700"height="250"></p>
  <h1>Contact Details</h1>
  <div style="text-align: center;"><?php
// Directory where uploaded files are saved
$targetDirectory = "ContactDetails/";

// Check if the directory exists
if (is_dir($targetDirectory)) {
    // Scan the directory for files
    $files = scandir($targetDirectory);
    // Remove "." and ".." from the list
    $files = array_diff($files, array('.', '..'));

    // Check if there are any files in the directory
    if (!empty($files)) {
        // Display each file as a button or download link
        echo "<ul style='list-style-type: none; padding: 0;'>";
        foreach ($files as $file) {
            // Generate the file path
            $filePath = $targetDirectory . $file;
            // Get the file name without extension
            $fileName = pathinfo($file, PATHINFO_FILENAME);
            echo "<li style='margin-bottom: 5px;'><button class='search-result-button' onclick=\"window.open('$filePath', '_blank')\">$fileName</button></li>";
        }
        echo "</ul>";
    } else {
        echo "No files uploaded yet.";
    }
} else {
    echo "Upload directory does not exist.";
}
?>
</div>
<br><br>
<p>------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</p>
  <p style="text-align:center; color: black; font-size: 23px;"><h1><strong>Important Due Date Files</strong></h1></p>
  <br>
  <div style="text-align: center;"><?php
// Directory where uploaded files are saved
$targetDirectory = "DueDate/";

// Check if the directory exists
if (is_dir($targetDirectory)) {
    // Scan the directory for files
    $files = scandir($targetDirectory);
    // Remove "." and ".." from the list
    $files = array_diff($files, array('.', '..'));

    // Check if there are any files in the directory
    if (!empty($files)) {
        // Display each file as a button or download link
        echo "<ul style='list-style-type: none; padding: 0;'>";
        foreach ($files as $file) {
            // Get the file name without extension
            $fileName = pathinfo($file, PATHINFO_FILENAME);
            echo "<li style='margin-bottom: 5px;'><button class='search-result-button' onclick=\"window.open('$targetDirectory$file', '_blank')\">$fileName</button></li>";
        }
        echo "</ul>";
    } else {
        echo "No files uploaded yet.";
    }
} else {
    echo "Upload directory does not exist.";
}
?>
</div>
</div>

</body>
</html>
