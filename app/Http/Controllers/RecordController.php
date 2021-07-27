<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Origin;
use App\Models\Format;
use App\Models\Manufacturer;
use App\Models\Record;
use App\Http\Filters\RecordFilter;
use App\Http\Requests\StoreRecordRequest;
use App\Http\Requests\UpdateRecordRequest;

class RecordController extends Controller
{
    /**FilterRequest
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(RecordFilter $filter)
    {
        $records = Record::filter($filter)->paginate(8);
        $genres = Genre::orderBy('title')->get();
        $origins = Origin::orderBy('title')->get();
        $formats = Format::orderBy('title')->get();
        $manufacturers = Manufacturer::orderBy('title')->get();

        $emptyListRecords = $records->count() == 0;

        return view('pages.record',
            compact(
                'records',
                'genres',
                'origins',
                'formats',
                'manufacturers',
                'emptyListRecords')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genres = Genre::orderBy('title')->get();
        $origins = Origin::orderBy('title')->get();
        $formats = Format::orderBy('title')->get();
        $manufacturers = Manufacturer::orderBy('title')->get();
        $controls = [
            [
                'type' => 'text',
                'name' => 'title',
                'title' => 'Название',
                'placeholder' => 'Введите название'
            ],
            [
                'type' => 'textarea',
                'name' => 'description',
                'title' => 'Описание',
                'placeholder' => 'Введите описание',
            ],
            [
                'type' => 'date',
                'name' => 'release_date',
                'title' => 'Дата релиза',
                'placeholder' => 'Введите дату релиза',
            ],
            [
                'type' => 'text',
                'name' => 'part_number',
                'title' => 'Партномер',
                'placeholder' => 'Введите партномер',
            ],
            [
                'type' => 'select',
                'name' => 'genre',
                'title' => 'Жанр',
                'placeholder' => 'Выберите жанр',
                'list_items' => $genres,
            ],
            [
                'type' => 'select',
                'name' => 'origin',
                'title' => 'Происхождение',
                'placeholder' => 'Выберите происхождение',
                'list_items' => $origins,
            ],
            [
                'type' => 'select',
                'name' => 'format',
                'title' => 'Формат',
                'placeholder' => 'Выберите формат',
                'list_items' => $formats,
            ],
            [
                'type' => 'select',
                'name' => 'manufacturer',
                'title' => 'Производитель',
                'placeholder' => 'Выберите производителя',
                'list_items' => $manufacturers,
            ],
            [
                'type' => 'image',
                'name' => 'image',
                'title' => 'Изображение',
            ],

        ];

        return view('control-form.create', [
            'title' => 'Добавить новую пластинку',
            'controls' => $controls,
            'button_title' => 'Все пластинки',
            'button_route' => 'record.index',
            'route_store' => 'record.store',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreRecordRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRecordRequest $request)
    {
        $new_record = new Record($request->input());
        $new_record->image = $request->file('image')->store('images', 'public');
        $new_record->save();
        return redirect()->back()->withSuccess('Пластинка была успешно добавлена');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $record = Record::findOrFail($id);
        $genres = Genre::orderBy('title')->get();
        $origins = Origin::orderBy('title')->get();
        $formats = Format::orderBy('title')->get();
        $manufacturers = Manufacturer::orderBy('title')->get();
        $controls = [
            [
                'type' => 'text',
                'name' => 'title',
                'title' => 'Название',
                'placeholder' => 'Введите название'
            ],
            [
                'type' => 'textarea',
                'name' => 'description',
                'title' => 'Описание',
                'placeholder' => 'Введите описание',
            ],
            [
                'type' => 'date',
                'name' => 'release_date',
                'title' => 'Дата релиза',
                'placeholder' => 'Введите дату релиза',
            ],
            [
                'type' => 'text',
                'name' => 'part_number',
                'title' => 'Партномер',
                'placeholder' => 'Введите партномер',
            ],
            [
                'type' => 'select',
                'name' => 'genre',
                'title' => 'Жанр',
                'placeholder' => 'Выберите жанр',
                'list_items' => $genres,
                'select_item_id' => $record->genre->id,
            ],
            [
                'type' => 'select',
                'name' => 'origin',
                'title' => 'Происхождение',
                'placeholder' => 'Выберите происхождение',
                'list_items' => $origins,
                'select_item_id' => $record->origin->id,
            ],
            [
                'type' => 'select',
                'name' => 'format',
                'title' => 'Формат',
                'placeholder' => 'Выберите формат',
                'list_items' => $formats,
                'select_item_id' => $record->format->id,
            ],
            [
                'type' => 'select',
                'name' => 'manufacturer',
                'title' => 'Производитель',
                'placeholder' => 'Выберите производителя',
                'list_items' => $manufacturers,
                'select_item_id' => $record->manufacturer->id,
            ],
            [
                'type' => 'image',
                'name' => 'image',
                'title' => 'Изображение',
            ],
        ];

        return view('control-form.edit', [
            'title' => 'Добавить новую пластинку',
            'controls' => $controls,
            'route_update' => 'record.update',
            'item' => $record,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\UpdateRecordRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRecordRequest $request, $id)
    {
        $record = Record::findOrFail($id);
        if ($request->files->count())
        {
            $record->image = $request->file('image')->store('images', 'public');
        }
        $record->update($request->input());
        return redirect()->route('record.index')->withSuccess('Пластинка была успешно обновлена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = Record::findOrFail($id);
        $record->delete();
        return redirect()->back()->withSuccess('Пластинка было успешно удалена');
    }
}
