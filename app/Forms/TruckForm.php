<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class TruckForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('truck_name_id', 'number')
            ->add('year', 'number')
            ->add('owner', 'text')
            ->add('total_owners', 'number')
            ->add('comments', 'text');
    }
}
