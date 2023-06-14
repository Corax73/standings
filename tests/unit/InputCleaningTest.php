<?php

use PHPUnit\Framework\TestCase;
use Table\Classes\InputCleaning;
use Table\Classes\GamesFactory;
use Table\Classes\DatesFactory;
use Table\Classes\MatchFactory;
use Table\Classes\Matches;
use Table\Classes\FileSaver;
 
class InputCleaningTest extends TestCase
{

    private $inputCleaning;
 
    protected function setUp(): void
    {
        $this->inputCleaning = new InputCleaning();
    }
 
    protected function tearDown(): void
    {
        $this->inputCleaning = NULL;
    }

    public function testCreateInputCleaning(): void
    {
        $this->assertContainsOnlyInstancesOf(
            InputCleaning::class,
            [new InputCleaning, new FileSaver, new GamesFactory]
        );
    }

    public function testReturnType(): void
    {
        $result = $this->inputCleaning->clean('a,   b1 , <br>  , <meta http-equiv="refresh" content="0;URL=http://site.ru"/>');
        $testArr = [
            'a',
            'b1 ',
            '<br>',
            '<meta http-equiv="refresh" content="0;URL=http://site.ru"/>'
        ];

        $this->assertSame($result, $testArr);
    }
}
