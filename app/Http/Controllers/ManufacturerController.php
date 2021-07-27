<?php

namespace App\Http\Controllers;

use App\Models\Manufacturer;
use App\Http\Requests\StoreManufacturerRequest;
use App\Http\Requests\UpdateManufacturerRequest;

class ManufacturerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $manufacturers = Manufacturer::orderBy('id')->paginate(8);
        $columns = [
            [
               'title' => 'Название',
               'name' => 'title',
            ],
        ];

        return view('control-form.index', [
            'title' => 'Изменить список производителей',
            'items' => $manufacturers,
            'columns' => $columns,
            'route_edit' => 'manufacturer.edit',
            'route_destroy' => 'manufacturer.destroy',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $controls = [
            [
                'type' => 'text',
                'name' => 'title',
                'title' => 'Название',
                'placeholder' => 'Введите название',
            ],
        ];

        return view('control-form.create', [
            'title' => 'Добавить нового производителя',
            'controls' => $controls,
            'button_title' => 'Все производители',
            'button_route' => 'manufacturer.index',
            'route_store' => 'manufacturer.store',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreManufacturerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreManufacturerRequest $request)
    {
        $new_manufacturer = new Manufacturer($request->input());
        $new_manufacturer->save();
        return redirect()->back()->withSuccess('Производитель был успешно добавлен');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $manufacturer = Manufacturer::findOrFail($id);
        $controls = [
            [
                'type' => 'text',
                'name' => 'title',
                'title' => 'Название',
                'placeholder' => 'Введите название'
            ],
        ];

        return view('control-form.edit', [
            'title' => 'Редактировать производителя',
            'controls' => $controls,
            'route_update' => 'manufacturer.update',
            'item' => $manufacturer
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\UpdateManufacturerRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateManufacturerRequest $request, $id)
    {
        $manufacturer = Manufacturer::findOrFail($id);
        $manufacturer->update($request->input());
        return redirect()->route('manufacturer.index')->withSuccess('Производитель был успешно обновлен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $manufacturer = Manufacturer::findOrFail($id);
        $manufacturer->delete();
        return redirect()->back()->withSuccess('Производитель был успешно удален');
    }
}
