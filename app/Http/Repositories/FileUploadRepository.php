<?php

namespace App\Http\Repositories;

class FileUploadRepository
{
    private $request;
    private $file_name;
    private $path_name;

    public function __construct($request, $file_name, $path_name)
    {
        $this->request = $request;
        $this->file_name = $file_name;
        $this->path_name = $path_name;
    }

    public function getPath()
    {
        if ($this->request->file()) {
            $upload_path = public_path('upload/' . $this->path_name);
            $generated_new_name = time() . '.' . $this->request->file($this->file_name)->getClientOriginalName();
            $this->request->file($this->file_name)->move($upload_path, $generated_new_name);
            return '/upload/' . $this->path_name . '/' . $generated_new_name;
        }
        return false;
    }
}
