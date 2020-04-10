<?php
namespace App\Http\Controllers\Admin;
    
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Storage;
use DB;
use Hash;
use Input;
use App\UserImage;


class FileController extends Controller
{

    public function index(Request $request,$id)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $UserImage = UserImage::where('documentsName','LIKE',"%$keyword%")->paginate($perPage);
        } else {
            $UserImage = UserImage::where('user_id', $id)->get();
        }

        return view('admin.file.index', compact('UserImage'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.file.create');
    }


     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $UserImage = UserImage::find($id);
        return view('admin.file.show',compact('UserImage'));
    }


    public function document_upload(Request $request,$UserImage) {

        if($request->hasFile('file')){
            $file = $request->file('file');
            $size = $file->getSize();
            $completeFileName = $file->getClientOriginalName();
            $path = $file->storeAs('public/users', $completeFileName);
            
            $insert_doc = DB::table('user_images')->insert([
                'path' => $path,
                'documentsName' => $completeFileName,
                'sizeFile' => $size,
                'user_id' => $UserImage,
            ]);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $UserImage = UserImage::find($id);
        UserImage::destroy($id);
        $UserImage = UserImage::where('user_id', $UserImage->user_id)->get();
        return view('admin.file.index',compact('UserImage'));
    }

}
