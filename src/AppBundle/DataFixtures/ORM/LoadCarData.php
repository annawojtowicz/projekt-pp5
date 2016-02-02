<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Car;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\File\File;

class LoadCarData implements FixtureInterface
{
    private $path;

    public function __construct()
    {
        $this->path = __DIR__ . '/../../Resources/assets/cars/';
    }

    public function load(ObjectManager $manager)
    {
        /* CAR START */
        $car = new Car();
        $car->setBrand('Audi');
        $car->setModel('Ninja');
        $car->setNumber('KRA5A105');
        $car->setPrice(100);
        $car->setDescription("
        <dd>Prędkośc maksymalna</dd>
        <dt>100km/h</dt>
        <dd>Ilość pasażerów</dd>
        <dt>5</dt>
        <dd>Napęd</dd>
        <dt>na 2 koła</dt>
        ");
        $car->setCategory("Osobowe");


        $file = new File($this->path . '1.jpg');
        $car->setFile($file);

        $manager->persist($car);


        $car = new Car();
        $car->setBrand('Lada');
        $car->setModel('Predator');
        $car->setNumber('KRA101010');
        $car->setPrice(70);
        $car->setDescription("
        <dd>Prędkośc maksymalna</dd>
        <dt>10km/h</dt>
        <dd>Ilość pasażerów</dd>
        <dt>2</dt>
        <dd>Napęd</dd>
        <dt>na 4 kopyta</dt>
        ");
        $car->setCategory("Terenowe");


        $file = new File($this->path . '2.jpg');
        $car->setFile($file);

        $manager->persist($car);


        $car = new Car();
        $car->setBrand('Opel');
        $car->setModel('Stonoga');
        $car->setNumber('KRA5A107');
        $car->setPrice(150);
        $car->setDescription("
        <dd>Prędkośc maksymalna</dd>
        <dt>300km/h</dt>
        <dd>Ilość pasażerów</dd>
        <dt>5</dt>
        <dd>Napęd</dd>
        <dt>na 8 kół</dt>
        ");
        $car->setCategory("Osobowe");


        $file = new File($this->path . '3.jpg');
        $car->setFile($file);

        $manager->persist($car);


        $car = new Car();
        $car->setBrand('Subaru');
        $car->setModel('Impreza');
        $car->setNumber('KRA5A100');
        $car->setPrice(30);
        $car->setDescription("
        <dd>Prędkośc maksymalna</dd>
        <dt>25km/h</dt>
        <dd>Ilość pasażerów</dd>
        <dt>5</dt>
        <dd>Napęd</dd>
        <dt>na 2 koła</dt>
        ");
        $car->setCategory("Osobowe");


        $file = new File($this->path . '4.jpg');
        $car->setFile($file);

        $manager->persist($car);


        $car = new Car();
        $car->setBrand('Rolls-Royce');
        $car->setModel('DeLuxe');
        $car->setNumber('KRA5A005');
        $car->setPrice(1000);
        $car->setDescription("
        <dd>Prędkośc maksymalna</dd>
        <dt>105km/h</dt>
        <dd>Ilość pasażerów</dd>
        <dt>10</dt>
        <dd>Napęd</dd>
        <dt>na 4 koła</dt>
        ");
        $car->setCategory("Terenowe");


        $file = new File($this->path . '5.jpg');
        $car->setFile($file);

        $manager->persist($car);
        /* CAR END */

        $manager->flush();
    }
}