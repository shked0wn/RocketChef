<?php
/**
 * User: floran
 * Date: 19/06/2014
 * Time: 22:16
 */

namespace RocketChef\UserBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('username', 'text');
        $builder->add('lastname', 'text');
        $builder->add('email', 'email');
        $builder->add('plain_password', 'repeated', array(
            'type'            => 'password',
            'invalid_message' => 'Les mots de passe doivent correspondre',
            'first_options'   => array('label' => 'Mot de passe'),
            'second_options'  => array('label' => 'Mot de passe (validation)'),
        ));
        $builder->add('restaurant', new RestaurantType());
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'RocketChef\UserBundle\Entity\User',
        ));
    }

    public function getName()
    {
        return 'user';
    }
}