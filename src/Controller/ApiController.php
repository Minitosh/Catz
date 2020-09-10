<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CatRepository;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class ApiController extends AbstractController
{
    /**
     * @Route("/api/v1/search", name="api_search")
     */
    public function search(Request $request, CatRepository $catRepository)
    {
        $keyword = $request->query->get('keyword');
        $foundCats = $catRepository->search($keyword);

        var_dump($foundCats);

        foreach($foundCats as &$foundCat){
            $detailUrl = $this->generateUrl('cat_detail', ['id' => $foundCat->getId()]);
            $foundCat->setUrl($detailUrl);
        }

        $serializer = new Serializer([new ObjectNormalizer()], [new JsonEncoder()]);
        $jsonContent = $serializer->serialize(['cats' => $foundCats], 'json', ['ignored_attributes' => ['dateCreated']]);

        return JsonResponse::fromJsonString($jsonContent);
    }

    /**
     * @Route("/api/v1/cart/add", name="api_add_to_cart")
     */
    public function addToCart(Request $request)
    {
        //requête à la bdd
        $json = $request->getContent();
        $data = json_decode($json);
        $catId = $data->id;


        return new JsonResponse([
            "status" => "ok",
            "data" => [

            ]
        ]);
    }
}
