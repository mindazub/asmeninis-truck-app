<?php

namespace App\Http\Controllers;

use App\TruckForm;
use App\TruckName;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Kris\LaravelFormBuilder\FormBuilder;

class TruckFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $trucks = TruckForm::all();

        $truckNames = TruckName::all();

        return view('truck.index', compact('trucks', 'truckNames'));
    }


    /**
     * @param FormBuilder $formBuilder
     * @return Factory|View
     */
    public function create(FormBuilder $formBuilder): View
    {

        $truckNames = TruckName::all();

        $form = $formBuilder->create(\App\Forms\TruckForm::class, [
            'method' => 'POST',
            'url' => route('truck.store')
        ]);

        return view('truck.create', compact('form', 'truckNames'));
    }

    /**
     * @param FormBuilder $formBuilder
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(FormBuilder $formBuilder, Request $request): RedirectResponse
    {
        $form = $formBuilder->create(\App\Forms\TruckForm::class);

        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }

        $truckForm = new TruckForm();
        $truckForm->fill($request->only(['make', 'year', 'owner', 'total_owners', 'comments']))->save();

        return redirect()->route('truck.index');
    }

}
