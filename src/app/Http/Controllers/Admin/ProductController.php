<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Product;
use App\ProductPhoto;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    use UploadTrait;

    //todo: Criar middleware para verificar se o existe alguma loga na hora de criar um produto

    // php artisan make:request ProductRequest => Cria um formRequest
    private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userStore = auth()->user()->store;
        if(is_null($userStore)) {
            $products = null;
            return view('admin.products.index', compact('products'));
        }
        $products = $userStore->products()->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all(['id', 'name']);

        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProductRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $data = $request->all();

        $categories = $request->get('categories', null);

        $store = auth()->user()->store;
        $product = $store->products()->create($data);

        if(!is_null($categories)) {
            $product->categories()->sync($categories);
        }

        //Verifica se foi adicionado alguma imagem
        if($request->hasFile('photos')) {

            $images = $this->imageUpload($request->file('photos'), 'image');

            //Inserção das images/referencias na base
            $product->photos()->createMany($images);
        }

        flash('Produto criado com sucesso!')->success();
        return redirect()->route('admin.products.index');
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
        $product = $this->product->findOrFail($id);

        $categories = Category::all(['id', 'name']);

        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProductRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $data = $request->all();
        $categories = $request->get('categories', null);

        $product = $this->product->find($id);
        $product->update($data);

        if(!is_null($categories)) {
            $product->categories()->sync($categories);
        }

        //Verifica se foi adicionado alguma imagem
        if($request->hasFile('photos')) {

            $images = $this->imageUpload($request->file('photos'), 'image');

            //Inserção das images/referencias na base
            $product->photos()->createMany($images);
        }

        flash('Produto atualizado com sucesso!')->success();
        return redirect()->route('admin.products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //todo: Procurar melhorar esse processo

        $product = $this->product->find($id);
        $photos = $product->photos()->get();

        //Remove as imagens do disco
        foreach ($photos as $photo) {

            if(Storage::disk('public')->exists($photo->image)) {
                Storage::disk('public')->delete($photo->image);
            }
        }

        $product->categories()->detach(); // Remove o relacionamento
        $product->photos()->delete(); // Remove as imagens do banco

        $product->delete();

        flash('Produto removido com sucesso!')->success();
        return redirect()->route('admin.products.index');
    }

}
