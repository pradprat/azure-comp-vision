<?php
    require_once 'vendor/autoload.php';
    require_once "./random_string.php";
    
    require_once "./conn.php";
    $containerName = "images";
    

    $url = $_REQUEST["q"];


    try{

        // $fileToUpload = "test3.jpg";//local file
        $fileToUpload = $url;//local file

        $myfile = fopen($fileToUpload, "r") or die("Unable to open file!");
        fclose($myfile);
        
        # Mengunggah file sebagai block blob
        // echo "Uploading BlockBlob: ".PHP_EOL;
        // echo $fileToUpload;
        // echo "<br />";
        
        $content = fopen($fileToUpload, "r");
        
        //Mengunggah blob
        $blobClient->createBlockBlob($containerName, $fileToUpload, $content);
        echo "sucess";
    }
    catch(Exception $e){
        echo "error";
    }
?>