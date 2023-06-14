<?php

use PHPUnit\Framework\TestCase;
use Table\Classes\InputCleaning;
use Table\Classes\GamesFactory;
use Table\Classes\DatesFactory;
use Table\Classes\MatchFactory;
use Table\Classes\Matches;
use Table\Classes\FileSaver;


 
class MatchesTest extends TestCase
{

    private $matches;
 
    protected function setUp(): void
    {
        $this->matches = new Matches('16.06.2023', 'c vs d', '2');
    }
 
    protected function tearDown(): void
    {
        $this->matches = NULL;
    }

    public function testCreateMatches(): void
    {
        $this->assertContainsOnlyInstancesOf(
            Matches::class,
            [new Matches('16.06.2023', 'c vs d', '2')]
        );
    }

    public function testGetDate()
    {
        $this->assertSame('16.06.2023', $this->matches->getDate());
    }

    public function testDatePropertyAccess()
    {
        $this->assertSame('16.06.2023', $this->matches->date);
    }

    public function testGetTeams()
    {
        $this->assertSame('c vs d', $this->matches->getTeams());
    }

    public function testGetStadium()
    {
        $this->assertSame('2', $this->matches->getStadium());
    }

    public function test_process()
    {
        $user = $this->createMock(Matches::class);
        $this->assertInstanceOf(Matches::class, $user);
    }
}
