<?php

use PHPUnit\Framework\TestCase;

spl_autoload_register(function ($class_name) {
    include 'classes/' . $class_name . '.php';
});
 
class MatchFactoryTest extends TestCase
{
    private $matchFactory;
 
    protected function setUp(): void
    {
        $this->matchFactory = new MatchFactory();
    }
 
    protected function tearDown(): void
    {
        $this->matchFactory = NULL;
    }

    public function testCreateMatchFactory(): void
    {
        $this->assertContainsOnlyInstancesOf(
            MatchFactory::class,
            [new MatchFactory, new FileSaver, new GamesFactory]
        );
    }

    public function testReturnType(): void
    {
        $result = $this->matchFactory->createMatchCollection(
            ['a vs b', 'a vs c', 'b vs c'],
            ['12.06.2023', '13-06-2023', '14-06-2023', '15-06-2023', '16-06-2023', '17-06-2023' ],
            ['1', '2', '3'],
        );

        $testArr = [
            new Matches('15-06-2023', 'a vs c', '3'),
            new Matches('16-06-2023', 'a vs b', '1'),
            new Matches('17-06-2023', 'b vs c', '3'),
        ];

        $this->assertSame($result, $testArr);
    }
}
