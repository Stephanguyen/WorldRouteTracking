<?php

namespace WF3\WRTBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\TextType; //Type="text"
use Symfony\Component\Form\Extension\Core\Type\IntegerType; //type="number"
use Symfony\Component\Form\Extension\Core\Type\NumberType; //type="number"
use Symfony\Component\Form\Extension\Core\Type\TimeType; //
use Symfony\Component\Form\Extension\Core\Type\ChoiceType; //champs select
use Symfony\Component\Form\Extension\Core\Type\CheckboxType; //type="checkbox"
use Symfony\Component\Form\Extension\Core\Type\SubmitType; //type="submit"


use Symfony\Component\Validator\Constraints as Assert;

// use Symfony\Component\Validator\Constraints\Email;
// use Symfony\Component\Validator\Constraints\Length;
// use Symfony\Component\Validator\Constraints\Regex;
// use Symfony\Component\Validator\Constraints\Type;

class CartesType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                -> add('ville', TextType::class, array(
                    'required' => false,
                    'constraints' => array(
                        new Assert\NotBlank,
                        new Assert\Length(array(
                            'min' => 3,
                            'max' => 50,
                            'minMessage' => 'La ville doit comporter minimum 3 caractères',
                            'maxMessage' => 'La ville doit comporter maximum 50 caractères'
                        ))
                    )
                ))
                -> add('region', TextType::class, array(
                    'required' => false,
                    'constraints' => array(
                        new Assert\NotBlank,
                        new Assert\Length(array(
                            'min' => 3,
                            'max' => 50,
                            'minMessage' => 'La région doit comporter minimum 3 caractères',
                            'maxMessage' => 'La région doit comporter maximum 50 caractères'
                        ))
                    )
                ))
                -> add('pays', TextType::class, array(
                    'required' => false,
                    'constraints' => array(
                        new Assert\NotBlank,
                        new Assert\Length(array(
                            'min' => 3,
                            'max' => 50,
                            'minMessage' => 'Le pays doit comporter minimum 3 caractères',
                            'maxMessage' => 'Le pays doit comporter maximum 50 caractères'
                        ))
                    )
                ))
                -> add('deplacement', ChoiceType::class, array(
                    'choices' => array(
                        'Randonnée' => 'randonnée', 
                        'Course' => 'course',
                        'Cyclisme' => 'cyclisme'
                    )
                ))
                -> add('id_utilisateur', IntegerType::class, array(
                    'required' => array(
                        new Assert\Type(array(
                            'type' => 'integer',
                            'message' => 'Votre id utilisateur doit être composé de chiffres'
                        )),
                        new Assert\Length(array(
                            'min' => 1,
                            'max' => 11,
                            'minMessage' => 'Votre id utilisateur doit être composé d\' au moins un chiffre',
                            'maxMessage' => 'Votre id utilisateur doit être composé de 2 chiffres au maximum'
                        ))
                    )
                ))
                -> add('temps', TimeType::class, array(
                    'input'  => 'datetime',
                    'with_seconds' => true,
                    'widget' => 'choice',
                    'placeholder' => array(
                        'hour' => 'Heure(s)', 'minute' => 'Minute(s)', 'second' => 'Seconde(s)',
                    )
                ))
                -> add('nb_km', NumberType::class, array(
                    'required' => array(
                        new Assert\Type(array(
                            'type' => 'integer',
                            'message' => 'Votre nb_km doit être composé de chiffres'
                        ))
                    )
                ))
                -> add('difficulte', ChoiceType::class, array(
                    'choices' => array(
                        'Facile' => 'facile', 
                        'Normal' => 'normal',
                        'Difficile' => 'difficile'
                    )
                ))
                -> add('materiel', TextType::class, array(
                    'required' => false,
                    'constraints' => array(
                        new Assert\NotBlank,
                        new Assert\Length(array(
                            'min' => 3,
                            'max' => 50,
                            'minMessage' => 'Le materiel doit comporter minimum 3 caractères',
                            'maxMessage' => 'Le materiel doit comporter maximum 50 caractères'
                        ))
                    )
                ))
                -> add('save', SubmitType::class, array(
                    'attr' => array(
                        'class' => "btn-success"
                    )
                ));

    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WF3\WRTBundle\Entity\Cartes'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'wrtbundle_cartes';
    }
}
