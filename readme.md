## Gousto Recipe API
A sample Food recipe and ratings API built on [Lumen framework](https://lumen.laravel.com/).

### Requirements
   - PHP >= 5.6
   - [Composer](https://getcomposer.org/)

## Installation Steps

#### Clone the repo
```
$ git clone git@github.com:dilipgurung/gousto.git
$ cd gousto
```	

#### Install Application dependencies
```
$ make install
```

#### Update the configuration:

```
$ cp .env.example .env
```

Update `DB_DATABASE` and other options in the `.env` file as needed.

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

#### Why was Lumen chosen for the project?

 - Lumen was chosen for this project mostly due to the author's familiarity and in-depth knowledge of the framework and honestly it is one of the most elegant PHP frameworks out there.

#### Extensibility
- The API is built as loosely coupled as posible.
- Follows the SOLID design principles
- The API uses [Fractal](http://fractal.thephpleague.com/) as a presentation and transformation layer. Data transformers are not tied to the underlying Data Layer so data could be presented in different ways based on different consumers. It also makes the API much more resilience to the underlying data changes.

#### Trade-Offs:
- Also I have tried to keep the codebase as simple as possible. In doing so, I have ommitted what would be trivial test cases
- I have deliberately coded to the implementations on some places instead of using the interfaces and using the IoC container to inject it but doing so would lead to too may premature abstractions at this point.