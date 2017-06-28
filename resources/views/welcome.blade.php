<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
      <!--   <link rel="stylesheet" href="{{ asset('css/master.css') }}"> -->
    </head>
    <body>
      <nav class="navbar navbar-default navbar-fixed-top">
    		<ul class="nav navbar-nav">
    		<li><a href="">Test Project</a></li>
    		<li><a href="">home</a></li>
        </ul>
	    </nav>
	    <br><br><br><br>
      <div class="container">
    		<div class="form-group row add">
    			<div class="col-md-2">
    				<input type="text" class="form-control" id="name" name="name"
    					placeholder="Enter name" required>

    			</div>

          <div class="container">
            <div class="form-group row add">
              <div class="col-md-2">
                <input type="text" class="form-control" id="surname" name="surname"
                  placeholder="Enter surname" required>

              </div>


              <div class="container">
                <div class="form-group row add">
                  <div class="col-md-2">
                    <input type="text" class="form-control" id="phone" name="phone"
                      placeholder="Enter phone number" required>

                  </div>

                  <div class="container">
                		<div class="form-group row add">
                			<div class="col-md-2">
                				<input type="text" class="form-control" id="age" name="age"
                					placeholder="Enter age" required>

                			</div>

                      <div class="container">
                        <div class="form-group row add">
                          <div class="col-md-2">
                            <input type="text" class="form-control" id="email" name="email"
                              placeholder="Enter email" >

                          </div>


    			<div class="col-md-2">
    				<button class="btn btn-primary btn-m" type="submit" id="add">
    					<span class="glyphicon glyphicon-plus"></span> Add new entry
    				</button>
    			</div>

    		</div>

          <p class="error text-center alert alert-danger hidden"></p>

  		   {{ csrf_field() }}
  		<div class="table-responsive text-center">
  			<table class="table table-striped" id="table">
  				<thead>
  					<tr>
  						<th class="text-center">#</th>
  						<th class="text-center">Name</th>
  						<th class="text-center">Surname</th>
  						<th class="text-center">Phone Nr.</th>
  						<th class="text-center">Age</th>
  						<th class="text-center">Email</th>
  						<th class="text-center">Actions</th>
  					</tr>
  				</thead>
  				@foreach($data as $item)
  				<tr class="item{{$item->id}}">
  					<td>{{$item->id}}</td>
  					<td>{{$item->name}}</td>
  					<td>{{$item->surname}}</td>
  					<td>{{$item->phone}}</td>
  					<td>{{$item->age}}</td>
  					<td>{{$item->email}}</td>
  					<td><button class="edit-modal btn btn-info btn-xs" data-id="{{$item->id}}"
  							data-name="{{$item->name}}" data-surname="{{$item->surname}}" data-phone="{{$item->phone}}"
                data-age="{{$item->age}}" data-email="{{$item->email}}">
  							<span class="glyphicon glyphicon-edit"></span> Edit
  						</button>
  						<button class="delete-modal btn btn-danger btn-xs"
  							data-id="{{$item->id}}" data-name="{{$item->name}}" data-surname="{{$item->surname}}">
  							<span class="glyphicon glyphicon-trash"></span> Delete
  						</button></td>
  				</tr>
  				@endforeach
  			</table>
  		</div>
  	</div>
  	<div id="myModal" class="modal fade" role="dialog">
  		<div class="modal-dialog">
  			<!-- Modal content-->
  			<div class="modal-content">
  				<div class="modal-header">
  					<button type="button" class="close" data-dismiss="modal">&times;</button>
  					<h4 class="modal-title"></h4>
  				</div>
  				<div class="modal-body">
  					<form class="form-horizontal" role="form">


  						<div class="form-group">
  							<label class="control-label col-sm-2" for="id">ID:</label>
  							<div class="col-sm-10">
  								<input type="text" class="form-control" id="fid" disabled>
  							</div>
  						</div>


  						<div class="form-group">
  							<label class="control-label col-sm-2" for="name">Name:</label>
  							<div class="col-sm-10">
  								<input type="name" class="form-control" id="n">
  							</div>
  						</div>


              <div class="form-group">
  							<label class="control-label col-sm-2" for="surname">Surname:</label>
  							<div class="col-sm-10">
  								<input type="name" class="form-control" id="sn">
  							</div>
  						</div>

              <div class="form-group">
  							<label class="control-label col-sm-2" for="phone">Phone Nr.:</label>
  							<div class="col-sm-10">
  								<input type="name" class="form-control" id="p">
  							</div>
  						</div>

              <div class="form-group">
  							<label class="control-label col-sm-2" for="age">Age:</label>
  							<div class="col-sm-10">
  								<input type="name" class="form-control" id="a">
  							</div>
  						</div>

              <div class="form-group">
  							<label class="control-label col-sm-2" for="email">Email:</label>
  							<div class="col-sm-10">
  								<input type="name" class="form-control" id="e">
  							</div>
  						</div>


  					</form>
  					<div class="deleteContent">
  						Are you Sure you want to delete <u><b><span class="dname"></span> <span class="dsname"></span><b><u> ? <span
  							class="hidden did"></span>
  					</div>
  					<div class="modal-footer">
  						<button type="button" class="btn actionBtn btn-sm" data-dismiss="modal">
  							<span id="footer_action_button" class='glyphicon'> </span>
  						</button>
  						<button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">
  							<span class='glyphicon glyphicon-remove'></span> Close
  						</button>
  					</div>
  				</div>
  			</div>
		  </div>
      <script src="{{ asset('js/app.js') }}"></script>
      <script src="{{ asset('js/script.js') }}"></script>
    </body>
</html>
