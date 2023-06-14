<?php

use PHPUnit\Framework\TestCase;

use Table\Classes\InputCleaning;
use Table\Classes\GamesFactory;
use Table\Classes\DatesFactory;
use Table\Classes\MatchFactory;
use Table\Classes\Matches;
use Table\Classes\FileSaver;
 
class FileSaverTest extends TestCase
{

    private $fileSaver;
 
    protected function setUp(): void
    {
        $this->fileSaver = new FileSaver();
    }
 
    protected function tearDown(): void
    {
        $this->fileSaver = NULL;
    }

    public function testCreateFileSaver(): void
    {
        $this->assertContainsOnlyInstancesOf(
            FileSaver::class,
            [new DatesFactory, new FileSaver, new InputCleaning]
        );
    }

    public function testReturnType(): void
    {
        $matches[] = new Matches('12.06.2023', 'a vs b', 's1');
        $matches[] = new Matches('13.06.2023', 'a vs c', 's2');
        $matches[] = new Matches('14.06.2023', 'c vs b', 's3');
        
        $result = $this->fileSaver->saveResult($matches);

        $testArr = 'output/' . date('Y-m-d-H-i-s') . '.csv';

        $this->assertSame($result, $testArr);
    }

    public function testFileExists()
    {
        $matches[] = new Matches('12.06.2023', 'a vs b', 's1');
        $matches[] = new Matches('13.06.2023', 'a vs c', 's2');
        $matches[] = new Matches('14.06.2023', 'c vs b', 's3');
        
        $this->fileSaver->saveResult($matches);

        $testArr = 'output/' . date('Y-m-d-H-i-s') . '.csv';
        $this->assertFileExists($testArr);
    }
}
