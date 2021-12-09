<?php

namespace App\Controller;

use App\Entity\PacksCat;
use App\Form\PacksCatType;
use App\Repository\PacksCatRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/packs/cat")
 */
class PacksCatController extends AbstractController
{
    /**
     * @Route("/", name="packs_cat_index", methods={"GET"})
     */
    public function index(PacksCatRepository $packsCatRepository): Response
    {
        return $this->render('packs_cat/index.html.twig', [
            'packs_cats' => $packsCatRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="packs_cat_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $packsCat = new PacksCat();
        $form = $this->createForm(PacksCatType::class, $packsCat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($packsCat);
            $entityManager->flush();

            return $this->redirectToRoute('packs_cat_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('packs_cat/new.html.twig', [
            'packs_cat' => $packsCat,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="packs_cat_show", methods={"GET"})
     */
    public function show(PacksCat $packsCat): Response
    {
        return $this->render('packs_cat/show.html.twig', [
            'packs_cat' => $packsCat,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="packs_cat_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, PacksCat $packsCat, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(PacksCatType::class, $packsCat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('packs_cat_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('packs_cat/edit.html.twig', [
            'packs_cat' => $packsCat,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="packs_cat_delete", methods={"POST"})
     */
    public function delete(Request $request, PacksCat $packsCat, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$packsCat->getId(), $request->request->get('_token'))) {
            $entityManager->remove($packsCat);
            $entityManager->flush();
        }

        return $this->redirectToRoute('packs_cat_index', [], Response::HTTP_SEE_OTHER);
    }
}
