## Gousto Recipe API
A sample Food recipe and ratings API built on [Lumen framework](https://lumen.laravel.com/).

### Requirements
   - PHP >= 5.6
   - [Composer](https://getcomposer.org/)

## Installation Steps

#### Clone the repo
```
$ git clone github.com/dilipgurung/gousto
```	
  
#### Update the configuration:

Update `DB_DATABASE` and other options in the `.env` file as needed.

#### Install Application dependencies
```
$ make install
```

#### Migrate the Database

Migrate the database and import the data from CSV file

```
$ make migrate
$ make import
```

##### Note: 
By default the command will import the data from `storage/app/gousto/datastore/recipe-data.csv`

But you can import the data from any other file by overriding the file path with the `--path` option
```
$ php artisan ingest:data --path=/path/to/your/file.csv
```

#### Run the Application
```
$ make run
```

The application will run on http://localhost:8000

### Run Tests
To run the tests, run the following command in the terminal.
   
```
$ make test
```