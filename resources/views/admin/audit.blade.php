@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Audit Trails</div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered">
                        <tr>
                            <th>#</th>
                            <th>Description</th>
                            <th>User Id</th>
                            <th>Date</th>
                        </tr>
                        <?php $i = 0; ?>
                        @foreach($audits as $audit)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $audit->description }}</td>
                            <td>{{ $audit->causer_id }}</td>
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