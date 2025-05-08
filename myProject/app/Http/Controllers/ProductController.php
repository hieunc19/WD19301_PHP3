<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    private $view;

    public function __construct()
    {
        $this->view = [];
    }

    public function index()
    {
        $objPro = new Product();
        $this->view['listPro'] = $objPro->loadAllDataProductWithPage();
        // dd($this->view);
        return view('product.index', $this->view);
    }

    public function create()
    {
        $objCate = new Category();
        $this->view['listCate'] = $objCate->loadAllDataCategory();
        return view('product.create', $this->view);
    }

    public function uploadFile($file)
    {
        $fileName = time() . "_" . $file->getClientOriginalName();
        return $file->storeAs('image_products', $fileName, 'public');
    }

    public function store(StoreProductRequest $request)
    {
        $data = $request->except('image');
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $data['image'] = $this->uploadFile($request->file('image'));
        }
        $objPro = new Product();
        $res = $objPro->insertDataProduct($data);
        if ($res) {
            return redirect()->back()->with('success', 'Sản phẩm thêm mới thành công!');
        } else {
            return redirect()->back()->with('error', 'Sản phẩm thêm mới ko thành công!');

        }
    }

    public function edit(int $id){
        $objCate = new Category();
        $this->view['listCate'] = $objCate->loadAllDataCategory();
        $objPro = new Product();
        $this->view['listPro'] = $objPro->loadIdDataProduct($id);
        return view('product.edit',$this->view);
    }
    public function update(Request $request, int $id)
    {
        $objPro = new Product();
        $checkId = $objPro->loadIdDataProduct($id);
        $imageOld = $checkId->image;
        if ($checkId) {
            $data = $request->except('image');
            //
            if ($request->hasFile('image') && $request->files('image')->isValid()) {
                $data['image'] = $this->uploadFile($request->files('image'));
            } else {
                $data['image'] = $imageOld;
            }
            $res = $objPro->updateDataProduct($data, $id);
            if ($res) {
                if(isset($imageOld) && Storage::disk('public')->exists($imageOld)){
                    Storage::disk('public')->delete($imageOld);
                 }
                return redirect()->back()->with('success', 'Sản phẩm chỉnh sửa thành công!');
            } else {
                return redirect()->back()->with('error', 'Sản phẩm chỉnh sửa ko thành công!');
            }
        } else {
            return redirect()->back()->with('error', 'Sản phẩm chỉnh sửa ko thành công!');
        }
    }

}
