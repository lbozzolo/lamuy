<?php

namespace Lamuy\Http\Controllers;

use Lamuy\Traits\ApiResponser;
use Lamuy\Models\Magazine;

class MagazineController extends Controller
{
    use ApiResponser;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = new Magazine();
        $magazines = Magazine::get($model->apiAttributes);

        return $this->showAll($magazines);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Magazine $magazine)
    {
        $magazine = $magazine->get($magazine->apiAttributes)->first();
        return $this->showOne($magazine);
    }

}
