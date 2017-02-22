@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Audit Trais</div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered">
                        <tr>
                            <th>#</th>
                            <th>User</th>
                            <th>User Id</th>
                            <th>Notes</th>
                            <th>Date</th>
                        </tr>
                        
                        @foreach($audits as $audit)
                        <tr>
                            <td>&nbsp;</td>
                            <td>{{ $audit->user->name }}</td>
                            <td>{{ $audit->user->id }}</td>
                            <td>{{ $audit->notes }}</td>
                            <td>{{ $audit->created_at }}</td>
                        </tr>
                        @endforeach
                    </table>
                    <div class="pull-right">
                        {{ $audits->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection