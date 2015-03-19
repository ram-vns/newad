<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <title>Sample 3 | ApPHP DataGrid</title>
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
        demo_countries.region_id, 
        demo_regions.name as region_name, 
        demo_countries.name as country_name, 
        demo_countries.description, 
        demo_countries.picture_url, 
        demo_countries.independent_date, 
        demo_countries.independent_time, 
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

  ##  *** set layouts: 0 - tabular(horizontal) - default, 1 - columnar(vertical) 
  $dgrid->setLayouts(array("view"=>"0", "edit"=>"1", "details"=>"2", "filter"=>"1"));  
  $details_template = "
    <table style='border:1px solid #ccc' align='center' width='60%'>
    <tr class='class_tr' bgcolor='#fcfaf6'> 
        <td width='30%' class='class_td' align='center'>{picture_url}</td>        
        <td width='70%'>
            <table border=0>
                <tr class='class_tr' bgcolor='#fcfaf6'><td width='150px' class='class_td class_left' nowrap><b>Region:</b> </td><td class='class_td class_left' >{region_id}</td></tr>
                <tr class='class_tr' bgcolor='#fcfaf6'><td class='class_td class_left' nowrap><b>Country:</b> </td><td class='class_td class_left' >{name}</td></tr>
                <tr class='class_tr' bgcolor='#fcfaf6'><td class='class_td class_left' nowrap><b>Independent date:</b> </td><td class='class_td class_left' >{independent_date}</td></tr>
                <tr class='class_tr' bgcolor='#fcfaf6'><td class='class_td class_left' nowrap><b>Democracy?</b> </td><td class='class_td class_left' >{is_democracy}</td></tr>
                <tr class='class_tr' bgcolor='#fcfaf6'><td class='class_td class_left' nowrap><b>Population:</b> </td><td class='class_td class_left' >{population}</td></tr>
                <tr class='class_tr' bgcolor='#fcfaf6'><td class='class_td class_left' nowrap><b>Description:</b> </td><td class='class_td class_left' >{description}</td></tr>
            </table>
        </td>
    </tr>    
    </table>
    <br>
    <table style='border:1px solid #ccc' align='center' width='60%'>
    <tr class='class_tr' bgcolor='#ffffff' id='f_row_1' >
        <th class='class_th class_left' bgColor='#e2e0cb'><div style='float:right;'><a class='f_class_a' href='?skin=&amp;f_mode=cancel&amp;f_rid=236&amp;f__ff_countries_name_operator=like&amp;f__ff_regions_name_operator==&amp;f__ff_countries_independent_date_operator==&amp;f__ff_countries_population_operator==&amp;f__ff_selSearchType=0&amp;f__ff_selSearchType=0&amp;f__ff_onSUBMIT_FILTER=search&amp;f_sort_field=1&amp;f_sort_type=DESC&amp;f_page_size=10&amp;f_p=1&amp;f__ff_countries_name_operator=like&amp;f__ff_regions_name_operator==&amp;f__ff_countries_independent_date_operator==&amp;f__ff_countries_population_operator==&amp;f__ff_selSearchType=0&amp;f__ff_selSearchType=0&amp;f__ff_onSUBMIT_FILTER=search&amp;f_sort_field=1&amp;f_sort_type=DESC&amp;f_page_size=10&amp;f_p=1' onClick=\"javascript:window.location.href='http://phpbuilder.awardspace.com/datagrid420/sample3_demo.php?skin=&amp;f_mode=cancel&amp;f_rid=236&amp;f__ff_countries_name_operator=like&amp;f__ff_regions_name_operator==&amp;f__ff_countries_independent_date_operator==&amp;f__ff_countries_population_operator==&amp;f__ff_selSearchType=0&amp;f__ff_selSearchType=0&amp;f__ff_onSUBMIT_FILTER=search&amp;f_sort_field=1&amp;f_sort_type=DESC&amp;f_page_size=10&amp;f_p=1&amp;f__ff_countries_name_operator=like&amp;f__ff_regions_name_operator==&amp;f__ff_countries_independent_date_operator==&amp;f__ff_countries_population_operator==&amp;f__ff_selSearchType=0&amp;f__ff_selSearchType=0&amp;f__ff_onSUBMIT_FILTER=search&amp;f_sort_field=1&amp;f_sort_type=DESC&amp;f_page_size=10&amp;f_p=1'\" title='Back'>Back</a></div></th>
    </tr>
    </table>
    <br><br><br>";
  $dgrid->setTemplates("","",$details_template);

  ##  *** allow mulirow operations
  $multirow_option = true;
  $dgrid->allowMultirowOperations($multirow_option);
  $multirow_operations = array(
    "delete"  => array("view"=>true),
    "details" => array("view"=>true)
  );
  $dgrid->setMultirowOperations($multirow_operations);  
 
  ##  *** set DataGrid caption
  $dgrid->setCaption('Sample 3 - <a href=index.php>Back to Index</a>');

  ##  *** set printing option: true(default) or false 
  $dgrid->allowPrinting(true);
  ##  *** set exporting option: true(default) or false 
  $dgrid->allowExporting(false);
  ##  *** set sorting option: true(default) or false 
  $dgrid->allowSorting(true);               

##  *** set paging option: true(default) or false 
/// $paging_option = true;
/// $rows_numeration = false;
/// $numeration_sign = "N #";
/// $dgrid->AllowPaging($paging_option, $rows_numeration, $numeration_sign);
##  *** set paging settings
/// $bottom_paging = array("results"=>true, "results_align"=>"left", "pages"=>true, "pages_align"=>"center", "page_size"=>true, "page_size_align"=>"right");
/// $top_paging = array("results"=>true, "results_align"=>"left", "pages"=>true, "pages_align"=>"center", "page_size"=>true, "page_size_align"=>"right");
//  $pages_array = array("10"=>"10", "25"=>"25", "50"=>"50", "100"=>"100", "250"=>"250", "500"=>"500", "1000"=>"1000");
/// $default_page_size = 10;
/// $paging_arrows = array("first"=>"|&lt;&lt;", "previous"=>"&lt;&lt;", "next"=>"&gt;&gt;", "last"=>"&gt;&gt;|");
/// $dgrid->SetPagingSettings($bottom_paging, $top_paging, $pages_array, $default_page_size, $paging_arrows);
  
  ##  *** set filtering option: true or false(default)
  $dgrid->allowFiltering(true);
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
    "description"  =>array("header"=>"Short Description","type"=>"label", "align"=>"left",   "wrap"=>"wrap",   "text_length"=>"15", "case"=>"lower"),
    "picture_url"  =>array("header"=>"Picture",          "type"=>"image", "align"=>"center", "width"=>"", "wrap"=>"nowrap", "text_length"=>"-1", "case"=>"normal", "summarize"=>false, "on_js_event"=>"", "target_path"=>"uploads/", "default"=>"", "image_width"=>"17px", "image_height"=>"17px"),
  );
  $dgrid->setColumnsInViewMode($vm_columns);

  ##  ***  set settings for add/edit/details modes
  $table_name  = "demo_countries";
  $primary_key = "id";
  $condition   = "";
  $dgrid->setTableEdit($table_name, $primary_key, $condition);  
  ##  *** set columns in edit mode
  $em_columns = array(
    "region_id"        =>array("header"=>"Region",           "type"=>"textbox",  "width"=>"210px", "req_type"=>"rt", "title"=>"Region Name"),
    "name"             =>array("header"=>"Country",          "type"=>"textbox",  "width"=>"210px", "req_type"=>"ry", "title"=>"Country Name", "unique"=>true),
    "description"      =>array("header"=>"Short Descr.",     "type"=>"textarea", "width"=>"210px", "req_type"=>"rt", "title"=>"Short Description", "edit_type"=>"wysiwyg", "rows"=>"7", "cols"=>"50"),
    "population"       =>array("header"=>"Peoples",          "type"=>"enum",     "source"=>$fill_from_array, "view_type"=>"dropdownlist",  "width"=>"139px", "req_type"=>"ri", "title"=>"Population (Peoples)"),
    "picture_url"      =>array("header"=>"Image URL",        "type"=>"image",    "req_type"=>"st", "width"=>"210px", "title"=>"Picture", "readonly"=>false, "maxlength"=>"-1", "default"=>"", "unique"=>false, "unique_condition"=>"", "on_js_event"=>"", "target_path"=>"uploads/", "max_file_size"=>"100K", "image_width"=>"100px", "image_height"=>"100px", "file_name"=>"", "host"=>"local"),
    "is_democracy"     =>array("header"=>"Is Democracy",     "type"=>"checkbox", "true_value"=>1, "false_value"=>0,  "width"=>"210px", "req_type"=>"sy", "title"=>"Is Democraty"),
    "independent_date" =>array("header"=>"Independence Day", "type"=>"date",     "width"=>"210px", "req_type"=>"rt", "title"=>"Independence Day"),
    "independent_time" =>array("header"=>"Independence Time", "type"=>"time",     "width"=>"210px", "req_type"=>"rt", "title"=>"Independence Time")
  );
  $dgrid->setColumnsInEditMode($em_columns);
  ##  *** set foreign keys
  $foreign_keys = array(
    //"region_id"=>array("table"=>"demo_regions", "field_key"=>"id", "field_name"=>"name", "view_type"=>"dropdownlist", "order_by_field"=>"name", "order_type"=>"ASC")
  ); 
  $dgrid->setForeignKeysEdit($foreign_keys);

  ##  *** bind the DataGrid and draw it on the screen
  $dgrid->bind();        
  
?>

<br><br>
<center><small>Powered by <a href="http://www.apphp.com/php-datagrid/">ApPHP DataGrid Free</a></small></center>
</body>
</html>