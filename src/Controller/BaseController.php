<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\AppartType;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Appartement;
use Doctrine\ORM\EntityManagerInterface;

class BaseController extends AbstractController
{
    #[Route('/appart', name: 'app_appart')]
    public function appart(Request $request, EntityManagerInterface $em): Response
    {
        $appart = new Appartement();
        $form = $this->createForm(AppartType::class, $appart);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $em->persist($appart);
                $em->flush();
                $this->addFlash('notice', 'Appart ajouté');
                return $this->redirectToRoute('app_appart');
            }
        }

        return $this->render('base/appart.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
