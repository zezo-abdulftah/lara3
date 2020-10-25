@extends('layouts.app')

@section('content')
<div class="container">


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
        <tr class="offerrow{{$offer->id}} ">
            <th scope="row">{{$offer->id}}</th>
            <td>{{$offer->name}}</td>
            <td>{{$offer->price}}</td>
            <td>{{$offer->details}}</td>
          <td><a class="btn btn-primary" href="{{route('ajax.edit',$offer->id)}}" role="button">{{__("messages.update")}}</a></td>
            <td><a id="delete" offer_id="{{$offer->id}}" class="delete btn btn-primary"  role="button">{{__("messages.delete")}}</a></td>

        </tr>
        @endforeach
        </tbody>
    </table>
@endsection
@section('scripts')
        <script>
            $(document).on('click','.delete',function(e) {
                e.preventDefault();
                var id=$(this).attr('offer_id');
                $.ajax({
                    type: 'POST',
                    enctype:'multipart/form-data',
                    url: '{{route('delete.ajax')}}',
                    data: {
                        '_token':"{{csrf_token()}}",
                    'id':id,
                    },



                    success: function (data) {
                        if(data.statues==true){
                            alert(data.msg);

                        }
                        $('.offerrow'+data.id).remove();
                    }, error: function (reject) {
                    }
                });
            });

        </script>
@endsection

