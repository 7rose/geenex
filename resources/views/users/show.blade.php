<?php
  $r = new App\Helpers\Role;
  $f = new App\Helpers\Filter;
?>
@extends('../nav')

@section('content')

<div class="row top-pad"></div>
<section>
    <div class="container">
      <h4>
        @if($r->admin())
        <a href="/users"><i class="fa fa-users" aria-hidden="true"></i> Users</a> /
        @endif
        <span><i class="fa fa-address-card-o" aria-hidden="true"></i> {{ $record->name }}</span>
      </h4>
      
        <div class="cent">
          <div class="row text-left">
            <div class="card card-light form-card col-12">
              <ul class="list-unstyled">
                <li><strong>Email:</strong>  {{ $record->email }}</li>
                <li><strong>Name: </strong> {{ $record->name }}</li>
                <li><strong>Created At:</strong>  {{ $record->created_at }} [{{ $record->created_at->diffForHumans() }}]</li>
                <li><strong>Updated At:</strong>  {{ $record->updated_at }} [{{ $record->updated_at->diffForHumans() }}]</li>
                <li><strong>Contact Infomation:</strong> <a href="/users/contact/edit/{{ $record->id }}" class="badge badge-success"><i class="fa fa-magic" aria-hidden="true"></i> Update</a>
                  <ul class="list-unstyled">
                    @if(isset($contacts) && count($contacts))
                      @foreach($contacts as $key=>$value)
                        <li>&nbsp&nbsp <strong>{{ $f->getContact($key) }} : </strong>{{$value}}</li>
                      @endforeach
                    @endif
                  </ul>
                </li>
              </ul>
              <div class="row">

              @if($r->gt($record->id) && $r->root())
                @if(!$r->root($record->id) && $r->admin($record->id))
                  <a href="/users/remove_admin/{{$record->id}}" class="btn btn-outline-primary btn-sm"> remove admin</a> &nbsp
                @else
                  <a href="/users/set_admin/{{$record->id}}" class="btn btn-primary btn-sm"><i class="fa fa-magic" aria-hidden="true"></i> promote to admin</a> &nbsp
                @endif

                <a href="/users/edit/{{$record->id}}" class="btn btn-warning btn-sm"> edit</a> &nbsp
                <a href="/users/delete/{{$record->id}}" class="btn btn-danger btn-sm"> Delete This User !</a>
              @endif

              </div>

            </div>
          </div>
        </div>
    </div>
</section>

@endsection