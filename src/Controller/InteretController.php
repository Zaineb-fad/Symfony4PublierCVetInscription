<?php

namespace App\Controller;

use App\Entity\Interet;
use App\Form\InteretType;
use App\Repository\InteretRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/interet")
 */
class InteretController extends AbstractController
{
    /**
     * @Route("/", name="interet_index", methods={"GET"})
     */
    public function index(InteretRepository $interetRepository): Response
    {
        return $this->render('interet/index.html.twig', [
            'interets' => $interetRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="interet_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $interet = new Interet();
        $form = $this->createForm(InteretType::class, $interet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($interet);
            $entityManager->flush();

            return $this->redirectToRoute('interet_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('interet/new.html.twig', [
            'interet' => $interet,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="interet_show", methods={"GET"})
     */
    public function show(Interet $interet): Response
    {
        return $this->render('interet/show.html.twig', [
            'interet' => $interet,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="interet_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Interet $interet): Response
    {
        $form = $this->createForm(InteretType::class, $interet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('interet_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('interet/edit.html.twig', [
            'interet' => $interet,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="interet_delete", methods={"POST"})
     */
    public function delete(Request $request, Interet $interet): Response
    {
        if ($this->isCsrfTokenValid('delete'.$interet->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($interet);
            $entityManager->flush();
        }

        return $this->redirectToRoute('interet_index', [], Response::HTTP_SEE_OTHER);
    }
}
