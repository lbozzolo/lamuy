<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProyectoRequest;
use App\Http\Requests\UpdateProyectoRequest;
use App\Repositories\ProyectoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ProyectoController extends AppBaseController
{
    /** @var  ProyectoRepository */
    private $proyectoRepository;

    public function __construct(ProyectoRepository $proyectoRepo)
    {
        $this->proyectoRepository = $proyectoRepo;
    }

    /**
     * Display a listing of the Proyecto.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->proyectoRepository->pushCriteria(new RequestCriteria($request));
        $proyectos = $this->proyectoRepository->all();

        return view('proyectos.index')
            ->with('proyectos', $proyectos);
    }

    /**
     * Show the form for creating a new Proyecto.
     *
     * @return Response
     */
    public function create()
    {
        return view('proyectos.create');
    }

    /**
     * Store a newly created Proyecto in storage.
     *
     * @param CreateProyectoRequest $request
     *
     * @return Response
     */
    public function store(CreateProyectoRequest $request)
    {
        $input = $request->all();
        $proyecto = $this->proyectoRepository->create($input);

        return redirect(route('proyectos.index'))->with('ok', 'Proyecto creado con éxito');
    }

    /**
     * Display the specified Proyecto.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $proyecto = $this->proyectoRepository->findWithoutFail($id);

        if (empty($proyecto))
            return redirect(route('proyectos.index'))->withErrors('Proyecto no encontrado');

        return view('proyectos.show')->with('proyecto', $proyecto);
    }

    /**
     * Show the form for editing the specified Proyecto.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $proyecto = $this->proyectoRepository->findWithoutFail($id);

        if (empty($proyecto))
            return redirect(route('proyectos.index'))->withErrors('Proyecto no encontrado');

        return view('proyectos.edit')->with('proyecto', $proyecto);
    }

    /**
     * Update the specified Proyecto in storage.
     *
     * @param  int              $id
     * @param UpdateProyectoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProyectoRequest $request)
    {
        $proyecto = $this->proyectoRepository->findWithoutFail($id);

        if (empty($proyecto))
            return redirect(route('proyectos.index'))->withErrors('Proyecto no encontrado');

        $proyecto = $this->proyectoRepository->update($request->all(), $id);

        return redirect(route('proyectos.index'))->with('ok', 'Proyecto actualizado con éxito');
    }

    /**
     * Remove the specified Proyecto from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $proyecto = $this->proyectoRepository->findWithoutFail($id);

        if (empty($proyecto))
            return redirect(route('proyectos.index'))->withErrors('Proyecto no encontrado');

        $this->proyectoRepository->delete($id);

        return redirect(route('proyectos.index'))->with('ok', 'Proyecto eliminado con éxito');
    }
}
