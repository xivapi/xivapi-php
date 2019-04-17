# XIVAPI PHP Client

This provides a very simple client to interact with the XIVAPI and obtain dynamic objects in return.

## Getting Started

This library requires PHP 7.2+

Install vis composer: https://packagist.org/packages/xivapi/xivapi-php

- `composer require xivapi/xivapi-php`

## Usage

The `xivapi-php` library is a very simple wrapper around Guzzle.

**Initialize**
```php
$api = new \XIVAPI\XIVAPI();
```

**Setting your key if you have one**

You can set the environment variable: `XIVAPI_KEY` Or via:

```php
$api->environment->key('my_api_key');
```

**Using Queries (excludes Search)**

The API has a whole host of queries to allow you to customise the response, these are all passed to the API before you request data. Search has some extra queries that are hard coded as these interact with Elastic Search.

- `limit=250` - https://xivapi.com/docs/Content#limit
- `ids=1,4,8,20` - https://xivapi.com/docs/Content#ids
- `minify=1` - https://xivapi.com/docs/Content#minify
- `language=en` - https://xivapi.com/docs/Welcome#language
- `snake_case` - https://xivapi.com/docs/Welcome#snake_case
- `columns` - https://xivapi.com/docs/Welcome#columns
- `tags` - https://xivapi.com/docs/Welcome#tags

### Content

Content is dynamically driven based on what content is available in the game files using magic methods for invoking the different types, eg:

- `item()`
- `instanceContent()`
- `tripleTriadCard()`

```php
$api->content->[contentName]()->list();
$api->content->[contentName]()->one($id);

// examples
$item = $api->content->item()->one(1675);
$action = $api->content->action()->one(127);
$instances = $api->content->instanceContent()->list();

// non dynamic methods:
$api->content->list();
$api->content->servers();
$api->content->serversByDataCenter();
```

### Search

```php
$api->search->find($string)->results();
```

Search modification methods are:
```php
// The column to search on
$api->search->findColumn($column);

// the algorithm to use
$api->search->findAlgorithm($searchStringAlgorithm);

// the page to start on
$api->search->page($number);

// sorting order
$api->search->sort($field, $order);

// limit results
$api->search->limit($limit);

// columns in the results
$api->search->columns($columns);

// change elastics filter bool condition (eg: should, must, must_not)
$api->search->bool($bool);
```

Filters are additive, multiple can be added, eg:

```php
$api->search
    ->filter('LevelItem', 30, SearchFilters::GREATER_THAN)
    ->filter('ItemSearchCategory', 10, SearchFilters::GREATER_THAN_OR_EQUAL_TO);
```


### Character

```php
$api->character->search($name, $server, $page);
$api->character->get($id, $data = [], $extended = false);
$api->character->verify($id);
$api->character->update($id);
$api->character->delete($id);
```

### Free Company

```php
$api->freecompany->search($name, $server, $page);
$api->freecompany->get($id, $data = []);
$api->freecompany->update($id);
$api->freecompany->delete($id);
```

### Linkshell

```php
$api->linkshell->search($name, $server, $page);
$api->linkshell->get($id, $data = []);
$api->linkshell->update($id);
$api->linkshell->delete($id);
```

### PvPTeam

```php
$api->pvpteam->search($name, $server, $page);
$api->pvpteam->get($id, $data = []);
$api->pvpteam->update($id);
$api->pvpteam->delete($id);
```

> Note: The `_private` API is for internal use within XIVAPI and MogBoard. It cannot be used publicly and is locked behind an access key.
