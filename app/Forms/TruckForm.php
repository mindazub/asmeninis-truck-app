<?php

namespace App\Forms;

use App\TruckName;
use Kris\LaravelFormBuilder\Form;
use phpDocumentor\Reflection\Types\Collection;

class TruckForm extends Form
{

    private function getTruckNamesFromDB()
    {
        /** @var Collection $truckChoices */
        $truckChoices = TruckName::all(['id', 'name'])->pluck('name', 'id')->toArray();
        return $truckChoices;
    }


    public function buildForm()
    {
        $this
            ->add('truck_name_id', 'select', [
                'choices' => $this->getTruckNamesFromDB(),
                'empty_value' => '=== Select Make of the Truck ===',
                'rules' => 'required|exists:truck_names,id'
            ])
            ->add('year', 'number')
            ->add('owner', 'text')
            ->add('total_owners', 'number')
            ->add('comments', 'text')
            ->add('submit', 'submit', ['label' => 'Save form', 'attr' => ['class' => 'btn btn-danger']]);
    }
}
