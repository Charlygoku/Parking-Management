<?php

namespace App\Form;

use App\Entity\Coche;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints as Assert;

class AddCocheTypeForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('matricula', TextType::class, [
                'label' => 'Matrícula del coche',
                'constraints' => [
                    new Assert\NotBlank([
                        'message' => 'La matrícula no puede estar vacía.',
                    ]),
                    new Assert\Length([
                        'min' => 4,
                        'max' => 10,
                        'minMessage' => 'La matrícula debe tener al menos {{ limit }} caracteres.',
                        'maxMessage' => 'La matrícula no puede tener más de {{ limit }} caracteres.',
                    ]),
                    new Assert\Regex([
                        'pattern' => '/^[0-9]{4}[A-Z]{3}$/i',
                        'message' => 'La matrícula debe tener el formato 1234ABC.',
                    ]),
                ],
            ])
            ->add('marca', TextType::class, [
                'label' => 'Marca del coche',
                'constraints' => [
                    new Assert\NotBlank([
                        'message' => 'La marca no puede estar vacía.',
                    ]),
                    new Assert\Length([
                        'max' => 50,
                        'maxMessage' => 'La marca no puede tener más de {{ limit }} caracteres.',
                    ]),
                ],
            ])
            ->add('modelo', TextType::class, [
                'label' => 'Modelo del coche',
                'constraints' => [
                    new Assert\NotBlank([
                        'message' => 'El modelo no puede estar vacío.',
                    ]),
                    new Assert\Length([
                        'max' => 50,
                        'maxMessage' => 'El modelo no puede tener más de {{ limit }} caracteres.',
                    ]),
                ],
            ])
            ->add('color', TextType::class, [
                'label' => 'Color del coche',
                'constraints' => [
                    new Assert\NotBlank([
                        'message' => 'El color no puede estar vacío.',
                    ]),
                    new Assert\Length([
                        'max' => 30,
                        'maxMessage' => 'El color no puede tener más de {{ limit }} caracteres.',
                    ]),
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Coche::class,
        ]);
    }
}
