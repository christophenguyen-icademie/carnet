<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity;
use App\Entity\Contact;
use App\Entity\CarnetAdresse;
use App\Form;
use App\Form\FormulaireContact;

class ContactController extends Controller
{
    /**
     * @Route("/contact/{carnet}", name="creationcontact")
     */
    public function creation(Request $request,$carnet)
    {
        $carnetRepository = $this->getDoctrine()->getManager()->getRepository(CarnetAdresse::class);
        $carnet = $carnetRepository->findOneBy(array('code' => $carnet));

        $form = $this->createForm(FormulaireContact::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid() ) {
            $em = $this->getDoctrine()->getManager();
            $nouveaucontact = $form->getData();
            $nouveaucontact->setCarnetAdresse($carnet);
            $nouveaucontact->setDateCreation(new \DateTime());

            $file = $nouveaucontact->getPicture();
            if($file){
                $nouveaucontact->setPhotoDeProfil(file_get_contents($file));
            }

            $em->persist($nouveaucontact);
            $em->flush();

            return $this->redirectToRoute('carnet_adresse');

        }elseif($form->isSubmitted() && $form->isValid() === false){

        }
        return $this->render('contact/index.html.twig', [
            'form' => $form->createView(),
            'codecarnet' => $carnet->getCode(),
            'nomcarnet' =>  $carnet->getLibelle()
        ]);
    }

    /**
     * @Route("/contact/{carnet}/{code}", name="editioncontact")
     */
    public function edition(Request $request,$carnet,$code)
    {
        $contactRepository = $this->getDoctrine()->getManager()->getRepository(Contact::class);
        $contact = $contactRepository->findOneBy(array('code' => $code));

        if (!$contact) {
            return $this->redirectToRoute('carnet_adresse');
        }

        $form = $this->createForm(FormulaireContact::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid() ) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($contact);
            $em->flush();

            return $this->redirectToRoute('carnet_adresse');

        }elseif($form->isSubmitted() && $form->isValid() === false){

        }

        return $this->render('contact/fiche.html.twig', [
            'form' => $form->createView(),
            'codecontact' => $contact->getCode(),
            'codecarnet' => $contact->getCarnetAdresse()->getCode(),
            'nomcarnet' => $contact->getCarnetAdresse()->getLibelle()
        ]);
    }
}
