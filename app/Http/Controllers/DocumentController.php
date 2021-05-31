<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use App\Components\DocumentDTO;
use File;
class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $storagePath = Storage::disk('documents')->getAdapter()->getPathPrefix();

        $files = collect(File::allFiles($storagePath))
            ->filter(function ($file) {
                return in_array($file->getExtension(), ['docx','doc', 'xlsx', 'xls','pdf']);
            })
            ->sortByDesc(function ($file) {
                return $file->getCTime();
            })
            ->map(function ($file) {
                return $file->getBaseName();
            });

        $listDocuments = [];
        foreach ($files as $file) {
            $document = app()->make(DocumentDTO::class);

            $document->setModified(filemtime($storagePath.$file));
            $document->setName($file);
            $document->setType(pathinfo(storage_path($file), PATHINFO_EXTENSION));
            $document->setUrl(Storage::disk('documents')->url($file));

            $listDocuments[] = $document;
        }
        return view('dashboard.documents',compact('listDocuments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->hasFile('documents')) {
            foreach ($request->file('documents') as $file) {
                Storage::disk('documents')->put($file->getClientOriginalName(),File::get($file));
            }
        }

        return back();
    }

    public function destroy(Request $request)
    {
        $storagePath = Storage::disk('documents')->getAdapter()->getPathPrefix();
        if (file_exists($storagePath.$request->name)) {
            unlink($storagePath . $request->name);
        }
        return back();
    }
}
