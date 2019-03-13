@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="post" style="padding-top: 10px;">
            {{ csrf_field() }}
            <div class="input-group">
                <input type="text" name="originalHttp" class="form-control" placeholder="Ваша длинная ссылка">
                <span class="input-group-btn">
                    <button class="btn btn-default" name = "subHttp" type="submit">Go!</button>
                </span>
            </div>
        </form>
        <div class="result" style="margin-top: 10px">
                @if(session()->has('short_msg'))
                    <div class="alert alert-success">
                        Короткая ссылка <a target="_blank" href="https://{{env('APP_URL')}}/{{ session('short_msg')}}">{{env('APP_URL')}}/{{ session('short_msg') }}</a>
                    </div>
            @endif
        </div>
    </div>
@endsection

