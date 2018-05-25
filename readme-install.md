1 - Install the XAMPP

2 - Install an editor (VSCode)
2.1 - Install Extensions:
        HTML Snippets
        Auto Close Tag
        Laravel Helpers
        Laravel 5 Snippets for VSCode
        PHP Debug
        PHP IntelliSense
        PHP Symbols
2.2 - Enable Icons
2.3 - Install Git - VSCode

3 - Install GitHub Desktop
3.1 - Login GitHub Desktop
3.2 - Clone - Location to be saved: C:\xampp\htdocs

4 - VSCode > Open Folder: C:\xampp\htdocs\transparencia

5 - Install Composer
5.1 - Open CMD
5.2 - Open Folder: C:\xampp\htdocs\transparencia
5.3 - Command: "composer update"

6 - Create database
6.1 - Start Apache and MySQL the xampp
6.2 - Open browser: http://localhost/phpmyadmin
6.3 - Create database, name "transparenciadb"
6.4 - Import table

7 - Create a file named ".env" based ".env.example"
7.1 - Use the value APP_KEY: "base64:aezuP1fVqaKAiaF7Im5CvYmp8Y/9YSOdNFH9gjz7aIw="
7.2 - Config DB

8 - Route configuration (localhost)
8.1 - Open fold: C:\xampp\apache\conf\extra\httpd-vhosts.conf
8.2 - Perform the settings

9 - Configurações no Linux
9.1 - Modificar a linha "max_execution_time = 30" para 60. Modificação necessária
para os downloads muito grandes.
9.2 - Modificar a linha "memory_limit = 128" para 512M. Modificação necessária
para os downloads muito grandes.

10 - Aumentar o Tamanho Limite de Upload dos Arquivos
10.1 - Alterar o arquivo php.ini que está na pasta do php: alterar as linhas upload_max_filesize e post_max_size para 32M