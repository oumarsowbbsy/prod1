<?php

namespace App\Controller;

use App\Entity\Tourisme;
use App\Form\TourismeType;
use App\Repository\TourismeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/tourisme")
 */
class TourismeController extends AbstractController
{
    /**
     * @Route("/", name="tourisme_index", methods={"GET"})
     */
    public function index(TourismeRepository $tourismeRepository): Response
    {
        return $this->render('tourisme/index.html.twig', [
            'tourismes' => $tourismeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="tourisme_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $tourisme = new Tourisme();
        $form = $this->createForm(TourismeType::class, $tourisme);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tourisme);
            $entityManager->flush();

            return $this->redirectToRoute('tourisme_index');
        }

        return $this->render('tourisme/new.html.twig', [
            'tourisme' => $tourisme,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="tourisme_show", methods={"GET"})
     */
    public function show(Tourisme $tourisme): Response
    {
        return $this->render('tourisme/show.html.twig', [
            'tourisme' => $tourisme,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="tourisme_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Tourisme $tourisme): Response
    {
        $form = $this->createForm(TourismeType::class, $tourisme);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tourisme_index');
        }

        return $this->render('tourisme/edit.html.twig', [
            'tourisme' => $tourisme,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="tourisme_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Tourisme $tourisme): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tourisme->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($tourisme);
            $entityManager->flush();
        }

        return $this->redirectToRoute('tourisme_index');
    }
}
