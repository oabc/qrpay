<?php 
require_once __DIR__.'/model/builder/AlipayTradePrecreateContentBuilder.php';
require_once __DIR__.'/service/AlipayTradeService.php';

function qrtest($outTradeNo,$totalAmount)
{
	global $config;
	$subject = '科学技术服务';
	$timeExpress = "5m";
	$providerId = "2088702573537184";
	$goodsDetailList = array();

	$goods1 = new GoodsDetail();
	$goods1->setGoodsId("66666");
	$goods1->setGoodsName("科学技术服务");
	$goods1->setPrice($totalAmount);
	$goods1->setQuantity(1);
	$goods1Arr = $goods1->getGoodsDetail();

	$goods2 = new GoodsDetail();
	$goods2->setGoodsId("69696");
	$goods2->setGoodsName("free to you");
	$goods2->setPrice(999);
	$goods2->setQuantity(1);

	$goods2Arr = $goods2->getGoodsDetail();
	$goodsDetailList = array($goods1Arr,$goods2Arr);

	//第三方应用授权令牌,商户授权系统商开发模式下使用
	$appAuthToken = "";//根据真实值填写

	// 创建请求builder，设置请求参数
	$qrPayRequestBuilder = new AlipayTradePrecreateContentBuilder();
	$qrPayRequestBuilder->setOutTradeNo($outTradeNo);
	$qrPayRequestBuilder->setTotalAmount($totalAmount);
	$qrPayRequestBuilder->setTimeExpress($timeExpress);
	$qrPayRequestBuilder->setSubject($subject);
	//$qrPayRequestBuilder->setBody($body);
	//$qrPayRequestBuilder->setUndiscountableAmount($undiscountableAmount);
	//$qrPayRequestBuilder->setExtendParams($extendParamsArr);
	$qrPayRequestBuilder->setGoodsDetailList($goodsDetailList);
	//$qrPayRequestBuilder->setStoreId($storeId);
	//$qrPayRequestBuilder->setOperatorId($operatorId);
	//$qrPayRequestBuilder->setAlipayStoreId($alipayStoreId);

	$qrPayRequestBuilder->setAppAuthToken($appAuthToken);


	// 调用qrPay方法获取当面付应答
	$qrPay = new AlipayTradeService($config);
	$qrPayResult = $qrPay->qrPay($qrPayRequestBuilder);

	//	根据状态值进行业务处理
	$qrcode='';
	switch ($qrPayResult->getTradeStatus()){
		case "SUCCESS":
			$response = $qrPayResult->getResponse();
			$qrcode=$response->qr_code;
			break;
		default:
			break;
	}
	return $qrcode;
}
?>