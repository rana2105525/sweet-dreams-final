<?php
require '../app/api/vendor/autoload.php';
define('__ROOT__','../app/');
require_once(__ROOT__ ."db/config.php");
require_once(__ROOT__ ."db/Dbh.php");
use Infobip\Configuration;
use Infobip\Api\SmsApi;
use Infobip\Model\SmsDestination;
use Infobip\Model\SmsTextualMessage;
use Infobip\Model\SmsAdvancedTextualRequest;

$name = "SweetDreams";
$message = "YOUR ORDER HAS BEEN SHIPPED";

$base_url="https://6gy1yr.api.infobip.com";
$api_key="991292cae438dd6529124142c0930953-11b26991-5f38-4c14-8766-12a01a3fede3";

$configuration = new Configuration(host: $base_url, apiKey: $api_key);
$api = new SmsApi(config: $configuration);

// $db = new Dbh();
// $sql = "SELECT phone FROM reg";
// $stmt = $db->prepare($sql);
// $stmt->execute();

// while ($row = $stmt->fetch()) {
    $destination = new SmsDestination(to: '00201004222194');
    $message = new SmsTextualMessage(
        destinations: [$destination],
        text: $message,
        from: "$name");
        
    $request = new SmsAdvancedTextualRequest(messages: [$message]);
    $response = $api->sendSmsMessage($request);


header("Location:index.php");
?>