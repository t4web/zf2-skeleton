# ZF2 Skeleton. Migrations

As you know - your version control store only code changes, other data (database content, user pictures)
is different for each environment. When you want change project data - you must write migrations.

For example, we use Migrations for
- database schema update (add\remove\update column in table, create\update\remove table)
- database data moving (create table column and fill it some data from other table)
- cache managing
- user files managing (files under gitignore)

With module `T4web\Migrations` you can create and execute migrations.

Assumptions: you already initialize migrations by command `$ php public/index.php migration init`

#### Creating migration

Run in cli `php public\index.php migration generate` - migration class will be created in `migrations`
folder. Class name will be `Version_YYYMMDDHHIISS` (for example [Version_20160313100147.php](https://github.com/t4web/zf2-skeleton/blob/master/migrations/Version_20160313100147.php)).
Just code your instruction inside `up()` method.

#### List migrations

```shell
$ php public/index.php migration list
+ 20160313100147 - Set inactive user which not update yourself
```

`+` - not executed migration

#### Apply migration
```shell
$ php public/index.php migration apply
T4web\Migrations\Version_20160313100147 Execute migration class up.
Migrations applied!
```

#### Example: create table 'shows' (for tv show catalog)
1. create migration: 

  ```shell
  php public\index.php migration generate
  ```
  
2. Add SQL-script to migration (defined in up() method):

  ```php
    public function up()
    {
        /** @var \Zend\Db\ResultSet\ResultSet $result */
        $result = $this->executeQuery("CREATE TABLE IF NOT EXISTS `shows` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `name` varchar(255) NOT NULL,
              `description` text DEFAULT NULL,
              `picture` varchar(255) DEFAULT NULL,
              `created_dt` datetime NOT NULL,
              `updated_dt` datetime DEFAULT NULL,
              PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;");
    }
  ```
  
3. execute migration:

  ```shell
  php public\index.php migration apply
  ```

Done. Table `shows` was created.
