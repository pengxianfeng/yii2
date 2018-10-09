<?php
return [
	'adminEmail' => 'admin@example.com',
	'supportEmail' => 'support@example.com',
	'user.passwordResetTokenExpire' => 3600,
	/**
	 * 账号基本信息，请从微信公众平台/开放平台获取
	 */
	"WECHAT"=>[
			'app_id'  => 'wxf1a44c2f5f65f310',         // AppID
			'secret'  => '2add8b759f859793aaaaa9ab8dcf9b3b',     // AppSecret
			'token'   => 'foP17KL6N3ssH2aExrmb',          // Token
			'aes_key' => '',
			/**
			 * 指定 API 调用返回结果的类型：array(default)/collection/object/raw/自定义类名
			 * 使用自定义类名时，构造函数将会接收一个 `EasyWeChat\Kernel\Http\Response` 实例
			 */
			'response_type' => 'array',
			/**
			 * 日志配置
			 *
			 * level: 日志级别, 可选为：
			 *         debug/info/notice/warning/error/critical/alert/emergency
			    * permission：日志文件权限(可选)，默认为null（若为null值,monolog会取0644）
			    * file：日志文件位置(绝对路径!!!)，要求可写权限
			 */
			'log' => [
				'level'      => 'debug',
				'permission' => 0777,
				'file'       => '/tmp/easywechat.log',
			],
			
			/**
			 * 接口请求相关配置，超时时间等，具体可用参数请参考：
			 * http://docs.guzzlephp.org/en/stable/request-config.html
			 *
			 * - retries: 重试次数，默认 1，指定当 http 请求失败时重试的次数。
			 * - retry_delay: 重试延迟间隔（单位：ms），默认 500
			 * - log_template: 指定 HTTP 日志模板，请参考：https://github.com/guzzle/guzzle/blob/master/src/MessageFormatter.php
			 */
			'http' => [
				'retries' => 1,
				'retry_delay' => 500,
				'timeout' => 5.0,
			],
			
			/**
			 * OAuth 配置
			 *
			 * scopes：公众平台（snsapi_userinfo / snsapi_base），开放平台：snsapi_login
			 * callback：OAuth授权完成后的回调页地址
			 */
			'oauth' => [
				'scopes'   => ['snsapi_userinfo'],
				'callback' => '?r=site/index',
			],
			/**  微信支付配置 */
			'payment'=> [
				'merchant_id'        => '123456789',
				'key'                => 'key-for-signature',
				'cert_path'          => 'path/to/your/cert.pem', // XXX: 绝对路径！！！！
				'key_path'           => 'path/to/your/key',      // XXX: 绝对路径！！！！
				'notify_url'         => '默认的订单回调地址',       // 你也可以在下单时单独设置来想覆盖它
			],
		]
];
