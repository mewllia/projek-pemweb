<form action="{{ url('/login') }}" method="POST">
    @csrf
    <h2>Login Sistem Peminjaman</h2>
    
    @if(session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif

    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit">Masuk</button>
    <p>Belum punya akun? <a href="{{ url('/register') }}">Daftar Sekarang</a></p>
</form>