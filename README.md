Tools yang digunakan:
1. Visual Studio Code (Code Editor)
2. Laragon (Web Server Lokal)
3. Sqlyog (Aplikasi Client MySQL)

Langkah-langkah dalam membuat CRUD menggunakan laravel 8 secara simpel:
1. Install project laravel di lokal </br>
   a. Buka Laragon </br>
   b. Klik Start All > Klik Kanan pada bagian dalam aplikasi > Klik Quick App > Klik Laravel </br>
   c. Ketikkan nama project yang ingin dibuat > Klik Ok (Laragon akan langsung membuatkan project laravel 8 dan database mysql dengan nama yang sesuai diinputkan)
2. Konfigurasi .env</br>
   a. Sesuaikan nama database sesuai dengan database yang telah dibuat</br>
   b. Username dan password disesuaikan dengan akun masing-masing. Adapun windows biasanya username diisi root, dan password dibiarkan kosong
3. Buat tabel pada database di SQLyog. Dalam case ini, saya membuat crud data pegawai, sehingga saya menamai tabel saya dengan nama 'employees'. </br>
   Note: </br>
   a. Biasakan dalam membuat tabel dan komponennya menggunakan bahasa inggris</br>
   b. Karena tabel merupakan kumpulan dari beberapa data, maka biasakan dalam melakukan penamaan tabel selalu diakhiri dengan huruf 's' (jamak / plural)
4. Proses Pembuatan Bagian Backend</br>
   a. Buat model dan controller secara bersamaan dengan menuliskan perintah di terminal, "php artisan make:model -cr Employee"</br>
      note : </br>
      1. perintah -cr akan memberitahukan laravel untuk sekaligus membuat model, controller bersama kerangka function crud di dalam controller</br>
      2. Dengan kita menuliskan nama model dengan bentuk singular/tunggal dari tabel kita, maka kita tidak perlu mendeklarasikan di dalam model tentang untuk tabel mana model tersebut diperuntukkan. Laravel sudah mengetahui hal tersebut</br>
   b. Deklarasikan route di web.php menggunakan 1 kalimat perintah, yakni : Route::resource('employee', EmployeeController::class);</br>
      note : kalimat Route:resource memberitahu laravel bahwa ini berisi dari beberapa route, seperti : index, create, store, edit, update, show, delete    (Source:https://laravel.com/docs/8.x/controllers).</br>
   c. Menuliskan kalimat perintah di model yang memberitahu laravel bahwa beberapa kolom di tabel dapat di manipulasi datanya (App\Model\Employee.php)</br>
   e. Mengisi setiap function yang terdapat pada EmployeeController (App\Http\Controllers\EmployeeController.php)
5. Proses Pembuatan Frontend</br>
   a. Buat Layouting (resource\views\layouts dan resource\views\includes)</br>
   b. Membuat tampilan CRUD.</br>
      Note: dalam case ini saya menggabungkan form create di file tampilan tabel (pages\employee\index.blade.php) dengan menggunakan modal
      
Sekian dari ilmu sedikit yang dapat saya bagikan tentang membuat CRUD Laravel 8 secara fullstack dalam waktu kurang dari 1 jam. Bila ada kebingungan dalam penulisan kode saya, feel free untuk berdiskusi di bawah. Oiya, untuk mendukung kecepatan kita dalam menyelesaikan task, biasanya saya juga menggunakan beberapa plugin yang tersedia di Visual Studio Code. Apa-apa saja plugin yang saya gunakan? In syaa Allah akan saya bagikan di next post. See you  


   
