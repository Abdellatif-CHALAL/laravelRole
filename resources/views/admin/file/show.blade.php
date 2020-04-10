@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">file {{ $UserImage->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('admin/file/'.auth()->user()->id) }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/delete', $UserImage->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete user',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $UserImage->id }}</td>
                                    </tr>
                                    <tr><th> Name </th><td> {{ $UserImage->documentsName }} </td></tr><tr><th> Size </th><td> {{ $UserImage->sizeFile }} B</td></tr><tr><th> Image </th><td> <img src="{{ asset('../storage/app/'.$UserImage->path) }}" alt="Latif" width="100" height="100"></td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection