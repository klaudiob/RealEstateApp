@extends('layouts.app')

@section('content')
    <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <img src="{{asset('/storage/images/properties_img/'.$property->image)}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><b>{{$property->title}}</b></h5>
                                <div class="col mt-4">
                                    <p class="card-text"><b>Description :</b> {{$property->description}}</p>
                                    <p class="card-text"><b>Address :</b>  {{$property->address}}</p>
                                    <p class="card-text"><b>City :</b> {{$property->city}}</p>
                                    <p class="card-text"><b>Country :</b> {{$property->country}}</p>
                                    <p class="card-text"><b>Type :</b> {{$property->type}}</p>
                                    <p class="card-text"><b>Price :</b> {{$property->price}} <span>£</span></p>
                                    <p class="card-text"><b>Start Date :</b> {{$property->startDate}}</p>
                                    <p class="card-text"><b>End Date :</b> {{$property->endDate}}</p>
                                </div>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">Last updated {{$property->updated_at}}</small>
                            </div>
                     </div>
                </div>
            </div>

        <div class="mt-5">
            <h3>Reviews</h3>
        </div>
        @foreach($reviews as $review)

            <div class="card mt-3">
                <div class="card-header">
                    <b>User Name : </b> {{ \App\Models\User::getNameById($review->user_id)}}
                </div>
                <div class="card-body">
                    <img src="{{asset('/storage/images/user_img/profile_img.jpeg')}}" class="wpx-100 img-round mgb-20" style="width: 50px;height: 50px">
                    <p class="card-text"> <b>Description : </b>{{$review->description}}</p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Last updated {{$review->updated_at}}</small>
                </div>
            </div>

        @endforeach
    </div>



@endsection


