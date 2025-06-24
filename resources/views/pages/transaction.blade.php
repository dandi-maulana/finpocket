@extends('layouts.master')

@section('content')
    <br>
    <h1 class="text-light-emphasis">FinPocket Transactions</h1>
    <hr>
    <div class="card">
        <div class="card-header">
            Transaction History
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr class="table-primary">
                            <th scope="col">No</th>
                            <th scope="col">Withdraw</th>
                            <th scope="col">Deposit</th>
                            <th scope="col">Times</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>
                                    @if ($item->withdraw == 0)
                                        <span class="text-muted">no withdrawal</span>
                                    @else
                                        Rp. {{ number_format($item->withdraw, 0, ',', '.') }}
                                    @endif
                                </td>
                                <td>
                                    @if ($item->deposit == 0)
                                        <span class="text-muted">no deposit</span>
                                    @else
                                        Rp. {{ number_format($item->deposit, 0, ',', '.') }}
                                    @endif
                                </td>
                                <td>{{ $item->created_at->format('d/m/Y H:i')}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection