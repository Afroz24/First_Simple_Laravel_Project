<?php

namespace App\Http\Controllers;

use App\Models\Laptop;
use Illuminate\Http\Request;

class LaptopController extends Controller
{

    public function homefun()
    {
        return view("create");
    }



    public function store(Request $request)
    {


        //validation rule by using validate method
        $fdata = $request->validate(
            [
                "fname" => "required",
                "fram" => "required | integer",
                "fprocessor" => "required",
                "fwversion" => "required",
                "fprice" => "required | integer | min:10000",
            ],
            [
                'fname.required' => 'Name is Mandatory to enter',
                'fram.integer'=>'Enter Numbers as 1,2,3,4...',
                'fram.required' => 'RAM is Mandatory ',
                'fprocessor.required' => 'Need Processor Name',
                'fprice.integer'=>'Enter numeric values as 10000,25000'
            ]
        );


        $data = new Laptop();


        $data->name = $request->fname;
        $data->ram = $request->fram;
        $data->processor = $request->fprocessor;
        $data->wversion = $request->fwversion;
        $data->price = $request->fprice;
        $data->save();
        return redirect(route('viewpage'));

        //now iam doing validation i.e. we want user to compulsorily enter the values


        //creating obj to store data through Model



        //or 

        //    $data->name = $fdata['fname'];
        //    $data->ram = $fdata['fram'];
        //    $data->processor = $fdata['fprocessor'];
        //    $data->wversion = $fdata['fwversion'];
        //    $data->fprice  = $fdata['fprice'];

    }



    public function getfun()
    {   
        // pagination logic
        // $data = Laptop::all();
        // $data = Laptop::simplePaginate(2);
        //  or
        $obj = new Laptop();
        $data = $obj->orderBy('name')->simplePaginate(2);
        
        return view('view', ['data' => $data]);
    }

    // public function editfun($id)
    public function editfun(Laptop $id)
    {
        return view('edit', ['id' => $id]);
    }


    public function updatefun(Request $request, $id)
    {
        $fdata = $request->validate(
            [
                "fname" => "required",
                "fram" => "required | integer",
                "fprocessor" => "required",
                "fwversion" => "required",
                "fprice" => "required | integer | min:10000",
            ],
            [
                'fname.required' => 'Name is Mandatory to enter',
                'fram.required' => 'RAM is Mandatory ',
                'fprocessor.required' => 'Need Processor Name'
            ]
        );


        $data = Laptop::find($id);
        $data->name = $request->fname;
        $data->ram = $request->fram;
        $data->processor = $request->fprocessor;
        $data->wversion = $request->fwversion;
        $data->price = $request->fprice;
        $data->save();

        return redirect(route('viewpage'));
    }

    //now delete function
    public function deletefun($Laptop)
    {
        $data = Laptop::find($Laptop);
        $data->delete();
        // deleted message logic below and showing in view file
        // session()->flash('msg','Item Deleted Sucessfully');
        return redirect(route('viewpage'))->with('msg','Deleted Sucessfully');
    }



}
