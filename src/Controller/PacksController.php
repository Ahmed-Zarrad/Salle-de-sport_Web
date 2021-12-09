<?php

namespace App\Controller;

use App\Entity\Packs;
use App\Form\PacksType;
use App\Repository\PacksRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/packs")
 */
class PacksController extends AbstractController
{
    /**
     * @Route("/", name="packs_index", methods={"GET"})
     */
    public function index(PacksRepository $packsRepository): Response
    {
        return $this->render('packs/index.html.twig', [
            'packs' => $packsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="packs_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager,\Swift_Mailer $mailer): Response
    {
        $pack = new Packs();
        $form = $this->createForm(PacksType::class, $pack);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($pack);
            $entityManager->flush();
            $message=(new \Swift_Message('New pack '))
                ->setFrom('ahmed.zarrad97@gmail.com')
                ->setTo('ahmedwow90@gmail.com')
                ->setBody(new \Swift_Message('New pack added '));
                    $mailer->send($message);
                    $this->addFlash('message','the mail has been sent');

            $this->get('session')->getFlashBag()->add('notice','Validation Faite Avec Succès');
            //return $this->redirectToRoute('packs_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('packs/new.html.twig', [
            'pack' => $pack,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="packs_show", methods={"GET"})
     */
    public function show(Packs $pack): Response
    {
        return $this->render('packs/show.html.twig', [
            'pack' => $pack,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="packs_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Packs $pack, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(PacksType::class, $pack);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();


            return $this->redirectToRoute('packs_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('packs/edit.html.twig', [
            'pack' => $pack,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="packs_delete", methods={"POST"})
     */
    public function delete(Request $request, Packs $pack, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$pack->getId(), $request->request->get('_token'))) {
            $entityManager->remove($pack);
            $entityManager->flush();
        }

        return $this->redirectToRoute('packs_index', [], Response::HTTP_SEE_OTHER);
    }
}
