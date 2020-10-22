@extends('layouts.app')
@section('content')
<div class="container">
    <table class="table table-hover">

        <thead>

        <th>Band-Name</th>


        </thead>

        <tbody>
        @foreach($bands as $band)
            <tr>
                <td>{{$band->name}}</td>
            </tr>
        @endforeach
        </tbody>

    </table>
</div>
@endsection
