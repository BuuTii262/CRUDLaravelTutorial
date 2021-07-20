<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foods = Food::all();
        return view('food.index',compact('foods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('food.createFood');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required',
            'description' => 'required',
            'food_image' => 'required'
        ]);

        $food = new Food();
        $food->food_title = $request->title;
        $food->price = $request->price;
        $food->description = $request->description;
        if($request->hasFile('food_image'))
        {
            $file = $request->file('food_image');
            $extension = $file->getClientOriginalExtension();
            $file_name = time().'.'.$extension;
            $file->move('uploads/foods/',$file_name);
            $food->food_image = $file_name;
        }
        $food->save();
        return redirect('/food')->with('successAlert','You have successfully added');

        // $food->food_image = $request->
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $food = Food::find($id);
        return view('food.showFood',compact('food'));

        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $food = Food::find($id);//find id in Post model if exist compact it into return
        return view('food.editFood',compact('food'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);

        $food = Food::find($id);
        $food->food_title = $request->title;
        $food->price = $request->price;
        $food->description = $request->description;
        if($request->hasFile('food_image'))
        {
            $destination = 'uploads/foods/'. $food->food_image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('food_image');
            $extension = $file->getClientOriginalExtension();
            $file_name = time().'.'.$extension;
            $file->move('uploads/foods/',$file_name);
            $food->food_image = $file_name;
        }
        $food->update();
        return redirect('/food')->with('successAlert','You have successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $food = Food::find($id);
        $destination = 'uploads/foods/'.$food->food_image;
        {
            File::delete($destination);
        }
        $food->delete();
        return redirect('/food')->with('successAlert','You have successfully delete');

    }
}
