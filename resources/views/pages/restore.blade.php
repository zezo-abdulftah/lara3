@extends('layouts.app')

@section('content')
<div class="container">
    <ul>
    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        <li>
            <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                {{ $properties['native'] }}
            </a>
        </li>
        @endforeach
        </ul>
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(Session::has('sucsess'))
                <div class="alert alert-success" role="alert">
                    {{Session::get('sucsess')}}
                </div>
            @endif
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route("done")}}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{__('messages.name show ar')}}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control"  name="name_ar" >
                            </div>
                            @error('name_ar')
                            <div class="alert alert-danger" role="alert">
                               {{$message}}
                            </div>

                            @enderror

                        </div>
                        <div class="form-group row">
                            <label for="photo" class="col-md-4 col-form-label text-md-right"></label>

                            <div class="col-md-6">
                                <input id="photo" type="file" class="form-control"  name="photo" >
                            </div>
                            @error('name_ar')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>

                            @enderror

                        </div>
                        <div class="form-group row">

                            <label for="nameen" class="col-md-4 col-form-label text-md-right">{{__('messages.name show en')}}</label>
                            <div class="col-md-6">
                                <input id="nameen" type="text" class="form-control"  name="name_en" >
                            </div>
                            @error('name_en')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>

                            @enderror

                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">{{__('messages.price')}}</label>

                            <div class="col-md-6">
                                <input id="price" type="text" class="form-control "   name="price" >
                            </div>
                            @error('price')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>

                            @enderror
                        </div>
                        <div class="form-group row">
                            <label for="details" class="col-md-4 col-form-label text-md-right"> {{__('messages.details ar')}}</label>

                            <div class="col-md-6">
                                <input id="details" type="text" class="form-control"  name="details_ar"   >

                            </div>
                            @error('details_ar')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>

                            @enderror
                        </div>
                        <div class="form-group row">
                            <label for="detailsen" class="col-md-4 col-form-label text-md-right"> {{__('messages.details en')}}</label>

                            <div class="col-md-6">
                                <input id="detailsen" type="text" class="form-control"  name="details_en"   >

                            </div>
                            @error('details_en')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>

                            @enderror
                        </div>






                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button href="{{route('sum')}}" type="submit" class="btn btn-primary">
                                    done
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

    @endsection
