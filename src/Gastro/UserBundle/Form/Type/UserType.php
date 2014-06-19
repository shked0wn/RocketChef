<?php
/**
 * User: floran
 * Date: 19/06/2014
 * Time: 22:16
 */

namespace Gastro\UserBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('username', 'text');
        $builder->add('lastname', 'text');
        $builder->add('email', 'email');
        $builder->add('password', new PasswordType());
        $builder->add('restaurant', new RestaurantType());
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Gastro\UserBundle\Entity\User',
        ));
    }

    public function getName()
    {
        return 'user';
    }
}