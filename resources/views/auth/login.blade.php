<x-layouts.auth>
    <div id="login">
        <img src="/storage/photos/sign.jpg" alt="signup">
        <div class="auth">
            <section class="section2">
                <h1>Вход в систему</h1>
                <form action="{{ route('signin_store') }}" method="POST">
                    @csrf
                    <label for="email">Электронная почта</label>
                    <input type="email" name="email" id="email" placeholder="example@email.com" required
                        value="{{ old('email') }}">
                    @error('email')
                        <p class="error">{{ $message }}</p>
                    @enderror
                    <label for="password">Пароль</label>
                    <input type="password" name="password" id="password" placeholder="Не менее 8 символов" required
                        value="{{ old('password') }}">
                    @error('password')
                        <p class="error">{{ $message }}</p>
                    @enderror
                    <button type="submit">Продолжить</button>
                </form>
                <p class="end_text">Нажимая на кнопку “Продолжить” вы соглашаетесь
                    c Договором Оферты и Политикой Конфиденциальности Uzum | Business</p>
            </section>
        </div>
    </div>
</x-layouts.auth>
