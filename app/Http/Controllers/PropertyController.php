<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReservationRequest;
use App\Models\Property;
use App\Http\Requests\StorePropertyRequest;
use App\Http\Requests\UpdatePropertyRequest;
use App\Models\Reservation;
use App\Models\Review;
use http\Client\Curl\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $properties = Property::query();

        $start_date = $request->input("startDate");
        $end_date = $request->input("endDate");
        $location = $request->input("location");

        $price = request()->input("price");
           switch (request()->price)
           {
               case "asc":
                   $sort = "ASC";
                   break;
               case "desc":
                   $sort = "DESC";
                   break;
               default:
                   $sort = "ASC";
                   break;
           }
            if($price) {
                $properties->orderBy("price", $sort);
            }

            if($location) {
                   $properties->where("city",$location);
            }

            if ($start_date) {
                $properties->where("startDate",">",$start_date);
            }
            if ($end_date) {
                $properties->where("endDate","<",$end_date);
            }


        return view('properties.index', ['properties' => $properties->paginate(5)->withQueryString()]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('properties.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePropertyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePropertyRequest $request)
    {

        if($request->hasFile('image'))
        {
            $destination_path = 'public/images/properties_img';
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $path = $request->file('image')->storeAs($destination_path,$image_name);
            $property['image']="$image_name";
        }

        Property::create([
            'title'=> $request->title,
            'address'=> $request->address,
            'city' => $request->city,
            'country'=> $request->country,
            'image'=>$image_name,
            'type'=>$request->type,
            'description'=>$request->description,
            'price'=>$request->price,
            'startDate'=>$request->startDate,
            'endDate'=>$request->endDate,
            'user_id'=> $request->user()->id,
        ]);
        return redirect()->route('properties.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        $reviews=Review::query()->where('property_id','=',$property->id)->get();

        return view('properties.show', ['property'=> $property,'reviews'=>$reviews]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property)
    {
        return view('properties.edit', ['property' => $property]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePropertyRequest  $request
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePropertyRequest $request, Property $property)
    {
        $property-> title = $request->title;
        $property-> address = $request->address;
        $property-> city = $request->city;
        $property-> country = $request->country;
        $property-> image = $request->image;
        $property-> type = $request->type;
        $property-> description = $request->description;
        $property-> price = $request->price;
        $property-> startDate = $request->startDate;
        $property-> endDate = $request->endDate;


        if($request->hasFile('image'))
        {
            $destination_path = 'public/images/properties_img';
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $path = $request->file('image')->storeAs($destination_path,$image_name);
            $property['image']="$image_name";
        }else {
            unset($property['image']);
        }

            $property->save();

        return redirect()->route('properties.user');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {

        $property->delete();

        return redirect()->route('properties.user');

    }


    public function getPropertiesByUser()
    {
        $pagination=Property::where('user_id',request()->user()->id)->paginate(2);
        return view('properties.properties',['properties'=>$pagination]);
    }

    public function createReservation(Property $property)
    {
        if(Gate::allows('simpleUser')) {
            return view('properties.reservation',compact('property'));
        } else {
            return redirect()->route('login');
        }
    }

    public function book(StoreReservationRequest $request,Property $property)
    {
        Reservation::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'no_persons'=> $request->no_persons,
            'startDate'=>$request->startDate,
            'endDate'=>$request->endDate,
            'property_id'=> $property->id,
            'user_id'=> $request->user()->id,

        ]);

        return redirect()->route('properties.index');
    }
}
