@extends('layouts.master')

@section('content')
    <br>
    <h1 class="text-light-emphasis">FinPocket Category</h1>
    <hr>
    <div class="card">
        <div class="card-header">
            Categories List
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr class="table-primary">
                            <th scope="col">No</th>
                            <th scope="col">Name Category</th>
                            <th scope="col">Balance</th>
                            <th scope="col">Times</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <th scope="row">{{ ($data->currentPage() - 1) * $data->perPage() + $loop->iteration }}</th>
                                <td>{{$item->name_category}}</td>
                                <td>{{number_format($item->category_balance, 0 , ',', '.')}}</td>
                                <td>{{$item->created_at->format('d/m/Y H:i')}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection