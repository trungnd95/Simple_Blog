<?php

namespace Simple_Blog\Http\Controllers;

// use Illuminate\Http\Request;

use Simple_Blog\Http\Requests;
use Simple_Blog\Http\Controllers\Controller;
use Simple_Blog\Http\Requests\CateRequest;
use Simple_Blog\Cate;
use Request;
use Validator;
class CateController extends Controller
{
    /**
    *	Funtion return view list all category
    */
    public function index()
    {

      $cates =  Cate::paginate(5);
    	return view('admin.cate.index',compact('cates'));
    }

    /**
    *	Function to return view add a category 
    *
    */

   public function add()
   {
      return view('admin.cate.add');
   }

   /**
   *	Function to add data category was just added to database
   *  @param request: validate data for category to save to database
   */
   public function store(CateRequest $request)
   {
      $name = $request->get('name');
      $description = $request->get('description');
      Cate::create([
          'name' => $name,
          'short_description' => $description,
          'alias' => changeTitle($name)
      ]);
      return redirect()->route('admin.cate.index')->with(['flash_message'=>'Success! Added category','flash_level' => 'success']);
   }

   /**
   *	Function to return view to edit category 
   *
   *	@param id: id of category that want edit 
   *	@param alias : name of category that want edit. it was rewritten
   */
   // public function edit($id)
   // {

   // }

   /**
   *	Function to update data was just edited  to database
   *	@param id: id of category that want edit 
   *	@param alias : name of category that want edit. it was rewritten
   *	@param request: validate input of data for category
   */
   public function update()
   {
        if(Request::ajax())
        {
          $requestAll = Request::all();
          $validate = Validator::make($requestAll,
          [
              'name_cat' => 'required|unique',
              'des_cat'  => 'required'
          ],
          [
              'name_cat.required' => 'Name category is required',
              'name_cat.unique'  => 'This name is exist',
              'des_cat.required'  => 'Short description is required',
          ]);
        $id =  Request::get('id');
        
        $name_cat = Request::get('name_cat');
        $des_cat = Request::get('des_cat');
        $cat = Cate::findOrFail($id);
        $cat->update([
            'name' => $name_cat,
            'alias' => changeTitle($name_cat);
            'short_description' => $des_cat,
        ]);
        $arr = array('id' => $id, 'name_cat'=> $name_cat,'des_cat' => $des_cat);
        echo json_encode($arr);

        }
   }

   /**
   *	Function to delete a category 
   *
   *	@param id: id of category want delete
   */
   public function destroy($id)
   {
   	  if(Request::ajax())
      {
        $requesAll = Request::all();
        $id = Request::get('id');
        $cate = Cate::findOrFail($id);
        $cate->delete();
        echo $id;
      }
   }
}
