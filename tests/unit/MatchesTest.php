<?php

use PHPUnit\Framework\TestCase;

spl_autoload_register(function ($class_name) {
    include 'classes/' . $class_name . '.php';
});
 
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
            [new Matches('16.06.2023', 'c vs d', '2'), new FileSaver, new GamesFactory]
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
}
