
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Supplier</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            padding: 40px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
        }
        input, textarea {
            width: 100%;
            padding: 12px;
            margin: 8px 0 18px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 6px;
        }
        button {
            background: #2563eb;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }
        a { color: #2563eb; text-decoration: none; }
        .error { color: red; }
    </style>
</head>
<body>
<div class="container">
    <h2>{{ $supplier->exists ? 'Edit Supplier' : 'Tambah Supplier' }}</h2>

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p class="error">{{ $error }}</p>
        @endforeach
    @endif

    <form method="POST"
          action="{{ $supplier->exists ? route('suppliers.update', $supplier->id) : route('suppliers.store') }}">

        @csrf

        @if ($supplier->exists)
            @method('PUT')
        @endif

        <label>Nama Supplier</label>
        <input type="text" name="name"
               value="{{ old('name', $supplier->name) }}" required>

        <label>Kontak Penjualan</label>
        <input type="text" name="sales_contact"
               value="{{ old('sales_contact', $supplier->sales_contact) }}">

        <label>Alamat</label>
        <textarea name="address">{{ old('address', $supplier->address) }}</textarea>

        <label>Wilayah</label>
        <input type="text" name="region"
               value="{{ old('region', $supplier->region) }}">

        <button type="submit">Simpan Supplier</button>
        <a href="{{ route('suppliers.index') }}">Kembali</a>
    </form>
</div>
</body>
</html>
