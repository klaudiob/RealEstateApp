@extends('layouts.app')

@section('content')
    <div class="container card">
        <form enctype="multipart/form-data" action="{{ route('properties.update',['property'=>$property->id]) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="card-header">{{ __('Update Post') }}</div>

            <div class="card-body">
                <div class="row justify-content-center mb-3">
                    <div class="col-md-2">
                        <label for="title">{{  __('Property Title') }}</label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="title" name="title" value="{{$property->title}}" required>
                        @error('title')
                        <span class="invalid-feedback d-block" role="alert">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="row justify-content-center mb-3">
                    <div class="col-md-2">
                        <label for="address">{{__('Address') }}</label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="address" name="address" value="{{$property->address}}" required>
                        @error('address')
                        <span class="invalid-feedback d-block" role="alert">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="row justify-content-center mb-3">
                    <div class="col-md-2">
                        <label for="city">{{__('City') }}</label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="city" name="city" value="{{$property->city}}" required>
                        @error('city')
                        <span class="invalid-feedback d-block" role="alert">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="row justify-content-center mb-3">
                    <div class="col-md-2">
                        <label for="country">{{  __('Country')  }}</label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="country" name="country" value="{{$property->country}}" required>
                        @error('country')
                        <span class="invalid-feedback d-block" role="alert">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="row justify-content-center mb-3">
                    <div class="col-md-2">
                        <label for="image"  class="form-label">{{ __('Image') }}</label>
                    </div>
                    <div class="col-md-6">
                        <input class="form-control" type="file" id="image" name="image"  value="{{$property->image}}" required>
                        @error('image')
                        <span class="invalid-feedback d-block" role="alert">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="row justify-content-center mb-3">
                    <div class="col-md-2">
                        <label for="type">{{__('Type') }}</label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="type" name="type" value="{{$property->type}}" required>
                        @error('type')
                        <span class="invalid-feedback d-block" role="alert">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="row justify-content-center mb-3">
                    <div class="col-md-2">
                        <label for="description"> {{__('Property Description')}}</label>
                    </div>
                    <div class="col-md-6">
                        <textarea class="form-control" id="description" name="description"  required>{{$property->description}}</textarea>
                        @error('description')
                        <span class="invalid-feedback d-block" role="alert">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="row justify-content-center mb-3">
                    <div class="col-md-2">
                        <label for="price">{{  __('Price')  }}</label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="price" name="price" value="{{$property->price}}" required>
                        @error('price')
                        <span class="invalid-feedback d-block" role="alert">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="row justify-content-center mb-3">
                    <div class="col-md-2">
                        <label for="price">{{ __('Start Date') }}</label>
                    </div>
                    <div class="col-md-6">
                        <input type="date" class="form-control" id="startDate" name="startDate" value="{{$property->startDate}}" required>
                        @error('startDate')
                        <span class="invalid-feedback d-block" role="alert">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="row justify-content-center mb-3">
                    <div class="col-md-2">
                        <label for="price">{{ __('End Date') }}</label>
                    </div>
                    <div class="col-md-6">
                        <input type="date" class="form-control" id="endDate" name="endDate" value="{{$property->endDate}}" required>
                        @error('endDate')
                        <span class="invalid-feedback d-block" role="alert">{{$message}}</span>
                        @enderror
                    </div>
                </div>



                <div class="row justify-content-center mb-3">
                    <div class="col-md-8 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
