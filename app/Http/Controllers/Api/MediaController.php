<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MediaResource;
use App\Media;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function index()
    {
        return MediaResource::collection(Media::query()->orderByDesc('created_at')->get());
    }

    public function store(Request $request)
    {
        if ($request->hasFile("files")) {
            $pictures = [];
            foreach ($request->file('files') as $file) {
                $upload_path = public_path('uploads/');
                $file_name = $file->getClientOriginalName();
                $file->move($upload_path, $file_name);
                Media::create(["path" => "/uploads/" . $file_name]);
                $pictures[] = $file_name;
            }
            return response()->json(["pictures" => $pictures]);
        }
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
