<?php

return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    // Default Application Name
    'name' => 'Profiler',
    'preload' => array('log', 'input'),
    'components' => array(
        // Database
        'db' => array(
            'connectionString' => '',
            'emulatePrepare' => true,
            'charset' => 'utf8',
            'enableProfiling' => true,
            'enableParamLogging' => true,
            'schemaCachingDuration' => 3600,
        ),
        'urlManager' => array(
            'urlFormat' => 'get',
            'showScriptName' => true,
            'rules' => array(
                array(
                    'class' => 'application.modules_core.space.components.SpaceUrlRule',
                    'connectionId' => 'db',
                ),
                array(
                    'class' => 'application.modules_core.user.components.UserUrlRule',
                    'connectionId' => 'db',
                ),
                '/' => '//',
                'dashboard' => 'dashboard/dashboard',
                'directory/members' => 'directory/directory/members',
                'directory/spaces' => 'directory/directory/groups',
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
        ),
        'moduleManager' => array(
            'class' => 'application.components.ModuleManager',
        ),
        'messages' => array(
            'class' => 'application.components.HPhpMessageSource',
        ),
        'input' => array(
            'class' => 'application.extensions.CmsInput',
            'cleanPost' => false,
            'cleanGet' => false,
        ),
        'interceptor' => array(
            'class' => 'HInterceptor',
        ),
        'session' => array(
            'class' => 'application.modules_core.user.components.SIHttpSession',
            'connectionID' => 'db',
            'sessionName' => 'sin',
        ),
        'request' => array(
        //'enableCsrfValidation' => true,
        ),
        // Caching (Will replaced at runtime)
        'cache' => array(
            'class' => 'CDummyCache'
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
                array(
                    'class' => 'CDbLogRoute',
                    'levels' => 'error, warning',
                    'logTableName' => 'logging',
                    'connectionID' => 'db',
                    'autoCreateLogTable' => false,
                ),
            ),
        ),
    ),
    // Modules
    'modules' => array(
    // All Profiler Modules will automatically loaded via
    // /modules/*/autostart.php
    //   or
    // /modules_core/*/autostart.php
    ),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.forms.*',
        'application.components.*',
        'application.behaviors.*',
        'application.interfaces.*',
        'application.libs.*',
        'application.widgets.*',
        // 3rd Party Extensions
        'ext.yii-mail.YiiMailMessage',
        'ext.EZendAutoloader.EZendAutoloader',
        'ext.controller-events.*'
    ),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
        // Installed Flag
        'version' => '0.9.1',
        'versionFlag' => 'BETA',
        'statusShown' => true,
        'maintenance' => false,
        'installed' => false,
        'availableLanguages' => array(
            'en_gb' => 'English (UK)',
            'en' => 'English (US)',
            'de' => 'Deutsch',
            'fr' => 'Français',
            'es' => 'Español',
            'nl' => 'Nederlands',
            'pl' => 'Polski',
            'da' => 'Dansk',
            'sv' => 'Svenska',
            'nb_no' => 'Nnorsk bokmål',
            'pt' => 'Português',
            'pt_br' => 'Português do Brasil',
            'ca' => 'Català',
            'it' => 'Italiano',
            'th' => 'ไทย',
            'tr' => 'Türk',
            'ru' => 'Pу�?�?кий',
            'uk' => 'Україн�?ький',
            'el' => 'ελληνικά',
            'ja' => '日本人',
            'hu' => 'Magyar',
            'zh_cn' => '中国（简体）',
            'zh_tw' => '中國（�?體）',
            'an' => 'Aragonés',
            'vi' => 'Tiếng Việt',
            'cs' => 'Čeština',
            'uz' => 'O\'zbekiston',
            'fa_ir' => '�?ارسی',
            'bg' => 'българ�?ки',
            'sk' => 'Sloven�?ina',
            'leet' => '1337'
        ),
        'dynamicConfigFile' => dirname(__FILE__) . '/local/_settings.php',
    ),
);
?>
