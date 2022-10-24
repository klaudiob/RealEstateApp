@extends('layouts.app')

@section('content')
    <div class="container">
        <form>
            <div class="card m-2">
                        <div class="row justify-content-center m-3">
                            <div class="col-md-1 mt-2">
                                <label for="startDate">{{ __('Start Date') }}</label>
                            </div>
                            <div class="col-md-3">
                                <input type="date" class="form-control" id="startDate" name="startDate" value="{{Request::get('startDate')}}">
                            </div>
                        </div>

                        <div class="row justify-content-center m-3">
                            <div class="col-md-1 mt-2">
                                <label for="endDate">{{ __('End Date') }}</label>
                            </div>
                            <div class="col-md-3">
                                <input type="date" class="form-control" id="endDate" name="endDate" value="{{Request::get('endDate')}}">
                            </div>
                        </div>

                        <div class="row justify-content-center m-3">
                            <div class="col-md-1 mt-2">
                                <label for="price">{{ __('Price Range') }}</label>
                            </div>
                            <div class="col-md-3">
                                <select class="form-select" id="price" name="price" >
                                    <option selected disabled value="">Select price range</option>
                                    <option @if(Request::get('price') == 'asc' )selected @endif value="asc">Low-High</option>
                                    <option @if(Request::get('price') == 'desc' )selected @endif value="desc">High-Low</option>
                                </select>
                            </div>
                        </div>

                        <div class="row justify-content-center m-3">
                            <div class="col-md-1 mt-2">
                                <label for="location">{{ __('Location') }}</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" id="location" name="location" value="{{Request::get('location')}}" placeholder="{{ __('Input location') }}" >
                            </div>
                        </div>

                        <div class="row justify-content-center mb-3">
                            <div class="col-md-2 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">{{ __('Search') }}</button>
                            </div>
                        </div>
            </div>
        </form>
    </div>


        <div class="row row-cols-1 row-cols-md-3 g-3">
            @foreach($properties as $property)
                <div class="col">
                        <div class="card m-3">
                            <img src="{{asset('/storage/images/properties_img/'.$property->image)}}"  class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><b>{{$property->title}}</b></h5>
                                <p class="card-text"><b>Description :</b> {{$property->description}}</p>
                                <p class="card-text"><b>Address :</b>  {{$property->address}}</p>
                                <p class="card-text"><b>City :</b> {{$property->city}}</p>
                                <p class="card-text"><b>Price :</b> {{$property->price}} <span>£</span></p>
                                <a href="{{ route('properties.show',['property'=>$property->id]) }}" class="btn btn-outline-primary">See More</a>
                                @cannot('host')
                                <a href="{{ route('properties.reservation',['property'=>$property->id]) }}" class="btn btn-outline-warning" style="float: right">Book</a>
                                @endcannot
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">Last updated {{$property->updated_at}}</small>
                            </div>
                        </div>
                    </div>
            @endforeach
        </div>
    </div>
    <div class="d-flex justify-content-center mt-4">{{$properties->links()}}</div>
@endsection



