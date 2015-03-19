<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <title>Ad Report</title>
        <meta name="description" content="Simple, innovative and powerful tool for generating data-bound grid control, specially designed for web developers." />
        <meta name="author" content="ApPHP Company - Advanced Power of PHP">
        <meta name="generator" content="ApPHP DataGrid">
    </head>
<body>
<?php 
  
  ##  *** only relative (virtual) path (to the current document)
  define ("DATAGRID_DIR", "");
  define ("PEAR_DIR", "pear/");
  
  require_once(DATAGRID_DIR.'datagrid.class.php');
  require_once(PEAR_DIR.'PEAR.php');
  require_once(PEAR_DIR.'DB.php');

  ##  *** creating variables that we need for database connection 
  include_once('examples/install/config.inc.php');

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
  
    $sql = "SELECT id ,	CurrentMode as StreamName,TriggerTime As GPI_TriggerTime,StitchTime As StitchTime_JavaProgramm,CONCAT(TIMESTAMPDIFF(SECOND,TriggerTime,StitchTime),' Second') AS TotalDuration,SwitchMode
      FROM apihistory  ";
  ##  *** set needed options
  $debug_mode = false;
  $messaging = true;
  $unique_prefix = "f_";  
  $dgrid = new DataGrid($debug_mode, $messaging, $unique_prefix, DATAGRID_DIR);
  
  ##  *** set data source with needed options
  $default_order_field = "id";
  $default_order_type = "DESC";
  $dgrid->dataSource($db_conn, $sql, $default_order_field, $default_order_type);
  
  ##  *** set caption
  $dgrid->setCaption('GPI Trigger Report');
  //
  ##  *** set columns in view mode
  $dgrid->setAutoColumnsInViewMode(true);  

  ##  ***  set settings for edit/details mode
 // $table_name = "demo_countries";
 // $primary_key = "id";
 // $condition = "";
 // $dgrid->setTableEdit($table_name, $primary_key, $condition);
  //$dgrid->setAutoColumnsInEditMode(true);
  
  
  ##  *** set paging option: true(default) or false 
 $paging_option = true;
 $rows_numeration = false;
 $numeration_sign = "N #";
 $dgrid->AllowPaging($paging_option, $rows_numeration, $numeration_sign);
##  *** set paging settings
 $bottom_paging = array("results"=>true, "results_align"=>"left", "pages"=>true, "pages_align"=>"center", "page_size"=>true, "page_size_align"=>"right");
 //$top_paging = array("results"=>true, "results_align"=>"left", "pages"=>true, "pages_align"=>"center", "page_size"=>true, "page_size_align"=>"right");
 $pages_array = array("10"=>"10", "25"=>"25", "50"=>"50", "100"=>"100", "250"=>"250", "500"=>"500", "1000"=>"1000");
 $default_page_size = 100;
 $paging_arrows = array("first"=>"|&lt;&lt;", "previous"=>"&lt;&lt;", "next"=>"&gt;&gt;", "last"=>"&gt;&gt;|");
 $dgrid->SetPagingSettings($bottom_paging, $top_paging, $pages_array, $default_page_size, $paging_arrows);
##
##
### | 3. Printing & Exporting Settings:                                         | 
## +---------------------------------------------------------------------------+
##  *** set printing option: true(default) or false 
/// $printing_option = true;
/// $dgrid->AllowPrinting($printing_option);
##  *** set exporting option: true(default) or false and relative (virtual) path
##  *** to export directory (relatively to datagrid.class.php file).
##  *** Ex.: "" - if we use current datagrid folder
 $exporting_option = true;
 $exporting_directory = "";               
 $dgrid->AllowExporting($exporting_option, $exporting_directory);
 $exporting_types = array("excel"=>"true", "pdf"=>"true", "xml"=>"true");
 $dgrid->AllowExportingTypes($exporting_types);
//
  ##  *** set debug mode & messaging options
  $dgrid->bind(); 
  
  echo "<br/>";
  echo '* GPI_TriggerTime ->Time when Gpi trigger receive';
  echo "<br/>";
  echo '* StitchTime ->Time when java program stitch ad in stream';
  echo "<br/>";
  echo '* Manual-> Program switch the mode ad to live when Gpi Trigger not receive within 6 minut';
  echo "<br/>";
  echo '* Auto->Switch according to gpi Trigger';
?>

</body>
</html>