<form action="{{ url('/register') }}" method="POST">
    @csrf
    <h2>Daftar Akun Baru</h2>

    @if ($errors->any())
        <div style="color: red; margin-bottom: 15px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <input type="text" name="nama" value="{{ old('nama') }}" placeholder="Nama Lengkap" required><br>
    <input type="text" name="nim" value="{{ old('nim') }}" placeholder="NIM" required><br>
    <input type="text" name="jurusan" value="{{ old('jurusan') }}" placeholder="Jurusan" required><br>
    <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Password (Min. 6 Karakter)" required><br>
    <button type="submit">Daftar</button>
</form>

<p>Sudah punya akun? <a href="{{ url('/login') }}">Login di sini</a></p>