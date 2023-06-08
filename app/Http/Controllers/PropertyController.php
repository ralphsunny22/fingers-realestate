<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Vimeo\Laravel\Facades\Vimeo;
use DB;
use App\Models\PropertyFeature;
use App\Models\Property;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function addProperty()
    {
        return view('backend.pages.properties.addProperty');
    }

    public function addPropertyPost(Request $request)
    {
        $rules = array(
            'title' => 'required|string|max:255',
            'for_what' => 'required|string',
            'category_id' => 'required',
            'price' => 'required|numeric',
            'address' => 'nullable|string',
            'city' => 'nullable|string',
            'state' => 'nullable|string',
            'zipcode' => 'nullable|string',
            'landmarks' => 'nullable|array',
            'description' => 'nullable|string',
            //'images' => 'required|image|size:2048|mimes:jpg,png,jpeg,gif,svg,webp',
            'images' => 'required|array',
            'images.*' => 'image|max:2048|mimes:jpg,png,jpeg,gif,svg,webp',
            
            'youtube_videos' => 'nullable|string',
        );
        $messages = [
            'title.required' => '* Property title is required',
            'title.string' => '* Invalid Characters',
            'title.max' => '* This title is too long',

            'for_what.required' => '* This field is required',
            'for_what.string' => '* Invalid Characters',

            'category_id.required' => '* This field is required',

            'price.required' => '* Price is required',
            'price.numeric' => '* This field Must be numbers only',
    
            'area.required' => '* This field is required',
            'area.string' => '* Invalid Characters',

            'address.string' => '* Invalid Characters',
            'city.string' => '* Invalid Characters',
            'state.string' => '* Invalid Characters',
            'zipcode.string' => '* Invalid Characters',
            'description.string' => '* Invalid Characters',

            'images.required' => '* This field is required',
            'images.image' => '* Only images can be uploaded',
            'images.max' => '* The file must be less than 2MB',
            'images.mimes' => '* The images field must be a file of type: jpeg, jpg, png, gif, svg, webp.',
            
            'youtube_videos.string' => '* Invalid Characters',

        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        
        $data = $request->all();
        
        //json_encode($data['landmarks']);
        // Get the property features input
        $propertyFeatures = $data['property_features']; //{"Area":"878sqft","Year Built":"12-12-1999"}

        // Create an empty array to store the formatted data
        //$formattedFeatures = [];

        // Loop through the property features
        // foreach ($propertyFeatures as $key => $value) {
        //     // Create an associative array with the key and value
        //     $formattedFeatures[] = [$key => $value];
        // }
        //return $formattedFeatures; //[{"Area":"878sqft"},{"Year Built":"12-12-1999"}]

        // Convert the formatted features array to JSON
        //return $jsonFeatures = json_encode($propertyFeatures);

        $youtube_videos = explode(',', $data['youtube_videos']);

        $property = new Property();
        $property->title = $data['title'];
        $property->for_what = $data['for_what']; //sale, rent, lease
        $property->category_id = $data['category_id']; //property-type
        $property->price = $data['price']; // Example of an amount column with 10 digits and 2 decimal places

        $property->property_features = !empty($data['property_features']) ? json_encode($data['property_features']) : null;

        //location
        $property->address = $data['address'];
        $property->city = $data['city'];
        $property->state = $data['state'];
        $property->zipcode = $data['zipcode'];
        $property->landmarks = !empty($data['landmarks']) ? json_encode($data['landmarks']) : null;
        
        $property->google_map_location = !empty($data['google_map_location']) ? $data['google_map_location'] : null;

        $property->description = $data['description'];

        // $property->videos = $data[''];
        $property->youtube_videos = !empty($data['youtube_videos']) ? json_encode(explode(',', $data['youtube_videos'])) : null;
        // $property->vimeo_videos = $data[''];
        $property->featured_video = $youtube_videos[0];

        $property->created_by = 1;
        $property->agent_id = 1;
        $property->tags = !empty($data['tags']) ? json_encode(explode(',', $data['tags'])) : null;
        $property->status =  !empty($data['status']) ? 'active' : 'pending'; //pending, active
        $property->isFeatured = !empty($data['isFeatured']) ? true : false; //show in landing pg

        if ($request->images) {
            //store products in folder
            foreach($request->images as $file){
                //$imageName = time().'.'.$file->extension();
                $imageName = Str::random(15).rand(1000,99999).'.'.$file->extension();
                $file->storeAs('property', $imageName, 'public');  
                $imgData[] = $imageName;  
            }
        }
        //return $imgData;
        $property->images = json_encode($imgData);
        $property->featured_image = $imgData[0];

        $property->save();

        return back()->with('success', 'Property Created Successfully');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function ajaxAddFeature(Request $request)
    {
        $data = $request->all();
        $slug = Str::slug($data['feature_name']);
        if(PropertyFeature::where('slug', $slug)->exists()) {
            return response()->json([
                'status'=>false,
                'data'=>'Feature already exists. Use the available one'
            ]);
        }
        $feature = new PropertyFeature();
        $feature->name = $data['feature_name'];
        $feature->slug = $slug;
        $feature->input_type = 'text';
        $feature->save();
        
        //store in array
        $data['feature'] = $feature;

        return response()->json([
            'status'=>true,
            'data'=>$data
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function ajaxAddAmenity(Request $request)
    {
        $data = $request->all();
        $slug = Str::slug($data['amenity_name']);
        if(PropertyFeature::where('slug', $slug)->exists()) {
            return response()->json([
                'status'=>false,
                'data'=>'Amenity already exists. Use the available one'
            ]);
        }
        $feature = new PropertyFeature();
        $feature->name = $data['amenity_name'];
        $feature->slug = $slug;
        $feature->input_type = 'checkbox';
        $feature->save();
        
        //store in array
        $data['feature'] = $feature;

        return response()->json([
            'status'=>true,
            'data'=>$data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function singleProperty(string $id)
    {
        $property = Property::where('id',$id)->first();
        if(!isset($property)){
            abort(404);
        }
        $images = isset($property->images) ? json_decode($property->images) : '';
        $property_features = isset($property->property_features) ? json_decode($property->property_features) : '';

        // Create an empty array to store the formatted data
        $formattedFeatures = [];

        // Loop through the property features
        foreach ($property_features as $key => $value) {
            // Create an associative array with the key and value
            $formattedFeatures[] = [$key => $value];
        }
        //return $formattedFeatures; //[{"Area":"878sqft"},{"Year Built":"12-12-1999"}]
        $vParameter = '';
        if (isset($property->featured_video)) {
            $url = $property->featured_video;
            $parsedUrl = parse_url($url); //{"scheme":"https","host":"www.youtube.com","path":"\/watch","query":"v=KbTjl1PNCzg"}
            parse_str($parsedUrl['query'], $queryParams);
            $vParameter = $queryParams['v'];
        }

        $landmarks = isset($property->landmarks) ? json_decode($property->landmarks) : '';

        $reviews = $property->reviews;
        
        return view('front.pages.properties.singleProperty', compact('property', 'images', 'property_features', 'vParameter', 'landmarks', 'reviews'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
