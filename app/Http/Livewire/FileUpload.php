<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\File;
use App\Models\Option;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\File as FileSupport;

class FileUpload extends Component
{
    public $fileName;
    public $fileChunks = [];
    public $progress = 0;
    public $extension;
    public $code_demande;
    public $type;
    public $typedemande;
    public $code_employeur;
    public $path;

    public $uniquePath;
    public $maxUploadSize;
    public $allowedExtensions = ['pdf'];
    public $error;

    public function mount(){
        $this->uniquePath = "$this->typedemande/$this->code_employeur/$this->code_demande";
        $maxUploadSize = Option::where('name','max_user_file_upload')->pluck('value')->first();
        $this->maxUploadSize = is_null($maxUploadSize) ? 10 : $maxUploadSize;
        $allowedExtensions = Option::where('name','mime_types')->pluck('value')->first();
        $this->allowedExtensions = is_null($allowedExtensions) ? ['pdf']: explode(',', $allowedExtensions);
    }

    public function uploadChunks($chunk, $currentChunk, $totalChunks, $extension,$filesize)
    {
        $this->error = null;
        /** Todo
         * check if current chunk greater than max upload size 
         * if yes, delete all chunks and return error
         */
        if(!in_array($extension, $this->allowedExtensions)){
            $this->error = "Le fichier doit être au format : ". implode(', ', $this->allowedExtensions);
        }elseif( $filesize > $this->maxUploadSize){
            $this->error = "Le fichier est trop volumineux";
        }else{
            $this->extension = $extension;
            $filePath = storage_path("app/chunks/$this->uniquePath" . $this->fileName . '_' . $currentChunk);
    
            Storage::disk('local')->put("chunks/$this->uniquePath" . $this->fileName . '_' . $currentChunk, base64_decode($chunk));
    
            
            if ($currentChunk + 1 === $totalChunks) {
                $this->combineChunks($this->fileName, $totalChunks);
            }
    
            $this->progress = (($currentChunk + 1) / $totalChunks) * 100;
            $this->emit('chunkUploaded', $this->progress);
            $this->progress;
        }
        
    }

    private function combineChunks($fileName, $totalChunks)
    {
        $type = $this->typedemande == 'subventions' ? File::TypeSubvention($this->type) : File::TypeFormation($this->type);
        $file = $type['title'] .'.'. $this->extension;
        $this->path = "public/uploads/$this->uniquePath";
        $path =storage_path('app/' . $this->path);
        if(!FileSupport::exists($path)) {
            FileSupport::makeDirectory($path, 0777, true, true);
        }
        $combinedFile = fopen("$path/$file", 'wb');

        for ($i = 0; $i < $totalChunks; $i++) {
            $chunk = Storage::disk('local')->get("chunks/$this->uniquePath" . $fileName . '_' . $i);
            fwrite($combinedFile, $chunk);
            Storage::disk('local')->delete("chunks/$this->uniquePath" . $fileName . '_' . $i);
        }

        fclose($combinedFile);
        $this->path = "$this->path/$file";
        // Save file information to database
        $this->saveToDB();

        $this->emit('uploadCompleted', $this->path);
    }

    public function saveToDB()
    {
        $type = $this->typedemande == 'subventions' ? File::TypeSubvention($this->type) : File::TypeFormation($this->type);

        return File::create([
            'id'                => Str::uuid(),
            'title'             => $type['title'],
            'slug'              => Str::slug($type['title']),
            'url'               => $this->path,
            'code_file'         => $type['code'],
            'file_type'         => $this->typedemande == 'subventions' ? 'subvention' : 'formation',
            'code_employeur'    => auth()->user()->code_employeur,
            'code_demande'      => $this->code_demande,
        ]);
    }

    public function render()
    {
        $type = $this->typedemande == 'subventions' ? File::TypeSubvention($this->type) : File::TypeFormation($this->type);
        $file = File::where([
            ['code_employeur',auth()->user()->code_employeur],
            ['code_demande',$this->code_demande],
            ['code_file',$type['code']],
        ])->first();


        return !is_null($file) ? view('livewire.updated-file') : view('livewire.file-upload');
    }
}
