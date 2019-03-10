@extends('layouts.app')

@section('content')
    <div class="container">
            <table class="table table-hover">
                <thead class="thead-dark">
                <tr>
                    <th>Оригинальная ссылка</th>
                    <th>Которткая ссылка</th>
                    <th>Количество переходов</th>
                </tr>
                </thead>
                <tbody>
                @foreach($allLinks as $items)
                    <tr>
                        <td style="width: 20px">{{$items->long_link}}</td>
                        <td>{{$items->short_link}}</td>
                        <td>{{$items->count}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
    </div>
@endsection