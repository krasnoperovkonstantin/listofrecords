<?php

namespace App\Http\Controllers;

use App\Models\Origin;
use App\Http\Requests\StoreOriginRequest;
use App\Http\Requests\UpdateOriginRequest;

class OriginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $origins = Origin::orderBy('id')->paginate(8);
        $columns = [
            [
               'title' => 'Название',
               'name' => 'title',
            ],
        ];

        return view('control-form.index', [
            'title' => 'Изменить список происхождений',
            'items' => $origins,
            'columns' => $columns,
            'route_edit' => 'origin.edit',
            'route_destroy' => 'origin.destroy',
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
            'title' => 'Добавить новое происхождение',
            'controls' => $controls,
            'button_title' => 'Все происхождения',
            'button_route' => 'origin.index',
            'route_store' => 'origin.store',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreOriginRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOriginRequest $request)
    {
        $new_origin = new Origin($request->input());
        $new_origin->save();
        return redirect()->back()->withSuccess('Происхождение было успешно добавлено');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $origin = Origin::findOrFail($id);
        $controls = [
            [
                'type' => 'text',
                'name' => 'title',
                'title' => 'Название',
                'placeholder' => 'Введите название'
            ],
        ];

        return view('control-form.edit', [
            'title' => 'Редактировать происхождение',
            'controls' => $controls,
            'route_update' => 'origin.update',
            'item' => $origin,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\UpdateOriginRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOriginRequest $request, $id)
    {
        $origin = Origin::findOrFail($id);
        $origin->update($request->input());
        return redirect()->route('origin.index')->withSuccess('Происхождение было успешно обновлено');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $origin = Origin::findOrFail($id);
        $origin->delete();
        return redirect()->back()->withSuccess('Происхождение было успешно удалено');
    }
}
