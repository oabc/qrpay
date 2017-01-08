<?php
/**
 * Created by PhpStorm.
 * User: airwalk
 * Date: 16/5/20
 * Time: 下午7:54
 */

header("Content-type: text/html; charset=utf-8");
require_once 'service/AlipayTradeService.php';

if (!empty($_GET['id'])&& trim($_GET['id'])!=""){
    ////获取商户订单号
    $out_trade_no = trim($_GET['id']);

    //第三方应用授权令牌,商户授权系统商开发模式下使用
    $appAuthToken = "";//根据真实值填写

    //构造查询业务请求参数对象
    $queryContentBuilder = new AlipayTradeQueryContentBuilder();
    $queryContentBuilder->setOutTradeNo($out_trade_no);

    $queryContentBuilder->setAppAuthToken($appAuthToken);


    //初始化类对象，调用queryTradeResult方法获取查询应答
    $queryResponse = new AlipayTradeService($config);
    $queryResult = $queryResponse->queryTradeResult($queryContentBuilder);

    //根据查询返回结果状态进行业务处理
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
    die(json_encode($result));
    return ;
}

?>