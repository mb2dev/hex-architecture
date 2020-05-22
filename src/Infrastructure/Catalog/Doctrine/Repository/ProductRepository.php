<?php


namespace App\Infrastructure\Catalog\Doctrine\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;
use hex\Domain\Catalog\Entity\Product;
use hex\Domain\Catalog\Gateway\ProductGateway;

class ProductRepository extends  ServiceEntityRepository implements ProductGateway
{

    /**
     * ProductRepository constructor.
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Product::class);
    }

    /**
     * @param Product $product
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function create(Product $product): void
    {
       $this->_em->persist($product);
       $this->_em->flush();
    }

    /**
     * @param $id
     * @return object
     */
    public function findProductById($id)
    {
       $product = $this->find($id);

       if(null === $product){
           return null;
       }

       return $product;
    }
}