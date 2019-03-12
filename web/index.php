<?php

// comment out the following two lines when deployed to production

	$host = $_SERVER['HTTP_HOST'];

	if ($host != 'splx-dishes.herokuapp.com') {
		defined('YII_DEBUG') or define('YII_DEBUG', true);
		defined('YII_ENV') or define('YII_ENV', 'dev');
	} else {
		defined('YII_ENV') or define('YII_ENV', 'dev');
		defined('YII_DEBUG') or define('YII_DEBUG', false);
	}

	require __DIR__ . '/../vendor/autoload.php';
	require __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';

	$config = require __DIR__ . '/../config/web.php';

	(new yii\web\Application($config))->run();
