<?php

namespace Simple_Blog\Http\Controllers;

// use Illuminate\Http\Request;

use Simple_Blog\Http\Requests;
use Simple_Blog\Http\Controllers\Controller;
use Simple_Blog\Http\Requests\UserRequest;
use Simple_Blog\Http\Requests\EditUserRequest;
use Simple_Blog\User;
use Hash;
use Request;

class UserController extends Controller
{
    /**
    *	Funtion return view list all authors
    */
    public function index()
    {
      $authors =  User::paginate(5);
     	return view('admin.user.index',compact('authors'));
    }

    /**
    *	Function to return view add a author
    *
    */

   public function add()
   {
      return view('admin.user.add');
   }

   /**
   *	Function to add data category was just added to database
   *  @param request: validate data for category to save to database
   */
   public function store(UserRequest $request)
   {
      $avatar = $request->file('avatar')->getClientOriginalName();
      
      User::create([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'password' => Hash::make($request->input('password')),
        'avatar' => $avatar,
        'role' => $request->get('radios')
      ]);

      //Upload image
      $des =  base_path().'/public/upload/images/';
      if(isset($avatar)) 
      {
        $request->file('avatar')->move($des,$avatar);
      }
      return redirect()->route('admin.user.index')->with(['flash_message'=>'Success! Added Author','flash_level' => 'success']);
   }

   /**
   *	Function to return view to edit category 
   *
   *	@param id: id of category that want edit 
   *	@param alias : name of category that want edit. it was rewritten
   */
   public function edit($id)
   {
      $user = User::findOrFail($id);
      return view('admin.user.edit',compact('user'));
   }

   /**
   *	Function to update data was just edited  to database
   *	@param id: id of category that want edit 
   *	@param alias : name of category that want edit. it was rewritten
   *	@param request: validate input of data for category
   */
   public function update(EditUserRequest $request,$id)
   {  
      $user = User::find($id);
      $file = $request->file('avatar');
      if(isset($file))
      {
        $avatar =  $file->getClientOriginalName();
        if(isset($user->avatar)) 
        {
          $des = base_path().'/public/upload/images/'.$user->avatar;
          if(file_exists($des))
          {
            unlink($des);
          }
          $request->file('avatar')->move(base_path().'/public/upload/images/',$avatar);
        }
      }else 
      {
        $avatar = $user->avatar;
      }
      $user->update([
          'name' => $request->input('name'),
          'email' => $request->input('email'),
          'password' => Hash::make($request->input('password')),
          'avatar' => $avatar,
          'role' => $request->get('radios'),
      ]);
      return redirect()->route('admin.user.index')->with(['flash_message'=>'Edited Success!!!' , 'flash_level' => 'success']);
   }

   /**
   *	Function to delete a author 
   *
   *	@param id: id of category want delete
   */
   public function destroy()
   {
   	  if(Request::ajax())
      {
        $requesAll = Request::all();
        $id = Request::get('id');
        $user = User::findOrFail($id);
        $user->delete();
        echo $id;
      }
   }
}
