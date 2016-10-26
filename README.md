# FCM Push Notifications
Basic class to send push notifications using google firebase.

### Installation
**Be careful! This library needs curl module for php to work.**

FMC Push Notifications is hosted in packagist so you can get it from [Composer](https://getcomposer.org/ "Composer")

```
composer require legomolina/fcm-push-notification
```

### Usage
Require the Composer autoload in your index:

```php
<?php
    require 'vendor/autoload.php';
```

Set your Firebase API key

```php
FCMPushNotifications::API_KEY = "my_api_key";
```

And send notifications

```php
FCMPushNotifications::send('mobile_token_or_topic', 'title', 'message');
```

### License
FMC Push Notifications is licensed under the GPL v3 license. See License File for more information.