# Presenthor

[![Build Status](https://travis-ci.org/joubertredrat/presenthor.svg?branch=master)](https://travis-ci.org/joubertredrat/presenthor)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/joubertredrat/presenthor/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/joubertredrat/presenthor/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/joubertredrat/presenthor/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/joubertredrat/presenthor/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/joubertredrat/presenthor/badges/build.png?b=master)](https://scrutinizer-ci.com/g/joubertredrat/presenthor/build-status/master)
[![Latest Stable Version](https://poser.pugx.org/redrat/presenthor/v/stable)](https://packagist.org/packages/redrat/presenthor)
[![Total Downloads](https://poser.pugx.org/redrat/presenthor/downloads)](https://packagist.org/packages/redrat/presenthor)
[![License](https://poser.pugx.org/redrat/presenthor/license)](https://packagist.org/packages/redrat/presenthor)

The crazy presenter pattern library

#### First question, why?

Because I'm a polemic person and I don't like serializes. Serialize is good? Yes, but for me, in many times is a big solution to solve a little problem.

#### Okay, how to install then?

Easy my friend, install from composer

```bash
composer require redrat/presenthor
```

#### How to use?

This library is separated in two parts, an `Item` and `Bag`. 
All parts implements `OutputInterface`, then output `array` or json in string.

##### Item

An `Item` basically contains a data that will output `array` or `json` and you should to implement in your project based on `ItemInterface` or `ItemInjectableInterface`.

##### Bag

A `Bag` is a collection of `ItemInterface` and you can implement yours based on `ItemBagInterface` or use `ItemBag` implemented in this library.

#### Example

You can view an implementation example in https://github.com/joubertredrat/presenthor-example.