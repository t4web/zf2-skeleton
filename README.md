# ZF2 Skeleton

Extended [ZF2 skeleton](https://github.com/zendframework/ZendSkeletonApplication). Simplifying build
application based on ZF2 MVC.

Just clone, install dependencies, remove module `Users` and work.

- In Box - module `Users` - for demonstration features other modules.
- In Box - [Codeception](https://github.com/Codeception/Codeception) acceptance tests.

## Difference from [ZF2 skeleton](https://github.com/zendframework/ZendSkeletonApplication)

- remove dependency from `zendframework/zendframework:~2.5` - have minimal dependency for running
- have pre-installed modules, for any project: `Migrations`, `Admin backend`, `Domain`, `Zend-MVC-Controller`

## Installation

1. Download skeleton `wget https://github.com/t4web/zf2-skeleton/archive/master.zip`
2. Extract to work directory
3. Install dependencies `composer install`
4. Create database `skeleton` and database `skeleton_test`
5. Create database user `skeleton` with password `111` and grant all privileges to database `sekeleton`
  and `skeleton_test`
6. Restore database from dump in folder `tests/_data/skeleton_test.mysql.sql` \ `tests/_data/skeleton_test.pgsql.sql`
7. Start internal PHP cli-server in root directory `php -S 0.0.0.0:8080 -t public/ public/index.php`

Done, go to `http://localhost:8080`

For see full AdminLTE theme

1. download [AdminLTE v2.0.5](https://github.com/almasaeed2010/AdminLTE/archive/v2.0.5.zip)
2. unzip to public/theme/
3. You can see it in `http://localhost:8080/theme/AdminLTE-2.0.5/index.html`

## Contents

- [Tests](https://github.com/t4web/zf2-skeleton/blob/master/docs/tests.md) ([Codeception](https://github.com/Codeception/Codeception))
- [Migrations](https://github.com/t4web/zf2-skeleton/blob/master/docs/migrations.md) (Module [T4web\Migrations](https://github.com/t4web/Migrations))
- [Domain](https://github.com/t4web/zf2-skeleton/blob/master/docs/domain.md) (Module [T4web\DomainModule](https://github.com/t4web/DomainModule))
- Zend-MVC-Controller (Module [Sebaks\ZendMvcController](https://github.com/sebaks/zend-mvc-controller))
- Admin Backend (Module [T4web\Admin](https://github.com/t4web/Admin))
  - [Main menu](https://github.com/t4web/zf2-skeleton/blob/master/docs/main-menu.md)
  - Build simply CRUD Entity

