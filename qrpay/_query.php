<?php
/**
 * Created by PhpStorm.
 * User: airwalk
 * Date: 16/5/20
 * Time: 下午7:54
 */
require_once __DIR__.'/service/AlipayTradeService.php';
function qrquery($out_trade_no){
    global $config;
    $appAuthToken = "";//根据真实值填写
    $queryContentBuilder = new AlipayTradeQueryContentBuilder();
    $queryContentBuilder->setOutTradeNo($out_trade_no);
    $queryContentBuilder->setAppAuthToken($appAuthToken);
    $queryResponse = new AlipayTradeService($config);
    $queryResult = $queryResponse->queryTradeResult($queryContentBuilder);
    $result['msg']='ERROR';
    $result['code']='0';
    $result['no']=$out_trade_no;
    switch ($queryResult->getTradeStatus()){
        case "SUCCESS":
            $r=$queryResult->getResponse();
            $result['msg']='SUCCESS';
            $result['code']='2';
            $result['price']=$r->receipt_amount;
            $result['money']=$r->invoice_amount;
            break;
        case "FAILED":
            if($queryResult->getResponse()->code=='40004'){$result['msg']='INVALID';$result['code']='0';}
            elseif($queryResult->getResponse()->trade_status=='WAIT_BUYER_PAY'){$result['msg']='WAIT';$result['code']='1';}
            elseif($queryResult->getResponse()->trade_status=='TRADE_CLOSED'){$result['msg']='CLOSED';$result['code']='3';}
            break;
        default:
            break;
    }
    $result['ok']='1';
    return $result;
}
?>