<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\ProductImages;
use DB;
use Illuminate\Http\Request;
class AddProductController extends Controller
{
    public function addProducts()
{
    return view('addProducts'); 
}

    public function addProduct(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|min:10|max:100',
            'description' => 'required|string|min:20|max:200',
            'name' => 'required|string|regex:/^[a-zA-Z\s]+$/',
            'category' => 'required|string',
            'price' => 'required|numeric|min:0',
            'location' => 'required|string',
            'city' => 'required|string',
            'phone_number' => 'required|string',
            'wifi_availability' => 'nullable|string',
            'condition' => 'nullable|string',
            'body_type' => 'nullable|string',
            'transmission' => 'nullable|string',
            'fuel_type' => 'nullable|string',
            'color_options' => 'nullable|string',
            'seats' => 'nullable|integer',
            'features' => 'nullable|string',
            'register_city' => 'nullable|string',
            'car_documents' => 'nullable|string',
            'assembly_type' => 'nullable|string',
            'km_driven' => 'nullable|integer',
            'make' => 'nullable|string',
            'model' => 'nullable|integer',
            'brand' => 'nullable|string',
            'screen_size' => 'nullable|string',
            'resolution' => 'nullable|string',
            'power_source' => 'nullable|string',
            'capacity' => 'nullable|string',
            'load_type' => 'nullable|string',
            'voltage' => 'nullable|integer',
            'wattage' => 'nullable|integer',
            'numTaps' => 'nullable|integer',
            'refrigerator' => 'nullable|string',
            'musical_instruments' => 'nullable|string',
            'gym_and_fitness' => 'nullable|string',
            'kids_bath_diaper' => 'nullable|string',
            'kid_accessories' => 'nullable|in:Hats,Gloves,Socks,Scarves,Sunglasses,Backpacks,Belts,Jewelry,Other',
            'kids_toys' => 'nullable|string',
            'camera_installation' => 'nullable|string',
            'table_dinning' => 'nullable|string',
            'item' => 'nullable|string',
            'householdSubtypeSelection' => 'nullable|string',
            'officefurnituresubtypeSelection' => 'nullable|string',
            'type' => 'nullable|string',
            'sport_type' => 'nullable|in:team-sport,individual-sport,outdoor,indoor,water-sport',
            'subcategory' => 'nullable|string',
            'furniture_type' => 'nullable|in:sofa,bed,dining-set,dresser,coffee-table,others',
            'subtype' => 'nullable|string',
            'job_type' => 'nullable|string',
            'jobSubcategory' => 'nullable|string',
            'property_type' => 'nullable|string',
            'status' => 'required|string',  
            'user_id' => 'required|exists:users,id', 
            'pictures.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'book_title' => 'nullable|string|max:255',
            'author' => 'nullable|string|max:255',
            'language' => 'nullable|in:English,Urdu,Arabic,French,Other',
            'breed' => 'nullable|string|max:255',
            'sex' => 'nullable|in:male,female,pair',
            'age' => 'nullable|integer|min:1|max:20',
            'processor' => 'nullable|string|max:100',
            'ram' => 'nullable|string|max:20',
            'storage' => 'nullable|string|max:100',

        ]);
    
        DB::transaction(function () use ($validatedData, $request) {
            $product = new Product();
            $product->title = $request->title;
            $product->description = $request->description;
            $product->name = $request->name;
            $product->category = $request->category;
            $product->price = $request->price;
            $product->location = $request->location;
            $product->city = $request->city;
            $product->phone_number = $request->phone_number;
            $product->wifi_availability = $request->wifi_availability;
            $product->condition = $request->condition;
            $product->body_type = $request->body_type;
            $product->transmission = $request->transmission;
            $product->fuel_type = $request->fuel_type;
            $product->color_options = $request->color_options;
            $product->seats = $request->seats;
            $product->features = $request->features;
            $product->register_city = $request->register_city;
            $product->car_documents = $request->car_documents;
            $product->assembly_type = $request->assembly_type;
            $product->km_driven = $request->km_driven;
            $product->make = $request->make;
            $product->brand = $request->brand;
            $product->screen_size = $request->screen_size;
            $product->resolution = $request->resolution;
            $product->power_source = $request->power_source;
            $product->capacity = $request->capacity;
            $product->load_type = $request->load_type;
            $product->voltage = $request->voltage;
            $product->wattage = $request->wattage;
            $product->numTaps = $request->numTaps;
            $product->refrigerator = $request->refrigerator;
            $product->musical_instruments = $request->musical_instruments;
            $product->gym_and_fitness = $request->gym_and_fitness;
            $product->kids_bath_diaper = $request->kids_bath_diaper;
            $product->kid_accessories = $request->kid_accessories;
            $product->kids_toys = $request->kids_toys;
            $product->camera_installation = $request->camera_installation;
            $product->table_dinning = $request->table_dinning;
            $product->item = $request->item;
            $product->householdSubtypeSelection = $request->householdSubtypeSelection;
            $product->officefurnituresubtypeSelection = $request->officefurnituresubtypeSelection;
            $product->type = $request->type;
            $product->subcategory = $request->subcategory;
            $product->furniture_type = $request->furniture_type;
            $product->subtype = $request->subtype;
            $product->job_type = $request->job_type;
            $product->jobSubcategory=$request->jobSubcategory;
            $product->property_type = $request->property_type;
            $product->book_title = $request->book_title;
            $product->author = $request->author;
            $product->language = $request->language;
            $product->breed = $request->breed;
            $product->sex = $request->sex;
            $product->age = $request->age;
            $product->processor = $request->processor;
            $product->ram = $request->ram;
            $product->storage = $request->storage;
            $product->status = $validatedData['status'];
            $product->user_id = $validatedData['user_id'];
                $product->save();
                if ($request->hasFile('pictures')) {
                $documentPaths = [];
                foreach ($request->file('pictures') as $file) {
                    $documentPath = rand() . time() . '.' . $file->extension();
                    $file->move(public_path('pictures'), $documentPath);
                    $documentPaths[] = url('pictures') . '/' . $documentPath;
                }
                    foreach ($documentPaths as $path) {
                    ProductImages::create([
                        'product_id' => $product->id,
                        'product_images' => $path,
                    ]);
                }
            }
        });
    
        return redirect('/')->with('success', 'Your ad created successfully!');
    }


}
