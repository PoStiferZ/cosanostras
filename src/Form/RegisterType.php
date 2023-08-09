<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('username', TextType::class, [
                'label'=>'Pseudo'
            ])
            ->add('password', PasswordType::class,[
                'label'=>'Mot de passe'
            ])
            ->add('nom', TextType::class)
            ->add('prenom', TextType::class)
            ->add('banque', NumberType::class, [
                'label' => 'Numéro compte bancaire',
                'invalid_message' => 'Entrer un numéro valide'
            ])
            ->add('telephone',NumberType::class, [
                'label' => 'Numéro téléphone',
                'invalid_message' => 'Entrer un nombre valide'
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Enregistrer'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
