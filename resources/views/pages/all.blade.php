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
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{Session::get('success')}}
        </div>
    @endif
    @if(Session::has('error'))
        <div class="alert alert-success" role="alert">
            {{Session::get('error')}}
        </div>
    @endif


    <table class="table">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">{{__('messages.name of show')}}</th>
            <th scope="col">{{__("messages.price")}}</th>
            <th scope="col">{{__("messages.details")}}</th>
            <th scope="col">{{__("messages.update")}}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($offers as $offer)
        <tr>
            <th scope="row">{{$offer->id}}</th>
            <td>{{$offer->name}}</td>
            <td>{{$offer->price}}</td>
            <td>{{$offer->details}}</td>
          <td><a class="btn btn-primary" href="{{route('editOffer',$offer->id)}}" role="button">{{__("messages.update")}}</a></td>
            <td><a class="btn btn-primary" href="{{route('deleteOffer',$offer->id)}}" role="button">{{__("messages.delete")}}</a></td>

        </tr>
        @endforeach
        </tbody>
    </table>
@endsection
