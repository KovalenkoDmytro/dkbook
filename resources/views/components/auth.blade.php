
<div>
    <h1>Login</h1>
    <form action="" method="post">
        @csrf
        <div>
            <label for="email">Email</label>
            <input type="text" id="email" name="email" placeholder="mail@gmail.com">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="text" id="password" name="password" placeholder="Min. 8 characters">
        </div>
        <label for="remember_me">
            <input type="checkbox" id="remember_me" name="remember_me">
            <p>Remember me</p>
        </label>
        <a href="#!" title="Forget password">Forget password</a>
        <button type="submit">Login</button>
        <p>No register yet? <a href="{{ URL::route('company.step1')}}" title="Create an Account">Create an Account</a></p>

    </form>
</div>
