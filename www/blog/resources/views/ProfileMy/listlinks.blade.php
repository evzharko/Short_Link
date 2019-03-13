@extends('layouts.app')

@section('content')
    <div class="container" style="padding-top: 10px;">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Оригинальная ссылка</th>
                <th>Которткая ссылка</th>
                <th>Количество переходов</th>
            </tr>
            </thead>
            <tbody>
            @foreach($allLinks as $items)
                <tr>
                    {{--<td style="width: 21px; word-break: break-all;">{{$items->long_link}}</td>--}}
                    <td><a href="{{$items->long_link}}">{{$items->long_link}}</a></td>
                    <td><a target="_blank" href="https://{{env('APP_URL')}}/{{$items->short_link}}">{{env('APP_URL')}}/{{$items->short_link}}</a></td>
                    <td>{{$items->count}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $allLinks->links() }}
    </div>
@endsection