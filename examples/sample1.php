<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <title>Sample 1 | ApPHP DataGrid</title>
        <meta name="description" content="Simple, innovative and powerful tool for generating data-bound grid control, specially designed for web developers." />
        <meta name="author" content="ApPHP Company - Advanced Power of PHP">
        <meta name="generator" content="ApPHP DataGrid">
    </head>
<body>
<?php 
  
  ##  *** only relative (virtual) path (to the current document)
  define ("DATAGRID_DIR", "../");
  define ("PEAR_DIR", "../pear/");
  
  require_once(DATAGRID_DIR.'datagrid.class.php');
  require_once(PEAR_DIR.'PEAR.php');
  require_once(PEAR_DIR.'DB.php');

  ##  *** creating variables that we need for database connection 
  include_once('install/config.inc.php');

  $db_conn = DB::factory('mysql'); 
  $db_conn -> connect(DB::parseDSN('mysql://'.$DB_USER.':'.$DB_PASS.'@'.$DB_HOST.'/'.$DB_NAME));

  ##  *** put a primary key on the first place 
  $sql = "SELECT 
          demo_countries.id, 
          demo_countries.name, 
          demo_countries.description, 
          demo_countries.picture_url, 
          FORMAT(demo_countries.population, 0) as population, 
         CASE WHEN demo_countries.is_democracy = 1 THEN 'Yes' ELSE 'No' END as is_democracy
      FROM demo_countries ";
   
  ##  *** set needed options
  $debug_mode = false;
  $messaging = true;
  $unique_prefix = "f_";  
  $dgrid = new DataGrid($debug_mode, $messaging, $unique_prefix, DATAGRID_DIR);
  
  ##  *** set data source with needed options
  $default_order_field = "name";
  $default_order_type = "ASC";
  $dgrid->dataSource($db_conn, $sql, $default_order_field, $default_order_type);
  
  ##  *** set caption
  $dgrid->setCaption('Sample 1 - <a href=index.php>Back to Index</a>');

  ##  *** set columns in view mode
  $dgrid->setAutoColumnsInViewMode(true);  

  ##  ***  set settings for edit/details mode
  $table_name = "demo_countries";
  $primary_key = "id";
  $condition = "";
  $dgrid->setTableEdit($table_name, $primary_key, $condition);
  $dgrid->setAutoColumnsInEditMode(true);
  
  ##  *** set debug mode & messaging options
  $dgrid->bind();        
?>

<br><br>
<center><small>Powered by <a href="http://www.apphp.com/php-datagrid/">ApPHP DataGrid Free</a></small></center>
</body>
</html>