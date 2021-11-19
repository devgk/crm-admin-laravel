<?php

namespace App\Http\Controllers\Web;

use App\Models\Product;
use App\Rules\NameText;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware(['auth', 'verified', 'IsAdmin']);
    }

    /**
     * Show product listing.
     */
    public function index(Request $request){
        // Get  the user details from the request
        $user = $request->user();

        $response = session('product_creation_status');
        if(!empty($response)){
            if('success' == $response)
            Alert::toast('Product has been added!', 'success');

            else Alert::toast($response,'error');
        }

        $datatable_columns = [
            [
                'type'          => 'functional',
                'alias'         => 'product_image',
                'name'          => 'products.image',
                'title'         => 'Product Image',
                'function'      => <<<CODE
                    let productImage = full.product_image;
                    if(null == productImage) productImage = "http://placehold.it/160x100";
                    else productImage = '/uploads/' + productImage;

                    return '<img class="thumbnail" src="' + productImage + '" />';
                CODE
            ],
            [
                'type'          => 'simple',
                'alias'         => 'product_title',
                'name'          => 'products.title',
                'title'         => 'Product Title',
                'orderable'     => 'true',
                'searchable'    => 'true',
            ],
            [
                'type'          => 'simple',
                'alias'         => 'category_name',
                'name'          => 'product_categories.name',
                'title'         => 'Category',
                'orderable'     => 'true',
                'searchable'    => 'true',
            ],
            [
                'type'          => 'functional',
                'alias'         => 'product_price',
                'name'          => 'products.price',
                'title'         => 'Price',
                'orderable'     => 'true',
                'searchable'    => 'true',
                'function'      => <<<CODE
                    return full.product_price + ' $ USD';
                CODE
            ],
            [
                'type'          => 'functional',
                'alias'         => 'product_created_at',
                'name'          => 'products.created_at',
                'title'         => 'Created Date',
                'orderable'     => 'true',
                'searchable'    => 'true',
                'initial_order' => 'true',
                'function'      => <<<CODE
                    return moment(data).format("Do MMM YY - h:mm A");
                CODE
            ],
            [
                'type'          => 'hidden',
                'alias'         => 'product_slug',
                'name'          => 'products.slug',
                'searchable'    => 'true',
            ],
            [
                'type'          => 'hidden',
                'alias'         => 'product_description',
                'name'          => 'products.description',
                'searchable'    => 'true',
            ],
        ];

        return view('pages.product.index', [
            'name'              => $user->username,
            'datatable_columns' => $datatable_columns
        ]);
    }

    /**
     * Datatable API for product listing
     */
    public function dataAjax(Request $request){
        if ($request->ajax()) {

            $products = Product::query()
                ->join('product_categories', 'products.category_id', '=', 'product_categories.id')
                ->select(
                    'products.id',
                    'products.slug as product_slug',
                    'products.title as product_title',
                    'products.description as product_description',
                    'products.image as product_image',
                    'products.price as product_price',
                    'products.created_at as product_created_at',
                    'product_categories.name as category_name'
                );

            return Datatables::of($products)->toJson();
        }
    }

    /**
     * Add new product form view
     */
    public function add(Request $request){
        // Get  the user details from the request
        $user = $request->user();

        $categories = ProductCategory::all()->take(50);

        return view('pages.product.add', [
            'name'          => $user->username,
            'categories'    => $categories
        ]);
    }

    /**
     * Add new product
     */
    public function addAction(Request $request){
        $this->validate($request, [
            'title'         => ['required', new NameText, 'unique:products', 'max:255', 'min:4'],
            'description'   => 'required|string',
            'price'         => 'required|numeric',
            'category'      => 'required|numeric',
        ]);

        $product              = new Product;
        $product->title        = $request->title;
        $product->slug        = strtolower(str_replace(' ', '-', $request->title));
        $product->description = $request->description;
        $product->price       = $request->price;
        $product->category_id = $request->category;

        if($request->hasFile('image')){
            $name = strtolower(str_replace(' ', '-', $request->title)).'-'.time();
            $extension = $request->image->extension();

            $product->image = $request->image->storeAs(
                'product-images',
                $name.'.'.$extension,
                'public'
            );
        }
        
        // Save Product
        $product->save();

        return redirect()->route('product.listing')->with('product_creation_status', 'success');
    }

    /**
     * Single product page
     */
    public function singleProduct(Request $request, $slug){
        // Get  the user details from the request
        $user = $request->user();

        $product = Product::where('slug', '=', $slug)->first();

        return view('pages.product.single', [
            'name' => $user->username,
            'product' => $product
        ]);
    }
}
