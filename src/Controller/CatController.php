<?php

namespace App\Controller;

use App\Entity\Cat;
use App\Form\CatType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class CatController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        $catRepo = $this->getDoctrine()->getRepository(Cat::class);
        $cats = $catRepo->findAll();
        return $this->render('cat/index.html.twig', [
            "cats" => $cats
        ]);
    }

    /**
     * @Route("/{id}", name="cat_detail", requirements={"id": "\d+"}, methods={"GET"})
     */
    public function detail($id, Request $request)
    {
        $catRepo = $this->getDoctrine()->getRepository(Cat::class);
        $cat = $catRepo->find($id);

        return $this->render('cat/detail.html.twig', [
            "cat" => $cat
        ]);
    }

    /**
     * @Route("/add", name="cat_add")
     */
    public function addCat(Request $request)
    {
       $cat = new Cat();
       $catForm = $this->createForm(CatType::class, $cat);

       $catForm->handleRequest($request);

       if ($catForm->isSubmitted() && $catForm->isValid()){
           
       }
    }
}
