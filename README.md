# Plugin for YOURLS : Limit Custom Keyword Length

[![Awesome](https://awesome.re/badge.svg)](https://awesome.re) [![Listed in Awesome YOURLS!](https://img.shields.io/badge/Awesome-YOURLS-C5A3BE)](https://github.com/YOURLS/awesome)

> Works on YOURLS 1.9 and newer (tested on YOURLS 1.10.6 with PHP 8.3)

## What for

This plugin limits the minimum and maximum number of characters for custom keyword

By default, custom keyword length limit on this plugin is:
  * MIN = 4 characters
  * MAX = 15 characters

## How to

* In `/user/plugins`, create a new folder named `limit-custom-keyword-length`
* Drop these files in that directory
* Go to the Plugins administration page ( eg `https://sho.rt/admin/plugins.php` ) and activate the plugin 
* Set the minimum and maximum length on the plugin's settings page ( Manage Plugins > Limit Keyword Length Settings )
* To change the error messages, use the `add_new_link_keyword_length_error` filter
* Have fun!

## Tips

**`BTC (ERC20): 0xc96f5273bdd688aa421633c199401af407352d18`**

## Changelog

### 1.2
* Fixed: on YOURLS 1.9 and newer every new short link failed while the plugin was active (YOURLS changed the shunt default from `false` to `yourls_shunt_default()`)
* Fixed: a keyword that was too long or too short crashed with a PHP 8 TypeError instead of showing the error message
* Errors now carry `errorCode` and `statusCode` 400 like YOURLS' own errors, so the API answers correctly
* The length is measured on the keyword as YOURLS will store it (after sanitizing)
* An answer from another plugin earlier in the chain is kept instead of being overwritten

## License

Limit Custom Keyword Length (YOURLS Plugin) is free software

This code is released under:
* [MIT License](https://github.com/suryatanjung/yourls-limit-custom-keyword-length/blob/master/LICENSE): *Copyright (c) 2024 [Surya Tanjung](https://jung.bz/) [hi@jung.bz](mailto:hi@jung.bz)*
* [YOURLS License](https://github.com/YOURLS/YOURLS): *Do whatever the hell you want with it. :)*
* **Credits: Thanks to [YOURLS Awesome Team](https://github.com/YOURLS/YOURLS/graphs/contributors)**

## Example usage

* *[Sor.bz | Best URL Shortener, Simple, Easy, and Free!](https://sor.bz)*
