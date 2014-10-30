<?php
namespace Examples\Transmisson;
require_once (dirname(__FILE__).'/../bootstrap.php');
use SparkPost\SparkPost;

$key = 'YOURAPIKEY';
$sdk = new SparkPost(['key'=>$key]);



$transmission = $sdk->Transmission();

$transmission->setCampaign('my campaign')
	->setReturnPath('return@example.com')
	->setFrom('From Envelope <from@example.com>')
	->useRecipientList('Example List')
	->setSubject('Example Email')
  	->setHTMLContent('<p>Hello World!</p>')
  	->setTextContent('Hello World!');

try {
	$results = $transmission->send();
	echo 'Congrats you can use your SDK!';
} catch (\Exception $exception) {
	echo $exception->getMessage();
}
?>