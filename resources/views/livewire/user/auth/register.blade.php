@php use App\Enums\PasswordValidatorRules;use function App\isNullOrEmptyString; @endphp
<div>
    <x-slot:pageTitle>Register</x-slot:pageTitle>
    <div class="min-h-screen flex items-center justify-center bg-base-300">
        <div class="bg-base-100 p-8 rounded-lg shadow-xl max-w-md w-full">
            <h1 class="text-3xl font-semibold">Register for an account</h1>
            <div class="flex w-full flex-col">
                <form wire:submit="register">
                    <div class="flex flex-col space-y-3 my-3">
                        <h3 class="text-lg">Account details</h3>
                        <fieldset class="fieldset">
                            <label class="label">Name</label>
                            <input tabindex="1" wire:model.blur="name" type="text" class="input @error('name') border-error @enderror" placeholder="Rusty Shackleford"/>
                            @error('name') <div class="validator-hint visible text-error mt-0"> {{ $message }} </div> @enderror
                            <label class="label">Email</label>
                            <input tabindex="2" wire:model.blur="email_address" type="email" class="input @error('email_address') border-error @enderror"
                                   placeholder="rshackleford@daletech.ru"/>
                            @error('email_address') <div class="validator-hint visible text-error mt-0"> {{ $message }} </div> @enderror
                            <label class="label">Password</label>
                            <input tabindex="3" wire:model.blur="password" type="password" class="input @error('password') border-error @enderror" placeholder="*******"/>
                            <label for="" class="label mt-2">Your password must:</label>
                            <ul class="space-y-1 mb-2">
                                <li class="flex flex-row items-center">
                                    <x-validation-field-feedback-icon
                                        :field-empty="isNullOrEmptyString($password)"
                                        :rule-key="PasswordValidatorRules::MIN"
                                        :errors="$errors->all()"
                                        class="{{ $validationFeedbackClass }}"/>
                                    <span>Be minimum 8 characters</span>
                                </li>
                                <li class="flex flex-row items-center">
                                    <x-validation-field-feedback-icon
                                        :field-empty="isNullOrEmptyString($password)"
                                        :rule-key="PasswordValidatorRules::NUMBERS"
                                        :errors="$errors->all()"
                                        class="{{ $validationFeedbackClass }}" />
                                    <span>Have at least 1 number</span>
                                </li>
                                <li class="flex flex-row items-center">
                                    <x-validation-field-feedback-icon
                                        :field-empty="isNullOrEmptyString($password)"
                                        :rule-key="PasswordValidatorRules::SYMBOLS"
                                        :errors="$errors->all()"
                                        class="{{ $validationFeedbackClass }}" />
                                    <span>Have at least 1 symbol</span>
                                </li>
                                <li class="flex flex-row items-center">
                                    <x-validation-field-feedback-icon
                                        :field-empty="isNullOrEmptyString($password)"
                                        :rule-key="PasswordValidatorRules::MIXED"
                                        :errors="$errors->all()"
                                        class="{{ $validationFeedbackClass }}" />
                                    <span>Be mixed-case</span>
                                </li>
                                <li class="flex flex-row items-center">
                                    <x-validation-field-feedback-icon
                                        :field-empty="isNullOrEmptyString($password)"
                                        :rule-key="PasswordValidatorRules::UNCOMP"
                                        :errors="$errors->all()"
                                        class="{{ $validationFeedbackClass }}" />
                                    <span>Not present in a data leak</span>
                                </li>
                            </ul>
                            <label class="label">Confirm password</label>
                            <input tabindex="4" wire:model.blur="password_confirmation" type="password" class="input @error('password_confirmation') border-error @enderror"
                                   placeholder="*******"/>
                            @error('password_confirmation') <div class="validator-hint visible text-error mt-0"> {{ $message }} </div> @enderror
                        </fieldset>
                    </div>
                    <div class="flex flex-row">
                        <div class="grid grid-cols-2 w-full">
                            <div></div>
                            <button type="submit" class="btn btn-primary btn-block data-loading:btn-disabled">
                                <div class="not-data-loading:hidden">
                                    <span class="loading loading-spinner"></span>
                                </div>
                                Register
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </form>

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
                    <button tabindex="6" type="button" wire:click.debounce.1000ms="signInWithGoogle" class="btn flex-1 grow">
                        Sign-in with Google
                    </button>
                    <a tabindex="7" href="{{ route('user.auth.login') }}" wire:navigate class="btn flex-1 grow">Login</a>
                </div>
            </div>
        </div>
    </div>
</div>
