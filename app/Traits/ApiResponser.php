<?php

namespace Lamuy\Traits;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

trait ApiResponser
{

    private function successResponse($data, $code)
    {
        return response()->json($data, $code);
    }

    protected function errorResponse($message, $code)
    {
        return response()->json(['error' => $message, 'code' => $code], $code);
    }

    protected function showAll(Collection $collection, $code = 200)
    {
        if ($collection->isEmpty()){
            return $this->successResponse(['data' => $collection], $code);
        }

        $transformer = $collection->first()->transformer;

        //$collection = $this->filterData($collection);
        //$collection = $this->sortData($collection);

        //$collection = $this->paginate($collection);

        $collection = $this->transformData($collection, $transformer);

        return $this->successResponse($collection, $code);
    }

    protected function showOne(Model $instance, $code = 200)
    {
        $transformer =  $instance->transformer;
        $instance = $this->transformData($instance, $transformer);

        return $this->successResponse($instance, $code);
    }

    protected function transformData($data, $transformer)
    {
        $transformation = fractal($data, new $transformer);
        return $transformation->toArray();
    }

    public function sortData(Collection $collection)
    {
        if (request()->has('sort_by')){
            $attribute = request()->sort_by;
            $collection = $collection->sortBy->{$attribute};
        }

        return $collection->sortByDesc('number');
    }

    public function filterData(Collection $collection)
    {
        foreach (request()->query() as $attribute => $value){
            if (isset($attribute, $value) && $attribute != 'sort_by'){
                if($attribute == 'year'){

                    $collection = $collection->filter(function ($item) use ($value) {
                        return false !== stristr($item->date, $value);
                    });

                } else {

                    if ($attribute == 'date'){

                        $collection = $collection->where($attribute, Carbon::parse('01-'.$value)->format('Y-m-d 00:00:00'));
                    } else {
                        $collection = $collection->where($attribute, $value);
                    }

                }

            }
        }

        return $collection;
    }

    public function paginate(Collection $collection)
    {
        $page = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 1;

        $results = $collection->slice(($page -1) * $perPage, $perPage)->values();

        $paginated = new LengthAwarePaginator($results, $collection->count(), $perPage, $page, [
            'path' => LengthAwarePaginator::resolveCurrentPath(),
        ]);

        $paginated->appends(request()->all());

        return $paginated;
    }

}