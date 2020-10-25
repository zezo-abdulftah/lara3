@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">


            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form id="formdata" method=""  action="">
                        @csrf
                        <div class="form-group row">


                            <div class="col-md-6">
                                <input  type="file" class="form-control"  name="photo"  >
                            </div>
                            @error('name_ar')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>

                            @enderror

                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{__('messages.name show ar')}}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control"  name="name_ar"  >
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
                                <input id="nameen" type="text" class="form-control"  name="name_en"  >
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
                                <input id="price" type="text" class="form-control "   name="price"  >
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
                                <button id="submit" class="btn btn-primary">
                                    done
                                </button>
                            </div>
                        </div>
                        <div id="suc" style="display: none" class="alert alert-success" role="alert">
                           it is success
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
    <script>
$(document).on('click','#submit',function(e) {
    e.preventDefault();
   var formData=new FormData($('#formdata')[0]);
    $.ajax({
        type: 'POST',
        enctype:'multipart/form-data',
        url: '{{route('insert.ajax')}}',
        data: formData,
        processData:false,
        contentType:false,
        cache:false,


        success: function (data) {
if(data.statues==true){
   $('#suc').show('slow');

}
        }, error: function (reject) {
        }
    });
});

    </script>


    @endsection
