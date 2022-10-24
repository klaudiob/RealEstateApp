@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 g-5">
            @foreach($properties as $property)
                <div class="col">
                    <div class="card">
                        <img src="{{asset('/storage/images/properties_img/'.$property->image)}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><b>{{$property->title}}</b></h5>
                            <p class="card-text"><b>Description :</b> {{$property->description}}</p>
                            <p class="card-text"><b>Address :</b>  {{$property->address}}</p>
                            <p class="card-text"><b>City :</b> {{$property->city}}</p>
                            <p class="card-text"><b>Country :</b> {{$property->country}}</p>
                            <p class="card-text"><b>Type :</b> {{$property->type}}</p>
                            <p class="card-text"><b>Price :</b> {{$property->price}} <span>£</span></p>
                            <p class="card-text"><b>Start Date :</b> {{$property->startDate}}</p>
                            <p class="card-text"><b>End Date :</b> {{$property->endDate}}</p>
                            <a href="{{ route('properties.edit',['property'=>$property->id]) }}" class="btn btn-outline-warning" style="margin-top: 1px;position: absolute;">Update</a>
                            <form action="{{route('properties.destroy',['property' =>$property->id]) }}" method="POST">
                                @method('delete')
                                @csrf
                                <button class="btn btn-outline-danger" style="float: right;">Delete</button>
                            </form>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Last updated {{$property->updated_at}}</small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center mt-4">{{$properties->links()}}</div>
    </div>
@endsection






