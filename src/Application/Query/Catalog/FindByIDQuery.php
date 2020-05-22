<?php


namespace App\Application\Query\Catalog;


class FindByIDQuery
{

    /**
     * @var string
     */
    public string $id;

    /**
     * FindByIDQuery constructor.
     * @param string $id
     */
    public function __construct(string $id)
    {
        $this->id = $id;
    }

}