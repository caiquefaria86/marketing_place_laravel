<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreRequest;
use App\Traits\UploadTrait;

class StoreController extends Controller
{
    use UploadTrait;

    public function __construct()
    {
        $this->middleware('user.has.store')->only(['create', 'store']);
    }

    public function index()
    {

       $store = auth()->user()->store;

       return view('admin.stores.index', compact('store'));
    }


    public function create()
    {
        
        $users = \App\User::all(['id', 'name']);
        return view('admin.stores.create', compact('users'));
    }

    public function store(StoreRequest $request)
    {

        
        $data = ($request->all());

        $user = auth()->user();
        $store = $user->store()->create($data);

        if($request->hasFile('logo')):
            $data['logo'] = $this->imageUpload($request->file('logo'));
        endif;

        flash('Loja Criada Com Sucesso!')->success();
        return redirect()->route('admin.stores.index');
    }

    
    public function edit($store)
    {
        $store = \App\Store::find($store);

        return view('admin.stores.edit',compact('store'));
    }


    public function update(StoreRequest $request, $store)
    {
        
        $data = $request->all();
        $store = \App\Store::find($store);

        if($request->hasFile('logo')):
            if(Storage::disk('public')->exists($store->logo)):
                Storage::disk('public')->delete($store->logo);
            endif;
            
            $data['logo'] = $this->imageUpload($request->file('logo'));
        
        endif;

         $store->update($data);

        flash('Loja Atualizada com Sucesso!')->success();
         return redirect()->route('admin.stores.index');
    }

    public function destroy($store)
    {
        $store = \App\Store::find($store);
        $store->delete();

        flash('Loja excluida com Sucesso!')->success();
        return redirect()->route('admin.stores.index');
    }
}
