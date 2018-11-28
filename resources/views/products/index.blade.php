@extends('layouts.app')

@section('content')
    <body>
    <div class="container products">
		<div class="row">
			<div class="col-xs-12 col-sm-3">
            <ul id="treeview">
                <li data-icon-cls="fa fa-inbox" data-expanded="true">Inbox
                    <ul>
                        <li><b>Today (2)</b></li>
                        <li>Monday</li>
                        <li>Last Week</li>
                    </ul>
                </li>
                <li data-icon-cls="fa fa-trash">Trash
                </li>
                <li data-icon-cls="fa fa-calendar">Calendar
                    <ul>
                        <li>Day</li>
                        <li>Week</li>
                        <li>Month</li>
                    </ul>
                </li>
                <li data-icon-cls="fa fa-user">Contacts
                    <ul>
                        <li>Alexander Stein</li>
                        <li>John Doe</li>
                        <li>Paul Smith</li>
                        <li>Steward Lynn</li>
                    </ul>
                </li>
                <li data-icon-cls="fa fa-folder">Folders
                    <ul>
                        <li>Backup</li>
                        <li>Deleted</li>
                        <li>Projects</li>
                    </ul>
                </li>
            </ul> 
        </div>
		<div class="col-xs-12 col-md-9">
			<div class="row">
				@foreach($items as $item)
					<div class="col-sm-6 col-md-4 col-lg-3 col-xl-2-5">
						<a href="{{route('product-detail', $item->id)}}"> 
							<div class="card">
								<img class="card-img-top" src="../../../{{$item->image}}" alt="Card image cap"/>
								<div class="card-body">
									<h5 class="card-title">{{$item->name}}</h5>
									<p class="card-text">{{$item->description}}</p>
								</div>
							</div>
						</a>
					</div>	
				@endforeach 
			</div>
		</div>
    </div>
    </body>

@endsection