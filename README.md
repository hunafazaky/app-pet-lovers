1.Clone

```bash
git clone https://github.com/hunafazaky/pencinta_hewan.git
```

```bash
cd pencinta_hewan
```

2.Install Dependensi

```bash
composer install
```

```bash
npm install
```

```bash
npm run dev
```

3.Clone Devatar

Devatar adalah avatar alfabet yang bisa digunakan untuk default aplikasi kita. Repositori defatar bisa dilihat [disini](https://github.com/abinoval/defatar).

Kita akan clone defatar ke folder public di storage.

```bash
cd storage/app/public
```

```bash
git clone https://github.com/abinoval/defatar.git
```

Setelah itu, rename folder `defatar` menjadi `avatar`, bisa melalui CMD atau manual di file explorer, jika melalui CMD bisa jalankan perintah ini:

```bash
ren defatar avatar
```

Jika tidak bisa, maka rename manual saja.

4.Generate key dan copy .env.example

Sebelumnya, silakan kembali ke folder root lagi, bisa seperti ini:

```bash
cd ../../../
```

Setelah itu kita copy file .env.example dan rename filenya menjadi .env, bisa manual atau melalui CMD, jika melalui CMD, bisa jalankan perintah seperti ini:

```bash
cp .env.example .env
```

Jika tidak bisa, maka copy dan rename manual saja.

```bash
php artisan key:generate
```

5.Setting database dan filesystem

Silakan buat database, lalu ubah `DB_DATABASE` di file .env menyesuaikan nama database yang dibuat.

![.env file](https://i.ibb.co/Tc0P93Z/Screenshot-68.png)

Sesuaikan juga `host`, `port`, `username`, dan `password` jika belum sesuai.

Selanjutnya, jika discroll kebawah, maka akan ditemukan seperti ini:

![.env file](https://i.ibb.co/Y00YPzk/Screenshot-69.png)

Ubah `FILESYSTEM_DISK` tersebut dari `local` menjadi `public`.

6.Jalankan migration dan seeder, lalu generate storage link

```bash
php artisan migrate:fresh --seed
```

```bash
php artisan storage:link
```

7.Selesai

Aplikasi siap dibuka, silakan gunakan local environment kalian untuk membukanya, bisa menggunakan artisan serve atau menggunakan localhost dari xampp atau laragon.
