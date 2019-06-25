# Searching eloquent models

[![Latest Version on Packagist](https://img.shields.io/packagist/v/macsidigital/laravel-searchable.svg?style=flat-square)](https://packagist.org/packages/macsidigital/laravel-searchable)
[![Build Status](https://img.shields.io/travis/macsidigital/laravel-searchable/master.svg?style=flat-square)](https://travis-ci.org/MacsiDigital/laravel-resultable)
[![Total Downloads](https://img.shields.io/packagist/dt/macsidigital/laravel-searchable.svg?style=flat-square)](https://packagist.org/packages/macsidigital/laravel-searchable)

A packahge to make searching eloquent models from a single search field easier

## Installation

You can install the package via composer:

```bash
composer require macsidigital/laravel-searchable
```

## Usage

Create 2 arrays in your elequent model, the first with the fields that can be sorted, the second showing any table joins.

``` php
protected $searchable = [
    'name', 'email', 
];

protected $extended_joins = [
    'addresses.country' => [
        'table_field' => 'users.id',
        'foreign_table_field' => 'addresses.addressable_id',
        'restrict_table_field' => 'addresses.addressable_type',
        'restrict_value' => 'App\User'
    ]
];
```
If no table joins are required then you will only need the searchable array.

For any joins include the table and field seperated by a period (.).

Then to search the fields simply add a form and input named 'search' into your page that uses a get request.  Use the @searchableformurl to create the form request

``` php
<form class="inline-form" action="@searchableformurl()" method="GET">
	<div class="input-group">
	  <input type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="search" name="search">
	  <div class="input-group-append">
	    <button class="btn btn-outline-secondary" type="submit" id="search"><i class="fas fa-search"></i></button>
	  </div>
	</div>
</form>
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email colin@macsi.co.uk instead of using the issue tracker.

## Credits

- [Colin Hall](https://github.com/macsidigital)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
