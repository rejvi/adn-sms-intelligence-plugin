<?php

if (!defined('API_DOMAIN_URL')) {
  define('API_DOMAIN_URL', 'https://dev.adnsms.com');
}

if (!defined('API_KEY')) {
  define('API_KEY', 'KEY-5ry0o35odkq4quogc2wx2cgusfq4djip');
}

if (!defined('API_SECRET')) {
  define('API_SECRET', 'RQXaWnEAuwUL6qs6');
}

return [
    'domain' => constant("API_DOMAIN_URL"),
    'apiCredentials' => [
        'api_key' => constant("API_KEY"),
        'api_secret' => constant("API_SECRET"),
    ],
    'apiUrl' => [
        'check_balance' => "/api/v1/secure/check-balance",
        'send_sms' => "/api/v1/secure/send-sms",
        'check_campaign_status' => "/api/v1/secure/campaign-status",
        'check_sms_status' => "/api/v1/secure/sms-status",
    ],
];