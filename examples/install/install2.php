<?php

    require_once("settings.inc");
	require_once("functions.inc.php");    
	require_once("database.class.php"); 
    
    if(file_exists($config_file_path)){        
		header("location: ".$application_start_file);
        exit;
	}
    
	$completed = false;
	$error_mg  = array();	
	$submit = isset($_POST['submit']) ? stripcslashes($_POST['submit']) : '';
	
	if($submit != 'step2'){
		header('location: install.php');
        exit;        
    }else{        
		$database_host		= isset($_POST['database_host']) ? $_POST['database_host'] : "";
		$database_name		= isset($_POST['database_name']) ? $_POST['database_name'] : "";
		$database_username	= isset($_POST['database_username']) ? prepare_input($_POST['database_username']) : "";
		$database_password	= isset($_POST['database_password']) ? $_POST['database_password'] : "";
		$database_type      = "mysql";
		
		if(empty($database_host)){
			$error_mg[] = "Database host cannot be empty! Please re-enter.";	
		}
		
		if(empty($database_name)){
			$error_mg[] = "Database name cannot be empty! Please re-enter.";	
		}
		
		if(empty($database_username)){
			$error_mg[] = "Database username cannot be empty! Please re-enter.";	
		}
		
		if(empty($database_password)){
			//$error_mg[] = "Database password cannot be empty! Please re-enter.";	
		}
		
		if(empty($error_mg)){
		
			$config_file = file_get_contents($config_file_default);
			$config_file = str_replace("_DB_HOST_", $database_host, $config_file);
			$config_file = str_replace("_DB_NAME_", $database_name, $config_file);
			$config_file = str_replace("_DB_USER_", $database_username, $config_file);
			$config_file = str_replace("_DB_PASSWORD_", $database_password, $config_file);
			
			$link = @mysql_connect($database_host, $database_username, $database_password);
			if($link){					
				if(@mysql_select_db($database_name)){
					$f = @fopen($config_file_path, "w+");
					if(@fwrite($f, $config_file) > 0){
						if(false == ($db_error = apphp_db_install($database_name, $sql_dump))){
							$error_mg[] = "Could not read file ".$sql_dump."! Please check if the file exists.";                            
							@unlink($config_file_path);
						}else{
							// additional operations, like setting up admin passwords etc.
							// ...
							$completed = true;                            
						}						
					}else{				
						$error_mg[] = "Can not open configuration file ".$config_file_directory.$config_file_name;				
					}
					@fclose($f);
				}else{
					$error_mg[] = "Database connecting error! Check your database exists.</span><br/>";
				}
			}else{
				$error_mg[] = "Database connecting error! Check your connection parameters.</span><br/>";
			}
		}
	}
        
?>	


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>Installation Guide</title>
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
	<link rel="stylesheet" type="text/css" href="img/styles.css">
</head>


<TABLE align="center" width="70%" cellSpacing=0 cellPadding=2 border=0>
<TBODY>
<TR>
    <TD class=text vAlign=top>
        <H2>Installation of <?php echo $application_name;?> examples!</H2>

        <fieldset>
			<legend>Follow the wizard to setup your database.</legend>
			<br>
			<TABLE width="100%" cellSpacing=0 cellPadding=0 border=0>
			<TBODY>
			<TR>
				<TD></TD>
				<TD align=middle>
					<TABLE width="100%" cellSpacing=0 cellPadding=0 border=0>
					<TBODY>
					<?php if(!$completed){
						
						foreach($error_mg as $msg){
							echo "<tr><td class=text align=left><span style='color:#bb5500;'>&#8226; ".htmlentities($msg)."</span></td></tr>";
						}
						echo mysql_error();
					?>
						<tr><td>&nbsp;</td></tr>
						<tr>
							<td class=text align=left>	
								<input type="button" class="form_button" value="Back" name="submit" onclick="javascript: history.go(-1);">
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="button" class="form_button" value="Retry" name="submit" onclick="javascript: location.reload();">
							</td>
						</tr>
						
					<?php } else {?>
						<tr><td>&nbsp;</td></tr>
						<TR>
							<TD class=text align=left>
								<b>Step 2. Installation Completed</b>
							</td>
						</tr>
						<tr><td>&nbsp;</td></tr>	
						<tr>
							<TD class=text align=left>
								The <?php echo $config_file_path;?> file was sucessfully created.
								<br /><br />
								<?php if($application_start_file != ""){ ?><A href="<?php echo $application_start_file;?>">Proceed to examples page</A><?php } ?>
							</td>
						</tr>
					
					<?php } ?>
					</tbody>
					</table>
					<br />                        

				</TD>
				<TD></TD>
			</TR>
			</TBODY>
			</TABLE>
		</fieldset>
		
		<?php include_once("footer.php"); ?>        
    </TD>
</TR>
</TBODY>
</TABLE>
                  
</body>
</html>