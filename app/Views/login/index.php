<form
		action=<? echo __ROOT__ . "/login" ?>
		method="post"
>
	<div class="form-group">
		<label for="inputEmail">Email address</label>
		<input
				type="email"
				class="form-control <? echo isset($error['username']) ? 'is-invalid' : '' ?>"
				id="inputEmail"
				aria-describedby="emailHelp"
				placeholder="Enter email"
				name="email"
		>
	</div>
	<div class="form-group">
		<label for="inputPassword">Password</label>
		<input
				type="password"
				class="form-control"
				id="inputPassword"
				placeholder="Password"
				name="password"
		>
	</div>
	<button
			type="submit"
			class="btn btn-primary"
	>
		Login
	</button>
	<button
			type="submit"
			class="btn btn-primary"
			name="createUser"
	>
		Create User
	</button>
	<div>
		<? echo $viewData['error'] ?? '' ?>
	</div>
</form>