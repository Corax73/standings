<?php

use PHPUnit\Framework\TestCase;

spl_autoload_register(function ($class_name) {
    include 'classes/' . $class_name . '.php';
});
 
class DatesFactoryTest extends TestCase
{

    private $datesFactory;
 
    protected function setUp(): void
    {

        $this -> datesFactory = new DatesFactory();

    }
 
    protected function tearDown(): void
    {

        $this -> datesFactory = NULL;

    }

    public function testCreateDatesFactory(): void
    {
        $this->assertContainsOnlyInstancesOf(
            DatesFactory::class,
            [new DatesFactory, new FileSaver, new InputCleaning]
        );
    }

    public function testReturnType(): void
    {
        $result = $this -> datesFactory -> createDatesCollection('2023-06-12', 'P1D', '2023-06-14');
        $testArr = [
            '12.06.2023',
            '13-06-2023'
        ];

        $this->assertSame($result, $testArr);
    }
}
