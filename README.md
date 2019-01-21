# Tweetsnippet
Tweetsnippet is a curated list of tips and tricks from Twitter.

# Installation
Pull the repository and run `composer install`

## env
Turn the .env.example file into an .env and fill it out with the appropriate values

## Create a user
Write `php artisan make:user` on the command line and follow the instructions

Migrate your database by running `php artisan migrate` - please note that Tweetsnippet only provides a couple of tags out of the box, you can create these by running `php artisan db:seed`.

# Contributions
All kinds of contributions are very welcome and highly encouraged! Be sure to read our guidelines before interacting with the repository however.

## Other notes
The project uses Larabug to handle exceptions, however feel free to implement whatever you feel works better for you

# TODO

* New design (2.0)
* Prepare seed data
* Make the "backend" pretty and more useful
* Make RSS feeds work again
