## Instalasi

1. Clone repository
    ```sh
    git clone https://github.com/dafalagi/Canopus.git
    ```
2. Masuk ke direktori Canopus
    ```sh
    cd Canopus
    ``` 
3. Install Laravel
    ```sh
    composer install
    ```
4. Buat database dengan nama "canopus" pada server MySQL lokal anda.
5. Copy-paste file `.env.example` lalu ubah menjadi `.env` dan sesuaikan baris berikut :
    ```sh
       DB_CONNECTION=mysql
       DB_HOST=127.0.0.1
       DB_PORT=3306
       DB_DATABASE=canopus
       DB_USERNAME=root
       DB_PASSWORD=
    ```
6. Buka terminal lalu jalankan perintah berikut untuk melakukan key generate
    ```sh
    php artisan key:generate
    ```
7. Import database
    ```sh
    php artisan migrate:fresh --seed
    ```
8. Jalankan server
    ```sh
    php artisan serve
    ```