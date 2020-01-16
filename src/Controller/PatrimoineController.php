<?php

namespace App\Controller;

use App\Entity\Patrimoine;
use App\Form\PatrimoineType;
use App\Repository\PatrimoineRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/patrimoine")
 */
class PatrimoineController extends AbstractController
{
    /**
     * @Route("/", name="patrimoine_index", methods={"GET"})
     */
    public function index(PatrimoineRepository $patrimoineRepository): Response
    {
        return $this->render('patrimoine/index.html.twig', [
            'patrimoines' => $patrimoineRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="patrimoine_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $patrimoine = new Patrimoine();
        $form = $this->createForm(PatrimoineType::class, $patrimoine);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($patrimoine);
            $entityManager->flush();

            return $this->redirectToRoute('patrimoine_index');
        }

        return $this->render('patrimoine/new.html.twig', [
            'patrimoine' => $patrimoine,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="patrimoine_show", methods={"GET"})
     */
    public function show(Patrimoine $patrimoine): Response
    {
        return $this->render('patrimoine/show.html.twig', [
            'patrimoine' => $patrimoine,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="patrimoine_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Patrimoine $patrimoine): Response
    {
        $form = $this->createForm(PatrimoineType::class, $patrimoine);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('patrimoine_index');
        }

        return $this->render('patrimoine/edit.html.twig', [
            'patrimoine' => $patrimoine,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="patrimoine_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Patrimoine $patrimoine): Response
    {
        if ($this->isCsrfTokenValid('delete'.$patrimoine->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($patrimoine);
            $entityManager->flush();
        }

        return $this->redirectToRoute('patrimoine_index');
    }
}
