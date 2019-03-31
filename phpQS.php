<?php
    require_once 'vendor/autoload.php';
    require_once "./random_string.php";


    require_once "./conn.php";

    require_once "./create_container.php";

    
    use MicrosoftAzure\Storage\Blob\Models\ListBlobsOptions;
    $listBlobsOptions = new ListBlobsOptions();
    
    // echo "These are the blobs present in the container: <br>";
    
    do{
        $result = $blobClient->listBlobs($containerName, $listBlobsOptions);
        foreach ($result->getBlobs() as $blob)
        {
            echo $blob->getUrl();
        }
    
        $listBlobsOptions->setContinuationToken($result->getContinuationToken());
    } while($result->getContinuationToken());

    

?>


<!-- <form method="post" action="phpQS.php?Cleanup&containerName=<?php echo $containerName; ?>">
    <button type="submit">Press to clean up all resources created by this sample</button>
</form> -->
