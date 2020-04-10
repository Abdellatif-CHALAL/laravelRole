@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">File</div>
                    <div class="panel-body">
                        <a href="{{ url('/create') }}" class="btn btn-success btn-sm" title="Add New File">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New File
                        </a>

                        {!! Form::open(['method' => 'GET', 'url' => 'admin/file/{{auth()->user()->id}}', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        {!! Form::close() !!}

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>#</th><th>Name</th><th>Size</th><th>Image</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($UserImage as $item)
                                    <tr>
                                        <td>{{ $loop->iteration or $item->id }}</td>
                                        <td>{{ $item->documentsName }}</td><td>{{ $item->sizeFile }} B</td><td><img src="{{ asset('../storage/app/'.$item->path) }}" width="100" height="100"></td>
                                        <td>
                                            <a href="{{ url('/show/' . $item->id) }}" title="View File"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>                                           
                                             {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/delete', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete file',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                                                    
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection