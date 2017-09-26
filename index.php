<?php


require './vendor/autoload.php';

//// Create the s3 client
//$s3 = new Aws\S3\S3Client([
//    'version' => 'latest',
//    'region'  => 'us-east-1'
//]);
use Aws\Exception\AwsException;
use Aws\S3\Exception\S3Exception;


try {

    $file_Path = "An image path location";


    // Use the us-west-2 region and latest version of each client.
    $sharedConfig = [
        'region'  => 'us-west-2',
        'version' => 'latest',
        'credentials' => [
            'key' => "AKIAJY2NY2BUBMFTE3MQ",
            'secret' => "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"
        ]
    ];

    // Create an SDK class used to share configuration across clients.
    $sdk = new Aws\Sdk($sharedConfig);

    // Create an Amazon S3 client using the shared configuration data.
    $s3Client = $sdk->createS3();

    // Send a PutObject request and get the result object.
    $result = $s3Client->putObject([
        'Bucket' => 'stylusmagento-contactform-fileuploads',
        'Key'    => 'my-newfi-file',
        'SourceFile' => $file_Path
//        'Body'   => 'this is the body!'
    ]);

    // Download the contents of the object.
    $result = $s3Client->getObject([
        'Bucket' => 'stylusmagento-contactform-fileuploads',
        'Key'    => 'my-newfi-file'
    ]);

    // Print the body of the result by indexing into the result object.
    echo $result['Body'];


} catch (S3Exception $e) {
    // Catch an S3 specific exception.
    echo $e->getMessage();
} catch (AwsException $e) {
    // This catches the more generic AwsException. You can grab information
    // from the exception using methods of the exception object.
    echo $e->getAwsRequestId() . "\n";
    echo $e->getAwsErrorType() . "\n";
    echo $e->getAwsErrorCode() . "\n";
}