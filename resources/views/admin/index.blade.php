@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
<!--                    <div class="form-group">
                        <a href="{{ route('currencies.create')}}" class="btn btn-warning btn-sm">Update Rates</a>
                    </div>-->

                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Currency</th>
                            <th>Code</th>
                            <th>USD_XXX</th>
                            <th>&nbsp;</th>
                        </tr>
                        @foreach($currencies as $currency)
                        <tr>
                            <td>{{ $currency->name }}</td>
                            <td>{{ $currency->code }}</td>
                            <td>{{ $currency->usd_equivalent }}</td>
                            <td>
                                <a href=" {{ route('currencies.show', $currency->id) }}" class="btn btn-xs btn-info">View</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    <div class="manage-currencies" style="text-align: center">
                        {{ link_to_route('currencies.index','Manage Currencies...',null,['class'=>'']) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
