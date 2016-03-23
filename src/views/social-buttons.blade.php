

<div class="margin-top text-center">
    <br/>
    <h4 class="">Or signin/register using social networks</h4>
    <br/>
    @foreach ($providers as $provider)
    @var $provider_lowercase = ($provider == 'Google') ? 'google-plus' : strtolower($provider)
    <a href="{{ route('anvard.routes.login', $provider, $provider) }}" class="btn btn-block btn-social btn-{{$provider_lowercase}}">
        <i class="fa fa-{{$provider_lowercase}}"></i> Sign in with {{$provider}}
    </a>
    @endforeach
    <br/>
    <br/>
</div>