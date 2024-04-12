<?php
// Directory where uploaded files are stored
$targetDirectory = "uploads/";

// Check if the form was submitted for file uploading
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["file"])) {
    // File uploading process
    $fileName = basename($_FILES["file"]["name"]);
    $targetFilePath = $targetDirectory . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    // Check if the uploaded file is of a valid type
    $allowedTypes = array('jpg', 'jpeg', 'png', 'gif', 'pdf', 'doc', 'docx', 'docm');
    if (in_array($fileType, $allowedTypes)) {
        // Move the uploaded file to the target directory
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
            echo "<p style='color: #008CBA;'>File uploaded successfully.</p>";
            echo "<p><a href='$targetFilePath' target='_blank'>View uploaded file</a></p>";
        } else {
            echo "<p style='color: #FF0000;'>Error uploading file.</p>";
        }
    } else {
        echo "<p style='color: #FF0000;'>Invalid file type. Only JPG, JPEG, PNG, GIF, PDF, DOC, DOCX, and DOCM files are allowed.</p>";
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["selected_file"]) && isset($_POST["new_name"])) {
    // File renaming process
    $selectedFileName = $_POST["selected_file"];
    $newFileName = $_POST["new_name"];

    if (!empty($selectedFileName) && !empty($newFileName)) {
        if (file_exists($targetDirectory . $selectedFileName)) {
            if (rename($targetDirectory . $selectedFileName, $targetDirectory . $newFileName)) {
                echo "<p style='color: #008CBA;'>File name updated successfully.</p>";
            } else {
                echo "<p style='color: #FF0000;'>Error updating file name.</p>";
            }
        } else {
            echo "<p style='color: #FF0000;'>Selected file does not exist.</p>";
        }
    } else {
        echo "<p style='color: #FF0000;'>Please select a file and provide a new file name.</p>";
    }
} else {
    echo "";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload or Rename File</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff; /* Soft blue background */
            color: #333; /* Dark blue text color */
            margin: 0;
            padding: 20px;
        }
        h2 {
            color: #008CBA; /* Soft blue heading color */
        }
        form {
            margin-bottom: 20px;
        }
        input[type="file"], input[type="text"], select {
            padding: 10px;
            margin-right: 10px;
            border: 1px solid #ddd; /* Light gray border */
            border-radius: 5px;
        }
        button[type="submit"] {
            padding: 10px 20px;
            background-color: #008CBA; /* Soft blue button background */
            color: #fff; /* White text color */
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button[type="submit"]:hover {
            background-color: #005b7f; /* Dark blue button background on hover */
        }
        p {
            margin: 0;
            padding: 5px 0;
        }
    </style>
</head>
<body>
    <br><br><br><br><br><br>
    <h2>Upload File</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="file" id="file">
        <button type="submit" name="submit">Upload</button>
    </form>

    <h2>Rename File</h2>
    <form action="" method="post">
        <select name="selected_file">
            <?php
            // List all files in the uploads directory for selection
            $files = scandir($targetDirectory);
            foreach ($files as $file) {
                if ($file != '.' && $file != '..') {
                    echo "<option value='$file'>$file</option>";
                }
            }
            ?>
        </select>
        <input type="text" name="new_name" placeholder="New File Name">
        <button type="submit" name="rename">Rename</button>
    </form>

    <form action="adminpanel.html" method="post">
        <button type="submit" name="goback">Go Back</button>
    </form>
</body>
</html>
