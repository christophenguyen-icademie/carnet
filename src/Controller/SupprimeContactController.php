<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity;
use App\Entity\Contact;
use App\Form;
use App\Form\FormulaireContact;

class SupprimeContactController extends Controller
{
    /**
     * @Route("/supprimecontact/{contact}", name="supprimecontact")
     */
    public function supprime($contact)
    {
        $contactRepository = $this->getDoctrine()->getManager()->getRepository(Contact::class);
        $contact = $contactRepository->findOneBy(array('code' => $contact));
        if($contact) {
            $this->getDoctrine()->getManager()->remove($contact);
            $this->getDoctrine()->getManager()->flush();

        }

        return $this->redirectToRoute('carnet_adresse');
    }
}
