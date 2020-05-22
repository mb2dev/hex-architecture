<?php


namespace App\UI\DTO\Catalog;

use Symfony\Component\Validator\Constraints as Assert;

class ProductDTO
{

    /**
     * @var string
     */
    public string $id;

    /**
     * @Assert\NotNull()
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @Assert\Length(max=255)
     */
    public $name;

    /**
     * @Assert\Type("string")
     * @Assert\Length(max=255)
     */
    public $description;


    /**
     * @Assert\Type("numeric")
     * @Assert\NotNull()
     * @Assert\NotBlank()
     */
    public $price;

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
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price): void
    {
        $this->price = $price;
    }



}