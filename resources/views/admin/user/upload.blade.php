@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
        <form action="{{ url('admin/user/upload')}}" class="dropzone" id="my-awesome-dropzone"></form>
        </div>
    </div>
</div>
@endsection
