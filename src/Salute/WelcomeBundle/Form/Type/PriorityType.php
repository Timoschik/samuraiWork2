<?php

namespace Salute\WelcomeBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PriorityType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('value','text', [
            'required' => false, 'label' => false, 'attr' => [
            'placeholder' => 'Priority value']
        ]);
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'Salute\WelcomeBundle\Entity\Priority',
        ]);
    }

    public function getName()
    {
        return 'priority';
    }
} 