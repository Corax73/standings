<?php

use PHPUnit\Framework\TestCase;

spl_autoload_register(function ($class_name) {
    include 'classes/' . $class_name . '.php';
});
 
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
