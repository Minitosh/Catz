<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ApiController extends AbstractController
{
    /**
     * @Route("/api/v1/search", name="api_search")
     */
    public function search(Request $request)
    {
        $json = $request->getContent();
        $data = json_decode($json);
        $searchContent = $data->content;

        return new JsonResponse([
            "status" => "ok",
            "data" => [
                $searchContent
            ]
        ]);
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
