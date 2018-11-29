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

**Using global queries**

The following global queries are supported:

#### `columns`

```php
$columns = [
    'ID',
    'Name',
    'Icon
];

$api->columns($columns)->content->Item()->list();
```

#### `language`

```php
$api->language('en')->content->Item()->list();
```

#### `snake_case`

```php
$api->snakeCase()->content->Item()->list();
```

#### `tags`

```php
$tags = [
    'one',
    'two',
    'three'
];
$api->tags($tags)->content->Item()->list();
```

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

The following search modify methods are available:
```php
$api->search->column($column);
$api->search->algorithm($searchStringAlgorithm);
$api->search->page($number);
$api->search->sort($field, $order);
$api->search->limit($limit);
$api->search->columns($columns);
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
