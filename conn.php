<?php
    use MicrosoftAzure\Storage\Blob\BlobRestProxy;
    use MicrosoftAzure\Storage\Common\Exceptions\ServiceException;
    use MicrosoftAzure\Storage\Blob\Models\PublicAccessType;

    $connectionString = "DefaultEndpointsProtocol=https;AccountName='subm2';AccountKey='LyC1sWgY3kEX7JxqVr0wvVnJ55B2N0/fkpoYqm089akN1D/uO21Vl5Qx4FzGQlb20Jrcg7RU6YIu4T6FHUwhMQ=='";

    try {
        $blobClient = BlobRestProxy::createBlobService($connectionString);
    } catch (\Throwable $th) {
        echo "connection error";
    }
?>