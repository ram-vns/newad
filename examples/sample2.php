<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <title>Sample 2 | ApPHP DataGrid</title>
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
  $sql=" SELECT
        demo_countries.id, 
        demo_countries.region_id, 
        demo_regions.name as region_name, 
        demo_countries.name as country_name, 
        demo_countries.description, 
        demo_countries.picture_url, 
        demo_countries.independent_date, 
        FORMAT(demo_countries.population, 0) as population, 
        (SELECT COUNT(demo_presidents.id) FROM demo_presidents WHERE demo_presidents.country_id = demo_countries.id) as presidents, 
        CASE WHEN demo_countries.is_democracy = 1 THEN 'Yes' ELSE 'No' END as is_democracy 
    FROM demo_countries
    INNER JOIN demo_regions ON demo_countries.region_id=demo_regions.id ";

  ##  *** set needed options
  $debug_mode = false;
  $messaging = true;
  $unique_prefix = "f_";  
  $dgrid = new DataGrid($debug_mode, $messaging, $unique_prefix, DATAGRID_DIR);

  ##  *** set data source with needed options
  $default_order_field = "id";
  $default_order_type = "DESC";
  $dgrid->dataSource($db_conn, $sql, $default_order_field, $default_order_type);

  ##  *** allow mulirow operations
  $multirow_option = true;
  $dgrid->allowMultirowOperations($multirow_option);
  $multirow_operations = array(
    "delete"  => array("view"=>true),
    "details" => array("view"=>true)
  );
  $dgrid->setMultirowOperations($multirow_operations);  

  ##  *** set other datagrid/s unique prefixes (if you use few datagrids on one page)
  $anotherDatagrids = array("fp_"=>array("view"=>false, "edit"=>true, "details"=>true));
  $dgrid->setAnotherDatagrids($anotherDatagrids);  
  ##  *** set DataGrid caption
  $dgrid->setCaption('Sample 2 - <a href=index.php>Back to Index</a>');
  ##  *** set filtering option: true or false(default)
  $dgrid->allowFiltering(true);
  
  ##  *** set aditional filtering settings
  $fill_from_array = array("10000"=>"10000", "250000"=>"250000", "5000000"=>"5000000", "25000000"=>"25000000", "100000000"=>"100000000");
  $filtering_fields = array(
    "Country"     =>array("table"=>"demo_countries", "field"=>"name", "source"=>"self", "operator"=>true, "default_operator"=>"like", "type"=>"textbox", "case_sensitive"=>true,  "comparison_type"=>"string"),
    "Region"      =>array("table"=>"demo_regions",   "field"=>"name", "source"=>"self", "order"=>"DESC", "operator"=>true, "type"=>"dropdownlist", "case_sensitive"=>false,  "comparison_type"=>"binary"),
    "Date"        =>array("table"=>"demo_countries", "field"=>"independent_date", "source"=>"self", "operator"=>true, "type"=>"textbox", "case_sensitive"=>false,  "comparison_type"=>"string"),      
    "Population"  =>array("table"=>"demo_countries", "field"=>"population", "source"=>$fill_from_array, "order"=>"DESC", "operator"=>true, "type"=>"dropdownlist", "case_sensitive"=>false, "comparison_type"=>"numeric")
  );
  $dgrid->setFieldsFiltering($filtering_fields);

  ##  *** set columns in view mode
  $vm_columns = array(
    "region_name"  =>array("header"=>"Region Name",      "type"=>"label", "width"=>"130px", "align"=>"left",   "wrap"=>"nowrap", "text_length"=>"-1", "case"=>"normal"),
    "country_name" =>array("header"=>"Country Name",     "type"=>"linktoedit", "align"=>"left", "width"=>"130px", "wrap"=>"nowrap", "text_length"=>"-1", "case"=>"normal", "summarize"=>false, "on_js_event"=>""),
    "population"   =>array("header"=>"Population",       "type"=>"label", "summarize"=>true, "align"=>"right",  "wrap"=>"nowrap", "text_length"=>"-1", "case"=>"normal"),
    "presidents"   =>array("header"=>"Presidents",       "type"=>"label", "summarize"=>true, "align"=>"right",  "wrap"=>"nowrap", "text_length"=>"-1", "case"=>"normal"),
    "description"  =>array("header"=>"Short Description","type"=>"label", "align"=>"left",   "wrap"=>"wrap",   "text_length"=>"30", "case"=>"lower"),
    "picture_url"  =>array("header"=>"Picture",          "type"=>"image", "align"=>"center", "width"=>"", "wrap"=>"nowrap", "text_length"=>"-1", "case"=>"normal", "summarize"=>false, "on_js_event"=>"", "target_path"=>"uploads/", "default"=>"", "image_width"=>"17px", "image_height"=>"17px"),
  );
  $dgrid->setColumnsInViewMode($vm_columns);

  ##  ***  set settings for add/edit/details modes
  $table_name  = "demo_countries";
  $primary_key = "id";
  $condition   = "";
  $dgrid->setTableEdit($table_name, $primary_key, $condition);
  $em_columns = array(
    "region_id"        =>array("header"=>"Region",           "type"=>"textbox",  "width"=>"210px", "req_type"=>"rt", "title"=>"Region Name"),
    "name"             =>array("header"=>"Country",          "type"=>"textbox",  "width"=>"210px", "req_type"=>"ry", "title"=>"Country Name", "unique"=>true),
    "description"      =>array("header"=>"Short Descr.",     "type"=>"textarea", "width"=>"210px", "req_type"=>"rt", "title"=>"Short Description", "edit_type"=>"wysiwyg", "rows"=>"7", "cols"=>"50"),
    "population"       =>array("header"=>"Peoples",          "type"=>"enum",     "source"=>$fill_from_array, "view_type"=>"dropdownlist",  "width"=>"139px", "req_type"=>"ri", "title"=>"Population (Peoples)"),
    "picture_url"      =>array("header"=>"Image URL",        "type"=>"image",    "req_type"=>"st", "width"=>"210px", "title"=>"Picture", "readonly"=>false, "maxlength"=>"-1", "default"=>"", "unique"=>false, "unique_condition"=>"", "on_js_event"=>"", "target_path"=>"uploads/", "max_file_size"=>"100K", "image_width"=>"100px", "image_height"=>"100px", "file_name"=>"", "host"=>"local"),
    "is_democracy"     =>array("header"=>"Is Democracy",     "type"=>"checkbox", "true_value"=>1, "false_value"=>0,  "width"=>"210px", "req_type"=>"sy", "title"=>"Is Democraty"),
    "independent_date" =>array("header"=>"Independence Day", "type"=>"date",     "width"=>"210px", "req_type"=>"rt", "title"=>"Independence Day")
  );
  $dgrid->setColumnsInEditMode($em_columns);

  ##  *** set foreign keys for add/edit/details modes (if there are linked tables)
  $foreign_keys = array(
    "region_id"=>array("table"=>"demo_regions", "field_key"=>"id", "field_name"=>"name", "view_type"=>"dropdownlist", "order_by_field"=>"name", "order_type"=>"ASC")
  ); 
  $dgrid->setForeignKeysEdit($foreign_keys);

  ##  *** bind the DataGrid and draw it on the screen
  $dgrid->bind();        



// if we in EDIT mode of the first datagrid
if(isset($_GET['f_mode']) && (($_GET['f_mode'] == "edit") || ($_GET['f_mode'] == "details"))){
    
    $rid = isset($_GET['f_rid']) ? (int)$_GET['f_rid'] : 0;
    
    $sql = "SELECT 
            demo_presidents.id, 
            demo_presidents.country_id, 
            demo_presidents.name, 
            demo_presidents.birth_date, 
            demo_presidents.status 
       FROM demo_presidents
       INNER JOIN demo_countries ON demo_presidents.country_id=demo_countries.id 
       WHERE demo_presidents.country_id = ".$rid;

    ##  *** set needed options and create a new class instance 
    $debug_mode = false;        /* display SQL statements while processing */    
    $messaging = true;          /* display system messages on a screen */ 
    $unique_prefix = "fp_";    /* prevent overlays - must be started with a letter */
    $dgrid1 = new DataGrid($debug_mode, $messaging, $unique_prefix, DATAGRID_DIR);

    ##  *** set data source with needed options
    $default_order_field = "id";
    $default_order_type = "DESC";
    $dgrid1->dataSource($db_conn, $sql, $default_order_field, $default_order_type);	    

    ##  *** set modes for operations ("type" => "link|button|image") 
    ##  *** "byFieldValue"=>"fieldName" - make the field to be a link to edit mode page
    if($_GET['f_mode'] == "edit"){    
        $modes = array(
            "add"=>array("view"=>true, "edit"=>false, "type"=>"link"),
            "edit"=>array("view"=>true, "edit"=>true, "type"=>"link", "byFieldValue"=>""),
            "cancel"=>array("view"=>true, "edit"=>true, "type"=>"link"),
            "details"=>array("view"=>false, "edit"=>false, "type"=>"link"),
            "delete"=>array("view"=>true, "edit"=>false, "type"=>"image")
        );
    }else{
        $modes = array(
            "add"=>array("view"=>false, "edit"=>false, "type"=>"link"),
            "edit"=>array("view"=>false, "edit"=>false, "type"=>"link", "byFieldValue"=>""),
            "cancel"=>array("view"=>false, "edit"=>true, "type"=>"link"),
            "details"=>array("view"=>false, "edit"=>false, "type"=>"link"),
            "delete"=>array("view"=>false, "edit"=>false, "type"=>"image")
        );
    }
    $dgrid1->setModes($modes);

    ##  *** set other datagrid/s unique prefixes (if you use few datagrids on one page)
    $anotherDatagrids = array("f_"=>array("view"=>true, "edit"=>true, "details"=>true));
    $dgrid1->setAnotherDatagrids($anotherDatagrids);  
    ##  *** set DataGrid caption
    $dgrid1->setCaption("Presidents");
    ##  *** set printing option: true(default) or false 
    $dgrid1->allowPrinting(false);
    ##  *** set exporting option: true(default) or false 
    $dgrid1->allowExporting(false);
    ##  *** set filtering option: true or false(default)
    $dgrid1->allowFiltering(false);

    $dgrid1->setViewModeTableProperties(array("width"=>"70%"));  
    ##  *** set columns in view mode
    $vm_columns = array(
        "name"       =>array("header"=>"Name",       "type"=>"label", "align"=>"left",  "wrap"=>"wrap",   "text_length"=>"20", "case"=>"normal"),
        "birth_date" =>array("header"=>"Birth Date", "type"=>"label", "align"=>"center",  "wrap"=>"nowrap", "text_length"=>"-1", "case"=>"normal"),
        "status"     =>array("header"=>"Status",     "type"=>"label", "align"=>"center",  "wrap"=>"nowrap", "text_length"=>"30", "case"=>"normal")
    );
    $dgrid1->setColumnsInViewMode($vm_columns);
    ##  *** set add/edit mode table properties
    $dgrid1->setEditModeTableProperties(array("width"=>"70%"));
    ##  *** set details mode table properties
    $dgrid1->setDetailsModeTableProperties(array("width"=>"70%"));
    ##  ***  set settings for add/edit/details modes
    $table_name  = "demo_presidents";
    $primary_key = "id";
    $condition   = "demo_presidents.country_id = ".$rid." ";
    $dgrid1->setTableEdit($table_name, $primary_key, $condition);
    ##  *** set columns in edit mode
    $em_columns = array(
        "country_id"  =>array("header"=>"Country",    "type"=>"textbox",  "width"=>"160px", "req_type"=>"ri", "title"=>"Country", "readonly"=>true),      
        "name"       =>array("header"=>"Name",        "type"=>"textbox",  "width"=>"140px", "req_type"=>"rt", "title"=>"Name"),
        "birth_date"  =>array("header"=>"Birth Date", "type"=>"date",     "width"=>"80px", "req_type"=>"rt", "title"=>"Birth Date"),
        "status"     =>array("header"=>"Status",      "type"=>"enum",     "req_type"=>"st", "width"=>"210px", "title"=>"Status", "readonly"=>false, "maxlength"=>"-1", "default"=>"", "unique"=>false, "unique_condition"=>"", "on_js_event"=>"", "source"=>"self", "view_type"=>"dropdownlist")
    );
    $dgrid1->setColumnsInEditMode($em_columns);
    ##  *** set auto-genereted columns in edit mode
    $foreign_keys = array(
        "country_id"=>array("table"=>"demo_countries ", "field_key"=>"id", "field_name"=>"name", "view_type"=>"dropdownbox", "condition"=>"")
    ); 
    $dgrid1->setForeignKeysEdit($foreign_keys);

    ##  *** bind the DataGrid and draw it on the screen
    $dgrid1->bind();        
    
}
?>

<br><br>
<center><small>Powered by <a href="http://www.apphp.com/php-datagrid/">ApPHP DataGrid Free</a></small></center>
</body>
</html>