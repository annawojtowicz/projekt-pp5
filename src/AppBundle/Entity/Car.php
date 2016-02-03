<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Car
 *
 * @ORM\Table(name="car")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CarRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Car
{
    /**
     * Id poszczególnych samochodów
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * Marka poszczególnych samochodów
     * @var string
     *
     * @ORM\Column(name="brand", type="string", length=255)
     */
    private $brand;

    /**
     * Model samochodu
     * @var string
     *
     * @ORM\Column(name="model", type="string", length=255)
     */
    private $model;

    /**
     * Numer rejestracyjny
     * @var string
     *
     * @ORM\Column(name="number", type="string", length=255, unique=true)
     */
    private $number;

    /**
     *Parametry pojazdu(ilosc pasazerow i naped)
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     *Kategoria pojazdu)
     * @var string
     *
     * @ORM\Column(name="category", type="string", length=255)
     */
    private $category;

    /**
     * Cena wypozyczenia
     * @var string
     *
     * @ORM\Column(name="price", type="decimal", precision=10, scale=2)
     */
    private $price;

    /**
     * Ściezka do obrazka samochodu
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $path;

    /**
     * Zmienna ktora przechowuje obrazek w momencie przesylania go na serwer
     * @Assert\File(maxSize="6000000")
     */
    private $file;

    private $temp;

    /**
     * Relacja do tabeli Car Orders ktora przechowuje zamowienia na zlozone samochody
     * @ORM\OneToMany(targetEntity="CarOrder", mappedBy="car")
     */
    protected $carOrders;

    /**
     * Zwraca id
     *
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * ustawia markę
     * Set brand
     *
     * @param string $brand
     * @return Car
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Zwraca markę
     * Get brand
     *
     * @return string 
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Ustawia model
     * Set model
     *
     * @param string $model
     * @return Car
     */
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Pobiera model
     * Get model
     *
     * @return string 
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Ustawia nr rejestracyjny pojazdu
     * Set number
     *
     * @param string $number
     * @return Car
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Zwraca numer rejestracyjny
     * Get number
     *
     * @return string 
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Ustawia kategorię
     * Set category
     *
     * @param string $category
     * @return Car
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Zwraca kategorię pojazdu
     * Get category
     *
     * @return string 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     *
     * Ustawia cenę
     * Set price
     *
     * @param string $price
     * @return Car
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Zwraca cenę
     * Get price
     *
     * @return string 
     */
    public function getPrice()
    {
        return $this->price;
    }
    /**
     * KONSTRUKTOR
     * Constructor
     */
    public function __construct()
    {
        $this->carOrders = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Ustawia opis(parametry - ilosc pasazerow i naped)
     * Set description
     *
     * @param string $description
     * @return Car
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Zwraca opis(parametry - ilosc pasazerow i naped)
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Ustawia ściezkę do obrazka
     * Set path
     *
     * @param string $path
     * @return Car
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Zwraca ścieżkę do obrazków
     * Get path
     *
     * @return string 
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Dodaje zamówienia do listy zamowien
     * Add carOrders
     *
     * @param \AppBundle\Entity\CarOrder $carOrders
     * @return Car
     */
    public function addCarOrder(\AppBundle\Entity\CarOrder $carOrders)
    {
        $this->carOrders[] = $carOrders;

        return $this;
    }

    /**
     * Usuwanie zamowienia z listy zamowien
     * Remove carOrders
     *
     * @param \AppBundle\Entity\CarOrder $carOrders
     */
    public function removeCarOrder(\AppBundle\Entity\CarOrder $carOrders)
    {
        $this->carOrders->removeElement($carOrders);
    }

    /**
     * Zwraca zamowienie bedace na liscie zamowien
     * Get carOrders
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCarOrders()
    {
        return $this->carOrders;
    }

    public function getAbsolutePath()
    {
        return null === $this->path ? null : $this->getUploadRootDir() . '/' . $this->path;
    }

    public function getWebPath()
    {
        return null === $this->path ? null : $this->getUploadDir() . '/' . $this->path;
    }

    protected function getUploadRootDir()
    {
        // the absolute directory path where uploaded
        // documents should be saved
        return __DIR__ . '/../../../web/' . $this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return 'uploads/cars';
    }

    public function getFixturesPath()
    {
        return __DIR__ . '/../Resources/assets/cars/';
    }

    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;
        // check if we have an old image path
        if (isset($this->path)) {
            // store the old name to delete after the update
            $this->temp = $this->path;
            $this->path = null;
        } else {
            $this->path = 'initial';
        }
    }

    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload()
    {
        if (null !== $this->getFile()) {
            // do whatever you want to generate a unique filename
            $filename = sha1(uniqid(mt_rand(), true));
            $this->path = $filename . '.' . $this->getFile()->guessExtension();
        }
    }

    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload()
    {
        // the file property can be empty if the field is not required
        if (null === $this->getFile()) {
            return;
        }

        // if there is an error moving the file, an exception will
        // be automatically thrown by move(). This will properly prevent
        // the entity from being persisted to the database on error
        $this->getFile()->move($this->getUploadRootDir(), $this->path);

        // check if we have an old image
        if (isset($this->temp)) {
            // delete the old image
            unlink($this->getUploadRootDir() . '/' . $this->temp);
            // clear the temp image path
            $this->temp = null;
        }

        $this->file = null;
    }

    /**
     * @ORM\PostRemove()
     */
    public function removeUpload()
    {
        if ($file = $this->getAbsolutePath()) {
            unlink($file);
        }
    }
}
