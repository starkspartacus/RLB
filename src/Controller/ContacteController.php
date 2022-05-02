<?php

namespace App\Controller;

use App\Entity\Contacte;
use App\Entity\ContactePro;
use App\Form\ContacteType;
use App\Form\ContactProType;
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
        $contactPro = new ContactePro();

        $formPro = $this->createForm(ContactProType::class, $contactPro);
        $formPro->handleRequest($request);

        $form = $this->createForm(ContacteType::class, $contact);
        $form->handleRequest($request);

        if($formPro->isSubmitted() && $formPro->isValid()){
            $contactPro = $formPro->getData();
        }

        if ($form->isSubmitted() && $form->isValid())
        {
            $contact = $form->getData();

        }


        return $this->renderForm('contacte/index.html.twig', [
            'form' => $form,
            'formPro' => $formPro,
        ]);
    }
}
