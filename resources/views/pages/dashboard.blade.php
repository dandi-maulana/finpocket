@extends('layouts.master')

@section('content')
    <br>
    <h1 class="text-light-emphasis">Dashboard</h1>
    <hr>
    <div class="row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Total Users</h3>
                    <p class="card-text">"This card shows the total number of active user accounts registered in the system,
                        helping you track platform growth."</p>
                    <br>
                    <div class="card-text h1">{{$data_user}} Users</div>
                    <br>
                    <a href="/users" class="btn btn-primary">Details</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Total Category</h3>
                    <p class="card-text">"This card shows the total number of Finance categories registered in the system,
                        so it helps you track the growth of the platform."</p>
                    <br>
                    <div class="card-text h1">{{$data_category}} Category</div>
                    <br>
                    <a href="/category" class="btn btn-primary">Details</a>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Total Transactions</h3>
            <p class="card-text">It shows the total number of transactions, both withdrawals and deposits registered in the
                system, helping you track the growth of the platform."</p>
            <div class="row">
                <div class="col">
                    <div class="card-text h5">Total Transactions</div>
                </div>
                <div class="col">
                    <div class="card-text h5">Total Withdraw</div>
                </div>
                <div class="col">
                    <div class="card-text h5">Total Deposit</div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <hr>
                </div>
                <div class="col">
                    <hr>
                </div>
                <div class="col">
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card-text h3"> {{$data_transaction}} Transactions</div>
                </div>
                <div class="col">
                    <div class="card-text h3">Rp. {{number_format($total_withdraw, 0, ',', '.')}}</div>
                </div>
                <div class="col">
                    <div class="card-text h3">Rp. {{number_format($total_deposit, 0, ',', '.')}}</div>
                </div>
            </div>
            <br>
            <a href="/transaction" class="btn btn-primary">Details</a>
        </div>
    </div>
@endsection