<?php

namespace hex\Domain\Catalog\Entity;

use DateTime;

class Product
{

    private string $id;

    /**
     * @var string
     */
    private string $name;

    /**
     * @var string
     */
    private string $description;

    /**
     * @var float|string
     */
    private float $price;

    /**
     * @var DateTime
     */
    private DateTime $createdAt;

    /**
     * Product constructor.
     * @param string $uuid
     * @param string $name
     * @param string $description
     * @param string $price
     */
    public function __construct(string $uuid, string $name, string $description, string $price)
    {
        $this->id = $uuid;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->createdAt = new DateTime();
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return float|string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

}