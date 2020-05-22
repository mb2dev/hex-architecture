<?php


namespace App\UI\Controller\Catalog;


use App\Application\Query\Catalog\FindByIdHandler;
use App\Application\Query\Catalog\FindByIDQuery;
use App\UI\Controller\Shared\AbstractJsonController;
use App\UI\Presenter\Catalog\GetByIdPresenter;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class FindByIdProductController extends AbstractJsonController
{

    /**
     * @param Request $request
     * @param FindByIdHandler $query
     * @param GetByIdPresenter $presenter
     * @return JsonResponse
     */
    public function __invoke(Request $request, FindByIdHandler $query, GetByIdPresenter $presenter)
    {
        $findByIdQuery = new FindByIDQuery($request->get('id'));

        $result = $query->execute($findByIdQuery);

        if(null === $result){
            return $this->json('',JsonResponse::HTTP_NOT_FOUND);
        }

        $productDTO = $presenter->present($result);

        return $this->json($productDTO, JsonResponse::HTTP_OK);
    }

}