@extends('welcome')
@section('index')
    <div class="container">
        <table class="table table-hover">

            <thead>

            <th style="background: skyblue;">Band-Name</th>


            </thead>

            <tbody style="background: gray">
            @foreach($bands as $band)
                <tr>
                    <td><a href="{{route('band.show', $band)}}"><button>{{$band->name}}</button></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
