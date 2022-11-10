@extends('guests.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Guest Details</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('guests.index') }}"> Back</a>
        </div>
    </div>
</div>
   
    <div class="alert alert-danger" style="display:none">
        There were some problems with your input.<br><br>
        <ul id="error-list">
            
        </ul>
    </div>
   
<form id="myForm" name="myForm" class="form-horizontal" novalidate="" >
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>First Name:</strong>
                <input type="text" name="first_name" id="first_name"  class="form-control" placeholder="First Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Last Name:</strong>
                <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                <textarea class="form-control" id="email" name="email" placeholder="Email"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Message:</strong>
                <textarea type="text" name="message" id="message" class="form-control" placeholder="Message"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="button" id="btn-save" class="btn btn-primary" value="add">Add Guest</button>
                <input type="hidden" id="guest_id" name="guest_id" value="0">
        </div>
    </div>
   
</form>
@endsection