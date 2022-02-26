<?php
if(isset($_POST['submit'])){
    $countfiles = count($_FILES['file']['name']);
     for($i=0;$i<$countfiles;$i++){
    $file = $_FILES["file"];
    $fileName = $file['name'][$i];
    $fileType = $file['type'][$i];
    $fileSize = $file['size'][$i];
    $fileTmpName = $file['tmp_name'][$i];
    $fileError = $file['error'][$i];
    $fileExt = explode(".",$fileName);
    $fileActualExt = end($fileExt);
    $allowed = array("jpg","jpeg","png");
    if(in_array($fileActualExt,$allowed)){
        if($fileError === 0 ){
            if($fileSize<1000000){
                $fileNameNew = uniqid("",true).".".$fileActualExt;
                $fileDestination = "uploads/".$fileNameNew;
                move_uploaded_file($fileTmpName,$fileDestination);
                echo "File {$fileName} uploaded succesfully. <br> ";
                
            }
            else{
                echo "the file {$fileName} is too big(size:{$fileSize}). <br>";
                
            }
        }
        else{
            echo "there is an error with the file {$fileName}(ErrorType:{$fileError}).<br> ";
        
        }
    }
    else{
        echo "You cannot upload file {$fileName} of this type(type:{$fileType}). <br>";
    }
}
echo "<a href='Devoir.php'>uploads  other files</a>";}
?>


