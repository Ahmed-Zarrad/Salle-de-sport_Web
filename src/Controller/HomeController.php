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


class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home", methods={"GET"})
     */
    public function index(PacksRepository $packsRepository): Response
    {
        return $this->render('baseFront-Office.html.twig', [
            'packs' => $packsRepository->findAll(),
        ]);
    }
}
