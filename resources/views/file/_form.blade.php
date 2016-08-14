<!DOCTYPE html>
<html>
<body>

<form action="file-save" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

    <input type="file" name="image" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>