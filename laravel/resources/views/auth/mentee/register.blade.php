@extends('layouts.before_login_base')

@section('title', 'メンティーの登録')

@section('content')
    <div>
        <div class="justify-content-center">
            <div>
                <div class="flex justify-center items-center py-20">
                    {{-- <div class="card-header">{{ __('Login') }}</div> --}}

                    <div class="bg-white inline-block px-20 py-20">

                        <div class="pb-5">
                            <p class="text-3xl font-bold flex justify-center items-center pb-4 text-teal-400">新規会員登録</p>
                            <div class="border-b-2 px-64"></div>
                        </div>

                        <div>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div>
                                    <label for="email" class="font-bold">{{ __('メールアドレス') }}</label>

                                    <div>
                                        <input id="email" type="email"
                                            class="bg-gray-100 mb-6 mt-2 w-full h-10 p-2 rounded @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email') }}" required autocomplete="email"
                                            placeholder="info@menta.work">

                                        @error('email')
                                            <span role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div>
                                    <label for="password" class="font-bold">{{ __('パスワード（英数字8文字以上）') }}</label>

                                    <div class="flex mb-6 mt-2 relative">
                                        <input id="password" type="password"
                                            class="bg-gray-100 w-full h-10 p-2 rounded @error('password') is-invalid @enderror"
                                            name="password" required autocomplete="new-password">
                                        <span id="buttonEye"
                                            class="fa fa-eye absolute -right-7 top-1/2 -translate-y-1/2"></span>
                                        @error('password')
                                            <span role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div>
                                    <label for="password-confirm"
                                        class="font-bold flex justify-center items-center -ml-48 mr-48">{{ __('確認用パスワード') }}</label>
                                    <div class="flex mb-6 mt-2 relative">
                                        <input id="password-confirm" type="password"
                                            class="bg-gray-100 w-full h-10 p-2 rounded" name="password_confirmation"
                                            required autocomplete="new-password" placeholder="上と同じパスワードを入力してください">
                                        <span id="buttonEye2"
                                            class="fa fa-eye absolute -right-7 top-1/2 -translate-y-1/2"></span>
                                    </div>
                                </div>

                                <div>
                                    <div>
                                        <div class="flex justify-center items-center">
                                            <input type="checkbox" name="" id="">
                                            <label for="remember">
                                                <p><a href="" class="text-teal-400">利用規約</a>と<a href=""
                                                        class="text-teal-400">プライバシーポリシー</a>に同意します。</p>
                                            </label>
                                        </div>
                                    </div>
                                </div>


                                <div class="mb-0 flex justify-center items-center">
                                    <div>
                                        <button type="submit"
                                            class="bg-teal-400 text-white mb-10 ml-2 mt-10 px-40 py-2 flex justify-center items-center rounded shadow-lg">
                                            {{ __('無料で会員登録する') }}</button>
                                        @if (Route::has('password.request'))
                                            <a class="text-teal-400 flex justify-center items-center"
                                                href="{{ route('login') }}">
                                                {{ __('アカウントのお持ちの方はこちら') }}
                                            </a>
                                        @endif

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
