<?php

namespace App\Http\Controllers;

use App\Models\Format;
use App\Http\Requests\StoreFormatRequest;
use App\Http\Requests\UpdateFormatRequest;

class FormatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $formats = Format::orderBy('title')->paginate(8);
        $columns = [
            [
               'title' => 'Название',
               'name' => 'title',
            ],
        ];

        return view('control-form.index', [
            'title' => 'Изменить список форматов',
            'items' => $formats,
            'columns' => $columns,
            'route_edit' => 'format.edit',
            'route_destroy' => 'format.destroy',
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
            'title' => 'Добавить новый формат',
            'controls' => $controls,
            'button_title' => 'Все форматы',
            'button_route' => 'format.index',
            'route_store' => 'format.store',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreFormatRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFormatRequest $request)
    {
        $new_format = new Format($request->input());
        $new_format->save();
        return redirect()->back()->withSuccess('Формат был успешно добавлен');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $format = Format::findOrFail($id);
        $controls = [
            [
                'type' => 'text',
                'name' => 'title',
                'title' => 'Название',
                'placeholder' => 'Введите название'
            ],
        ];

        return view('control-form.edit', [
            'title' => 'Редактировать формат',
            'controls' => $controls,
            'route_update' => 'format.update',
            'item' => $format,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\UpdateFormatRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFormatRequest $request, $id)
    {
        $format = Format::findOrFail($id);
        $format->update($request->input());
        return redirect()->route('format.index')->withSuccess('Формат был успешно обновлен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $format = Format::findOrFail($id);;
        $format->delete();
        return redirect()->back()->withSuccess('Формат был успешно удален');
    }
}
