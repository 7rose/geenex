<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilderTrait;
use Auth;
use Image;

use App\Product;
use App\Conf;
use App\Forms\ProductForm;

class ProductController extends Controller
{
    use FormBuilderTrait;

    /**
     * Products
     *
     */
    public function index()
    { 
        $categories = Conf::where('level', 2)
                        ->where('type', 'category')
                        ->with(['subs' => function ($query){
                            $query->whereHas('products', function ($q) {
                                // $q->where('content', 'like', 'foo%');
                            });
                            $query->withCount('products');
                        }])
                        ->get();

        $brands = Conf::where('type', 'brand')
                        ->whereHas('brand_products', function ($query) {
                            // $query->where('content', 'like', 'foo%');
                        })
                        ->withCount('brand_products')
                        ->get();

        $products = Product::where('img', true)
                            ->get();

        return view('products.all', compact('categories', 'brands', 'products'));

    }

    /**
     * create
     *
     */
    public function create()
    {
        $form = $this->form(ProductForm::class, [
            'method' => 'POST',
            'url' => '/products/store'
        ]);

        $title = 'Add a Product';
        $icon = 'cube';

        return view('form', compact('form','title','icon'));
    }

    /**
     * store
     *
     */
    public function store(Request $request)
    {
        $all = $request->all();

        $all['created_by'] = Auth::id();

        $record = Product::create($all);

        return view('img', compact('record'));
    }

    /**
     * image store
     *
     */
    public function imgStore(Request $request)
    {
        $img = $request->file('avatar');
        $id = $request->id;
        // $extension = $img->getClientOriginalExtension();
        // Storage::disk('img')->put($id.'.'.$extension,  File::get($img));
        $exists = Product::find($id);
        if(!$exists) abort('404');

        Image::make($img)->insert('img/watermark.png')->save('storage/app/img/'.$id.'.jpg', 100);

        $exists->update(['img' => true]);

        echo '200';
    }


    /**
     * 
     *
     */
}























