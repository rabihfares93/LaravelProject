<?php

namespace App\Repositories;

use App\Models\Recipes;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter as Filter;

class RecipesRepository
{
    public function __construct()
    {}

    /**
     * @return \Illuminate\Database\Eloquent\Model|object|QueryBuilder|null
     */
    public function index()
    {
        return QueryBuilder::for(Recipes::class)
            ->allowedFilters([
                Filter::exact('region_id'),
                Filter::exact('department_id')
            ])
            ->get();
    }

    public function show($id)
    {
        $recipes = Recipes::findOrFail($id);

        return $recipes;
    }

    public function store($request)
    {
        $bank_agency = new Recipes();
        $bank_agency->fill($request);
        $bank_agency->save();

        return $bank_agency;
    }

    public function update($request, $id)
    {
        $bank_agency = Recipes::findOrFail($id);
        $bank_agency->fill($request);
        $bank_agency->save();

        return $bank_agency;
    }
}