<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\User;
use Session;

class FilesController extends Controller
{

    static protected $authServer = 'https://smartdoc-server.herokuapp.com/api';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$response = Http::withHeaders([
            'Authorization' => 'Bearer '.Session::get('token'),
        ])->post(
            self::$authServer.'/folders/documents',
            [
                'folder_id' => $id, 
            ]);

        $documents = json_decode($response->body());
        //dd($documents);
        return view('folders.show', compact('documents'));*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'document' => 'required|max:2000',
            'ident' => 'required',
        ]);

        $file = $request->file('document');
        $response = Http::attach(
                'document',
                file_get_contents($file->getRealPath()),
                $file->getClientOriginalName())
            ->withHeaders([
                    'Authorization' => 'Bearer '.Session::get('token'), 
                ])
            ->post(self::$authServer.'/folders/addFile', [
                'folder_id' => $request->input('ident'),
            ]);
        
        //return $response;
        if($response->ok()) {
            return redirect()->route('files.index')->with('success', 'Archivo fue cargado');
        } else {
            return redirect()->back()->with('error', 'Error en subir archivo');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function destroyDoc(Request $request)
    {
        //dd($request);   
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.Session::get('token'),
        ])->post(
            self::$authServer.'/folders/removeFile',
            [
                'folder_id' => $request->fold_id,
                'document_id' => $request->doc_id,
            ]);

        //return $response;
        if($response->ok()) {
            return redirect()->route('folders.show', $request->fold_id)->with('success', 'Documento Eliminado');
        } else {
            return redirect()->back()->with('error', 'Error en eliminar archivo');
        }
    }

    public function categoryDoc(Request $request)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.Session::get('token'),
        ])->get(
            self::$authServer.'/folders/categoryDocuments',
            [
                'folder_id' => $request->fold_id,
                'variable' => $request->variable,
            ]);
        //dd(json_decode($response->body()));
        if($response->ok()) {
            $var = $request->variable;
            $documents = json_decode($response->body());
            $ident = $request->fold_id;
            return view('folders.category', compact('documents', 'var', 'ident'));
        } else {
            return redirect()->back()->with('error', 'Error en eliminar archivo');
        }
    }

    public function conceptDoc(Request $request)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.Session::get('token'),
        ])->get(
            self::$authServer.'/folders/conceptDocuments',
            [
                'folder_id' => $request->fold_id,
                'variable' => $request->variable,
            ]);
            //dd(json_decode($response->body()));
        if($response->ok()) {
            $var = $request->variable;
            $documents = json_decode($response->body());
            $ident = $request->fold_id;
            return view('folders.concept', compact('documents', 'var', 'ident'));
        } else {
            return redirect()->back()->with('error', 'Error en eliminar archivo');
        }
    }
    
    public function sentimentDoc(Request $request)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.Session::get('token'),
        ])->get(
            self::$authServer.'/folders/sentimentDocuments',
            [
                'folder_id' => $request->fold_id,
                'variable' => $request->variable,
            ]);
        //dd(json_decode($response->body()));
        if($response->ok()) {
            $var = $request->variable;
            $documents = json_decode($response->body());
            $ident = $request->fold_id;
            return view('folders.sentiment', compact('documents', 'var', 'ident'));
        } else {
            return redirect()->back()->with('error', 'Error en eliminar archivo');
        }
    }

    public function lengNatural(Request $request)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.Session::get('token'),
        ])->get(
            self::$authServer.'/folders/naturalLanguage',
            [
                'folder_id' => $request->fold_id,
                'nl_query' => $request->texto,
            ]);
        //dd(json_decode($response->body()));
        if($response->ok()) {
            $var = $request->texto;
            $documents = json_decode($response->body());
            $ident = $request->fold_id;
            return view('folders.lengnatural', compact('documents', 'var', 'ident'));
        } else {
            return redirect()->back()->with('error', 'Error en eliminar archivo');
        }
    }
}
