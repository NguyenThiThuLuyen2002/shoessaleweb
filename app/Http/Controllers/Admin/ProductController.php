<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\CreateProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    protected $category;
    protected $product;

    public function __construct(Product $product, Category $category)
    {
        $this->product = $product;
        $this->category = $category;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = $this->product->with('category')->oldest('id')->paginate(3);

        return view('admin.products.index', compact('products'), [
            'title' => 'Danh sách sản phẩm'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = $this->category->get(['id', 'name_category']);

        return view('admin.products.create', compact('categories'),  [
            'title' => 'Thêm sản phẩm'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateProductRequest $request)
{
    $file_name = null;
    $mainProductSaved = false;

    try {
        // Process main product data (e.g., image upload)
        if ($request->hasFile('image_upload')) {
            $file = $request->file('image_upload');
            $ext = $file->extension();
            $file_name = 'product-' . $request->input('name_product') . '.' . $ext;
            $file->move(public_path('upload/products'), $file_name);
        }

        $request->merge(['avt' => $file_name]);

        // Start transaction
        DB::beginTransaction();

        // Save main product
        $product = Product::create([
            'id_category' => $request->input('id_category'),
            'name_product' => $request->input('name_product'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
            'avt' => $request->input('avt')
        ]);

        $id_product = $product->id;

        // Process product details
        if ($request->has('details')) {
            $details = $request->input('details', []);

            foreach ($details as $index => $detail) {
                $file_detail = $request->file('details.' . $index . '.image_detail_upload');

                // Process detail data (e.g., image upload)
                if ($file_detail) {
                    $ext = $file_detail->extension();
                    $file_name_detail = 'product-detail-' . $request->input('name_product') . '.' . $ext;
                    $file_detail->move(public_path('upload/products/details'), $file_name_detail);
                } else {
                    $file_name_detail = $request->input('avt');
                    $currentPath = public_path('upload/products') . '/' . $file_name_detail;
                    $newPath = public_path('upload/products/details') . '/' . $file_name_detail;
                    \File::copy($currentPath, $newPath);
                }

                $productDetail = ProductDetail::create([
                    'id_product' => $id_product,
                    'size' => $detail['size'],
                    'color' => $detail['color'],
                    'avt_detail' => $file_name_detail ?? 'default.jpg',
                    'inventory_number' => $detail['inventory_number'],
                ]);

                $productDetail->product()->associate($product);
                $productDetail->save();
            }
        }

        DB::commit();

        // Indicate that the main product is successfully saved
        $mainProductSaved = true;

        Session::flash('success', 'Thêm Sản phẩm thành công');
    } catch (\Exception $err) {
        // Rollback transaction in case of any error
        DB::rollBack();

        // If an error occurs and the main product is not saved, return with an input
        if (!$mainProductSaved) {
            Session::flash('error', 'Thêm Sản phẩm lỗi');
            \Log::error($err->getMessage());
            //dd($err->getMessage());
            return redirect()->back()->withInput();
        }

        // If an error occurs after the main product is saved, redirect back
        Session::flash('error', 'Thêm Sản phẩm lỗi');
        \Log::error($err->getMessage());
        //dd($err->getMessage());
        return redirect()->back();
    }

    return redirect()->back();
}


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::with('details')->findOrFail($id);
        return view('admin.products.detail', compact('product'), [
            'title' => 'Chi tiết sản phẩm'
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = $this->category->get(['id', 'name_category']);
        $product = Product::with('details')->findOrFail($id);
        return view('admin.products.update', compact(['categories', 'product']), [
            'title' => 'Cập nhật sản phẩm'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, string $id)
    {
        try {
            // Lấy thông tin sản phẩm cần cập nhật
            $product = Product::findOrFail($id);

            // Xử lý upload ảnh
            if ($request->has('image_upload')) {
                $file = $request->image_upload;
                $file_name = $file->getClientOriginalName();
                $file->move(public_path('upload/products'), $file_name);

                // Cập nhật tên ảnh mới cho sản phẩm
                $product->avt = $file_name;
            }

            // Cập nhật thông tin sản phẩm
            $product->id_category = $request->input('id_category');
            $product->name_product = $request->input('name_product');
            $product->price = $request->input('price');
            $product->description = $request->input('description');
            $product->save();

            // Cập nhật thông tin chi tiết sản phẩm
            if ($request->has('details')) {
                $details = $request->input('details', []);
                foreach ($details as $index => $detail) {
                    // Kiểm tra xem trường 'image_detail_upload' có tồn tại trong mảng $detail không
                    if (isset($detail['image_detail_upload'])) {
                        // Lấy thông tin từ đối tượng UploadedFile
                        $file_detail = $detail['image_detail_upload'];

                        // Kiểm tra xem file đã được chọn chưa
                        if ($file_detail) {
                            // Lấy tên file gốc
                            $file_name_detail = $file_detail->getClientOriginalName();

                            // Di chuyển file đến thư mục đích
                            $file_detail->move(public_path('upload/products'), $file_name_detail);
                        } else {
                            $file_name_detail = 'default123.jpg';
                        }
                    } else {
                        $file_name_detail = 'default123.jpg';
                    }

                    // Lấy hoặc tạo thông tin chi tiết sản phẩm
                    $productDetail = ProductDetail::updateOrCreate(
                        ['id_product' => $id, 'size' => $detail['size']],
                        [
                            'color' => $detail['color'],
                            'avt_detail' => $file_name_detail,
                            'inventory_number' => $detail['inventory_number'],
                        ]
                    );
                }
            }

            Session::flash('success', 'Cập nhật Sản phẩm thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Cập nhật Sản phẩm lỗi');
            \Log::error($err->getMessage());
            dd($err->getMessage());
            return redirect()->back()->withInput();
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
