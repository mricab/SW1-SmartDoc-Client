<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\User;
use Session;

class FoldersController extends Controller
{
    static protected $authServer = 'https://smartdoc-server.herokuapp.com/api';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.Session::get('token'),
        ])->get(self::$authServer.'/account/folders');

        //dd($response->body());
        $folders = json_decode($response->body());
        //dd($folders);
        return view('folders.index', compact('folders'));
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
            'name' => 'required',
            'description' => 'required',
            'language' => 'required',
        ]);

        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.Session::get('token'),
        ])->post(
            self::$authServer.'/folders/create',
            [
                'name' => $request->input('name'), 
                'description' => $request->input('description'), 
                'language' => $request->input('language'), 
            ]);
        
        return redirect()->route('folders.index')->with('success', 'Carpeta Creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.Session::get('token'),
        ])->post(
            self::$authServer.'/folders/documents',
            [
                'folder_id' => $id, 
            ]);

        /*$ent = Http::withHeaders([
                'Authorization' => 'Bearer '.Session::get('token'),
            ])->get(
                self::$authServer.'/folders/entities',
                [
                    'folder_id' => $id, 
                ]);*/
        //dd(json_decode($ent->body()));

        $cat = Http::withHeaders([
                    'Authorization' => 'Bearer '.Session::get('token'),
                ])->get(
                    self::$authServer.'/folders/categories',
                    [
                        'folder_id' => $id, 
                    ]);

        $con = Http::withHeaders([
                        'Authorization' => 'Bearer '.Session::get('token'),
                    ])->get(
                        self::$authServer.'/folders/concepts',
                        [
                            'folder_id' => $id, 
                        ]);

        $sen = Http::withHeaders([
                            'Authorization' => 'Bearer '.Session::get('token'),
                        ])->get(
                            self::$authServer.'/folders/sentiments',
                            [
                                'folder_id' => $id, 
                            ]);

        $documents = json_decode($response->body());
        //$entities = json_decode($ent->body());
        $categories = json_decode($cat->body());
        $concepts = json_decode($con->body());
        $sentiments = json_decode($sen->body());
        //dd($categories);
        $ident = $id;

        return view('folders.show', compact('documents', 'categories', 'concepts', 'sentiments', 'ident'));
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
        dd($id);
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.Session::get('token'),
        ])->post(
            self::$authServer.'/folders/delete',
            [
                'folder_id' => $id, 
            ]);

        return redirect()->route('folders.index')->with('success', 'Carpeta Eliminado');
    }
}
