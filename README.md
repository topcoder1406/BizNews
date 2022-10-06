<h1>BizNews</h1>
<h3>Installation steps</h3>
<ol>
    <li>Run "git clone https://github.com/topcoder1406/BizNews"</li>
    <li>Run "cd BizNews"</li>
    <li>Run "composer install"</li>
    <li>Run "npm install && npm run build"</li>
    <li>Set up configurations in .env file</li>
    <li>Run "php artisan key:generate"</li>
    <li>Run "php artisan migrate"</li>
    <li>Run "php artisan storage:link"</li>
    <li>"php artisan optimize"</li>
</ol>

<p>Now you can type "php artisan serve" in command line in order to run server.</p>
<p>
    Next you can:
    <ol>
        <li>
            Seed database with random data by running "php artisan db:seed".
            (Passwords of all seeded users will be "password")
            <br>
            Login page:  http://127.0.0.1:8000/admin/login
        </li>
        <li>
            Or you can open http://127.0.0.1:8000 in browser and register your admin account,
            then you can create categories and posts.
            After creating at least one post return to http://127.0.0.1:8000    
        </li>
    </ol>
</p>
