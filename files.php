<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Files - Feha Edu.Hub</title>
    <link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>

<nav>
  <div class="logo">
    <img src="feha.jpeg" alt="Logo" class="logo-image">
    <a href="search.html">FEHA Edu.Hub</a>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </div>
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
  <h1>ALL FILES</h1>
  <p style="text-align:center;"><strong style="color: #000;">NOTES: Click the file if you want to preview or download it.</strong></p>
  <br><br>
<?php
// Directory where uploaded files are saved
$targetDirectory = "uploads/";

// Check if the directory exists
if (is_dir($targetDirectory)) {
    // Scan the directory for files
    $files = scandir($targetDirectory);
    // Remove "." and ".." from the list
    $files = array_diff($files, array('.', '..'));

    // Check if there are any files in the directory
    if (!empty($files)) {
        // Display each file as a button
        echo "<div style='overflow: auto;'>";
        echo "<ul style='list-style-type: none; padding: 0;'>";
        foreach ($files as $file) {
            // Generate the file path
            $filePath = $targetDirectory . $file;
            // Get the file name without the extension
            $fileName = pathinfo($file, PATHINFO_FILENAME);

            // Check if the file is not an .ini file
            if (strtolower(pathinfo($file, PATHINFO_EXTENSION)) !== 'ini') {
                // Display the file name as a button
                echo "<li style='margin-bottom: 20px; margin-right: 25px; float: left;'><button class='search-result-button' onclick=\"window.open('$filePath', '_blank')\">$fileName</button></li>";
            }
        }
        echo "</ul>";
        echo "</div>";
    } else {
        echo "No files uploaded yet.";
    }
} else {
    echo "Upload directory does not exist.";
}
?>
<h1>IMAN'S PRACTICUM JOURNAL PADLET FILES</h1>
  <p style="text-align:center;"><strong style="color: #000;">NOTES: Click the file if you want to preview or download it.</strong></p>
  <br><br>
  <?php
// Directory where uploaded files are saved
$targetDirectory = "PadletIman/";

// Check if the directory exists
if (is_dir($targetDirectory)) {
    // Scan the directory for files
    $files = scandir($targetDirectory);
    // Remove "." and ".." from the list
    $files = array_diff($files, array('.', '..'));

    // Check if there are any files in the directory
    if (!empty($files)) {
        // Display each file as a button
        echo "<div style='overflow: auto;'>";
        echo "<ul style='list-style-type: none; padding: 0;'>";
        foreach ($files as $file) {
            // Generate the file path
            $filePath = $targetDirectory . $file;

            // Check if the file is not an .ini file
            if (strtolower(pathinfo($file, PATHINFO_EXTENSION)) !== 'ini') {
                // Display the file name without the extension
                $fileName = pathinfo($file, PATHINFO_FILENAME);
                echo "<li style='margin-bottom: 20px; margin-right: 25px; float: left;'><button class='search-result-button' onclick=\"window.open('$filePath', '_blank')\">$fileName</button></li>";
            }
        }
        echo "</ul>";
        echo "</div>";
    } else {
        echo "No files uploaded yet.";
    }
} else {
    echo "Upload directory does not exist.";
}
?>
</div>

</body>
</html>
