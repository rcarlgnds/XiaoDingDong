<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FoodController extends Controller
{
    public function viewFood(){
        $foods = Food::all();
        return view('pages.home.home', ['foods' => $foods]);
    }

    public function createFoodRouter(){
        return view('pages.manage.createfood');
    }

    public function manageFoodRouter(){
        $foods = Food::all();
        return view('pages.manage.managefood', ['foods' => $foods]);
    }
    public function searchFoodRouter(){
        $foods = Food::all();
        return view('pages.search.search', ['foods' => $foods]);
    }

    public function editFood($foodId)
    {
        $food = Food::find($foodId);
        return view('editFood', ['food' => $food]);
    }

    public function detailRouter($id) {
        $food = Food::find($id);
        return view('pages.detail.detail', ['food' => $food]);
    }

    public function editFoodRouter($id)
    {
        $food = Food::find($id);
        return view('pages.manage.editfood', ['food' => $food]);
    }

    public function updateFood(Request $request, $id)
    {
        // Retrieve the food details based on the provided $id
        $food = Food::find($id);
        // todo Auto delete
//        Storage::delete('profile_image/' . session('user')->UserProfileImage);
        $file = $request->file('food_image');
        $filename = time() . '-' . $file->getClientOriginalName();
        $path = public_path().'\\foodPicture\\';
        $file->move($path, $filename);

        // Update the food item with the new data from the form submission
        $food->FoodName = $request->input('food_name');
        $food->FoodPrice = $request->input('food_price');
        $food->FoodBriefDescription = $request->input('food_description_brief');
        $food->FoodFullDescription = $request->input('food_description_full');
        $food->FoodImage = $filename;
        $food->FoodTypeID = $request->input('food_type');

        $food->save();

        // Redirect to the desired page after updating the food item
        return redirect('/manageFood')->with('success', 'Food item updated successfully');
    }

    public function createNewFood(Request $request)
    {
        $request->validate([
            'foodName' => 'required|min:5',
            'foodBriefDesc' => 'required|max:100',
            'foodFullDesc' => 'required|max:500',
            'foodPrice' => 'required|gt:0',
            'foodPicture' => 'mimes:png,jpg',
            'foodCategory' => 'required' // Add validation for the food category field
        ]);

        $file = $request->file('foodPicture');

        $filename = time() . '-' . $file->getClientOriginalName();
        $path = public_path().'\\foodPicture\\';

        $file->move($path, $filename);

        $totalFoods = Food::count();
        $newFoodNumber = $totalFoods + 1;

        $newFoodId = 'FO' . sprintf('%03d', $newFoodNumber);

        $foodCategoryMapping = [
            'main_course' => 'FT001',
            'beverage' => 'FT002',
            'dessert' => 'FT003'
        ];

        $newFood = new Food();
        $newFood->FoodID = $newFoodId;
        $newFood->FoodName = $request->foodName;
        $newFood->FoodPrice = $request->foodPrice;
        $newFood->FoodImage = $filename;
        $newFood->FoodBriefDescription = $request->foodBriefDesc;
        $newFood->FoodFullDescription = $request->foodFullDesc;

        // Set the foodTypeID based on the selected food category
        $selectedCategory = $request->foodCategory;
        if (array_key_exists($selectedCategory, $foodCategoryMapping)) {
            $newFood->foodTypeID = $foodCategoryMapping[$selectedCategory];
        }

        $newFood->save();

        return redirect('/home');
    }

    public function searchFood(Request $request){

        $mainCourseMarker = $request->mainCourseMarker;
        $beverageMarker = $request->beverageMarker;
        $dessertMarker = $request->dessertMarker;

        $condition = [];

        if($mainCourseMarker){
            array_push($condition, $mainCourseMarker);
        }
        if($beverageMarker){
            array_push($condition, $beverageMarker);
        }
        if($dessertMarker){
            array_push($condition, $dessertMarker);
        }

        if(count($condition) === 0){
            $foods = Food::where('FoodName', 'like', '%' . $request->searchBar . '%')->get();
        }
        else {
            $foods = Food::where('FoodName', 'like', '%' . $request->searchBar . '%')->whereIn('FoodTypeID', $condition)->get();
        }


        return view('pages.manage.managefood', ['foods' => $foods]);
    }

    public function searchFood2(Request $request){

        $mainCourseMarker = $request->mainCourseMarker;
        $beverageMarker = $request->beverageMarker;
        $dessertMarker = $request->dessertMarker;

        $condition = [];

        if($mainCourseMarker){
            array_push($condition, $mainCourseMarker);
        }
        if($beverageMarker){
            array_push($condition, $beverageMarker);
        }
        if($dessertMarker){
            array_push($condition, $dessertMarker);
        }

        if(count($condition) === 0){
            $foods = Food::where('FoodName', 'like', '%' . $request->searchBar . '%')->get();
        }
        else {
            $foods = Food::where('FoodName', 'like', '%' . $request->searchBar . '%')->whereIn('FoodTypeID', $condition)->get();
        }


        return view('pages.search.search', ['foods' => $foods]);
    }

    public function deleteFood(Request $request)
    {
        $food = Food::find($request->input('FoodID'));
        if (!$food) {
            return back()->with('error', 'Food not found.');
        }
        $food->delete();
        return back()->with('success', 'Food deleted successfully.');
    }
}
