 # Solution
 [![Software license][ico-license]](README.md)
 [![Build status][ico-travis]][link-travis]
 [![Coverage][ico-codecov]][link-codecov]
 
 [ico-codecov]: https://codecov.io/gh/ngodinhloc/bigcommerce/branch/master/graph/badge.svg
 [ico-license]: https://img.shields.io/github/license/nrk/predis.svg?style=flat-square
 [ico-travis]: https://travis-ci.org/ngodinhloc/bigcommerce.svg?branch=master
 [link-travis]: https://travis-ci.org/github/ngodinhloc/bigcommerce
 [link-codecov]: https://codecov.io/gh/ngodinhloc/bigcommerce 
 
 My approach is to treat BigCommerce as a data source, so I created an ORM following the SOLID principles
 
 ## Entities
 * Customer 
 * Order
 * OrderProduct
 
 Entities represent BigCommerce resources (Customer, Order, OrderProduct)
 
 Relationships:  
 * Customer may have multiple Order
 * Order may have multiple OrderProduct
 
 ## Repositories
 * CustomerRepository
 * OrderRepository
 * OrderProductRepository
 
 Repositories are used to retrieve data from data source and return entities, or collection of entities.
 
 ## Cache
 * FileCache
 
 Since the application is using data from a third party APIs, each of the request is expensive 
 and might take long response time. Therefore, I created a Cache Engine to cache the data from BigCommerce
 
 ## ResourceManager
 ResourceManager use Client (\Bigcommerce\Api\Client) to get data from BigCommerce and convert it into language agnostic format
 so that it can be easily stored in cache.
 
 ## Services
 * CustomerService
 
 This service use repositories to retrieve data and return collection of entities, which are convenient to use in controllers and views  

 ## Testing
 * Integration Tests
 * Unit Tests
 
 The only one integration test is to test BigCommerce client connection.
 
 Unit tests are written for all added classes.
 
 ----------------------------------------------------------------------------------------
 
 # Customer Browser
The goal of this assignment is to demonstrate your familiarity with building an application that consumes a JSON API
and displays aggregated data. There is no time limit for this assignment but we would advise time boxing the exercise
to 1-3 hours. Even if you do not complete all of the tasks please submit the assignment.

You will be assessed on the design skills you demonstrate, rather than your proficiency with PHP as a language. Whilst
the requirements are simple, you should aim to deliver a product that can be easily extended in the future. Feel free
to provide notes with your submission explaining any decisions or shortcuts you deem appropriate.

This application is to connect to a [live BigCommerce store](https://store-velgoi8q0k.mybigcommerce.com) via the
[V2 API](https://developer.bigcommerce.com/api/v2/). The application will consist of the following screens:
* A list of Customers, including the total number of orders they have placed
* A Customer Details screen that displays the Order History for that Customer and their Lifetime Value (defined as the
  total value of all of their orders)

Some skeleton code has been created for you to complete in the following folders:
```
app/Http/Controllers
resources/views
```

You are free, and encouraged, to create whatever additional models, services, etc you deem appropriate. If time allows,
we would love you to include unit tests for your submission.

You will NOT be judged on the visual appearance of your application. Don't waste time making things pretty.

## Dependencies
This application uses the [Laravel framework](https://laravel.com/docs/5.6) which requires PHP >= 7.1 to run. If you do
not already have PHP available on your machine, we suggest you use [Homebrew](https://brew.sh/) to install it:
```
/usr/bin/ruby -e "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/master/install)"
brew install php
brew install php72-xdebug
```

You will also need to install [Composer](https://getcomposer.org/download/). Once setup, install dependencies:
```
composer install
```

## Configuration
Copy the included `.env.example` file:
```
cp .env.example .env
```

Open the newly created `.env` file and fill in the `API_KEY` field with the key supplied in the email along with this
assignment.

Before you can run the application, you need to generate an application key. You can do so by running:
```
php artisan key:generate
```

## API Client
The [Bigcommerce PHP API](https://github.com/bigcommerce/bigcommerce-api-php) client is already installed as a
dependency and automatically initialised using the relevant fields in the `.env` file (see `AppServiceProvider::boot`).
When working correctly, you will see the store's time appear on the homepage. For instructions on accessing resources
using the API client, refer to the GitHub repository.

## Developing

To serve the application:
```
php -S localhost:8000 -t public
```                               

To run the unit tests:
```
./vendor/bin/phpunit
```

## Submitting
Your assignment should be submitted as a Git repository hosted on a service like [GitHub](https://github.com),
[BitBucket](https://bitbucket.org/) or [GitLab](https://gitlab.com/).
