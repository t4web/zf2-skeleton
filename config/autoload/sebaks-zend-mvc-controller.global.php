<?php
return [
    'controllers' => [
        'factories' => [
            'sebaks-zend-mvc-controller' => 'Sebaks\ZendMvcController\ControllerFactory',
            'sebaks-zend-mvc-api-controller' => 'Sebaks\ZendMvcController\ApiControllerFactory',
        ],
    ],
    'service_manager' => [
        'factories' => [
            'sebaks-zend-mvc-controller' => 'Sebaks\ZendMvcController\ControllerFactory',
            'sebaks-zend-mvc-api-controller' => 'Sebaks\ZendMvcController\ApiControllerFactory',
            'sebaks-zend-mvc-criteria-validator-factory' => 'Sebaks\ZendMvcController\CriteriaValidatorFactory',
            'sebaks-zend-mvc-changes-validator-factory' => 'Sebaks\ZendMvcController\ChangesValidatorFactory',
            'sebaks-zend-mvc-service-factory' => 'Sebaks\ZendMvcController\ServiceFactory',
            'sebaks-zend-mvc-view-model-factory' => 'Sebaks\ZendMvcController\ViewModelFactory',
            'sebaks-zend-mvc-api-view-model-factory' => 'Sebaks\ZendMvcController\ApiViewModelFactory',
            'sebaks-zend-mvc-request-factory' => 'Sebaks\ZendMvcController\RequestFactory',
            'sebaks-zend-mvc-api-request-factory' => 'Sebaks\ZendMvcController\ApiRequestFactory',
            'sebaks-zend-mvc-response-factory' => 'Sebaks\ZendMvcController\ResponseFactory',
            'sebaks-zend-mvc-html-error-factory' => 'Sebaks\ZendMvcController\HtmlErrorFactory',
            'sebaks-zend-mvc-api-error-factory' => 'Sebaks\ZendMvcController\ApiErrorFactory',
            'sebaks-zend-mvc-options-factory' => 'Sebaks\ZendMvcController\OptionsFactory',
        ],
    ],
];