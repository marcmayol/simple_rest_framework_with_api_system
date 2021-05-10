# Guideline for using PHP MVC REST API SYSTEM

<h2> What is REST API? </h2>
<p> If you have been used Facebook, Twitter or any other application in your phone, these applications need to connect to internet for getting and sending data from and to their websites. </p>

<h2> Add a new route </h2>
<p> For creating a new route you should open Route.php file from Router directory.  </p>
<p> There is already exist some examples in the file which you can use them as you need.</p>

# Using the Views system

<h2> What is REST API? </h2>
<p> the views system is wasy to use create a view file call it your controller and pas de data with a array and you will be able to use it as a normal varaible in you view file as bellow: </p>
```php
<?php
$this->view->show('index',array('name'=>'marc));
?>
```
<h2>example view file</h2>
```php
<?php
echo 'helo '.$name;
?>
```
<h2>Router system</h2>
```php
<?php

$router->get('/home', 'home@index');

$router->post('/home', 'home@post');

$router->get('/', function() {
    echo 'Welcome ';
});
```

<p> For getting parameters follow below example: </p>

```php
<?php

$router->get('/:name', function($param) {
    echo 'Welcome ' . $param['name'];
});
```
<p> For example, when I use this url "yourdomin.com/afgprogrammer" I will get following output.</p>

```
Welcome afgprogrammer
```

<p> It's just a Piece of cake :) </p>
<p> If you want to send the POST requests follow below example: </p>

```php

$router->post('/:name', function($param) {
    echo 'Welcome ' . $param['name'];
});

```
<h2> Database Connection </h2>

> <p> Consider that for using database you should edit config.php file before start using database.</p>

<p> For getting a database connection, you can use below sample in Model directory: </p>

```php
<?php

use MVC\Model;

class ModelsHome extends Model {

    public function getAllUser() {
        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "user");
        
        /*
          $query->row : return 1 row
          $query->rows : return all rows
          $query->num_rows : return rows count
        */
        return $query->rows;
    }
}
```
