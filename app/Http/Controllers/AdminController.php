<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

use App\Models\Product;



class AdminController extends Controller
{
    public function view_category(){
        $data = Category::all();
        return view('admin.category',compact('data'));
    }

    public function add_category(Request $request){
        $category = new Category;

        $category->category_name= $request->category;

        $category->save();

    
        toastr()->closeButton()->timeOut(6000)->addSuccess('Category added successfully!');

        return redirect()->back();

    }
    public function delete_category($id){
        $data = Category::find($id);
        $data -> delete();
        toastr()->closeButton()->timeOut(6000)->addSuccess('Category deleteded successfully!');
        return redirect()->back();
    }

    public function edit_category($id){
        $data = Category::find($id);
        return view('admin.edit_category',compact('data'));
    }
    public function update_category(Request $request,$id){

        $data = category::find($id);
        $data->category_name = $request ->catgegory;
$data ->save();
toastr()->closeButton()->timeOut(6000)->addSuccess('Category deleteded successfully!');
return redirect('/view Category');

    }
    public function add_product(){
        $category = Category::all();

        return view('admin.add_product',compact('category'));
     
    }

    public function upload_product(Request $request){
        
        $data = new Product();
        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->quantity = $request->quantity;
        $data->category = $request->category;
    
        $image = $request->image;
        if ($image) {
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move('products', $imageName);
            $data->image = $imageName;
        }
    
        $data->save();
    
        toastr()->timeOut(10000)->closeButton()->addSuccess('Product Updated Successfully');
    
        return redirect('/view_product');



    }
    public function view_product(){

        $product = Product::paginate(4);
    
        return view('admin.view_product',compact('product'));
    }

    public function delete_product($id){

        $data = Product::find($id);

        $image_path = public_path('products/'.$data->image);

         if(file_exists($image_path)){

         unlink($image_path);

        }

        $data->delete();

        toastr()->timeOut(10000)->closeButton()->addSuccess('Product Deleted Successfully');

        return redirect()->back();

        }
    
    
        public function update_product($id)
        {
        
            $data = Product::find($id);
        
            $category= Category::all();
        
            return view('admin.update_page',compact('data', 'category'));
        
        
        }
  
        public function edit_product(Request $request, $id)
        {
            $data = Product::find($id);
        
            $data->title = $request->title;
            $data->description = $request->description;
            $data->price = $request->price;
            $data->quantity = $request->quantity;
            $data->category = $request->category;
        
            $image = $request->image;
            if ($image) {
                $imageName = time().'.'.$image->getClientOriginalExtension();
                $image->move('products', $imageName);
                $data->image = $imageName;
            }
        
            $data->save();
        
            toastr()->timeOut(10000)->closeButton()->addSuccess('Product Updated Successfully');
        
            return redirect('/view_product');
        }


}
