@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="text-center">Current Showing at this Theatre Complex</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" class="text-center">Movie ID</th>
                    <th scope="col" class="text-center">Theatre ID</th>
                    <th scope="col" class="text-center">Theatre Complex ID</th>
                    <th scope="col" class="text-center">Showing Start Time</th>
                    <th scope="col" class="text-center">Number of Seats Available</th>
                    <th scope="col" class="text-center">Desired Number of Seats</th>
                </tr>
            </thead>
            
            <form method="POST" action="{{ route('cart.store') }}">
            @csrf
                <tbody>
                    {{-- <div class="container">
                        {{ $show_times->count() }}
                        @foreach (range(0,$show_times->count()) as $x)
                            <div class="container"
                    </div> --}}
                    @foreach ($show_times as $show_time)
                        <tr class="single-buy">
                            <div class="invisible">
                                <input type="hidden" id="user_id-{{auth()->user()->id}}" name="user_id[]" class="form-control" value="{{auth()->user()->id}}" readonly> 
                                <input type="hidden" id="showing_id-{{$show_time->id}}" name="showing_id[]" class="form-control" value="{{$show_time->id}}" readonly> 
                            </div>

                            <td class="form-group">
                                {{-- <label for="movie_id" class="hide">Movie Id:</label> --}}
                                {{-- <input type="hidden" id="movie_id" name="movie_id" class="form-control" value="{{$show_time->movie_id}}" readonly>  --}}
                                <p class="text-center">{{$show_time->movie_id}}</p>
                                <span class="form-text has-danger"></span>
                            </td>    
        
                            <td class="form-group">
                                {{-- <label for="theatre_id" class="label">Theatre Id:</label> --}}
                                {{-- <input type="hidden" id="theatre_id" name="theatre_id" class="form-control" value="{{$show_time->theatre_id}}" readonly> --}}
                                <p class="text-center">{{$show_time->theatre_id}}</p>
                                <span class="form-text has-danger"></span>
                            </td>
    
                            <td class="form-group">
                                {{-- <label for="theatre_complex_id" class="label">Theatre Complex Id:</label> --}}
                                {{-- <input type="hidden" id="theatre_complex_id" name="theatre_complex_id" class="form-control" value="{{$show_time->theatre_complex_id}}" readonly> --}}
                                <p class="text-center">{{$show_time->theatre_complex_id}}</p>
                                <span class="form-text has-danger"></span>
                            </td>
    
                            <td class="form-group">
                                {{-- <label for="showing_start_time" class="label">Showing Start Time:</label> --}}
                                {{-- <input type="hidden" id="showing_start_time" name="showing_start_time" class="form-control" value="{{$show_time->showing_start_time}}" readonly> --}}
                                <p class="text-center">{{$show_time->showing_start_time}}</p>
                                <span class="form-text has-danger"></span>
                            </td>

                            <td class="form-group">
                                {{-- <label for="showing_start_time" class="label">Showing Start Time:</label> --}}
                                {{-- <input type="hidden" id="num_seats_avail" name="num_seats_avail" class="form-control" value="{{$show_time->num_seats_avail}}" readonly> --}}
                                <p class="text-center">{{$show_time->num_seats_avail}}</p>
                                <span class="form-text has-danger"></span>
                            </td>

                            <td class="form-group">
                                {{-- <label for="showing_start_time" class="label">Showing Start Time:</label> --}}
                                <input type="number" min="0" id="number_of_tickets" name="number_of_tickets[]" class="form-control" value="{{old('number_of_tickets')}}">
                                <span class="form-text has-danger"></span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <div class="float-right">
                    <button type="submit" class="btn btn-success">Add to Shopping Cart</button>
                </div>
            </form>
        </table>
    </div>
@endsection()
