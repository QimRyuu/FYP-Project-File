<?php
// Directory where files are stored
$directory = "uploads/";

// Get keywords from query parameters
$keywords = isset($_GET['keywords']) ? $_GET['keywords'] : '';

// Search files based on keywords
$files = searchFiles($directory, $keywords);

// Return JSON response
header('Content-Type: application/json');
echo json_encode($files);

// Function to search files in directory based on keywords
function searchFiles($directory, $keywords) {
    $files = [];
    if ($handle = opendir($directory)) {
        while (false !== ($file = readdir($handle))) {
            if ($file != "." && $file != ".." && strpos(strtolower($file), strtolower($keywords)) !== false && pathinfo($file, PATHINFO_EXTENSION) != 'ini') {
                $files[] = $file;
            }
        }
        closedir($handle);
    }
    return $files;
}
?>
