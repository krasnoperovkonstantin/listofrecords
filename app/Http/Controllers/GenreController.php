<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Http\Requests\StoreGenreRequest;
use App\Http\Requests\UpdateGenreRequest;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $genres = Genre::orderBy('id')->paginate(8);
        $columns = [
            [
               'title' => 'Название',
               'name' => 'title',
            ],
        ];

        return view('control-form.index', [
            'title' => 'Изменить список жанров',
            'items' => $genres,
            'columns' => $columns,
            'route_edit' => 'genre.edit',
            'route_destroy' => 'genre.destroy',
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
                'placeholder' => 'Введите название'
            ],
        ];

        return view('control-form.create', [
            'title' => 'Добавить новый жанр',
            'controls' => $controls,
            'button_title' => 'Все жанры',
            'button_route' => 'genre.index',
            'route_store' => 'genre.store',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreGenreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGenreRequest $request)
    {
        $new_genre = new Genre($request->input());
        $new_genre->save();
        return redirect()->back()->withSuccess('Жарн был успешно добавлен');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $genre = Genre::findOrFail($id);
        $controls = [
            [
                'type' => 'text',
                'name' => 'title',
                'title' => 'Название',
                'placeholder' => 'Введите название',
            ],
        ];

        return view('control-form.edit', [
            'title' => 'Редактировать жанр',
            'controls' => $controls,
            'route_update' => 'genre.update',
            'item' => $genre,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\UpdateGenreRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGenreRequest $request, $id)
    {
        $genre = Genre::findOrFail($id);
        $genre->update($request->input());
        return redirect()->route('genre.index')->withSuccess('Жарн был успешно обновлен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $genre = Genre::findOrFail($id);
        $genre->delete();
        return redirect()->back()->withSuccess('Жарн был успешно удален');
    }
}
