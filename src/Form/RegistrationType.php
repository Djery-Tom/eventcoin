<?php

namespace App\Form;

use App\Entity\Account;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use function Sodium\add;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', TextType::class, $this->getAttributes('Identifiant'))
            ->add('password', PasswordType::class, $this->getAttributes('Mot de passe', 'Minimun 6 caracteres'))
            ->add('confirmPassword',PasswordType::class,$this->getAttributes('Confirmation'))
            ->add('email', EmailType::class, $this->getAttributes('Email'))
            ->add('firstName', TextType::class, $this->getAttributes('Noms', 'Noms'))
            ->add('lastName', TextType::class, $this->getAttributes('Prenoms', '',false))
            ->add('country', HiddenType::class)
            ->add('phoneNumber', TextType::class, $this->getAttributes('Telephone'))
        ;
    }

    private function getAttributes(string $label, string $help = '', bool $required = true)
    {
        return array(
            'label' => $label,
            'help'=> $help,
            'help_attr'=>[
                'class' => 'mdc-text-field-helper-text mdc-text-field-helper-text--persistent mdc-text-field-helper-text--validation-msg'
            ],
            'attr' => [
                'class' => 'mdc-text-field__input'
            ],
            'required' => $required
        );
    }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Account::class,
        ]);
    }
}
