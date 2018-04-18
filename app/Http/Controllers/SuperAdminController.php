<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Carbon\Carbon;
use App\Category;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
session_start();
class SuperAdminController extends Controller
{
    public function index()
    {
         $this->authCheck();
    	 $dashboard =  view('admin.pages.dashboard');
    	 return view('admin_master')
    			->with('dashboard',$dashboard);
    }
    public function addCategory(){
    	return view('admin.pages.add_category');
    }
    public function saveCategory(Request $request){
    	// query builder insert query start
    	// $data = array();
    	// $data['category_name'] = $request->category_name;
    	// $data['category_slug'] = str_slug($request->category_name);
    	// $data['category_description'] = $request->category_description;
    	// $data['status'] = $request->status;
    	// $data['created_at'] = Carbon::now();
    	// DB::table('categories')->insert($data);
    	// query builder insert query end

    	//object er madhome insert start

    	// $data = new category();
    	// $data['category_name'] = $request->category_name;
    	// $data['category_slug'] = str_slug($request->category_name);
    	// $data['category_description'] = $request->category_description;
    	// $data['status'] = $request->status;
    	// $data->save();
    	//object er madhome insert end

    	//ORM er madhome insert kora

    	// $data['category_name'] = $request->category_name;
    	// $data['category_slug'] = str_slug($request->category_name);
    	// $data['category_description'] = $request->category_description;
    	// $data['status'] = $request->status;

    	// Category::create($data);
        $data = array();
        $data['category_name']=$request->category_name;
        $data['category_slug']=str_slug($request->category_name);
        $data['category_description']=$request->category_description;
        $data['status']=$request->status;

        DB::table('categories')->insert($data);

    	return redirect('/add-category')->with('msg', 'Category Added!');;
    }

    public function manageCategory(){
        $category_name = DB::table('categories')
                ->select('*')
                ->get();
        return view('admin.pages.manage_category')
               ->with('category_name',$category_name);
    }

    public function unpublishCategory($category_id){
        DB::table('categories')
            ->where('category_id', $category_id)
            ->update(['status' => 0]);
        return Redirect::to('manage-category');
    }
     public function publishCategory($category_id){
        DB::table('categories')
            ->where('category_id', $category_id)
            ->update(['status' => 1]);
        return Redirect::to('manage-category');
    }
    public function deleteCategory($category_id){
        DB::table('categories')
            ->where('category_id', $category_id)
            ->delete();
        return Redirect::to('manage-category');
    }

    public function editCategory($category_id){
        $category_name = DB::table('categories')
                ->where('category_id',$category_id)
                ->first();
        return view('admin.pages.edit_category')
               ->with('category_info',$category_name);
    }

    public function updateCategory(Request $request){
        $data = array();
        $cat_id =$request->category_id;
        $data['category_name']=$request->category_name;
        $data['category_description']=$request->category_description;
        DB::table('categories')
                ->where('category_id',$cat_id)
                ->update($data);
        return Redirect::to('/manage-category');
    }
    public function authCheck(){
        $admin_id = Session::get('admin_id');
        if($admin_id==NULL){
            return Redirect::to('/admin')->send();
        }
    }

    public function addBlog(){
        $category_info = DB::table('categories')
                            ->get();
        return view('admin.pages.add_blog')
                ->with('category_info',$category_info);
    }
    public function saveBlog(Request $request){
        $data = array();
        $data['blog_title'] = $request->blog_title;
        $data['category_id'] = $request->category_id;
        $data['blog_short_description'] = $request->blog_short_description;
        $data['blog_long_description'] = $request->blog_long_description;
        $data['author_name'] = Session::get('admin_name');
        $data['publication_status'] = $request->publication_status;
    DB::table('tbl_blog')->insert($data);
    Session::put('message','Blog information save Successfully');
    return Redirect::to('/add-blog');
    }

    public function logout(){
        Session::put('admin_name','');
        Session::put('admin_id','');
        Session::put('message','You Are Successfully Logout');
        return redirect('/admin');
    }
}


