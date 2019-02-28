<?php
$config = array (	
		//应用ID,您的APPID。
		'app_id' => "2016092800615907",

		//商户私钥
		'merchant_private_key' => "MIIEpAIBAAKCAQEAurBrIUGb+Stf8ZdQ+qzhsbvP4DO6WAyCTzHTC8idCcqws1y0WX+RUVePvFjDadQtLPVRzw/4wPC8UCKMu4ucovBRr/TyB4AzaIXYgePwtZ7noMN5VEEkpecUj8s3qYI4Fg2JLd1bZO9xpa3dYZpTGP9mz6HkKZHvqEDyH8JQapCkRpb1cI+Aa3LIzCeEcg4GQWb+B57DdUR6OooG4oGVrBe2mjUZP8hB9cpQdBxaqjq+eeIVisPStPVrAVfUMdEwRzfU+h0oULVkA4TqtZg+SL/d13WyEyVDrxy2Wdol9Y9w4RrXYWcvAZhSQOyPYRdxCvXEoz9dPZfefmEsrN3GFQIDAQABAoIBAHBCv9j6rAEUfRg4xqBGr10CNAl88ZQayY03x9HxK8WEleb1WxnqZQcF4VAADFoqFZRQXIZn80yKNqL1c60fUeyFGIn3gEbUZ5V1zvCkkc2VJXH9uYrZtWDx6OJi8DDFNlbEgvYKgvfaKHvZZiNX+powkrFOh3Yb5IJHs5E3dsXs939j6YHp6oCsqpls6XnB7oUoEwxNba204y/4rblG8ycv/ZMDi1oKPoCmfAwPkYdTylPtqqnAx6iWtTEp4HQ/FDyWWdM79Lwz3Ceq9B9gLyNdA3YFgqcobMJAWPaR1x5UaK9g8ZTry2jt/X2l7wzWVKYIADq2IDJQkJ/F7vrt9M0CgYEA26ZT8ivxpdo5A1Y0jMI2WqnHQAsygygzIZM63PNWJDOpNGNOCnFdSMYr3BXsALq3u4HnGmjPb02EQWyNAVHWIBg9b8rOsYzzwHAY9JOJwqirndFxnK8weCUPoPwsPh4jSCcA2IjThC+9pc4YX7TO3iAwaT6dOkMMPnldPbQvJmcCgYEA2ZWvA/vVOrKK3YcaBaEgXW6eFZadYwpoqnpRp1vgIfB0+UQnUfblnSon6vzIv+dUzSu6NlWRnUE+SY/PNgQHqYrwFwcjBN6iBU3u/JgqGbiKvo71NbrGQ9ImNwqnztS0KRDt4ARYIs8J8S9R5FCLeQqO2qNgLVSWdEr/2V+IiiMCgYBqzoprbCrpNyAaG0UaXSYJGB2nasp5NIcIgItS/ZCZsfVJYDCGq3Fs/dA+CPrlr+W/6/7wvJ6BxPPWzG4UgjLZEHBvd/LiK2Qr41Z/N275lQM+jqXsRtQO2BatdXIeEpGdeDnVEVOpJ33Urk7z2vvsz0I7KxNRTWEaz/EjHAcBaQKBgQCjfB5mZeAPHHvOe2aH+ErzKNxK6EIVWorOHN4hW50Kozug1x6cLWDVOAmKPKkx18UV69ccYCrq90yvxQgyU9DWCPjgtJIRZJ5kUexRipuHe+tzxsJjvpSd/NaN4Mm5VISRnpC9E0aN0PZta9qiLAq/xbkUelEXfkkV1Axs7aUP9QKBgQDWO0bV/asond/W/YISclcomkB8OK1pxI0LJPlUTcYZb+Rzd2UKteZ0nQLDo0ARcLe9NKGdDW5AD/OjTlhK3VUvrxBcjRow3bYca8Z4iMbnOdCL++kD5H4a8KfhwWfKLgAjI7L/RUiXtVrk1ryVfxwqb9HtCrohGdfLuD3tf6Z3NQ==",
		
		//异步通知地址
		'notify_url' => "http://外网可访问网关地址/alipay.trade.page.pay-PHP-UTF-8/notify_url.php",
		
		//同步跳转
		'return_url' => "http://外网可访问网关地址/alipay.trade.page.pay-PHP-UTF-8/return_url.php",

		//编码格式
		'charset' => "UTF-8",

		//签名方式
		'sign_type'=>"RSA2",

		//支付宝网关
		'gatewayUrl' => "https://openapi.alipaydev.com/gateway.do",

		//支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
		'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAwY1jx/GUniTnd4j3S+C7G454Ss49yl23Q4yb7jJM94oVBHOFR/LHMGNFK/QP8nc6Y3Sri66vwnGQpxXsqB5NzH4zg5NbYX3UKyvyJQSy8LrWAubO2nJSisuFR/oYG2q58rPBHXpHgNOy+qcLK4Tjx+lKVE5sFZkXVN0lBzV4wW8/BQ5iep6lGAm4ilsTik2lgMpOPGJfVQVcfviusf6URoZXtokCRBbFeEGbTUVnM78xTzOzRZqvMjk/dUx9nVn4vPF/wFanXMbQe0LkC46HpRaN7qTBJdykruTXoRBSXDaLIRGEd9QcoUUHlcmM1pFtMgb/XCxu33GZ5QLsAU6OvQIDAQAB",
);