# Key creation script

## Purpose

This script shows how you can create license keys (eg. trial keys) without having to be logged in.
It can be used if you would like to share license key creation permission with other people, eg.
affiliates and resellers.

## Requirements
You should only need PHP and some web server software (eg. Apache or Nginx) to host this code.
Support for TLS (eg. when the url starts with `https://`) is preferable.

For **testing**, assuming you have PHP 5.4 or later installed, you can test this script by running:
```
php -S localhost:8000
```

## Configuring the script
Before you set this up production, please open `create-key.php` and change `secret` and `token` as described in the comments.

## Usage
Once you have uploaded this script to your server, you should be able to visit `create-key.html` and see a form for key creation.
**However**, for everything to work, you need to append `auth=<secret>` to the url. That is, assuming `secret=verysecretkey`, you need
to visit `create-key.html?auth=verysecretkey`. From this point, everything should work.

> **Note**: You should only share this url with those that you trust. If you would notice that you have lost control of the script, you can,
at any time, remove the access token on [this page](https://app.cryptolens.io/User/AccessToken#/).
