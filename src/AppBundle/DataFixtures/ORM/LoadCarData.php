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
        $car = new Car();
        $car->setBrand('Audi');
        $car->setModel('A3');
        $car->setNumber('KRA5A105');
        $car->setPrice(100);
        $car->setDescription("Opis");
        $car->setCategory("Osobowe");

//        $file = new UploadedFile($this->path . 'audi-a3.jpg', 'Audi A3', null, null, null, true);
        $file = new File($this->path . 'audi-a3.jpg');
        $car->setFile($file);

        $manager->persist($car);
        $manager->flush();
    }
}