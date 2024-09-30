@extends('layouts.app')

@section('content')






        <table class="table">
            <caption>List of users</caption>
            <thead>
            <tr>
                <th scope="col">code</th>
                <th scope="col">date</th>
                <th scope="col">orderstat</th>
                <th scope="col">inv_total</th>
            </tr>
            </thead>
            <tbody>
            @foreach($detailspos as $index=>$pos)
            <tr>
                <th scope="row">{{$pos->product_id}}
                </th>
                <td>{{$pos->masterpos_id}}</td>
                <td>the Bird</td>
                <td>@twitter</td>
            </tr>
            @endforeach
            </tbody>
        </table>





@endsection