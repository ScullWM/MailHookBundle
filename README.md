SwmMailHookBundle - A bundle to catch API webhook from differents mail service
=============================================================================

Features
--------
Catch webhook from your email provider and dispatch an event with all good data you need in.

Exemple case :
-------------
Disable to a user's notification when a mail is signal as spam.
Send a private message to a user if last mail send get bounced.


Installation
-----------------------------------

Add the package to your composer.json file
```
"scullwm/mailhookbundle": "dev-master",
```

Add this to app/AppKernel.php
```php
<?php
    public function registerBundles()
    {
        $bundles = array(
            ...
            new Swm\Bundle\MailHookBundle\SwmMailHookBundle(),
        );

        ...

        return $bundles;
    }
```

Configuration
-------------

### 1) Edit app/config.yml

```yaml
swm_mailhook:
    apiservicesavailables: ['mandrill','mailjet','campainmonitor','mailgun']
    secretsalt: notSecret
```

### 2) Edit app/routing.yml

```yaml
swm_mailhook_controller:
    resource: "@SwmMailHookBundle/Controller/"
    type:     annotation
    prefix:   /
```

Well done!


Use it
------

Go to your email service provider like mandrillapp.com and find where to configure your webhook.
Check hooks you want and set the url like this:

http://www.mywebsite.com/webhook/{secretSalt}/{serviceName}/catch

With no configuration for mandrill it should be :
http://www.mywebsite.com/webhook/notSecret/mandrill/catch

With a custom secretSalt and mailjet service it should be :
http://www.mywebsite.com/webhook/dDifXo26/mailjet/catch

