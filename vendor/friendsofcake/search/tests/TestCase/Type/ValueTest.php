<?php
namespace Search\Test\TestCase\Type;

use Cake\Core\Configure;
use Cake\ORM\Entity;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Search\Manager;
use Search\Type\Base;
use Search\Type\Value;

class ValueTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.Search.Articles'
    ];

    public function testProcess()
    {
        $articles = TableRegistry::get('Articles');
        $manager = new Manager($articles);
        $value = new Value('title', $manager);
        $value->args(['title' => ['test']]);
        $value->query($articles->find());
        $result = $value->process();
    }
}
