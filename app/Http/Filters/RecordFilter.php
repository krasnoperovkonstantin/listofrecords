<?php

namespace App\Http\Filters;

class RecordFilter extends QueryFilter
{
    public function genre_id($id = null)
    {
        $this->builder->when($id, function($query) use($id){
            $query->where('genre_id', $id);
        });
    }

    public function origin_id($id = null)
    {
        $this->builder->when($id, function($query) use($id){
            $query->where('origin_id', $id);
        });
    }

    public function format_id($id = null)
    {
        $this->builder->when($id, function($query) use($id){
            $query->where('format_id', $id);
        });
    }

    public function manufacturer_id($id = null)
    {
        $this->builder->when($id, function($query) use($id){
            $query->where('manufacturer_id', $id);
        });
    }

    public function search_field($search_string = null)
    {
        $this->builder->where(function ($query) use($search_string){
            $query->where('title', 'LIKE', '%'.$search_string.'%')
                  ->orWhere('description', 'LIKE', '%'.$search_string.'%');
        });
    }
}
