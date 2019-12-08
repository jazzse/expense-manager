@extends('layouts.main_app')

@section('content')
<div class="container">
	
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default" style="margin-top:5%">
                    <div class="card-header">Users</div>
                    <div class="card-body">
                    	<user-list></user-list>
                        <user-form></user-form>
                    </div>
                </div>
            </div>
        </div>
    
</div>
@endsection
