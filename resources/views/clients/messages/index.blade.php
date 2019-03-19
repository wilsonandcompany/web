@extends('layouts.client_layout')

@section('mainnav')
<li class="nav-item"><a href="/client/missions" class="nav-link">Missions</a></li>
<li class="nav-item"><a href="/client/believers" class="nav-link">Believers</a></li>
<li class="nav-item active"><a href="/client/messages" class="nav-link">Messages</a></li>
<li class="nav-item"><a href="/client/referrals" class="nav-link">Referrals</a></li>
<li class="nav-item"><a href="/client/reports" class="nav-link">Reports</a></li>
@endsection


@section('subnav')
<li class="nav-item">
    <a class="btn btn-primary" href="/client/messages/create" role="button"><i class="fa fa-plus"></i> Create a New Message</a>
</li>
@endsection

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body p-10">
            <div class="table-responsive dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                <table id="table_id" class="datatable-messages table table-striped dataTable no-footer">
                <thead>
                    <tr>
                        <th>To</th>
                        <th>Subject</th>
                        <th>Body</th>
                        <th>Sent At</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @foreach($messages as $message)
                <tr id="message{{ $message->id }}">
                    <td><a href="/client/messages/{{ $message->id }}">Sent to who...</a></td>
                    <td><a href="/client/messages/{{ $message->id }}">{{ $message->subject }}</a></td>
                    <td>{!! $message->trunc_body !!}</td>
                    <td>{{ $message->create_at }}</td>
                    <td>
                        <h5><a href="#" class="req deleteMessage" data-item-id="{{ $message->id }}"><i class="fa fa-trash"></i></a></h5>
                    </td>
                </tr>
                @endforeach
                </tbody>
                </table>
            </div>
            </div>
        </div>
        </div>
    </div>

@endsection