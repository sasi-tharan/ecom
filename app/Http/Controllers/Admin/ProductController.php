<?php

namespace App\Http\Controllers\Admin;

use App\Models\Group;
use App\Models\Product;
use App\Models\SubGroup;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        // Retrieve all products from the database
        $products = Product::all();

        // Pass the products to the view
        return view('admin.products.index', ['products' => $products]);
    }

    public function create()
    {
        $departments = Department::all();
        $groups = Group::all();
        $subGroups = SubGroup::all();

        return view('admin.products.create', compact('departments', 'groups', 'subGroups'));
    }

    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'department_id' => 'required|exists:departments,id',
            'group_id' => 'required|exists:group,id',
            'sub_group_id' => 'required|exists:sub_groups,id',
            'sku' => 'required|unique:products,sku',
            'barcode' => 'nullable|unique:products,barcode',
            'brand' => 'nullable',
            'product_name' => 'required',
            'description' => 'required',
            'sg_1' => 'nullable',
            'sg_2' => 'nullable',
            'sg_3' => 'nullable',
            'capacity' => 'nullable',
            'units' => 'nullable',
            'case' => 'nullable',
            'dimension' => 'nullable',
            'supplier_info' => 'nullable',
            'cost_price_before_vat' => 'nullable|numeric',
            'inventory_status' => 'nullable',
            'location' => 'nullable',
            'age_restricted' => 'nullable',
            'price_wsp' => 'nullable|numeric',
            'vat' => 'nullable|numeric',
            'profit_margin' => 'nullable|numeric',
            'rrp' => 'nullable|numeric',
            'reseller_margin' => 'nullable|numeric',
            'trending' => 'required|boolean',
            'featured' => 'required|boolean',
            'status' => 'required|boolean',
            'meta_title' => 'nullable',
            'meta_keyword' => 'nullable',
            'meta_description' => 'nullable',
            'bulk_category_1' => 'nullable',
            'bulk_category_price_1' => 'nullable|numeric',
            'bulk_category_2' => 'nullable',
            'bulk_category_price_2' => 'nullable|numeric',
            'bulk_category_3' => 'nullable',
            'bulk_category_price_3' => 'nullable|numeric',
            'linked_item_1' => 'nullable',
            'linked_item_2' => 'nullable',
            'linked_item_3' => 'nullable',
        ]);

        // Create a new product with the validated data
        $product = Product::create($request->all());

        // Handle product thumbnails upload
        if ($request->hasFile('image')) {
            $uploadPath = 'uploads/product_thumbnail/';
            $i = 1;

            foreach ($request->file('image') as $imageFile) {
                $extention = $imageFile->getClientOriginalExtension();
                $filename = time() . $i++ . '.' . $extention;
                $imageFile->move($uploadPath, $filename);
                $finalImagePathName = $uploadPath . $filename;

                $product->productThumbnails()->create([
                    'product_id' => $product->id,
                    'image' => $finalImagePathName,
                ]);
            }
        }

        // Handle product images upload
        if ($request->hasFile('large_image')) {
            $uploadPath = 'uploads/product_large/';
            $i = 1;

            foreach ($request->file('large_image') as $largeImageFile) {
                $extention = $largeImageFile->getClientOriginalExtension();
                $filename = time() . $i++ . '.' . $extention;
                $largeImageFile->move($uploadPath, $filename);
                $finalImagePathName = $uploadPath . $filename;

                $product->productImages()->create([
                    'product_id' => $product->id,
                    'large_image' => $finalImagePathName,
                ]);
            }
        }

        return redirect()->route('admin.products.index')->with('message', 'Product Added Successfully');
    }

}
