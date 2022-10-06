<?php

namespace App\Http\Controllers;

use Attribute;
use Illuminate\Http\Request;
use DB;
use PhpParser\Node\Expr\Cast\Array_;
use App\Models\color;
use App\Models\size;
use App\Models\product;
use App\Models\product_color;
use App\Models\product_size;
use App\Models\product_chitiet;
use Illuminate\Support\Facades\Storage;
use App\traits\StorageImage;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\Log;
use PhpParser\Node\Scalar\MagicConst\Line;
use PhpParser\Node\Stmt\Catch_;
use PhpParser\Node\Stmt\TryCatch;

class ProductController extends Controller
{
    use StorageImage;

    private $product;
    private $product_chitiet;
    private $product_color;
    private $product_size;
    public function __construct(product $product, product_chitiet $product_chitiet,product_color $product_color, product_size $product_size )
    {
        $this->product= $product;
        $this->product_chitiet= $product_chitiet;
        $this->product_color = $product_color;
        $this->product_size = $product_size;
    }
    //admin
    public function Product_index(){
        $productdata = $this->product->orderBy('id_product','desc')->get();
        return view('admin/product.index_product',compact('productdata'));
    }
    public function Product_create(){
        $size=DB::table('sizes')->get();
        $color=DB::table('color')->get();
        $category=DB::table('category')->get();
        $brand=DB::table('brand')->get();
        return view('admin/product.add_product',compact('brand','category','color','size'));
    }


    public function Product_add(Request $request)
    {
        //không lỗi vào try có lỗi vào catch
        //có lỗi dữ liệu không insert vào database
        //file log nằm trong storage/logs/laravel.log
        $request->validate([
            'tensp' => 'unique:products,name_product',
        ],[
            'tensp.unique' => 'Đã tồn tại !!!',
        ]);
        try{  
                 DB::beginTransaction();
                $products= [
                    'name_product'=>$request->tensp,
                    'mota_product'=>$request->noidung,
                    'id_category' =>$request->loaisanpham,
                    'price' =>$request->gia,
                    'id_brand'=> $request->thuonghieu,
                    'status'=> $request->status,
                    'qty' =>$request->soluong,
                ];
            
                $UploadFile= $this->Upload_FILE($request,'hinhanh','image_product');  //image_product :  tên foder lưu ảnh   //hinhanh : tên name thẻ input
                if(!empty($UploadFile)){
                    $products['img_product']= $UploadFile['File_Path'];
                }  
                $product =product::create($products);

                if($request->hasFile('hinhanhchitiet')){
                    foreach($request->hinhanhchitiet as $fileItem){
                        $UploadFile_chitiet = $this->Upload_FILES($fileItem,'image_product');  
                        product_chitiet::create([
                            'id_product' => $product->id_product,
                            'img_product_img'=>$UploadFile_chitiet['File_Path'],
                        ]);
                    } 
                }
                foreach($request->color as $value){
                    product_color::create([
                        'id_product' => $product->id_product,
                        'id_color'=> $value,
                    ]);
                } 
                if($request->size)
                 {
                    foreach($request->size as $value){
                        product_size::create([
                            'id_product' => $product->id_product,
                            'id_size'=> $value,
                        ]);
                     }
                 }else{
                        product_size::create([
                            'id_product' => $product->id_product,
                            'id_size'=> 15,
                        ]);
                 }
                DB::commit();
                Session()->flash('success', 'Thành Công');
                return redirect()->route('Product_index');
            } catch (\Exception $exception){
                DB::rollBack();
                //Log::error('Message: '. $exception->getMessage(). ' ---Line : ' .$exception->getLine()); 
            }
        }

    public function Product_deleted($id){
        DB::table('products')->where('id_product',$id)->delete();
        DB::table('product_img')->where('id_product',$id)->delete();
        DB::table('product_colors')->where('id_product',$id)->delete();
        DB::table('product_sizes')->where('id_product',$id)->delete();
        Session()->flash('success', 'Thành Công');
        return redirect()->back();
        }

        public function Product_Edit($id)
        {
            $color=DB::table('color')->get();
            $size=DB::table('sizes')->get();
            $category=DB::table('category')->get();
            $brand=DB::table('brand')->get();
            //$product =DB::table('products')->where('id_product',$id)->get();
            $products =$this->product->find($id);
            $id_color = DB::table('product_colors')->where('id_product',$id)->pluck('id_color')->toArray();
            $id_size = DB::table('product_sizes')->where('id_product',$id)->pluck('id_size')->toArray();
            return view('admin/product.Edit_product',compact('brand','category','color','products','id_color','size','id_size'));
        }

        public function Product_Update(Request $request, $id)
        {
            try{  
                DB::beginTransaction();
                $products= [
                    'name_product'=>$request->tensp,
                    'mota_product'=>$request->noidung,
                    'id_category' =>$request->loaisanpham,
                    'price' =>$request->gia,
                    'id_brand'=> $request->thuonghieu,
                    'status'=> $request->status,
                    'qty' =>$request->soluong,
                ];
            
                $UploadFile= $this->Upload_FILE($request,'hinhanh','image_product');  //image_product :  tên foder lưu ảnh   //hinhanh : tên name thẻ input
                if(!empty($UploadFile)){
                    $products['img_product']= $UploadFile['File_Path'];
                }     
            $this->product->find($id)->update($products);   
            $product =$this->product->find($id);

            if($request->hasFile('hinhanhchitiet')){
            $this->product_chitiet->where('id_product',$id)->delete();//xóa thằng đã tồn tại để thêm mới
                foreach($request->hinhanhchitiet as $fileItem){
                    $UploadFile_chitiet = $this->Upload_FILES($fileItem,'image_product');  
                    product_chitiet::create([
                        'id_product' => $product->id_product,
                        'img_product_img'=>$UploadFile_chitiet['File_Path'],
                    ]);
                    
                } 
            }

            $this->product_color->where('id_product',$id)->delete();//xóa thằng đã tồn tại để thêm mới
            foreach($request->color as $value){
                product_color::create([
                    'id_product' => $product->id_product,
                    'id_color'=> $value,
                ]);
            } 
            $this->product_size->where('id_product',$id)->delete();//xóa thằng đã tồn tại để thêm mới
            foreach($request->size as $value){
                product_size::create([
                    'id_product' => $product->id_product,
                    'id_size'=> $value,
                ]);
            } 
               DB::commit();
               Session()->flash('success', 'Thành Công');
               return redirect()->route('Product_index');
           } catch (\Exception $exception){
               DB::rollBack();
               Log::error('Message: '. $exception->getMessage(). ' ---Line : ' .$exception->getLine()); 
               Session()->flash('success', 'Thất bại !!!');
               return redirect()->route('Product_index');
           }
                
        }  

        ///search product admin

        public function Search_admin(Request $request)
        {
            $Search = $request->Search;
            $Search_product_admin = $this->product->where('name_product','like','%'. $Search.'%')
            ->orwhere('name_product',$Search)
            ->get();

            return view('admin/product.search_product_admin',compact('Search_product_admin'));
        }
}
