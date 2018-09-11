<table class="table table-responsive" id="categorias-table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Slug</th>
            <th>created_at</th>
            <th>updated_at</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($categorias as $categoria)
        <tr>
            <td>{!! $categoria->id !!}</td>
            <td>{!! $categoria->name !!}</td>
            <td>{!! $categoria->slug !!}</td>
            <td>{!! $categoria->created_at !!}</td>
            <td>{!! $categoria->updated_at !!}</td>
            <td>
                {!! Form::open(['route' => ['categorias.destroy', $categoria->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('categorias.show', [$categoria->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('categorias.edit', [$categoria->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>