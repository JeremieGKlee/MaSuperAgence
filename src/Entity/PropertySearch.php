<?php
namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

class PropertySearch
{
    // const SELECTTYPEHEAT =
    // [
    //     1 => 'Electrique',
    //     2 => 'Gaz'
    // ];

    // const TYPESORT =
    // [
    //     1 => 'Maison individuelle',
    //     2 => 'Appartement',
    //     3 => 'Immeuble',
    //     4 => 'Garage',
    //     5 => 'Terrain nu'
    // ];

    /**
     * @var int|null
     * @Assert\Range(min=20000, max=10000000)
     */
    private $maxPrice;

    /**
     * @var int|null
     * @Assert\Range(min=10, max=400)
     */
    private $minSurface;

    /**
     * @var int|null
     * @Assert\Range(min=1, max=20)
     */
    private $minRooms;

    /**
     * @var int|null
     * @Assert\Range(min=1, max=20)
     */
    private $minBedrooms;

    /**
     * @var int|null
     */
    private $selectTypeHeat;

    /**
     * @var int|null
     * @Assert\Range(min=0, max=20)
     */
    private $maxFloor;

    /**
     * @var string|null
     */
    private $selectCity;

    /**
     * @var string|null
     */
    private $selectPostalCode;

    /**
     * @var int|null
     */
    private $typeSort;

    /**
     * @var ArrayCollection
     */
    private $options;

    public function __construct()
    {
        $this->options = new ArrayCollection();
    }

    /**
     * Get the value of maxPrice
     *
     * @return  int|null
     */ 
    public function getMaxPrice(): ?int
    {
        return $this->maxPrice;
    }

    /**
     * Set the value of maxPrice
     *
     * @param  int|null  $maxPrice
     *
     * @return  self
     */ 
    public function setMaxPrice(int $maxPrice)
    {
        $this->maxPrice = $maxPrice;

        return $this;
    }

    /**
     * Get the value of minSurface
     *
     * @return  int|null
     */ 
    public function getMinSurface(): ?int
    {
        return $this->minSurface;
    }

    /**
     * Set the value of minSurface
     *
     * @param  int|null  $minSurface
     *
     * @return  self
     */ 
    public function setMinSurface(int $minSurface)
    {
        $this->minSurface = $minSurface;

        return $this;
    }

    /**
     * Get the value of minRooms
     *
     * @return  int|null
     */ 
    public function getMinRooms(): ?int
    {
        return $this->minRooms;
    }

    /**
     * Set the value of minRooms
     *
     * @param  int|null  $minRooms
     *
     * @return  self
     */ 
    public function setMinRooms(int $minRooms)
    {
        $this->minRooms = $minRooms;

        return $this;
    }

    /**
     * Get the value of minBedrooms
     *
     * @return  int|null
     */ 
    public function getMinBedrooms(): ?int
    {
        return $this->minBedrooms;
    }

    /**
     * Set the value of minBedrooms
     *
     * @param  int|null  $minBedrooms
     *
     * @return  self
     */ 
    public function setMinBedrooms(int $minBedrooms)
    {
        $this->minBedrooms = $minBedrooms;

        return $this;
    }

    /**
     * Get the value of selectTypeHeat
     *
     * @return  int|null
     */ 
    public function getSelectTypeHeat()
    {
        return $this->selectTypeHeat;
    }

    /**
     * Set the value of selectTypeHeat
     *
     * @param  int|null  $selectTypeHeat
     *
     * @return  self
     */ 
    public function setSelectTypeHeat($selectTypeHeat)
    {
        $this->selectTypeHeat = $selectTypeHeat;

        return $this;
    }

    // public function getTypeHeatType(): string
    // {
    //     return self::SELECTTYPEHEAT [$this->selectTypeHeat];
    // }

    /**
     * Get the value of maxFloor
     *
     * @return  int|null
     */ 
    public function getMaxFloor(): ?int
    {
        return $this->maxFloor;
    }

    /**
     * Set the value of maxFloor
     *
     * @param  int|null  $maxFloor
     *
     * @return  self
     */ 
    public function setMaxFloor(int $maxFloor)
    {
        $this->maxFloor = $maxFloor;

        return $this;
    }

    /**
     * Get the value of selectCity
     *
     * @return  string|null
     */ 
    public function getSelectCity(): ?string
    {
        return $this->selectCity;
    }

    /**
     * Set the value of selectCity
     *
     * @param  string|null  $selectCity
     *
     * @return  self
     */ 
    public function setSelectCity(string $selectCity)
    {
        $this->selectCity = $selectCity;

        return $this;
    }

    /**
     * Get the value of selectPostalCode
     *
     * @return  string|null
     */ 
    public function getSelectPostalCode(): ?string
    {
        return $this->selectPostalCode;
    }

    /**
     * Set the value of selectPostalCode
     *
     * @param  string|null  $selectPostalCode
     *
     * @return  self
     */ 
    public function setSelectPostalCode(string $selectPostalCode)
    {
        $this->selectPostalCode = $selectPostalCode;

        return $this;
    }

    /**
     * Get the value of typeSort
     *
     * @return  int|null
     */ 
    public function getTypeSort(): ?string
    {
        return $this->typeSort;
    }

    /**
     * Set the value of typeSort
     *
     * @param  int|null  $typeSort
     *
     * @return  self
     */ 
    public function setTypeSort(int $typeSort)
    {
        $this->typeSort = $typeSort;

        return $this;
    }

    // public function getTypeSortSelect(): int
    // {
    //     return self::TYPESORT [$this->typeSort];
    // }

    /**
     * Get the value of options
     *
     * @return  ArrayCollection
     */ 
    public function getOptions(): ArrayCollection
    {
        return $this->options;
    }

    /**
     * Set the value of options
     *
     * @param  ArrayCollection  $options
     *
     * @return  self
     */ 
    public function setOptions(ArrayCollection $options): void
    {
        $this->options = $options;
    }
}