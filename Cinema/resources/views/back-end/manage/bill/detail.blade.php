@extends('back-end.master')
@section('Main_Admin')
@include('sweetalert::alert')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="card px-2">
                    <div class="card-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="text-right btn-handle my-5">
                                        @if ($book->status != 2)
                                        <form action="{{ route('post_Edit', $book->id) }}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-7">
                                                    <div class="form-group">
                                                        <select class="form-control form-control-sm"
                                                            id="exampleFormControlSelect3" name="status">
                                                            <option value="1"
                                                                {{ $book->status == 1 ? 'selected' : '' }}>
                                                                Pending</option>
                                                            <option value="2"
                                                                {{ $book->status == 2 ? 'selected' : '' }}>
                                                                Complete</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="com-md-4">
                                                    <button type="submit" class="btn btn-gradient-primary btn-md"><i
                                                            class="mdi mdi-cart-arrow-down menu-icon"></i>
                                                        Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                        @else
                                        <div class="com-md-4 text-left">
                                            <button class="btn btn-gradient-success btn-md">Complete</button>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h3 class="text-right my-5">Invoice&nbsp;&nbsp;#CNM-0{{ $book->id }}</h3>
                                    <hr>
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid d-flex justify-content-between">
                            <div class="col-lg-4 pl-0 text-center">
                                <p class="mt-5 mb-2 "><b>Purple Admin</b></p>
                                <p>{{ $contact->email }},<br>{{ $contact->phone }},<br>{{ $contact->address }}.</p>
                            </div>
                            <div class="col-lg-4 pr-0">
                                <p class="mt-5 mb-2 text-center"><b>Invoice to</b></p>
                                <p class="text-center">{{ $user->where('id', $book->user_id)->first()->name }}<br>
                                    {{ $user->where('id', $book->user_id)->first()->email }} <br>Payment : Banking
                                </p>
                            </div>
                        </div>
                        <div class="container-fluid mt-5 d-flex justify-content-center w-100">
                            <div class="table-responsive w-100">
                                <table class="table">
                                    <thead>
                                        <tr class="bg-dark text-white">
                                            <th>#</th>
                                            <th>Film</th>
                                            <th class="text-right">Time</th>
                                            <th class="text-right">Date</th>
                                            <th class="text-right">Seat</th>
                                            <th class="text-right">Room</th>
                                            <th class="text-right">Cinema</th>
                                            <th class="text-right">Unit cost</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($listData as $keys => $item)
                                        @if ($item->time_id)
                                        @foreach (json_decode($item->chair) as $key => $value)
                                        <tr class="text-right ">
                                            <td class="text-left">{{ $loop->index + 1 }}</td>
                                            <td class="text-left">
                                                {{ $timeDetail->where('id', $item->time_id)->first()->film->name }}
                                            </td>
                                            <td>{{ $timeDetail->where('id', $item->time_id)->first()->time->time }}
                                            </td>
                                            <td>{{ $timeDetail->where('id', $item->time_id)->first()->date }}
                                            </td>
                                            <td class="text-uppercase text-center">
                                                <pre>{{ $value }}</pre>
                                            </td>
                                            <td>{{ $timeDetail->where('id', $item->time_id)->first()->room->name }}
                                            </td>
                                            <td>{{ $timeDetail->where('id', $item->time_id)->first()->cinema->name }}
                                            </td>
                                            <td>@if (str_contains('abcd', substr($value, 0,1)))
                                                $ {{ number_format($chair->where('id', 2)->first()->price, 2) }}
                                                @elseif(str_contains('efgh', substr($value, 0,1)))
                                                $ {{ number_format($chair->where('id', 1)->first()->price, 2) }}
                                                @else
                                                $ {{ number_format($chair->where('id', 3)->first()->price, 2) }}
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="5" class="text-center">
                                                <h4>Amount</h4>
                                            </td>
                                            <td colspan="5" class="text-center">
                                                <h4>$ {{ number_format($listData[$keys]['price']) }}</h4>
                                            </td>
                                        </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                                <a href="{{ route('create-PDF', request()->id) }}"
                                    class="btn btn-gradient-info btn-icon-text text-right"> PDF <i
                                        class="mdi mdi-printer btn-icon-append"></i>
                                </a>
                            </div>
                        </div>
                        <div class="container-fluid mt-5 d-flex justify-content-center w-100">
                            <div class="table-responsive w-100">
                                <table class="table">
                                    <thead>
                                        <tr class="bg-dark text-white">
                                            <th>#</th>
                                            <th>Food</th>
                                            <th class="text-right">Quantity</th>
                                            <th class="text-right">Unit cost</th>
                                            <th class="text-right">Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($listData as $value)
                                        @if ($value->food_id)
                                        <h1 class="d-none">{{ $Flag += 1 }}</h1>
                                        <tr class="text-right">
                                            <td class="text-left">{{ $loop->index }}</td>
                                            <td class="text-left">
                                                {{ $food->where('id', $value->food_id)->first()->name }}
                                            </td>
                                            <td>{{ $value->quantity }}</td>
                                            <td>$
                                                {{ number_format($food->where('id', $value->food_id)->first()->price) }}
                                            </td>
                                            <td>$ {{ number_format($value->price) }}</td>
                                        </tr>
                                        @endif
                                        @endforeach
                                        @if ($Flag == 0)
                                        <tr class="odd">
                                            <td valign="top" colspan="8" class="dataTables_empty text-center ">You
                                                have
                                                not ordered food yet </td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="container-fluid mt-5 w-100">
                            <p class="text-right mb-2">Sub - Total amount: ${{ number_format($book->price) }}</p>
                            <h4 class="text-right mb-5">Total : ${{ number_format($book->price) }}
                            </h4>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop