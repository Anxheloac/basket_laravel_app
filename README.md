# Basket App

### Installation

git clone https://github.com/Anxheloac/basket_laravel_app.git 

```sh
$ cd basket_laravel_app
$ composer install
$ nano .env (set environment configurations)
```
### Elastic Search

Download and Setup Elastic Search
https://www.elastic.co/downloads/elasticsearch
Run Elastic Search on your local environment
Set elasticsearch configurations to .env file
| Env |  |
| ------ | ------ |
| ELASTICSEARCH_HOST | [localhost] |
| ELASTICSEARCH_PORT | [9200] |

```sh
php artisan migrate --seed
php artisan serve
```
Verify the deployment by navigating to your server address in your preferred browser.

```sh
127.0.0.1:8000
```
