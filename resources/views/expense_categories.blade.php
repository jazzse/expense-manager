@extends('layouts.main_app')

@section('content')
<div class="container">
	
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default" style="margin-top:5%">
                    <div class="card-header">Expense Categories</div>
                    <div class="card-body">
                    	<ec-list></ec-list>
                        <ec-form></ec-form>
                    </div>
                </div>
            </div>
        </div>
    
</div>
@endsection
