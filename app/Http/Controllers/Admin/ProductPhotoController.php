<?php

namespace App\Http\Controllers\Admin;

use App\ProductPhoto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductPhotoController extends Controller
{
    public function removePhoto(Request $request)
    {
        //buscar a foto no banco com id dela
        $photoName = $request->get('photoName');

        if(Storage::disk('public')->exists($photoName)):
            Storage::disk('public')->delete($photoName);
        endif;
        //remover ela dos arquivos
        $removePhoto = ProductPhoto::where('image', $photoName);
        $productId = $removePhoto->first()->product_id;
        $removePhoto->delete();

        flash('Imagem deletada com sucesso!')->success();
        return redirect()->route('admin.products.edit', ['product'=> $productId]);
        // removo ela do banco
    }
}
