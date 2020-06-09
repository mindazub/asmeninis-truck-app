<?php

namespace App\Forms;

use App\Rules\OwnerNameValidation;
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
            ->add('year', 'number', [
                'rules' => 'required|numeric|min:1900|max:' . date("Y")
            ])
            ->add('owner', 'text', [
                'rules' => ['required', new OwnerNameValidation()],
            ])
            ->add('total_owners', 'number', [
                'rules' => 'required|numeric|min:1|max:9'
            ])
            ->add('comments', 'text', [
                'rules' => 'required'
            ])
            ->add('submit', 'submit', ['label' => 'Save form', 'attr' => ['class' => 'btn btn-danger']]);
    }
}
