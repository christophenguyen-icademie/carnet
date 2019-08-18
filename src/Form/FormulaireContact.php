<?php


namespace App\Form;

use App\Entity\Contact;
use App\Entity\Profession;
use App\Form\Type\ProfessionType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class FormulaireContact extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('nom', TextType::class, [
                'label'    => 'Nom',
                'help' => 'Saisir ici le nom du contact',
                'attr' => ['class' => 'txtcontactnom']
            ])
            ->add('prenom', TextType::class, [
                'label'    => 'Prénom',
                'help' => 'Saisir ici le prénom du contact',
                'attr' => ['class' => 'txtcontactprenom']
            ])
            ->add('telephone', TextType::class, [
                'label'    => 'Téléphone',
                'help' => 'Saisir le numéro de téléphone du contact au format international (ex : +336000000000)',
                'attr' => ['class' => 'txtcontacttelephone']
            ])
            ->add('email', EmailType::class, [
                'label'    => 'Email',
                'help' => "Saisir l'email du contact",
                'attr' => ['class' => 'txtcontactemail']
            ])
            ->add('profession', ProfessionType::class, [
                'label'    => 'Profession',
                'required' => false,
                'help' => 'Saisir la profession exercée',
                'attr' => ['class' => 'cbcontactprofession']
            ])
            ->add('retraite', CheckboxType::class, [
                'label'    => 'Retraité ?',
                'required' => false,
                'help' => 'Cochez si la personne est retraitée',
                'attr' => ['class' => 'chkcontactretraite']
            ])
            ->add('commentaire', TextType::class, [
                'label'    => 'Commentaire',
                'required' => false,
                'help' => 'Indiquez ici un commentaire sur le contact',
                'attr' => ['class' => 'txtcontactcommentaire']
            ])
            ->add('picture', FileType::class,[
                'required' => false,
                'attr' => ['class' => 'filecontactphoto'],
                'help' => 'Sélectionnez une photo pour le profil (uniquement format PNG)',
            ])
            ->add('enregistrer', SubmitType::class, [
                'attr' => ['class' => 'save btn btn-primary'],
                 'label'    => 'Enregistrer',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'App\Entity\Contact',
        ]);
    }
}