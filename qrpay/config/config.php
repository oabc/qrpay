<?php
$config = array (	
		//支付宝公钥
		'alipay_public_key' => "MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDDI6d306Q8fIfCOaTXyiUeJHkrIvYISRcc73s3vF1ZT7XN8RNPwJxo8pWaJMmvyTn9N4HQ632qJBVHf8sxHi/fEsraprwCtzvzQETrNRwVxLO5jVmRGi60j8Ue1efIlzPXV9je9mkjzOmdssymZkh2QhUrCmZYI/FCEa3/cNMW0QIDAQAB",

		//商户私钥
		'merchant_private_key' => "MIICXQIBAAKBgQChLaICQw8XdUfLT56ikNYrq+88FZf7ryUJNxemFr4v1uKhcxNwZol/Vx+AvGL0M3WXFprljtYFkXHd6PRDoVJ52QATI5VWBPSBoTHZIMbDxHjoz46c4WiTCpMqYZxmzD6VZvto0+NvogSRbpSRLyUhNHPj4dMvYpAyslgxB86Y1wIDAQABAoGAV/Qh62AStTdfxTeelpG4/b3mYABcnpB2AnBY7F6OzGZT58x3OCgMMjwlyceDrEUEjz1bq5dlfUZgP7tmyB0ZdtzKEkN62RYCvkkG6K9xos1FfeM6gg787YUMjjj4+/ZONeSBvwHpRuvpJZWk/8ZvGKTl2DefEWftQZ/kQ61G8UECQQDQav9SG9mOS1sSbsbNMOsdMTA1fbL4lFkb3KPLh+U4LyL5kzdg0HC0bkCbs8bE5Rr+/R+d5hS1x+xEm46vgHChAkEAxfm1IArlAN+Jah/v/GVN9pk1li0i9thNiCnfIT3sl4flryTHxmE1ONHauLQR9zYEOAmS+GtIQF+Npuy/bMt+dwJBANBV1IlYS33A9/WSBGnCd5PDwqQF1axEZlrCkHz4h/pErBp8vYOqeK7z8uNxrsTNG9I+ZqdpAdTAVv4x3Uy0AGECQGckkZkAFA9AZvdDbGSy4st3RtPW8EBqsPof1oAbIwhPZPq6ztosCu5vZuST7Eg/fDM1ybxjKGFhZwtwjMrBukECQQC9hIHUtFJcl2SQQrNEtSd1CtW+9sJ3+/xCNBVfDDNdLi57hi6K+pnKK4YieN/UhmlkiY04IPQF9RPWO96ecf92",

		//编码格式
		'charset' => "UTF-8",

		//支付宝网关
		'gatewayUrl' => "https://openapi.alipay.com/gateway.do",

		//应用ID  2016120103673072 test 2016120103669417
		'app_id' => "2016120103673072",

		//异步通知地址,只有扫码支付预下单可用
		'notify_url' => "",

		//最大查询重试次数
		'MaxQueryRetry' => "10",

		//查询间隔
		'QueryDuration' => "3"
);