@if(!(auth()->user()))
    <div class="col-lg-2">
        <a href="{{ route('register.create') }}">register</a>

    </div>
@endif

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<?php //var_dump($errors);exit; ?>
<?php //var_dump($errors->all());exit; ?>

@if (count($errors->all()) > 0)

    @foreach($errors->all() as $error)
        <div class="form-group">
            <div class="alert alert-danger">
                <li>{{ $error }}</li>
            </div>
        </div>
    @endforeach

@endif


<form method="POST" action="/log">
    {{ csrf_field() }}
    <h2>Login</h2>


    <div class="form-group">

        <label for="email">Enter your email</label>
        <input id="email" type="email" name="email" class="form-control">
        @include('partial.error',['fieldTitle' => 'email'])

    </div>

    <div class="form-group">

        <label for="password">Enter your password</label>
        <input id="password" type="password" name="password" class="form-control">
        @include('partial.error',['fieldTitle' => 'password'])

    </div>


    <div class="form-group">

        <button type="submit" class="btn btn-primary"> login</button>

    </div>

</form>