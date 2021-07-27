<?php

namespace App\Http\Controllers;

use App\Models\Track;
use App\Http\Requests\StoreTrackRequest;
use App\Http\Requests\UpdateTrackRequest;

class TrackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($record_id)
    {
        $tracks = Track::where('record_id', $record_id)->orderBy('number')->paginate(8);
        $columns = [
            [
                'title' => 'Порядковый номер',
                'name' => 'number',
            ],
            [
               'title' => 'Название',
               'name' => 'title',
            ],
            [
                'title' => 'Длительность',
                'name' => 'duration',
            ],
        ];

        return view('control-form.index', [
            'title' => 'Изменить список треков пластинки ' . $record_id,
            'items' => $tracks,
            'columns' => $columns,
            'route_edit' => 'track.edit',
            'route_destroy' => 'track.destroy',

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($record_id)
    {
        $controls = [
            [
                'type' => 'text',
                'name' => 'number',
                'title' => 'Порядковый номер',
                'placeholder' => 'Введите название'
            ],
            [
                'type' => 'text',
                'name' => 'title',
                'title' => 'Название',
                'placeholder' => 'Введите псевдоним'
            ],
            [
                'type' => 'text',
                'name' => 'duration',
                'title' => 'Длительность',
                'placeholder' => 'Введите псевдоним'
            ],
        ];

        return view('control-form.create', [
            'title' => 'Добавить новый трек',
            'controls' => $controls,
            'button_title' => 'Все треки пластинки',
            'button_route' => 'record.track.index',
            'button_route_param' => $record_id,
            'route_store' => 'record.track.store',
            'constrained_id' => $record_id,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreTrackRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTrackRequest $request)
    {
        $new_track = new Track($request->input());
        $new_track->save();
        return redirect()->back()->withSuccess('Трек был успешно добавлен');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $track = Track::findOrFail($id);
        $controls = [
            [
                'type' => 'text',
                'name' => 'number',
                'title' => 'Порядковый номер',
                'placeholder' => 'Введите название'
            ],
            [
                'type' => 'text',
                'name' => 'title',
                'title' => 'Название',
                'placeholder' => 'Введите псевдоним'
            ],
            [
                'type' => 'text',
                'name' => 'duration',
                'title' => 'Длительность',
                'placeholder' => 'Введите псевдоним'
            ],
        ];

        return view('control-form.edit', [
            'title' => 'Редактировать трек',
            'controls' => $controls,
            'route_update' => 'track.update',
            'item' => $track,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\UpdateTrackRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTrackRequest $request, $id)
    {
        $track = Track::findOrFail($id);
        $track->update($request->input());
        return redirect()->route('record.track.index', $track->record->id)->withSuccess('Трек было успешно обновлен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $track = Track::findOrFail($id);
        $track->delete();
        return redirect()->back()->withSuccess('трек было успешно удален');
    }
}
