<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;

class ChangePasswordType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('username', TextType::class, [
                'label' => 'Pseudo',
                'disabled' => 'true'
            ])
            ->add('old_password', PasswordType::class, [
                'label' => 'Ancien Mot de passe',
                'mapped' => false
            ])
            ->add('new_password',  RepeatedType::class, [
                'type' => PasswordType::class,
                'mapped' => false,
                'constraints' => new Length([
                    'min' => 3,
                    'max' => 100
                ]),
                'invalid_message' => 'Les deux mots de passes ne sont pas identiques.',
                'label' => 'Mon nouveau mot de passe',
                'required' => true,
                'first_options' => ['label' => 'Nouveau mot de passe'],
                'second_options' => ['label' => 'Confirmer nouveau mot de passe']
            ])

            ->add('submit', SubmitType::class, [
                'label' => "S'inscrire"
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
