<?php
namespace App\Form\Type;

use App\Entity\Profession;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\Options;

class ProfessionType extends AbstractType
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $professionRepository = $this->entityManager->getRepository(Profession::class);
        $professions = $professionRepository->findAll();

        $resolver->setDefaults([
            'choices' =>$professions,
            'choice_label' => function(Profession $profession, $key, $value) {
                return strtoupper($profession->getLibelle());
            },
            'choice_attr' => function(Profession $profession, $key, $value) {
                return ['data-code' => $profession->getCode()];
            }
        ]);
    }

    public function getParent()
    {
    return ChoiceType::class;
    }
}