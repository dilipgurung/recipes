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

### API Resources
- [GET /recipes](#get-recipes)
- [GET /recipes/[id]](#get-recipesid)
- [POST /recipes](#post-recipes)
- [PATCH /recipes/[id]](#patch-recipesid)
- [GET /recipes/[id]/ratings](#get-recipesidratings)
- [POST /recipes/[id]/ratings](#post-recipesidratings)


### GET /recipes
Example: http://localhost:8000/api/v1/recipes

Response body:

    {
        "data": [
            {
                "id": 1,
                "box_type": "vegetarian",
                "title": "Sweet Chilli and Lime Beef on a Crunchy Fresh Noodle Salad",
                "slug": "sweet-chilli-and-lime-beef-on-a-crunchy-fresh-noodle-salad",
                "short_title": "",
                "marketing_description": "Here we've used onglet steak which is an extra flavoursome cut of beef that should never be cooked past medium rare. So if you're a fan of well done steak, this one may not be for you. However, if you love rare steak and fancy trying a new cut, please be",
                "calories_kcal": 401,
                "protein_grams": 12,
                "fat_grams": 35,
                "carbs_grams": 0,
                "bulletpoint1": "",
                "bulletpoint2": "",
                "bulletpoint3": "",
                "recipe_diet_type_id": "meat",
                "season": "all",
                "base": "noodles",
                "protein_source": "beef",
                "preparation_time_minutes": 35,
                "shelf_life_days": 4,
                "equipment_needed": "Appetite",
                "origin_country": "Great Britain",
                "recipe_cuisine": "asian",
                "in_your_box": "",
                "gousto_reference": "59",
                "created_at": "2017-05-25 12:03:58",
                "updated_at": "2017-05-25 12:03:58"
            }
        ],
        "meta": {
                "pagination": {
                "total": 10,
                "count": 1,
                "per_page": 1,
                "current_page": 1,
                "total_pages": 10,
                "links": {
                    "next": "http://localhost:8000/api/v1/recipes?per_page=1&page=2"
                }
            }
        }
    }

### GET /recipes/[id]
Example: http://localhost:8000/api/v1/recipes/[id]

Response body:

    {
        "data": {
            "id": 1,
            "box_type": "vegetarian",
            "title": "Sweet Chilli and Lime Beef on a Crunchy Fresh Noodle Salad",
            "slug": "sweet-chilli-and-lime-beef-on-a-crunchy-fresh-noodle-salad",
            "short_title": "",
            "marketing_description": "Here we've used onglet steak which is an extra flavoursome cut of beef that should never be cooked past medium rare. So if you're a fan of well done steak, this one may not be for you. However, if you love rare steak and fancy trying a new cut, please be",
            "calories_kcal": 401,
            "protein_grams": 12,
            "fat_grams": 35,
            "carbs_grams": 0,
            "bulletpoint1": "",
            "bulletpoint2": "",
            "bulletpoint3": "",
            "recipe_diet_type_id": "meat",
            "season": "all",
            "base": "noodles",
            "protein_source": "beef",
            "preparation_time_minutes": 35,
            "shelf_life_days": 4,
            "equipment_needed": "Appetite",
            "origin_country": "Great Britain",
            "recipe_cuisine": "asian",
            "in_your_box": "",
            "gousto_reference": "59",
            "created_at": "2017-05-25 12:03:58",
            "updated_at": "2017-05-25 12:03:58"
        }
    }

### POST /recipes
Example: http://localhost:8000/api/v1/recipes

Request body:

    {
        "box_type": "vegetarian",
        "title": "Sweet Chilli and Lime Beef on a Crunchy Fresh Noodle Salad",
        "slug": "sweet-chilli-and-lime-beef-on-a-crunchy-fresh-noodle-salad",
        "short_title": "",
        "marketing_description": "Here we've used onglet steak which is an extra flavoursome cut of beef that should never be cooked past medium rare. So if you're a fan of well done steak, this one may not be for you. However, if you love rare steak and fancy trying a new cut, please be",
        "calories_kcal": 401,
        "protein_grams": 12,
        "fat_grams": 35,
        "carbs_grams": 0,
        "bulletpoint1": "",
        "bulletpoint2": "",
        "bulletpoint3": "",
        "recipe_diet_type_id": "meat",
        "season": "all",
        "base": "noodles",
        "protein_source": "beef",
        "preparation_time_minutes": 35,
        "shelf_life_days": 4,
        "equipment_needed": "Appetite",
        "origin_country": "Great Britain",
        "recipe_cuisine": "asian",
        "in_your_box": "",
        "gousto_reference": "59",
        "created_at": "2017-05-25 12:03:58",
        "updated_at": "2017-05-25 12:03:58"
    }

### PATCH /recipes/[id]
Example: http://localhost:8000/api/v1/recipes/[id]

Request body:

    {
        "box_type": "gourmet",
        "season": "all",
        "base": "noodles",
        "protein_source": "beef"
    }

### GET /recipes/[id]/ratings
Example: http://localhost:8000/api/v1/recipes/[id]/ratings

Response body:

    {
        "data": [
            {
                "id": 1,
                "recipe_id": 1,
                "rating": 5,
                "created_at": "2017-05-25 13:41:55",
                "updated_at": "2017-05-25 13:41:55"
            },
            {
                "id": 2,
                "recipe_id": 1,
                "rating": 5,
                "created_at": "2017-05-25 13:41:57",
                "updated_at": "2017-05-25 13:41:57"
            }
        ],
        "meta": {
            "pagination": {
                "total": 2,
                "count": 2,
                "per_page": 10,
                "current_page": 1,
                "total_pages": 1,
                "links": []
            }
        }
    }

### POST /recipes/[id]/ratings
Example: http://localhost:8000/api/v1/recipes/[id]/ratings

Request body:

    {
        "rating":5
    }

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
- The API uses [Fractal](http://fractal.thephpleague.com/) as a presentation and transformation layer. Data transformers are not tied to the underlying Data Layer so data could be presented in different ways based on different consumers. It also makes the API much more resilient to the underlying data changes.

#### Trade-Offs:
- Also I have tried to keep the codebase as simple as possible. In doing so, I have omitted what would be trivial test cases
- I have deliberately coded to the implementations in some places instead of using the interfaces and using the IoC container to inject it but doing so in my opinion would lead to too much premature abstractions at this point.
