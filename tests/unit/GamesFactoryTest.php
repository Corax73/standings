<?php

use PHPUnit\Framework\TestCase;

use Table\Classes\InputCleaning;
use Table\Classes\GamesFactory;
use Table\Classes\DatesFactory;
use Table\Classes\MatchFactory;
use Table\Classes\Matches;
use Table\Classes\FileSaver;
 
class GamesFactoryTest extends TestCase
{

    private $gamesFactory;
 
    protected function setUp(): void
    {
        $this->gamesFactory = new GamesFactory();
    }
 
    protected function tearDown(): void
    {
        $this->gamesFactory = NULL;
    }

    public function testCreateInputCleaning(): void
    {
        $this->assertContainsOnlyInstancesOf(
            GamesFactory::class,
            [new InputCleaning, new FileSaver, new GamesFactory]
        );
    }

    public function testReturnType(): void
    {
        $result = $this->gamesFactory->createGamesCollection(['a', 'b', 'c']);
        $testArr = ['a vs b', 'a vs c', 'b vs c'];

        $this->assertSame($result, $testArr);
    }
}
