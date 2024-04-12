<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uploaded Files</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #192a56; /* Dark blue background */
            padding: 20px;
            color: #fff; /* White text color */
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ecf0f1; /* Soft blue background */
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Box shadow for a slight depth effect */
        }

        h2 {
            color: #3498db; /* Dark blue heading color */
        }

        .file-buttons {
            display: flex;
            flex-wrap: wrap;
            margin-top: 20px;
        }

        .file-buttons form {
            margin-bottom: 10px;
        }

        .file-buttons button {
            padding: 10px 20px;
            background-color: #3498db; /* Soft blue button color */
            color: #fff; /* White text color */
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-right: 10px; /* Add margin between buttons */
            margin-bottom: 10px; /* Add margin to the bottom of buttons */
        }

        .file-buttons button:hover {
            background-color: #2980b9; /* Darker blue color on hover */
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Uploaded Files:</h2>
    <div class="file-buttons">
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
                foreach ($files as $file) {
                    // Exclude .ini files
                    if (strtolower(pathinfo($file, PATHINFO_EXTENSION)) !== 'ini') {
                        // Generate the file path
                        $filePath = $targetDirectory . $file;
                        // Display the file name as a button
                        echo "<form action='$filePath' method='get' target='_blank'>";
                        echo "<button type='submit'>$file</button>";
                        echo "</form>";
                    }
                }
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
