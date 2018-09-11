<table class="table table-responsive" id="empresas-table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Título</th>
            <th>Texto</th>
            <th>Created_at</th>
            <th>Updated_at</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($empresas as $empresa)
        <tr>
            <td>{!! $empresa->id !!}</td>
            <td>{!! $empresa->title !!}</td>
            <td>{!! $empresa->body !!}</td>
            <td>{!! $empresa->created_at !!}</td>
            <td>{!! $empresa->updated_at !!}</td>
            <td>
                {!! Form::open(['route' => ['empresas.destroy', $empresa->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('empresas.show', [$empresa->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('empresas.edit', [$empresa->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>