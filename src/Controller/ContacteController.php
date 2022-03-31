<?php

namespace App\Controller;

use App\Entity\Contacte;
use App\Form\ContacteType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContacteController extends AbstractController
{

    /**
     * @Route("/contact", name="app_contacte")
     */
    public function index(Request $request): Response
    {
        $contact = new Contacte();

        $form = $this->createForm(ContacteType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $contact = $form->getData();
            var_dump($contact);
        }


        return $this->renderForm('contacte/index.html.twig', [
            'form' => $form,
        ]);
    }
}
