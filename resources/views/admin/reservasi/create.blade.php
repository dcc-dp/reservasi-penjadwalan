<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Reservasi Kursus</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      background: linear-gradient(135deg, #007bff, #00bcd4, #0056b3);
      font-family: 'Poppins', sans-serif;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      overflow-x: hidden;
    }

    .card {
      backdrop-filter: blur(15px);
      background: rgba(255, 255, 255, 0.15);
      border: 1px solid rgba(255, 255, 255, 0.3);
      border-radius: 20px;
      box-shadow: 0 8px 25px rgba(0,0,0,0.2);
      animation: fadeInUp 0.7s ease-in-out;
      transition: transform 0.3s;
    }

    .card:hover {
      transform: translateY(-5px);
    }

    @keyframes fadeInUp {
      from { opacity: 0; transform: translateY(30px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .card-header {
      background: linear-gradient(90deg, #0069d9, #00a8e8);
      color: white;
      border-top-left-radius: 20px;
      border-top-right-radius: 20px;
      text-align: center;
      font-weight: 600;
      font-size: 1.4rem;
      letter-spacing: 1px;
      padding: 1.2rem;
      box-shadow: 0 2px 6px rgba(0,0,0,0.15);
    }

    label {
      color: #fff;
    }

    .form-control {
      background: rgba(255, 255, 255, 0.2);
      border: none;
      border-radius: 10px;
      color: #fff;
      font-weight: 500;
    }

    .form-control::placeholder {
      color: rgba(255, 255, 255, 0.6);
    }

    .form-control:focus {
      background: rgba(255, 255, 255, 0.3);
      box-shadow: 0 0 0 3px rgba(0, 150, 255, 0.4);
    }

    .btn-primary {
      background: linear-gradient(90deg, #007bff, #00c6ff);
      border: none;
      border-radius: 10px;
      padding: 0.6rem 1.2rem;
      font-weight: 600;
      transition: 0.3s;
    }

    .btn-primary:hover {
      background: linear-gradient(90deg, #0056b3, #0099cc);
      transform: scale(1.05);
    }

    .btn-secondary {
      background: rgba(255,255,255,0.2);
      border: none;
      border-radius: 10px;
      color: #fff;
      font-weight: 500;
      transition: 0.3s;
    }

    .btn-secondary:hover {
      background: rgba(255,255,255,0.35);
    }

    footer {
      position: fixed;
      bottom: 10px;
      text-align: center;
      width: 100%;
      color: white;
      font-size: 0.85rem;
      letter-spacing: 0.5px;
      opacity: 0.8;
    }

    .glow-text {
      text-shadow: 0 0 10px rgba(0, 255, 255, 0.6), 0 0 20px rgba(0, 150, 255, 0.8);
    }

  </style>
</head>
<body>

  <div class="container">
    <div class="col-lg-6 mx-auto">
      <div class="card">
        <div class="card-header glow-text">
          <i class="bi bi-calendar-check"></i> Form Reservasi Kursus
        </div>

        <div class="card-body p-4">
          <form action="{{ route('reservasi.store') }}" method="POST">
            @csrf

            <!-- Pilih Kursus -->
            <div class="mb-3">
              <label for="id_kursus" class="form-label fw-bold">Pilih Kursus</label>
              <select name="id_kursus" id="id_kursus" class="form-control" required>
                <option value="">-- Pilih Kursus --</option>
                @foreach ($kursusList as $k)
                  <option value="{{ $k->id }}">{{ $k->id_kursus }} - {{ $k->name }}</option>
                @endforeach
              </select>
            </div>

            <!-- Hari Pertama -->
            <div class="mb-3">
              <label for="hari1" class="form-label fw-bold">Hari Pertama</label>
              <input type="date" name="hari1" id="hari1" class="form-control" required>
            </div>

            <!-- Jam Pertama -->
            <div class="mb-3">
              <label for="jam1" class="form-label fw-bold">Jam Pertama</label>
              <input type="time" name="jam1" id="jam1" class="form-control" required>
            </div>

            <!-- Hari Kedua -->
            <div class="mb-3">
              <label for="hari2" class="form-label fw-bold">Hari Kedua</label>
              <input type="date" name="hari2" id="hari2" class="form-control" required>
            </div>

            <!-- Jam Kedua -->
            <div class="mb-3">
              <label for="jam2" class="form-label fw-bold">Jam Kedua</label>
              <input type="time" name="jam2" id="jam2" class="form-control">
            </div>

            <!-- Tombol -->
            <div class="d-flex justify-content-between mt-4">
              <a href="{{ url()->previous() }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left-circle"></i> Kembali
              </a>
              <button type="submit" class="btn btn-primary">
                <i class="bi bi-send-fill"></i> Kirim Reservasi
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <footer>
    &copy; {{ date('Y') }} Dipanegara Computer Club — Semua Hak Dilindungi.
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  @if(session('success'))
  <script>
  Swal.fire({
    title: '🎉 Berhasil!',
    text: "{{ session('success') }}",
    icon: 'success',
    confirmButtonText: 'Mantap!'
  });
  </script>
  @endif

  @if(session('error'))
  <script>
  Swal.fire({
    title: '⚠️ Oops!',
    text: "{{ session('error') }}",
    icon: 'error',
    confirmButtonText: 'Coba Lagi'
  });
  </script>
  @endif

</body>
</html>
