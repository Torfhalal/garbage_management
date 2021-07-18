<?php

namespace App\Form;

use App\Entity\Garbage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GarbageType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null, [
                'label'=>'Nom'
            ])
            ->add('weight', null, [
                'label'=>'Masse(en kg)'
            ])
            ->add('nomenclature',  ChoiceType::class, [
                'label'=>'Type de déchets', 'choices'=> $this->getNomenclature()
            ])
            ->add('request', null, [
                'label'=>'Date de demande denlévement'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Garbage::class,
        ]);
    }

    private function getNomenclature(){
        $nomenclature = Garbage::NOMENCLATURE;
        $output = [];
        foreach($nomenclature as $k => $v){
            $output[$v] = $k;
        }
        return $output;
    }
}
