# Aware 2
Sequel of the Aware laravel package by Awareness, which handle self validating models for Eloquent in Laravel.

## Installation

### Composer

Add the package in your composer.json file as follow:

```
{ // composer.json
  ...
  "require": {
      "mandor53/aware2": "dev-master"
  },
  ...
}
```

### Laravel

Add the provider in your app.php config file as follow:

```php
<?php // app/config/app.php

return array(
  ...
  'providers' => array(
      ...
      'Mandor53\Aware2\Aware2ServiceProvider',
  ),
  ...
);
```

## Usage

### Validator rules

Create a model with validation rules:

```php
<?php

use Awareness\Aware\Model;

class User extends Model {

  public static $rules = array(
    'name' => 'required'
  );

}
```

### Dynamic validation rules

```php
<?php

use Awareness\Aware\Model;

class User extends Model {

  public static function dynamicRules($data)
  {
    if(someTestHere($data['a column data youre trying to insert']))
    {
      // Then there's no error, return true
      return true;
    }
    // There is an error, return your error message
    return 'Woops, looks like your input is wrong!';
  }

}
```

### Testing

Try to save a new entry or edit an existing one:

```php
$user = new User();
$user->save(); // returns false

$user->name = 'Colby';
$user->save(); // saves then returns true!
```

Access your validation errors:

```php
...
if(!$user->save())
{
  return Response::make($user->messages()->first());
}
...
```

### Bypass error checking

Save without validating:

```php
$user = new User();
$user->force()->save();
```
