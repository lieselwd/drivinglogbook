<div>
    <x-slot:pageTitle>Login</x-slot:pageTitle>
    <div class="min-h-screen flex items-center justify-center bg-base-300">
        <div class="bg-base-100 p-8 rounded-lg shadow-xl max-w-md w-full">
            <h1 class="text-3xl font-semibold">Login to Driving Logbook</h1>
            <div class="flex w-full flex-col">
                <div class="flex flex-col space-y-3 my-3">
                    <label for="" class="input">Email address
                        <input type="text" class="grow">
                    </label>
                    <label for="" class="input">Password
                        <input type="password" class="grow">
                    </label>
                </div>
                <div class="flex flex-row">
                    <button class="btn btn-primary">Login</button>
                </div>
                <div class="divider">OR</div>
                <div class="flex flex-row gap-2 w-full">
                    {{--                <form>--}}
                    {{--                    @csrf--}}
                    {{--                    <script src="https://accounts.google.com/gsi/client" async></script>--}}
                    {{--                    <div id="g_id_onload"--}}
                    {{--                         data-client_id="{{ config('services.google.client_id') }}"--}}
                    {{--                         data-login_uri="{{ route('user.auth.callback.google') }}"--}}
                    {{--                         data-_token="{{csrf_token()}}"--}}
                    {{--                         data-ux_mode="redirect"--}}
                    {{--                         data-auto_prompt="false">--}}
                    {{--                    </div>--}}
                    {{--                    <div class="g_id_signin"--}}
                    {{--                         data-type="standard"--}}
                    {{--                         data-size="large"--}}
                    {{--                         data-theme="outline"--}}
                    {{--                         data-text="sign_in_with"--}}
                    {{--                         data-shape="rectangular"--}}
                    {{--                         data-logo_alignment="left"--}}
                    {{--                    >--}}
                    {{--                    </div>--}}
                    {{--                </form>--}}
                    <button type="button" wire:click.debounce.1000ms="signInWithGoogle" class="btn flex-1 grow">
                        <span wire:loading class="loading loading-spinner"></span>
                        Sign-in with Google
                    </button>
                    <button href="#" class="btn flex-1 grow">Make an account</button>
                </div>
            </div>
        </div>
    </div>
</div>
