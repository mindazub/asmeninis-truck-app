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

        $sortBy = request()->input('sort_by');
        $sortOrder = request()->input('sort_order');
        $search = request()->input('q');
        $trucks = TruckForm::with('truckName')
            ->when($sortBy != null && $sortBy != 'make', function ($q) use ($sortOrder, $sortBy) {
                return $q->orderBy($sortBy, $sortOrder);
            })
            ->when($sortBy == 'make', function ($q) use ($sortOrder) {
                $q->join('truck_names', 'truck_forms.truck_name_id', '=', 'truck_names.id');
                $q->select(['truck_names.*', 'truck_forms.*']);
                return $q->orderBy('truck_names.name', $sortOrder);
            })
            ->when($search, function ($q) use ($search) {
                return $q->whereHas('truckName', function ($q) use ($search) {
                    return $q->where('name', 'like', '%' . $search . '%');
                })
                    ->orWhere('year', 'like', '%' . $search . '%')
                    ->orWhere('owner', 'like', '%' . $search . '%')
                    ->orWhere('total_owners', 'like', '%' . $search . '%')
                    ->orWhere('comments', 'like', '%' . $search . '%');
            })
            ->paginate(10);
        return view('truck.index', compact('trucks'));
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
        $truckForm->fill($request->only(['truck_name_id', 'year', 'owner', 'total_owners', 'comments']))->save();

        return redirect()->route('truck.index');
    }

}
