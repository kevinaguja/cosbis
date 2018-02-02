<?php

namespace App\Http\Controllers;

use App\Cosbis\Filters\FileFilters;
use App\Cosbis\Repositories\Criterias\Events\Where;
use App\Cosbis\Repositories\FileRepository;
use Illuminate\Http\Request;

class FilesController extends Controller
{
    //
    private $fileRepository;

    public function __construct(FileRepository $fileRepository)
    {
        $this->fileRepository= $fileRepository;
    }

    public function index(FileFilters $filters)
    {
        $files= $this->fileRepository->pushCriteria(new Where([['user_id', auth()->user()->id]]))
                ->filter($filters)
                ->paginate(5);

        if(auth()->user()->is_student())
            $files= \App\File::where('visibility', 3)->paginate(5);


        return view('files.index', compact('files'));
    }

    public function create()
    {
        return view('files.create');
    }

    public function store(Request $request)
    {
        foreach($request['files'] as $file){
            $file_name= $file->getClientOriginalName();
            //$ext= $file->getClientOriginalExtension();
            if($stored_file = $file->storeAs('uploads', $file_name) && \App\File::where('name', 'uploads/'.$file_name)->count() == 0)
                \App\File::create([
                    'user_id'=> auth()->user()->id,
                    'visibility'=> $request->visibility,
                    'name'=> $stored_file,
                ]);
        }

        return back()->with('success', 'Files Successfully Uploaded!');
    }
}
