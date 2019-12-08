@extends('layouts.main_app')

@section('content')
<div class="container">
	
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default" style="margin-top:5%">
                    <div class="card-header">Roles</div>
                    <div class="card-body">
                    	<role-list></role-list>
                    <role-form></role-form>
                    </div>
                </div>
            </div>
        </div>
    
</div>
@endsection
