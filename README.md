# fetching-data

## Step One Clone Repo

    git clone git@github.com:coder0010/fetching-data

or you can download it by the desktop application of github

    https://github.com/coder0010/fetching-data

Switch to the repo folder

    cd fetching-data

---
## Step Two Prepare Project

1 Prepare the project

    run composer i && composer dump-autoload -o

2 open src\Env file to set your config of database

3 run

    php index.php 

---
# Task Core Files
* **Database**
  * Connections         => grouping all connection to dbms like (mysql, sqllite, ...)
  * DatabaseFactory.php => return instance of requested connection
  * Executer.php        => it's data layer between eloquents and db [ it's very important ] 
 
* **Repositories**
  * Contracts
     * BaseRepository.php => it's the main ( contract ) interface that all model contract with extend from them

  * Eloquents
     * BaseEloquent.php => it's the main ( eloquent ) class that all eloquents will extend from them and has all the implementation of  BaseRepository.php  

* **Services**
  * MigrateService.php => start connection to db by executor then run creation of db and tables
  * ImportService.php  => Reading data from excel per page
  * SeedService.php    => construct needed Contracts ( Repos ) and set by encapsulation to local properties and push them to models then save them my eloquents
  * ExportService.php  => construct needed Contracts ( Repos ) and set by encapsulation to local properties and convert them to json and put them to json file

* **Controllers**
  * MigrateController.php
  * ImportController.php
  * SeedController.php
  * ExportController.php
