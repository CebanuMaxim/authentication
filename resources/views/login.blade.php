
<?php
echo isset($_POST['email']);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<link href="{{mix('css/app.css')}}" rel="stylesheet">

		<title>Document</title>
	</head>
	<body class="bg-white">

		<div class="container h-100">
			<div class="row mt-5 d-flex justify-content-center">
				<div class="col-5">
					<form class="bg-light p-3 rounded shadow" method="POST" action="{{ URL::to('/submit') }}">
						@csrf

						@error('email')
						    <div class="alert alert-danger">{{ $message }}</div>
						@enderror
						<div class="form-group">
							<label for="email">Email address</label>
							<input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email" value="{{ old('email') }}">
						</div>

						@error('password')
						    
						    @if($message == 'The password format is invalid.')
						    <div class="alert alert-danger">Password must contain only letters, numbers and ‘_’</div>
						    @else
						    <div class="alert alert-danger">{{ $message }}</div>
						    @endif

						@enderror
						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" class="form-control" name="password" id="password" placeholder="Password">
						</div>
						<button type="submit" class="btn btn-primary">Submit</button>
					</form>

				</div>
			</div>
		</div>
	</body>
</html>