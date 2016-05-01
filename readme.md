# Website that calculates the next decimal of pi with every new visitor

Basically what the title says. Demo page at [https://devandlife.com/pi-visitor](https://devandlife.com/pi-visitor)

## Built with

- [Laravel 5.2.31](https://laravel.com/)
- Algorithm that I found on [this blog from the Netherlands](http://www.pfz.nl/forum/topic/31-pi-calculator-bbp-algorithm/page__view__findpost__p__257) and that I modified to calculate the next decimal with every visit by saving the previous calculation to the database.
- [GeoIP for Laravel 5](https://github.com/Torann/laravel-geoip) for getting the visitor's country by IP.


## Using

PHP7 for the added speed over PHP5.6.

## Accuracy

As of 2016-05-01 03:39:00 UTC there have been 2168 visitors and the accuracy has been verified against other sources. It will probably start losing accuracy over 9,000? (haha)
