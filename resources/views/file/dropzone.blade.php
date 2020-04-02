@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center p-4 bg-dark text-dark">Attach <span>Documents </span></h2>

    <form action="document_upload" class="dropzone" id="dropzonewidget" method="POST" enctype="multipart/form-data">
        @csrf
    </form>    
</div>
@endsection




@section('javascript')
<script>
 
var segments = location.href.split('/');
var action = segments[5];
console.log(action);
if (action == 'dropzone') {
    var acceptedFileTypes = "image/*, .psd"; //dropzone requires this param be a comma separated list
    var fileList = new Array;
    var i = 0;
    var callForDzReset = false;
    $("#dropzonewidget").dropzone({
  
        url: "document_upload",
        addRemoveLinks: true,
        // maxFiles: 5,
        acceptedFiles: 'image/*',
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
