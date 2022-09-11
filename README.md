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
    <li>Run "php artisan storage:link" and "php artisan config:cache"</li>
</ol>

<p>Now you can type "php artisan serve" in command line in order to run server.</p>
