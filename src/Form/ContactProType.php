<?php

namespace App\Form;

use App\Entity\ContactePro;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\Dropzone\Form\DropzoneType;

class ContactProType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('prenomspro')
            ->add('NomPro')
            ->add('EmailPro')
            ->add('TelephonePro')
            ->add('MessagePro')
            ->add('FichiersPro', DropzoneType::class , [
                'attr' => ['placeholder' => '8Mo maximum. Cliquez ou faites glisser pour importer']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ContactePro::class,
        ]);
    }
}
