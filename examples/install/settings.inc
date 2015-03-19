<?php
    
    // *** system mode (demo|debug|production)
    define("EI_MODE", "production");

    // *** defines using of utf-8 encoding and collation for SQL dump file
    define("EI_USE_ENCODING", true);
    define("EI_DUMP_FILE_ENCODING", "utf8");
    define("EI_DUMP_FILE_COLLATION", "utf8_unicode_ci");               

    // *** admin username and password (true, false) - get admin username and password
    define("EI_USE_USERNAME_AND_PASWORD", false);        
    // *** encrypt or not admin password true|false
    define("EI_USE_PASSWORD_ENCRYPTION", false);        
    // *** type of encryption - AES|MD5
    define("EI_PASSWORD_ENCRYPTION_TYPE", "AES");        
    // *** password encryption key for AES encryption
    define("EI_PASSWORD_ENCRYPTION_KEY", "php_datagrid");

    $config_file_default    = "config.default";    
    $config_file_directory  = "";	
    $config_file_name       = "config.inc.php";    
    $config_file_path       = $config_file_directory.$config_file_name;
    
    $application_name       = "ApPHP DataGrid";
    $application_start_file = "../index.php";
    
    $license_agreement_page = "";
    
    $sql_dump               = "../sql/db_dump.sql";
    
?>