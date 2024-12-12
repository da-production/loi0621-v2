<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadFileRequest;
use App\Models\File;
use App\Models\Formation;
use App\Models\Subvention;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{

    private function createAndMove($file, $folder)
    {

        $code_employeur = auth()->user()->code_employeur;
        $dateYear = Storage::disk('public')->has("upload/$folder/$code_employeur");
        if (!$dateYear) {
            Storage::makeDirectory("public/upload/$folder/$code_employeur", 0775, true);
        }
        return $file->storeAs("public/upload/$folder/$code_employeur", Str::slug(Date("Y-m-d-His") . "-" . $file->getClientOriginalName(), '-') . "." . $file->extension());
    }

    public function uploadSubvention(UploadFileRequest $request)
    {
        $errors = [];
        if (!array_key_exists($request->type, File::TypeSubvention())) {
            return back()->with("error", "le type de fichier ne figure pas dans la liste");
        }
        if ($request->hasFile($request->type)) {
            if (File::autorizedFile($request->file($request->type))) {
                $remboursement = $request->file($request->type);
                $path = $this->createAndMove($remboursement, 'subvention');
                if($path){
                    $title = File::TypeSubvention($request->type)['title'];
                    $file = File::create([
                        'id'                => Str::uuid(),
                        'title'             => $title,
                        'slug'              => Str::slug($title),
                        'url'               => $path,
                        'code_file'         => File::TypeSubvention($request->type)['code'],
                        'file_type'         => 'subvention',
                        'code_employeur'    => auth()->user()->code_employeur,
                        'code_demande'      => $request->code_demande,
                    ]);
                    if ($file) return back()->with($request->type, 'Le fichier a été téléchargé avec succès');
                }
            }
        } else {
            array_push($errors, $request->type);
        }


        if (count($errors) != 0) {
            return back()->with("nofiles", "aucun fichier n'a été inséré");
        }

        // id(uuid),title,slug,url,code_employeur
    }

    public function uploadFormation(Request $request)
    {
        $errors = [];
        if (!array_key_exists($request->type, File::TypeFormation())) {
            return back()->with("error", "le type de fichier ne figure pas dans la liste");
        }
        if ($request->hasFile($request->type)) {
            if (File::autorizedFile($request->file($request->type))) {
                $remboursement = $request->file($request->type);
                $path = $this->createAndMove($remboursement, 'formation');
                if($path){
                    $title = File::TypeFormation($request->type)['title'];
                    $file = File::create([
                        'id'                => Str::uuid(),
                        'title'             => $title,
                        'slug'              => Str::slug($title),
                        'url'               => $path,
                        'code_file'         => File::TypeFormation($request->type)['code'],
                        'file_type'         => 'formation',
                        'code_employeur'    => auth()->user()->code_employeur,
                        'code_demande'      => $request->code_demande,
                    ]);
                    if ($file) return back()->with($request->type."Success", 'Le fichier a été téléchargé avec succès');
                }
            }
        } else {
            array_push($errors, $request->type);
        }

        if (count($errors) != 0) {
            return back()->with("nofiles", "aucun fichier n'a été inséré");
        }

        // id(uuid),title,slug,url,code_employeur
    }


    public function downloadFiles($name)
    {
        $pathToFile = storage_path('app/public/download/' . $name . '.pdf');
        return response()->download($pathToFile);
    }

    public function employeurShow()
    {
        
        $files = File::where('code_employeur', auth()->user()->code_employeur);
        return view('employeur.subvention.upload-file', compact(['files']));
    }

    /**
     * Subvention view
     * @param String code demande
     */
    public function subventionShow($cod_demande)
    {
        $subventions = Subvention::join('files','subventions.cod_demande','=','files.code_demande')
        ->where(
            [
                ['subventions.code_employeur',auth()->user()->code_employeur],
                ['files.code_demande','=',$cod_demande]
            ]
        )
        ->select('subventions.cod_demande','files.*')
        ->get();
        
        $files = File::where('code_employeur', auth()->user()->code_employeur);
        return view('employeur.subvention.upload-file', compact(['files','cod_demande','subventions']));
    }

    /**
     * Formation
     * @param String code demande
     */

    public function formationShow($cod_demande)
    {
        $formations = Formation::join('files','formations.cod_demande','=','files.code_demande')
        ->where(
            [
                ['formations.code_employeur',auth()->user()->code_employeur],
                ['files.code_demande','=',$cod_demande]
            ]
        )
        ->select('formations.cod_demande','files.*')
        ->get();
        
        $files = File::where('code_employeur', auth()->user()->code_employeur);
        return view('employeur.formation.upload-file', compact(['files','cod_demande','formations']));
    }

    public function employeShow()
    {
        return view('employeur.subvention.upload-employe');
    }
}
