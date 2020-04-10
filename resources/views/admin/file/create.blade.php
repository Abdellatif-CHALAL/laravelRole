@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Upload New Files</div>
                    <div class="panel-body">
                        <a href="{{ url('admin/file/'.auth()->user()->id) }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <h2 class="text-center p-4 bg-dark text-white">Attach <span>Documents </span></h2>
                        <form action="" class="dropzone" id="dropzonewidget" method="POST" enctype="multipart/form-data">
                             @csrf
                         </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection




@section('javascript')
<script>
 
var segments = location.href.split('/');
var action = segments[5];	
if (action == 'create') {
    var acceptedFileTypes = "image/*, .psd, .pdf"; //dropzone requires this param be a comma separated list
    var fileList = new Array;
    var i = 0;
    var callForDzReset = false;
    $("#dropzonewidget").dropzone({
  
        url: "document_upload/{{ Auth::user()->id }}",
        // addRemoveLinks: true,
        // maxFiles: 5,
        acceptedFiles: 'image/*, .pdf',
        // maxFilesize: 5,
        init: function () {
            this.on("success", function (file, serverFileName) {
                file.serverFn = serverFileName;
                fileList[i] = {
                    "serverFileName": serverFileName,
                    "fileName": file.name,
                    "fileId": i
                };
                i++;
            });
        }
    });
}
</script>
@endsection
