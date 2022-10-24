@extends('layouts.app')

@section('content')
<div class="container justify-content-center">
    <div class="card mb-2 " style="max-width: 800px; margin: auto">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="{{asset('/storage/images/properties_img/'.$property->image)}}" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><b>{{$property->title}}</b></h5>
                    <p class="card-text"><b>Description :</b> {{$property->description}}</p>
                    <p class="card-text"><b>City :</b> {{$property->city}}</p>
                    <p class="card-text"><b>Price :</b> {{$property->price}} <span>£</span></p>
                </div>

            </div>
        </div>
    </div>
</div>
<form action="{{ route('properties.book',['property'=>$property->id])}}" method="POST">
    @csrf
    <section class="vh-100" style="border:  #5c636a;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-9">

                    <h1 class="text-white mb-4">Make Reservation</h1>

                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body">

                            <div class="row align-items-center pt-4 pb-3">
                                <div class="col-md-3 ps-5">

                                    <h6 class="mb-0">Full name</h6>

                                </div>
                                <div class="col-md-9 pe-5">

                                    <input type="text" id="name" name="name" class="form-control form-control-lg" />

                                </div>
                            </div>

                            <hr class="mx-n3">

                            <div class="row align-items-center py-3">
                                <div class="col-md-3 ps-5">

                                    <h6 class="mb-0">Email address</h6>

                                </div>
                                <div class="col-md-9 pe-5">

                                    <input type="email" id="email" name="email" class="form-control form-control-lg" placeholder="example@example.com" />

                                </div>
                            </div>

                            <hr class="mx-n3">

                            <div class="row align-items-center py-3">
                                <div class="col-md-3 ps-5">

                                    <h6 class="mb-0">Number of persons</h6>

                                </div>
                                <div class="col-md-9 pe-5">

                                    <input type="text" id="no_persons" name="no_persons" class="form-control form-control-lg" />

                                </div>
                            </div>

                            <hr class="mx-n3">

                            <div class="row align-items-center py-3">
                                <div class="col-md-3 ps-5">
                                    <h6 class="mb-0">Pick dates</h6>
                                </div>
                                <div class="col-md-9 pe-5">

                                        <label for="startDate">{{ __('Start Date') }}</label>
                                        <input type="date" class="form-control form-control-lg" id="startDate" name="startDate">


                                        <label for="endDate">{{ __('End Date') }}</label>
                                        <input type="date" class="form-control form-control-lg" id="endDate" name="endDate">

                                </div>
                            </div>



                            <hr class="mx-n3">

                            <div class="px-5 py-4">
                                <button type="submit" class="btn btn-primary btn-lg">Create Reservation</button>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</form>
@endsection
