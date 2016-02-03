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

    /**
     * Dane samochodow
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        /* CAR START */
        $car = new Car();
        $car->setBrand('Audi');
        $car->setModel('Ninja');
        $car->setNumber('KRA5A105');
        $car->setPrice(100);
        $car->setDescription("
        <dt>Prędkośc maksymalna</dt>
        <dd>100km/h</dd>
        <dt>Ilość pasażerów</dt>
        <dd>5</dd>
        <dt>Napęd</dt>
        <dd>na 2 koła</dd>
        ");
        $car->setCategory("Osobowe");

        copy($car->getFixturesPath() . '1.jpg', $car->getFixturesPath() . '1-copy.jpg');
        $file = new UploadedFile($this->path . '1-copy.jpg', $car->getBrand().' '.$car->getModel(), 'image/jpg', null, null, true);
        $car->setFile($file);

        $manager->persist($car);


        $car = new Car();
        $car->setBrand('Lada');
        $car->setModel('Predator');
        $car->setNumber('KRA101010');
        $car->setPrice(70);
        $car->setDescription("
        <dt>Prędkośc maksymalna</dt>
        <dd>10km/h</dd>
        <dt>Ilość pasażerów</dt>
        <dd>2</dd>
        <dt>Napęd</dt>
        <dd>na 4 kopyta</dd>
        ");
        $car->setCategory("Terenowe");

        copy($car->getFixturesPath() . '2.jpg', $car->getFixturesPath() . '2-copy.jpg');
        $file = new UploadedFile($this->path . '2-copy.jpg', $car->getBrand().' '.$car->getModel(), 'image/jpeg', null, null, true);
        $car->setFile($file);

        $manager->persist($car);


        $car = new Car();
        $car->setBrand('Opel');
        $car->setModel('Stonoga');
        $car->setNumber('KRA5A107');
        $car->setPrice(150);
        $car->setDescription("
        <dt>Prędkośc maksymalna</dt>
        <dd>300km/h</dd>
        <dt>Ilość pasażerów</dt>
        <dd>5</dd>
        <dt>Napęd</dt>
        <dd>na 8 kół</dd>
        ");
        $car->setCategory("Osobowe");

        copy($car->getFixturesPath() . '3.jpg', $car->getFixturesPath() . '3-copy.jpg');
        $file = new UploadedFile($this->path . '3-copy.jpg', $car->getBrand().' '.$car->getModel(), 'image/jpeg', null, null, true);
        $car->setFile($file);

        $manager->persist($car);


        $car = new Car();
        $car->setBrand('Subaru');
        $car->setModel('Impreza');
        $car->setNumber('KRA5A100');
        $car->setPrice(30);
        $car->setDescription("
        <dt>Prędkośc maksymalna</dt>
        <dd>25km/h</dd>
        <dt>Ilość pasażerów</dt>
        <dd>5</dd>
        <dt>Napęd</dt>
        <dd>na 2 koła</dd>
        ");
        $car->setCategory("Osobowe");

        copy($car->getFixturesPath() . '4.jpg', $car->getFixturesPath() . '4-copy.jpg');
        $file = new UploadedFile($this->path . '4-copy.jpg', $car->getBrand().' '.$car->getModel(), 'image/jpeg', null, null, true);
        $car->setFile($file);

        $manager->persist($car);


        $car = new Car();
        $car->setBrand('Rolls-Royce');
        $car->setModel('DeLuxe');
        $car->setNumber('KRA5A005');
        $car->setPrice(1000);
        $car->setDescription("
        <dt>Prędkośc maksymalna</dt>
        <dd>105km/h</dd>
        <dt>Ilość pasażerów</dt>
        <dd>10</dd>
        <dt>Napęd</dt>
        <dd>na 4 koła</dd>
        ");
        $car->setCategory("Terenowe");

        copy($car->getFixturesPath() . '5.jpg', $car->getFixturesPath() . '5-copy.jpg');
        $file = new UploadedFile($this->path . '5-copy.jpg', $car->getBrand().' '.$car->getModel(), 'image/jpeg', null, null, true);
        $car->setFile($file);

        $manager->persist($car);
        /* CAR END */

        $manager->flush();
    }
}