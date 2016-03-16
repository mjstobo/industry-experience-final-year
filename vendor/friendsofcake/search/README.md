# CakePHP Search


[![Build Status](https://img.shields.io/travis/FriendsOfCake/search/master.svg?style=flat-square)](https://travis-ci.org/FriendsOfCake/search)
[![Coverage Status](https://img.shields.io/coveralls/FriendsOfCake/search/master.svg?style=flat-square)](https://coveralls.io/r/FriendsOfCake/search?branch=master)
[![Total Downloads](https://img.shields.io/packagist/dt/friendsofcake/search.svg?style=flat-square)](https://packagist.org/packages/friendsofcake/search)
[![License](https://img.shields.io/badge/license-MIT-blue.svg?style=flat-square)](https://packagist.org/packages/friendsofcake/search)

Search provides a search module for CakePHP applications.

## Requirements

The master branch has the following requirements:

* CakePHP 3.0.0 or greater.

## Installation

* Install the plugin with composer from your CakePHP Project's ROOT directory
(where composer.json file is located)
```sh
php composer.phar require friendsofcake/search "dev-master"
```

* Load the plugin by adding following to your `config/bootstrap.php`
```php
Plugin::load('Search');
```

or running command
```sh
./bin/cake plugin load Search
```

## Usage

* Add a search config method in your table
```php
use Search\Manager;

...

public function searchConfiguration()
{
    $search = new Manager($this);
    $search
    ->value('author_id', [
        'field' => $this->aliasField('author_id')
    ])
    ->like('q', [
        'before' => true,
        'after' => true,
        'field' => [$this->aliasField('title'), $this->aliasField('content')]
    ]);
    return $search;
}
```

* Add The Behavior in your initialize method
```php
public function initialize(array $config)
{
    ...
    $this->addBehavior('Search.Search');
    ...
}
```

* Example of index controller for a model `Article`
```php
public function index()
{
    $query = $this->Articles
        ->find('search', $this->Articles->filterParams($this->request->query))
        ->where(['title !=' => null])
        ->order(['Article.id' => 'asc'])
        ->contain([
            'Comments'
        ]);
    $this->set('articles', $this->paginate($query));
}
```

The `search` finder and the `filterParams()` method are dynamically provided by the
`Search` behavior.

* Then add the component search in the necessary methods (for our example index)
```php
public function index()
{
    $this->loadComponent('Search.Prg');
}
```

* Instead, you can add this in your AppController to enable component in all index methods
```php
public function initialize()
{
    parent::initialize();
    if ($this->request->action === 'index') {
        $this->loadComponent('Search.Prg');
    }
}
```

## Filtering your data
Once you have completed all the setup you can now filter your data by passing
query params in your index method. Using the Article example given above, you
could filter your articles using the following.

`example.com/articles?q=cakephp`

Would filter your list of articles to any article with "cakephp" in the `title`
or `content` field. You might choose to make a `get` form which posts the filter
directly to the url, or create links manually.

## Types

The Search plugin comes with a set of predefined search filters that allow you to
easily create the search results you need. Use:

- ``value`` to limit results to exact matches
- ``like`` to produce results containing the search query (``LIKE``)
- ``finder`` to produce results using a [(custom)](http://book.cakephp.org/3.0/en/orm/retrieving-data-and-resultsets.html#custom-find-methods) finder
- ``compare`` to produce results requiring operator comparison (
    ``>``, ``<``, ``>=`` and ``<=``)
- ``callback`` to produce results using your own custom callable function
