<?php

namespace App\Form;

use App\Entity\Contacte;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\Dropzone\Form\DropzoneType;

class ContacteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('prenom', TextType::class)
            ->add('nom', TextType::class)
            ->add('telephone', TextType::class,[
                'attr' => [
                    'placeholder' => 'Votre Téléphone*'
                ]
            ])
            ->add('email')
            ->add('content', TextareaType::class, [
                'attr' => [
                    'required' => 'true',
                    'placeholder' => 'Votre Message*',
                    'class' => 'content-message'

                ]
            ])
            ->add('file', DropzoneType::class, [
                'attr' => ['placeholder' => '8Mo maximum. Cliquez ou faites glisser pour importer']
            ])
            ->add('Envoyer', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contacte::class,
        ]);
    }
}
