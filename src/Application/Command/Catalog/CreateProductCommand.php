<?php


namespace App\Application\Command\Catalog;


class CreateProductCommand
{
    /**
     * @var string
     */
    public string $name;

    /**
     * @var string
     */
    public string $description;
    /**
     * @var float
     */
    public float $price;

    /**
     * CreateProductCommand constructor.
     * @param string $name
     * @param string $description
     * @param string $price
     */
    public function __construct(string $name, string $description, string $price)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }

}