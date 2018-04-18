

<form method="POST" action="/register">
{{ csrf_field() }}
<h2>Register</h2>

<div class="form-group">

    <label for="name"> Add user name</label>
    <input id="name" type="text" name="name" class="form-control">
    @include('partial.error',['fieldTitle' => 'name'])

</div>

<div class="form-group">

    <label for="email">Add user email</label>
    <input id="email" type="email" name="email" class="form-control">
    @include('partial.error',['fieldTitle' => 'email'])

</div>

<div class="form-group">

    <label for="password">Add user password</label>
    <input id="password" type="password" name="password" class="form-control">
    @include('partial.error',['fieldTitle' => 'password'])

</div>

<div class="form-group">

    <label for="password">Add user password</label>
    <input id="password" type="password" name="password_confirmation" class="form-control">
    @include('partial.error',['fieldTitle' => 'password'])

</div>




<div class="form-group">

    <button type="submit" class="btn btn-primary"> register</button>

</div>

</form>