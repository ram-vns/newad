<?php

    require_once("install/settings.inc");    

	$config_file_exists = false;
    if(file_exists("install/".$config_file_path)) {
		$config_file_exists = true;
	}
	
    ob_start();
    
	if(function_exists('phpinfo')) @phpinfo(-1);
	$phpinfo = array('phpinfo' => array());
	if(preg_match_all('#(?:<h2>(?:<a name=".*?">)?(.*?)(?:</a>)?</h2>)|(?:<tr(?: class=".*?")?><t[hd](?: class=".*?")?>(.*?)\s*</t[hd]>(?:<t[hd](?: class=".*?")?>(.*?)\s*</t[hd]>(?:<t[hd](?: class=".*?")?>(.*?)\s*</t[hd]>)?)?</tr>)#s', ob_get_clean(), $matches, PREG_SET_ORDER))
	foreach($matches as $match){
		$array_keys = array_keys($phpinfo);
		$end_array_keys = end($array_keys);
		if(strlen($match[1])){
			$phpinfo[$match[1]] = array();
		}else if(isset($match[3])){
			$phpinfo[$end_array_keys][$match[2]] = isset($match[4]) ? array($match[3], $match[4]) : $match[3];
		}else{
			$phpinfo[$end_array_keys][] = $match[2];
		}
	}
    
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
	<title>Installation Guide</title>
	<link rel="stylesheet" type="text/css" href="install/img/styles.css">
</head>
<BODY>
    
<?php if(!$config_file_exists){ ?>
<TABLE align="center" width="70%" cellSpacing=0 cellPadding=2 border=0>
<TBODY>
<TR>
    <TD class=text vAlign=top>
		<H2>Welcome to ApPHP!</H2>
        <H2>This is the installation wizard of <?php echo $application_name;?> examples</H2>
		You have 2 possibilities to install examples: with wizard or manually.
		Please select a type suitable for your.
		<br><br>
        
        <fieldset>
		<legend>Using this installation wizard</legend>
			<h3 id="post-1">Follow the wizard to setup your database.</h3>  
			<table width="100%" cellspacing="0" cellpadding="0" border="0">
			<tbody>
			<tr>
				<td class="text" align="left">
					<b>Getting Important System Info</b>
				</td>
			</tr>
			<tr><td nowrap='nowrap' height='10px'></td></tr>
			<tr>
				<TD class="text" align="left">
					<?php
						$php_core_index = ((version_compare(phpversion(), '5.3.0', '<'))) ? 'PHP Core' : 'Core';
					
						$system = isset($phpinfo['phpinfo']['System']) ? $phpinfo['phpinfo']['System'] : 'unknown';
						$build_date = isset($phpinfo['phpinfo']['Build Date']) ? $phpinfo['phpinfo']['Build Date'] : 'unknown';
						$database_system = isset($phpinfo['mysql']) ? $phpinfo['mysql']['MySQL Support'] : 'unknown';
						$database_system_version = isset($phpinfo['mysql']) ? $phpinfo['mysql']['Client API version'] : 'unknown';
						$server_api = isset($phpinfo['phpinfo']['Server API']) ? $phpinfo['phpinfo']['Server API'] : 'unknown';
						$vd_support = isset($phpinfo['phpinfo']['Virtual Directory Support']) ? $phpinfo['phpinfo']['Virtual Directory Support'] : 'unknown';
						$asp_tags 	= isset($phpinfo[$php_core_index]) ? $phpinfo[$php_core_index]['asp_tags'][0] : 'unknown';
						$safe_mode 	= isset($phpinfo[$php_core_index]) ? $phpinfo[$php_core_index]['safe_mode'][0] : 'unknown';
						$short_open_tag = isset($phpinfo[$php_core_index]) ? $phpinfo[$php_core_index]['short_open_tag'][0] : 'unknown';
						$mbstring_support = (function_exists('mb_detect_encoding')) ? 'enabled' : 'disabled';

						$session_support = isset($phpinfo['session']['Session Support']) ? $phpinfo['session']['Session Support'] : 'unknown';
						$magic_quotes_gpc = ini_get('magic_quotes_gpc') ? 'On' : 'Off';
						$magic_quotes_runtime = ini_get('magic_quotes_runtime') ? 'On' : 'Off';
						$magic_quotes_sybase = ini_get('magic_quotes_sybase') ? 'On' : 'Off';									
					?>
					<ul>
						<li>PHP Version: <b><i><?php echo phpversion(); ?></i></b></li>
						<li>Database System: <b><i>MySQL - <?php echo $database_system.' ('.$database_system_version.')'; ?></i></b></li>
						<li>Server OS: <b><i><?php echo $system; ?></i></b></li>
					</ul>	
					<ul>
						<li>Build Date: <b><i><?php echo $build_date; ?></i></b></li>
						<li>Server API: <b><i><?php echo $server_api; ?></i></b></li>
						<li>Virtual Directory Support: <b><i><?php echo $vd_support; ?></i></b></li>
						<li>Safe Mode: <b><i><?php echo $safe_mode; ?></i></b></li>
					</ul>	
					<ul>
						<li>Asp Tags: <b><i><?php echo $asp_tags; ?></i></b></li>
						<li>Short Open Tag: <b><i><?php echo $short_open_tag; ?></i></b></li>
						<li>Session Support: <b><i><?php echo $session_support; ?></i></b></li>
						<li>mbString Support: <b><i><?php echo $mbstring_support; ?></i></b></li>
						<li>Magic Quotes GPC: <b><i><?php echo $magic_quotes_gpc; ?></i></b></li>
						<li>Magic Quotes RunTime: <b><i><?php echo $magic_quotes_runtime; ?></i></b></li>
						<li>Magic Quotes SyBase: <b><i><?php echo $magic_quotes_sybase; ?></i></b></li>						
					</ul>
				</TD>
			</TR>
			<TR>
				<TD class="text" align="left">
					Click on Start button to continue &nbsp;
					<input type="button" class="form_button" value="Start" name="submit" title="Click to start installation" onclick="window.location.href='install/install.php'">					
				</TD>
			</TR>
			</TBODY>
			</TABLE>
			
		</fieldset>
		
		<fieldset>
		<legend>Manually</legend>
		<div>
			<h3 id="post-1">Installation of PHP DataGrid</h3>  
			<div class="storycontent">
			
			To run these examples:<br><br>
			
			1. Create database and user, and assign this user to the database. Give him permissions
			   all needed permissions: INSERT, SELECT etc.. Write down the name of the database, username,
			   and password for the database installation procedure.<br><br>
			
			2. After the database and user were created, import SQL Dump.sql
				(<span style="color:#a60000"><b>it is here: examples/sql/db_dump.sql</b></span>) to create 
				example tables in your database.<br><br>
			
			3. Before running any example - change these default parameters on yours 
			   (saved on step 1):<br><br>
				
				$DB_USER='username'; <br>           
				$DB_PASS='password';     <br>      
				$DB_HOST='localhost';      <br> 
				$DB_NAME='database_name';<br><br>
				
			4. Enjoy!!!	<br>
		
			</div>
		
		</div>
		</div>
		</fieldset>
		

        <?php include_once("install/footer.php"); ?>        
    </TD>
</TR>
</TBODY>
</TABLE>
<?php }else{ ?>

<h3 align="center">EXAMPLES INDEX</h3>

<table width="95%" border="0" align="center" cellspacing="5">
<tr valign='top'>
	<td width="33%">
		<fieldset class='big'>
			<legend class='big'><b>Sample 1</b></legend>
			<table width="100%">
			<tr><td colspan="2"><b>Simplest DataGrid code</b> (<a href="sample1.php" class="blue"><b>See this Example &raquo;</b></a>)</td></tr>
			<tr>
			<td valign="top" wrap>				
				--------------------------------<br />
				1. All modes (Add/Edit/Details/Delete/View).<br />
				2. Auto-Genereted colimns.<br />
			</td>
			</tr>
			</table>						
		</fieldset>
	</td>
	<td width="34%">
		<fieldset class='big'>
			<legend class='big'><b>Sample 2</b></legend>
			<table width="100%">
			<tr><td colspan="2"><b>Simple DataGrid code</b> (<a href="sample2.php" class="blue"><b>See this Example &raquo;</b></a>)</td></tr>
			<tr>
			<td valign="top" wrap>				
				--------------------------------<br />
				1. All modes (Add/Edit/Details/Delete/View).<br />
				2. All features.<br />
				3. Two DataGrids on one page.<br />
			</td>
			</tr>
			</table>						
		</fieldset>		
	</td>
	<td width="33%">
		<fieldset class='big'>
			<legend class='big'><b>Sample 3</b></legend>
			<table width="100%">
			<tr><td colspan="2"><b>Advanced DataGrid code</b> (<a href="sample3.php" class="blue"><b>See this Example &raquo;</b></a>)</td></tr>
			<tr>
			<td valign="top" wrap>				
				--------------------------------<br />
				1. All modes (Add/Edit/Details/Delete/View).<br />
				2. All features.<br />
				3. Customized layout in details mode.<br />
			</td>
			</tr>
			</table>						
		</fieldset>				
	</td>
</tr>
</table>

<?php } ?>
</body>
</html>