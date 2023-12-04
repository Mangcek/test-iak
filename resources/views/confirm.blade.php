<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Payment</title>
</head>
<body>
    <form action="/cek-pembayaran" method="post">
        @csrf
        ID : <input name="id" value="BTX001VIP" /><br />
        Harga : <input name="price" value="100000" /><br />
        Nama : <input name="name" value="Axel Ferdinand" /><br />
        <button type="submit">Confirm</button>
    </form>
</body>
</html>