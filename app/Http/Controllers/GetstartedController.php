<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GetStarted;
use Image;
use DB;
use Spatie\Permission\Models\Role;


class GetstartedController extends Controller
{
  public function __construct()
  {
  
      $this->middleware('permission:get-started.manage', ['only' => ['show','update']]);
     
  }

    public function show()
    {
      $show = GetStarted::first();
      return view('admin.get_started.edit',compact('show'));
    }

    public function update(Request $request)
    {

        $data = GetStarted::first();

        $input = $request->all();

        if(isset($data))
        {

          if ($file = $request->file('image')) 
          {
            if($data->image != "")
            {
              $image_file = @file_get_contents(public_path().'/images//'.$data->image);

              if($image_file)
              {
                  unlink('images//'.$data->image);
              }
            }  
            $optimizeImage = Image::make($file);
            $optimizePath = public_path().'/images//';
            $image = time().$file->getClientOriginalName();
            $optimizeImage->save($optimizePath.$image, 72);

            $input['image'] = $image;
                         
          }
          $input = $request->all();
            return $input;
          $data->update($input);

        }

        else
        {

          if ($file = $request->file('image')) 
          { 
                 
            $optimizeImage = Image::make($file);
            $optimizePath = public_path().'/images//';
            $image = time().$file->getClientOriginalName();
            $optimizeImage->save($optimizePath.$image, 72);

            $input['image'] = $image;
                         
          }
          $input = $request->all();

          $data = GetStarted::create($input);
          
          $data->save();

        }

        return back()->with('message',trans('flash.UpdatedSuccessfully'));
    }

}
