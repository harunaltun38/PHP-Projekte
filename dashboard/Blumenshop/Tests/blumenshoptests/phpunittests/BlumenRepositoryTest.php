<?php


use PHPUnit\Framework\TestCase;

require 'C:\xampp2\htdocs\dashboard\Blumenshop\Tests\blumenshoptests\phpunittests\MockDatabase.php';

class BlumenRepositoryTest extends TestCase
{
    /**
     * @var BlumenRepository
     */
    private $blumenrepository;

    /**
     * @var MockDatabase
     */
    private $database;

    public function setUp(): void
    {
        $this->database = new MockDatabase();
        $this->blumenrepository = new BlumenRepository($this->database);
    }

    public function testgetAllBlumen()
    {
        $name = 'Rose';
        $preis = '23.2';
        $kriterienInString = 'Farbe';
        $werte = 'rot';
        $sql = 'INSERT INTO blumen(name, preis, attribut, wert) VALUES (:name, :preis, :kriterienInString,:werte)';
        $stmt = $this->database->prepare($sql);
        $stmt->execute(['name' => $name, 'preis' => $preis, 'kriterienInString' => $kriterienInString, 'werte' => $werte]);
        $result = $this->blumenrepository->getAllBlumen();

        foreach ($result as $blumen => $blume) {

            $namederBlume = $blume['name'];
        }
        $this->assertEquals($namederBlume, 'Rose');
    }
    protected function getTearDownOperation() {
        parent::tearDown();
      //  return \PHPUnit\DbUnit\Operation\Factory::TRUNCATE();
    }

}