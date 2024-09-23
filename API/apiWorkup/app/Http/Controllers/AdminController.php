<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = Admin::all();

        return $admin;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Log::info('Accessing cadastrarAdmin view');
        return view('cadastrarAdmin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        /*
|--------------------------------------------------------------------------
Validação
|--------------------------------------------------------------------------
*/

        $request->validate(
            [
                'nomeAdmin'  => 'required',
                'usernameAdmin' => 'required|',
                'emailAdmin' => 'required',
                'contatoAdmin' => 'required',
                'senhaAdmin' => 'required',
                'fotoAdmin' => 'required',

                

            ],
            [
                'nomeAdmin.required'  => 'Digite um nome',
                'usernameAdmin.required' => 'Digite um apelido',
                'emailAdmin.required' => 'Digite um email',
                'contatoAdmin.required' => 'Digite um contato',
                'senhaAdmin.required' => 'Digite uma senha',
                'fotoAdmin.required' => 'Digite uma foto',

            ]
        );
        $admin = new Admin;

        $admin->nomeAdmin = $request->nomeAdmin;
        $admin->usernameAdmin = $request->usernameAdmin;
        $admin->emailAdmin = $request->emailAdmin;
        $admin->contatoAdmin = $request->contatoAdmin;
        $admin->senhaAdmin = Hash::make($request->senhaAdmin);
        $admin->fotoAdmin = $request->fotoAdmin;
        $admin->idStatus = 1;

        $admin->save();
        return view('admin.homeAdmin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $admin = Admin::where('idAdmin', $id)->get();

        return $admin;
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
}
