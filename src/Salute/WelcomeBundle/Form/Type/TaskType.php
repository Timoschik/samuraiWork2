<?php

namespace Salute\WelcomeBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TaskType extends AbstractType
{
   public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('task', 'text', ['attr' => ['placeholder' => 'Task description'], 'label' => false])
            ->add('dueDate', 'date', ['widget' => 'single_text', 'label' => false])
            ->add('priority', new PriorityType())
        ;
    }

    public function getName()
    {
        return 'task';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'Salute\WelcomeBundle\Entity\Task',//there is the checking class type when give second argument to the createForm()
        ]);
    }

}