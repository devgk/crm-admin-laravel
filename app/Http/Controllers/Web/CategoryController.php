<?php

namespace App\Http\Controllers\Web;

use App\Rules\NameText;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
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
     * Show category listing.
     */
    public function index(Request $request){
        // Get  the user details from the request
        $user = $request->user();

        $response = session('category_creation_status');
        if(!empty($response)){
            if('success' == $response)
            Alert::toast('Category has been created!', 'success');

            else Alert::toast($response,'error');
        }

        /** Creating Database Column Structure
         * to render database table */
        $datatable_columns = [
            [
                'type'          => 'simple',
                'alias'         => 'name',
                'name'          => 'name',
                'title'         => 'Category',
                'orderable'     => 'true',
                'searchable'    => 'true',
            ],
            [
                'type'          => 'simple',
                'alias'         => 'description',
                'name'          => 'description',
                'title'         => 'Description',
                'searchable'    => 'true',
            ],
            [
                'type'          => 'simple',
                'alias'         => 'product_count',
                'name'          => 'product_count',
                'title'         => 'Product Count',
                'orderable'     => 'true',
            ],
            [
                'type'          => 'functional',
                'alias'         => 'category_created_at',
                'name'          => 'product_categories.created_at',
                'title'         => 'Created Date',
                'orderable'     => 'true',
                'searchable'    => 'true',
                'initial_order' => 'true',
                'function'      => <<<CODE
                    return moment(data).format("Do MMM YY - h:mm A");
                CODE
            ],
        ];

        return view('pages.category.index', [
            'name'              => $user->username,
            'datatable_columns' => $datatable_columns
        ]);
    }

    /**
     * Datatable API for category listing
     */
    public function dataAjax(Request $request){
        if ($request->ajax()) {    
            
            // Query Category
            $category = ProductCategory::query()
            ->select(
                'name',
                'description',
                'product_categories.created_at as category_created_at',
                DB::raw('(SELECT COUNT(*) FROM products WHERE products.category_id = product_categories.id) as product_count')
            );

            // Create Datatable API response
            return Datatables::of($category)->toJson();
        }
    }

    /**
     * Add new category form view
     */
    public function add(Request $request){
        // Get  the user details from the request
        $user = $request->user();

        return view('pages.category.add', [
            'name' => $user->username
        ]);
    }

    /**
     * Add new category
     */
    public function addAction(Request $request){
        $this->validate($request, [
            'name'          => ['required', new NameText, 'unique:product_categories', 'max:255', 'min:4'],
            'description'   => 'required|string',
        ]);

        $category              = new ProductCategory;
        $category->name        = $request->name;
        $category->slug        = strtolower(str_replace(' ', '-', $request->name));
        $category->description = $request->description;
        $category->save();

        return redirect()->route('category.listing')->with('category_creation_status', 'success');
    }
}