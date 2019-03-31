<?php
    require_once "./conn.php";

    use MicrosoftAzure\Storage\Blob\Models\CreateContainerOptions;
    try {
        $containerName = "images";
        // Create blob client.
        // Membuat blob client.

        # Membuat BlobService yang merepresentasikan Blob service untuk storage account
        $createContainerOptions = new CreateContainerOptions();

        $createContainerOptions->setPublicAccess(PublicAccessType::CONTAINER_AND_BLOBS);

        // Menetapkan metadata dari container.
        $createContainerOptions->addMetaData("key1", "value1");
        $createContainerOptions->addMetaData("key2", "value2");
        
        $blobClient->createContainer($containerName, $createContainerOptions);
    } catch (\Throwable $th) {
        //throw $th;
    }
?>