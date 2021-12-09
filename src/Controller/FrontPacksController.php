<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Packs;
use App\Form\PacksType;
use App\Repository\PacksRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class FrontPacksController extends AbstractController
{
    /**
     * @Route("/front/packs", name="front_packs", methods={"GET"})
     */
    public function index(PacksRepository $packsRepository): Response
    {
        return $this->render('front_packs/index.html.twig', [
            'controller_name' => 'FrontPacksController',
                'packs' => $packsRepository->findAll(),

        ]);
    }
}
