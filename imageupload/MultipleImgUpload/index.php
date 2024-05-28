<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multiple Image Uploads</title>
</head>
<body>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="file">Choose Images:</label> <br>
        <input type="file" name="image[]" multiple> <br>
        <input type="submit" name="submit" value="Upload">
    </form>
    
</body>
</html>
