# Plugin for YOURLS : Limit Custom Keyword Length

> Works on YOURLS 1.9.2

## What for

This plugin limits the minimum and maximum number of characters for custom keyword
By default, custom keyword length limit on this plugin is:
MIN = 3 characters
MAX = 20 characters

## How to

* In `/user/plugins`, create a new folder named `limit-custom-keyword-length`
* Drop these files in that directory
* Open the plugin.php and edit the value of $max_length and $min_length to suit
* Go to the Plugins administration page ( eg `https://sho.rt/admin/plugins.php` ) and activate the plugin 
* Have fun!

## Tips

You can also customize your error messages on plugin.php

## License

YOURLS : Limit Custom Keyword Length is free software

This code is released under:
* [MIT License](https://github.com/suryatanjung/yourls-limit-custom-keyword-length/blob/main/LICENSE)
* YOURLS License: Do whatever the hell you want with it.
