# The task

Create a CLI script which will read JSON based data from a specific endpoint via HTTP. The script will contain several
subcommands to filter and output the loaded data. The commands should be:

- Find objects by price range (given price_from and price_to as arguments).
- Find objects by a certain sub-object definition.

All given sub-commands should only output quantity of objects that are in stock.

For example:

```sh
php artisan get:number count_by_price_range 12.00 145.80
php artisan get:number count_by_vendor_id 42
```

### Interfaces

Implement the ReaderInterface for fetching the JSON HTTP endpoint and thus work with the OfferCollectionInterface and 
OfferInterface on the loaded data (see below). Feel free to adjust or extend interfaces if needed.

```sh
/**
* The interface provides the contract for different readers
* E.g. it can be XML/JSON Remote Endpoint, or CSV/JSON/XML local files
*/
interface ReaderInterface {
    /**
    * Read in incoming data and parse to objects
    */
    public function read(string $input): OfferCollectionInterface;
}
```

```sh 
/**
* Interface of Data Transfer Object, that represents external JSON data
*/
interface OfferInterface {}
```

```sh 
/**
* Interface for The Collection class that contains Offers
*/
interface OfferCollectionInterface {
    public function get(int $index): OfferInterface;
    public function getIterator(): Iterator;
}
```

### Json example

```sh 
{
    "offers": [
        {
            "offer_id": 123,
            "product_title": "Coffee machine",
            "vendor_id": 35,
            "price": 390.4
        },
        {
            "offer_id": 124,
            "product_title": "Napkins",
            "vendor_id": 35,
            "price": 15.5
        },
        {
            "offer_id": 125,
            "product_title": "Chair",
            "vendor_id": 84,
            "price": 230.0
        }
    ]
}
```


