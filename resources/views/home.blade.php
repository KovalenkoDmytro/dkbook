
<h1>Home page</h1>

@auth('web')
    <a href="{{route('user.logout')}}">Logout _permanent</a>
    <p>Your ADMIN _permanent</p>
@endauth


@guest('web')
<p>Your guest _permanent</p>
<a href="{{route('user.login')}}">Login_permanent</a>
@endguest


{{--@section('content')--}}


{{--    <div class="container">--}}
{{--        <div class="row justify-content-center">--}}
{{--            <div class="col-md-8">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-header">{{ __('Dashboard') }}</div>--}}

{{--                    <div class="card-body">--}}
{{--                        @if (session('status'))--}}
{{--                            <div class="alert alert-success" role="alert">--}}
{{--                                {{ session('status') }}--}}
{{--                            </div>--}}
{{--                        @endif--}}

{{--                        {{ __('You are logged in!') }}--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}
