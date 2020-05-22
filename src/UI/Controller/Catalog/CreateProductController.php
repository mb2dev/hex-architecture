<?php


namespace App\UI\Controller\Catalog;

use App\Application\Command\Catalog\CreateProductCommand;
use App\Application\Command\Catalog\CreateProductHandler;
use App\UI\Controller\Shared\AbstractJsonController;
use App\UI\DTO\Catalog\ProductDTO;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\HttpFoundation\Request;


class CreateProductController extends AbstractJsonController
{

    /**
     * @param Request $request
     * @param CreateProductHandler $handler
     * @return JsonResponse
     */
    public function __invoke(Request $request, CreateProductHandler $handler)
    {
        /** @var ProductDTO $productDTO */
       $productDTO = $this->serializer->deserialize($request->getContent(), ProductDTO::class, JsonEncoder::FORMAT);
       $this->validate($productDTO);

       $request = new CreateProductCommand(
           $productDTO->name,
           $productDTO->description,
           $productDTO->price
       );

        $handler->handle($request);

        return $this->json(['id' => $handler->getIdentifier()], JsonResponse::HTTP_CREATED);
    }
}