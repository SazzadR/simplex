# Simple Blog application to demonstrate the usage of [PHP-DI](http://php-di.org/)

## Run
- Clone the project
```
mkdir php-di
cd php-di
git init
git remote add -f origin https://github.com/SazzadR/simplex.git
git config core.sparseCheckout true
echo "php-di/" >> .git/info/sparse-checkout
git pull --depth=1 origin master
cd php-di/ && find . -name . -o -exec sh -c 'mv -- "$@" "$0"' ../ {} + -type d -prune && cd .. && rm -rf php-di && rm -rf .git
```
- Install the dependencies `composer install`
- Create the database `touch db.sqlite`
- Run project `php -S 0.0.0.0:9999 -t web`
- Open browser an go to [127.0.0.1:9999](http://127.0.0.1:9999/)
