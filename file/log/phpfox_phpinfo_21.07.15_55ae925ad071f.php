<?php defined('PHPFOX') or exit('NO DICE!');  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<style type="text/css">
body {background-color: #ffffff; color: #000000;}
body, td, th, h1, h2 {font-family: sans-serif;}
pre {margin: 0px; font-family: monospace;}
a:link {color: #000099; text-decoration: none; background-color: #ffffff;}
a:hover {text-decoration: underline;}
table {border-collapse: collapse;}
.center {text-align: center;}
.center table { margin-left: auto; margin-right: auto; text-align: left;}
.center th { text-align: center !important; }
td, th { border: 1px solid #000000; font-size: 75%; vertical-align: baseline;}
h1 {font-size: 150%;}
h2 {font-size: 125%;}
.p {text-align: left;}
.e {background-color: #ccccff; font-weight: bold; color: #000000;}
.h {background-color: #9999cc; font-weight: bold; color: #000000;}
.v {background-color: #cccccc; color: #000000;}
.vr {background-color: #cccccc; text-align: right; color: #000000;}
img {float: right; border: 0px;}
hr {width: 600px; background-color: #cccccc; border: 0px; height: 1px; color: #000000;}
</style>
<title>phpinfo()</title><meta name="ROBOTS" content="NOINDEX,NOFOLLOW,NOARCHIVE" /></head>
<body><div class="center">
<table border="0" cellpadding="3" width="600">
<tr class="h"><td>
<a href="http://www.php.net/"><img border="0" src="data:image/gif;base64,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" alt="PHP logo" /></a><h1 class="p">PHP Version 5.5.25</h1>
</td></tr>
</table><br />
<table border="0" cellpadding="3" width="600">
<tr><td class="e">System </td><td class="v">Windows NT ZUVN-LAP 6.2 build 9200 (Windows 8 Business Edition) i586 </td></tr>
<tr><td class="e">Build Date </td><td class="v">May 13 2015 19:52:48 </td></tr>
<tr><td class="e">Compiler </td><td class="v">MSVC11 (Visual C++ 2012) </td></tr>
<tr><td class="e">Architecture </td><td class="v">x86 </td></tr>
<tr><td class="e">Configure Command </td><td class="v">cscript /nologo configure.js  &quot;--enable-snapshot-build&quot; &quot;--disable-isapi&quot; &quot;--enable-debug-pack&quot; &quot;--without-mssql&quot; &quot;--without-pdo-mssql&quot; &quot;--without-pi3web&quot; &quot;--with-pdo-oci=C:\php-sdk\oracle\x86\instantclient10\sdk,shared&quot; &quot;--with-oci8=C:\php-sdk\oracle\x86\instantclient10\sdk,shared&quot; &quot;--with-oci8-11g=C:\php-sdk\oracle\x86\instantclient11\sdk,shared&quot; &quot;--enable-object-out-dir=../obj/&quot; &quot;--enable-com-dotnet=shared&quot; &quot;--with-mcrypt=static&quot; &quot;--disable-static-analyze&quot; &quot;--with-pgo&quot; </td></tr>
<tr><td class="e">Server API </td><td class="v">Apache 2.0 Handler </td></tr>
<tr><td class="e">Virtual Directory Support </td><td class="v">enabled </td></tr>
<tr><td class="e">Configuration File (php.ini) Path </td><td class="v">C:\WINDOWS </td></tr>
<tr><td class="e">Loaded Configuration File </td><td class="v">D:\Ampps\apache\php.ini </td></tr>
<tr><td class="e">Scan this dir for additional .ini files </td><td class="v">(none) </td></tr>
<tr><td class="e">Additional .ini files parsed </td><td class="v">(none) </td></tr>
<tr><td class="e">PHP API </td><td class="v">20121113 </td></tr>
<tr><td class="e">PHP Extension </td><td class="v">20121212 </td></tr>
<tr><td class="e">Zend Extension </td><td class="v">220121212 </td></tr>
<tr><td class="e">Zend Extension Build </td><td class="v">API220121212,TS,VC11 </td></tr>
<tr><td class="e">PHP Extension Build </td><td class="v">API20121212,TS,VC11 </td></tr>
<tr><td class="e">Debug Build </td><td class="v">no </td></tr>
<tr><td class="e">Thread Safety </td><td class="v">enabled </td></tr>
<tr><td class="e">Zend Signal Handling </td><td class="v">disabled </td></tr>
<tr><td class="e">Zend Memory Manager </td><td class="v">enabled </td></tr>
<tr><td class="e">Zend Multibyte Support </td><td class="v">provided by mbstring </td></tr>
<tr><td class="e">IPv6 Support </td><td class="v">enabled </td></tr>
<tr><td class="e">DTrace Support </td><td class="v">disabled </td></tr>
<tr><td class="e">Registered PHP Streams</td><td class="v">php, file, glob, data, http, ftp, zip, compress.zlib, compress.bzip2, https, ftps, phar</td></tr>
<tr><td class="e">Registered Stream Socket Transports</td><td class="v">tcp, udp, ssl, sslv3, sslv2, tls</td></tr>
<tr><td class="e">Registered Stream Filters</td><td class="v">convert.iconv.*, mcrypt.*, mdecrypt.*, string.rot13, string.toupper, string.tolower, string.strip_tags, convert.*, consumed, dechunk, zlib.*, bzip2.*</td></tr>
</table><br />
<table border="0" cellpadding="3" width="600">
<tr class="v"><td>
<a href="http://www.zend.com/"><img border="0" src="data:image/gif;base64,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" alt="Zend logo" /></a>
This program makes use of the Zend Scripting Language Engine:<br />Zend&nbsp;Engine&nbsp;v2.5.0,&nbsp;Copyright&nbsp;(c)&nbsp;1998-2015&nbsp;Zend&nbsp;Technologies<br /></td></tr>
</table><br />
<hr />
<h1>Configuration</h1>
<h2><a name="module_apache2handler">apache2handler</a></h2>
<table border="0" cellpadding="3" width="600">
<tr><td class="e">Apache Version </td><td class="v">Apache/2.4.12 (Win32) OpenSSL/1.0.1l PHP/5.5.25 mod_wsgi/3.5 Python/2.7.9 </td></tr>
<tr><td class="e">Apache API Version </td><td class="v">20120211 </td></tr>
<tr><td class="e">Server Administrator </td><td class="v">admin@localhost </td></tr>
<tr><td class="e">Hostname:Port </td><td class="v">snsp.vn:0 </td></tr>
<tr><td class="e">Max Requests </td><td class="v">Per Child: 0 - Keep Alive: on - Max Per Connection: 100 </td></tr>
<tr><td class="e">Timeouts </td><td class="v">Connection: 600 - Keep-Alive: 5 </td></tr>
<tr><td class="e">Virtual Server </td><td class="v">Yes </td></tr>
<tr><td class="e">Server Root </td><td class="v">D:/Ampps/apache </td></tr>
<tr><td class="e">Loaded Modules </td><td class="v">core mod_win32 mpm_winnt http_core mod_so mod_actions mod_alias mod_asis mod_auth_basic mod_authn_file mod_authz_groupfile mod_authz_host mod_authz_user mod_autoindex mod_cgi mod_dir mod_env mod_include mod_isapi mod_log_config mod_mime mod_negotiation mod_rewrite mod_setenvif mod_ssl mod_access_compat mod_allowmethods mod_authn_core mod_authz_core mod_socache_shmcb mod_php5 mod_wsgi </td></tr>
</table><br />
<table border="0" cellpadding="3" width="600">
<tr class="h"><th>Directive</th><th>Local Value</th><th>Master Value</th></tr>
<tr><td class="e">engine</td><td class="v">1</td><td class="v">1</td></tr>
<tr><td class="e">last_modified</td><td class="v">0</td><td class="v">0</td></tr>
<tr><td class="e">xbithack</td><td class="v">0</td><td class="v">0</td></tr>
</table><br />
<h2>Apache Environment</h2>
<table border="0" cellpadding="3" width="600">
<tr class="h"><th>Variable</th><th>Value</th></tr>
<tr><td class="e">TMP </td><td class="v">D:/Ampps/tmp </td></tr>
<tr><td class="e">HTTP_HOST </td><td class="v">snsp.vn </td></tr>
<tr><td class="e">HTTP_CONNECTION </td><td class="v">keep-alive </td></tr>
<tr><td class="e">CONTENT_LENGTH </td><td class="v">43 </td></tr>
<tr><td class="e">HTTP_CACHE_CONTROL </td><td class="v">max-age=0 </td></tr>
<tr><td class="e">HTTP_ACCEPT </td><td class="v">text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8 </td></tr>
<tr><td class="e">HTTP_ORIGIN </td><td class="v">http://snsp.vn </td></tr>
<tr><td class="e">HTTP_USER_AGENT </td><td class="v">Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.89 Safari/537.36 </td></tr>
<tr><td class="e">HTTP_HTTPS </td><td class="v">1 </td></tr>
<tr><td class="e">CONTENT_TYPE </td><td class="v">application/x-www-form-urlencoded </td></tr>
<tr><td class="e">HTTP_DNT </td><td class="v">1 </td></tr>
<tr><td class="e">HTTP_REFERER </td><td class="v">http://snsp.vn/install/index.php?do=/install/requirement/sessionid_55ae92399b230/ </td></tr>
<tr><td class="e">HTTP_ACCEPT_ENCODING </td><td class="v">gzip, deflate </td></tr>
<tr><td class="e">HTTP_ACCEPT_LANGUAGE </td><td class="v">en-US,en;q=0.8,vi;q=0.6 </td></tr>
<tr><td class="e">HTTP_COOKIE </td><td class="v">wp-settings-1=mfold%3Do%26post_dfw%3Doff%26editor%3Dtinymce%26libraryContent%3Dbrowse; wp-settings-time-1=1436619445; wp_admin_time=1; wordpress_logged_in_7b985cee66015d72a6b433b9ef02fddb=googlesky%7C1438286891%7CZ27HbCRe52EkKYUx9826RtjU3bDm5SDgPRzWw3kmRJD%7C87d338bc289ec96618abb38ea2c53816939b9b4bbc1cf314ef5ac1bccd615bb8; redux_current_tab_get=2; redux_current_tab=1; phpfoxuser_id=1; phpfoxuser_hash=e378e9ff9d302440dc554d9159212405f79a2beaedface4e39; core2bc9user_id=1; core2bc9user_hash=8669a498b5a56f868ae83d82f95095379667bf866b619453fb; core2bc9macstyle=default; core2bc9macnav=default; core2bc9macnavpos=top; PHPSESSID=630iutkuo55ij1o586d4i7qh66 </td></tr>
<tr><td class="e">PATH </td><td class="v">C:\ProgramData\Oracle\Java\javapath;C:\Program Files (x86)\Intel\iCLS Client\;C:\Program Files\Intel\iCLS Client\;C:\Windows\system32;C:\Windows;C:\Windows\System32\Wbem;C:\Windows\System32\WindowsPowerShell\v1.0\;C:\Program Files\Condusiv Technologies\ExpressCache\;C:\Program Files\Intel\Intel(R) Management Engine Components\DAL;C:\Program Files\Intel\Intel(R) Management Engine Components\IPT;C:\Program Files (x86)\Intel\Intel(R) Management Engine Components\DAL;C:\Program Files (x86)\Intel\Intel(R) Management Engine Components\IPT;C:\Program Files (x86)\Skype\Phone\;C:\Program Files (x86)\NVIDIA Corporation\PhysX\Common;C:\WINDOWS\system32;C:\WINDOWS;C:\WINDOWS\System32\Wbem;C:\WINDOWS\System32\WindowsPowerShell\v1.0\;C:\Program Files (x86)\Git\cmd;C:\Program Files (x86)\Git\bin;D:\Ampps\php;C:\ProgramData\ComposerSetup\bin </td></tr>
<tr><td class="e">SystemRoot </td><td class="v">C:\WINDOWS </td></tr>
<tr><td class="e">COMSPEC </td><td class="v">C:\WINDOWS\system32\cmd.exe </td></tr>
<tr><td class="e">PATHEXT </td><td class="v">.COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC </td></tr>
<tr><td class="e">WINDIR </td><td class="v">C:\WINDOWS </td></tr>
<tr><td class="e">SERVER_SIGNATURE </td><td class="v"><i>no value</i> </td></tr>
<tr><td class="e">SERVER_SOFTWARE </td><td class="v">Apache/2.4.12 (Win32) OpenSSL/1.0.1l PHP/5.5.25 mod_wsgi/3.5 Python/2.7.9 </td></tr>
<tr><td class="e">SERVER_NAME </td><td class="v">snsp.vn </td></tr>
<tr><td class="e">SERVER_ADDR </td><td class="v">127.0.0.1 </td></tr>
<tr><td class="e">SERVER_PORT </td><td class="v">80 </td></tr>
<tr><td class="e">REMOTE_ADDR </td><td class="v">127.0.0.1 </td></tr>
<tr><td class="e">DOCUMENT_ROOT </td><td class="v">D:/Ampps/www/snsp.vn </td></tr>
<tr><td class="e">REQUEST_SCHEME </td><td class="v">http </td></tr>
<tr><td class="e">CONTEXT_PREFIX </td><td class="v"><i>no value</i> </td></tr>
<tr><td class="e">CONTEXT_DOCUMENT_ROOT </td><td class="v">D:/Ampps/www/snsp.vn </td></tr>
<tr><td class="e">SERVER_ADMIN </td><td class="v">admin@localhost </td></tr>
<tr><td class="e">SCRIPT_FILENAME </td><td class="v">D:/Ampps/www/snsp.vn/install/index.php </td></tr>
<tr><td class="e">REMOTE_PORT </td><td class="v">54994 </td></tr>
<tr><td class="e">GATEWAY_INTERFACE </td><td class="v">CGI/1.1 </td></tr>
<tr><td class="e">SERVER_PROTOCOL </td><td class="v">HTTP/1.1 </td></tr>
<tr><td class="e">REQUEST_METHOD </td><td class="v">POST </td></tr>
<tr><td class="e">QUERY_STRING </td><td class="v">do=/install/requirement/sessionid_55ae92399b230/ </td></tr>
<tr><td class="e">REQUEST_URI </td><td class="v">/install/index.php?do=/install/requirement/sessionid_55ae92399b230/ </td></tr>
<tr><td class="e">SCRIPT_NAME </td><td class="v">/install/index.php </td></tr>
</table><br />
<h2>HTTP Headers Information</h2>
<table border="0" cellpadding="3" width="600">
<tr class="h"><th colspan="2">HTTP Request Headers</th></tr>
<tr><td class="e">HTTP Request </td><td class="v">POST /install/index.php?do=/install/requirement/sessionid_55ae92399b230/ HTTP/1.1 </td></tr>
<tr><td class="e">Host </td><td class="v">snsp.vn </td></tr>
<tr><td class="e">Connection </td><td class="v">keep-alive </td></tr>
<tr><td class="e">Content-Length </td><td class="v">43 </td></tr>
<tr><td class="e">Cache-Control </td><td class="v">max-age=0 </td></tr>
<tr><td class="e">Accept </td><td class="v">text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8 </td></tr>
<tr><td class="e">Origin </td><td class="v">http://snsp.vn </td></tr>
<tr><td class="e">User-Agent </td><td class="v">Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.89 Safari/537.36 </td></tr>
<tr><td class="e">HTTPS </td><td class="v">1 </td></tr>
<tr><td class="e">Content-Type </td><td class="v">application/x-www-form-urlencoded </td></tr>
<tr><td class="e">DNT </td><td class="v">1 </td></tr>
<tr><td class="e">Referer </td><td class="v">http://snsp.vn/install/index.php?do=/install/requirement/sessionid_55ae92399b230/ </td></tr>
<tr><td class="e">Accept-Encoding </td><td class="v">gzip, deflate </td></tr>
<tr><td class="e">Accept-Language </td><td class="v">en-US,en;q=0.8,vi;q=0.6 </td></tr>
<tr><td class="e">Cookie </td><td class="v">wp-settings-1=mfold%3Do%26post_dfw%3Doff%26editor%3Dtinymce%26libraryContent%3Dbrowse; wp-settings-time-1=1436619445; wp_admin_time=1; wordpress_logged_in_7b985cee66015d72a6b433b9ef02fddb=googlesky%7C1438286891%7CZ27HbCRe52EkKYUx9826RtjU3bDm5SDgPRzWw3kmRJD%7C87d338bc289ec96618abb38ea2c53816939b9b4bbc1cf314ef5ac1bccd615bb8; redux_current_tab_get=2; redux_current_tab=1; phpfoxuser_id=1; phpfoxuser_hash=e378e9ff9d302440dc554d9159212405f79a2beaedface4e39; core2bc9user_id=1; core2bc9user_hash=8669a498b5a56f868ae83d82f95095379667bf866b619453fb; core2bc9macstyle=default; core2bc9macnav=default; core2bc9macnavpos=top; PHPSESSID=630iutkuo55ij1o586d4i7qh66 </td></tr>
<tr class="h"><th colspan="2">HTTP Response Headers</th></tr>
<tr><td class="e">X-Powered-By </td><td class="v">PHP/5.5.25 </td></tr>
<tr><td class="e">Expires </td><td class="v">Thu, 19 Nov 1981 08:52:00 GMT </td></tr>
<tr><td class="e">Cache-Control </td><td class="v">no-store, no-cache, must-revalidate, post-check=0, pre-check=0 </td></tr>
<tr><td class="e">Pragma </td><td class="v">no-cache </td></tr>
</table><br />
<h2><a name="module_bcmath">bcmath</a></h2>
<table border="0" cellpadding="3" width="600">
<tr><td class="e">BCMath support </td><td class="v">enabled </td></tr>
</table><br />
<table border="0" cellpadding="3" width="600">
<tr class="h"><th>Directive</th><th>Local Value</th><th>Master Value</th></tr>
<tr><td class="e">bcmath.scale</td><td class="v">0</td><td class="v">0</td></tr>
</table><br />
<h2><a name="module_bz2">bz2</a></h2>
<table border="0" cellpadding="3" width="600">
<tr><td class="e">BZip2 Support </td><td class="v">Enabled </td></tr>
<tr><td class="e">Stream Wrapper support </td><td class="v">compress.bzip2:// </td></tr>
<tr><td class="e">Stream Filter support </td><td class="v">bzip2.decompress, bzip2.compress </td></tr>
<tr><td class="e">BZip2 Version </td><td class="v">1.0.6, 6-Sept-2010 </td></tr>
</table><br />
<h2><a name="module_calendar">calendar</a></h2>
<table border="0" cellpadding="3" width="600">
<tr><td class="e">Calendar support </td><td class="v">enabled </td></tr>
</table><br />
<h2><a name="module_com_dotnet">com_dotnet</a></h2>
<table border="0" cellpadding="3" width="600">
<tr class="h"><th>COM support</th><th>enabled</th></tr>
<tr class="h"><th>DCOM support</th><th>disabled</th></tr>
<tr class="h"><th>.Net support</th><th>enabled</th></tr>
</table><br />
<table border="0" cellpadding="3" width="600">
<tr class="h"><th>Directive</th><th>Local Value</th><th>Master Value</th></tr>
<tr><td class="e">com.allow_dcom</td><td class="v">0</td><td class="v">0</td></tr>
<tr><td class="e">com.autoregister_casesensitive</td><td class="v">1</td><td class="v">1</td></tr>
<tr><td class="e">com.autoregister_typelib</td><td class="v">0</td><td class="v">0</td></tr>
<tr><td class="e">com.autoregister_verbose</td><td class="v">0</td><td class="v">0</td></tr>
<tr><td class="e">com.code_page</td><td class="v"><i>no value</i></td><td class="v"><i>no value</i></td></tr>
<tr><td class="e">com.typelib_file</td><td class="v"><i>no value</i></td><td class="v"><i>no value</i></td></tr>
</table><br />
<h2><a name="module_Core">Core</a></h2>
<table border="0" cellpadding="3" width="600">
<tr><td class="e">PHP Version </td><td class="v">5.5.25 </td></tr>
</table><br />
<table border="0" cellpadding="3" width="600">
<tr class="h"><th>Directive</th><th>Local Value</th><th>Master Value</th></tr>
<tr><td class="e">allow_url_fopen</td><td class="v">On</td><td class="v">On</td></tr>
<tr><td class="e">allow_url_include</td><td class="v">Off</td><td class="v">Off</td></tr>
<tr><td class="e">always_populate_raw_post_data</td><td class="v">Off</td><td class="v">Off</td></tr>
<tr><td class="e">arg_separator.input</td><td class="v">&amp;</td><td class="v">&amp;</td></tr>
<tr><td class="e">arg_separator.output</td><td class="v">&amp;</td><td class="v">&amp;</td></tr>
<tr><td class="e">asp_tags</td><td class="v">Off</td><td class="v">Off</td></tr>
<tr><td class="e">auto_append_file</td><td class="v"><i>no value</i></td><td class="v"><i>no value</i></td></tr>
<tr><td class="e">auto_globals_jit</td><td class="v">On</td><td class="v">On</td></tr>
<tr><td class="e">auto_prepend_file</td><td class="v"><i>no value</i></td><td class="v"><i>no value</i></td></tr>
<tr><td class="e">browscap</td><td class="v"><i>no value</i></td><td class="v"><i>no value</i></td></tr>
<tr><td class="e">default_charset</td><td class="v"><i>no value</i></td><td class="v"><i>no value</i></td></tr>
<tr><td class="e">default_mimetype</td><td class="v">text/html</td><td class="v">text/html</td></tr>
<tr><td class="e">disable_classes</td><td class="v"><i>no value</i></td><td class="v"><i>no value</i></td></tr>
<tr><td class="e">disable_functions</td><td class="v"><i>no value</i></td><td class="v"><i>no value</i></td></tr>
<tr><td class="e">display_errors</td><td class="v">On</td><td class="v">On</td></tr>
<tr><td class="e">display_startup_errors</td><td class="v">On</td><td class="v">On</td></tr>
<tr><td class="e">doc_root</td><td class="v"><i>no value</i></td><td class="v"><i>no value</i></td></tr>
<tr><td class="e">docref_ext</td><td class="v"><i>no value</i></td><td class="v"><i>no value</i></td></tr>
<tr><td class="e">docref_root</td><td class="v"><i>no value</i></td><td class="v"><i>no value</i></td></tr>
<tr><td class="e">enable_dl</td><td class="v">On</td><td class="v">On</td></tr>
<tr><td class="e">enable_post_data_reading</td><td class="v">On</td><td class="v">On</td></tr>
<tr><td class="e">error_append_string</td><td class="v"><i>no value</i></td><td class="v"><i>no value</i></td></tr>
<tr><td class="e">error_log</td><td class="v"><i>no value</i></td><td class="v"><i>no value</i></td></tr>
<tr><td class="e">error_prepend_string</td><td class="v"><i>no value</i></td><td class="v"><i>no value</i></td></tr>
<tr><td class="e">error_reporting</td><td class="v">0</td><td class="v">22519</td></tr>
<tr><td class="e">exit_on_timeout</td><td class="v">Off</td><td class="v">Off</td></tr>
<tr><td class="e">expose_php</td><td class="v">On</td><td class="v">On</td></tr>
<tr><td class="e">extension_dir</td><td class="v">D:/Ampps/php/ext</td><td class="v">D:/Ampps/php/ext</td></tr>
<tr><td class="e">file_uploads</td><td class="v">On</td><td class="v">On</td></tr>
<tr><td class="e">highlight.comment</td><td class="v"><font style="color: #FF8000">#FF8000</font></td><td class="v"><font style="color: #FF8000">#FF8000</font></td></tr>
<tr><td class="e">highlight.default</td><td class="v"><font style="color: #0000BB">#0000BB</font></td><td class="v"><font style="color: #0000BB">#0000BB</font></td></tr>
<tr><td class="e">highlight.html</td><td class="v"><font style="color: #000000">#000000</font></td><td class="v"><font style="color: #000000">#000000</font></td></tr>
<tr><td class="e">highlight.keyword</td><td class="v"><font style="color: #007700">#007700</font></td><td class="v"><font style="color: #007700">#007700</font></td></tr>
<tr><td class="e">highlight.string</td><td class="v"><font style="color: #DD0000">#DD0000</font></td><td class="v"><font style="color: #DD0000">#DD0000</font></td></tr>
<tr><td class="e">html_errors</td><td class="v">On</td><td class="v">On</td></tr>
<tr><td class="e">ignore_repeated_errors</td><td class="v">Off</td><td class="v">Off</td></tr>
<tr><td class="e">ignore_repeated_source</td><td class="v">Off</td><td class="v">Off</td></tr>
<tr><td class="e">ignore_user_abort</td><td class="v">Off</td><td class="v">Off</td></tr>
<tr><td class="e">implicit_flush</td><td class="v">Off</td><td class="v">Off</td></tr>
<tr><td class="e">include_path</td><td class="v">.;C:\php\pear</td><td class="v">.;C:\php\pear</td></tr>
<tr><td class="e">log_errors</td><td class="v">On</td><td class="v">On</td></tr>
<tr><td class="e">log_errors_max_len</td><td class="v">1024</td><td class="v">1024</td></tr>
<tr><td class="e">mail.add_x_header</td><td class="v">On</td><td class="v">On</td></tr>
<tr><td class="e">mail.force_extra_parameters</td><td class="v"><i>no value</i></td><td class="v"><i>no value</i></td></tr>
<tr><td class="e">mail.log</td><td class="v"><i>no value</i></td><td class="v"><i>no value</i></td></tr>
<tr><td class="e">max_execution_time</td><td class="v">0</td><td class="v">300</td></tr>
<tr><td class="e">max_file_uploads</td><td class="v">20</td><td class="v">20</td></tr>
<tr><td class="e">max_input_nesting_level</td><td class="v">64</td><td class="v">64</td></tr>
<tr><td class="e">max_input_time</td><td class="v">60</td><td class="v">60</td></tr>
<tr><td class="e">max_input_vars</td><td class="v">1000</td><td class="v">1000</td></tr>
<tr><td class="e">memory_limit</td><td class="v">-1</td><td class="v">128M</td></tr>
<tr><td class="e">open_basedir</td><td class="v"><i>no value</i></td><td class="v"><i>no value</i></td></tr>
<tr><td class="e">output_buffering</td><td class="v">4096</td><td class="v">4096</td></tr>
<tr><td class="e">output_handler</td><td class="v"><i>no value</i></td><td class="v"><i>no value</i></td></tr>
<tr><td class="e">post_max_size</td><td class="v">8M</td><td class="v">8M</td></tr>
<tr><td class="e">precision</td><td class="v">14</td><td class="v">14</td></tr>
<tr><td class="e">realpath_cache_size</td><td class="v">16K</td><td class="v">16K</td></tr>
<tr><td class="e">realpath_cache_ttl</td><td class="v">120</td><td class="v">120</td></tr>
<tr><td class="e">register_argc_argv</td><td class="v">Off</td><td class="v">Off</td></tr>
<tr><td class="e">report_memleaks</td><td class="v">On</td><td class="v">On</td></tr>
<tr><td class="e">report_zend_debug</td><td class="v">On</td><td class="v">On</td></tr>
<tr><td class="e">request_order</td><td class="v">GP</td><td class="v">GP</td></tr>
<tr><td class="e">sendmail_from</td><td class="v">phuonghieuag@gmail.com</td><td class="v">phuonghieuag@gmail.com</td></tr>
<tr><td class="e">sendmail_path</td><td class="v"><i>no value</i></td><td class="v"><i>no value</i></td></tr>
<tr><td class="e">serialize_precision</td><td class="v">17</td><td class="v">17</td></tr>
<tr><td class="e">short_open_tag</td><td class="v">On</td><td class="v">On</td></tr>
<tr><td class="e">SMTP</td><td class="v">smtp.gmail.com</td><td class="v">smtp.gmail.com</td></tr>
<tr><td class="e">smtp_port</td><td class="v">465</td><td class="v">465</td></tr>
<tr><td class="e">sql.safe_mode</td><td class="v">Off</td><td class="v">Off</td></tr>
<tr><td class="e">sys_temp_dir</td><td class="v"><i>no value</i></td><td class="v"><i>no value</i></td></tr>
<tr><td class="e">track_errors</td><td class="v">On</td><td class="v">On</td></tr>
<tr><td class="e">unserialize_callback_func</td><td class="v"><i>no value</i></td><td class="v"><i>no value</i></td></tr>
<tr><td class="e">upload_max_filesize</td><td class="v">32M</td><td class="v">32M</td></tr>
<tr><td class="e">upload_tmp_dir</td><td class="v"><i>no value</i></td><td class="v"><i>no value</i></td></tr>
<tr><td class="e">user_dir</td><td class="v"><i>no value</i></td><td class="v"><i>no value</i></td></tr>
<tr><td class="e">user_ini.cache_ttl</td><td class="v">300</td><td class="v">300</td></tr>
<tr><td class="e">user_ini.filename</td><td class="v">.user.ini</td><td class="v">.user.ini</td></tr>
<tr><td class="e">variables_order</td><td class="v">GPCS</td><td class="v">GPCS</td></tr>
<tr><td class="e">windows.show_crt_warning</td><td class="v">Off</td><td class="v">Off</td></tr>
<tr><td class="e">xmlrpc_error_number</td><td class="v">0</td><td class="v">0</td></tr>
<tr><td class="e">xmlrpc_errors</td><td class="v">Off</td><td class="v">Off</td></tr>
<tr><td class="e">zend.detect_unicode</td><td class="v">On</td><td class="v">On</td></tr>
<tr><td class="e">zend.enable_gc</td><td class="v">On</td><td class="v">On</td></tr>
<tr><td class="e">zend.multibyte</td><td class="v">Off</td><td class="v">Off</td></tr>
<tr><td class="e">zend.script_encoding</td><td class="v"><i>no value</i></td><td class="v"><i>no value</i></td></tr>
</table><br />
<h2><a name="module_ctype">ctype</a></h2>
<table border="0" cellpadding="3" width="600">
<tr><td class="e">ctype functions </td><td class="v">enabled </td></tr>
</table><br />
<h2><a name="module_curl">curl</a></h2>
<table border="0" cellpadding="3" width="600">
<tr><td class="e">cURL support </td><td class="v">enabled </td></tr>
<tr><td class="e">cURL Information </td><td class="v">7.42.1 </td></tr>
<tr><td class="e">Age </td><td class="v">3 </td></tr>
<tr><td class="e">Features </td></tr>
<tr><td class="e">AsynchDNS </td><td class="v">Yes </td></tr>
<tr><td class="e">CharConv </td><td class="v">No </td></tr>
<tr><td class="e">Debug </td><td class="v">No </td></tr>
<tr><td class="e">GSS-Negotiate </td><td class="v">No </td></tr>
<tr><td class="e">IDN </td><td class="v">Yes </td></tr>
<tr><td class="e">IPv6 </td><td class="v">Yes </td></tr>
<tr><td class="e">krb4 </td><td class="v">No </td></tr>
<tr><td class="e">Largefile </td><td class="v">Yes </td></tr>
<tr><td class="e">libz </td><td class="v">Yes </td></tr>
<tr><td class="e">NTLM </td><td class="v">Yes </td></tr>
<tr><td class="e">NTLMWB </td><td class="v">No </td></tr>
<tr><td class="e">SPNEGO </td><td class="v">Yes </td></tr>
<tr><td class="e">SSL </td><td class="v">Yes </td></tr>
<tr><td class="e">SSPI </td><td class="v">Yes </td></tr>
<tr><td class="e">TLS-SRP </td><td class="v">No </td></tr>
<tr><td class="e">Protocols </td><td class="v">dict, file, ftp, ftps, gopher, http, https, imap, imaps, ldap, pop3, pop3s, rtsp, scp, sftp, smtp, smtps, telnet, tftp </td></tr>
<tr><td class="e">Host </td><td class="v">i386-pc-win32 </td></tr>
<tr><td class="e">SSL Version </td><td class="v">OpenSSL/1.0.1l </td></tr>
<tr><td class="e">ZLib Version </td><td class="v">1.2.7.3 </td></tr>
<tr><td class="e">libSSH Version </td><td class="v">libssh2/1.5.0 </td></tr>
</table><br />
<h2><a name="module_date">date</a></h2>
<table border="0" cellpadding="3" width="600">
<tr><td class="e">date/time support </td><td class="v">enabled </td></tr>
<tr><td class="e">&quot;Olson&quot; Timezone Database Version </td><td class="v">2015.4 </td></tr>
<tr><td class="e">Timezone Database </td><td class="v">internal </td></tr>
<tr><td class="e">Default timezone </td><td class="v">GMT </td></tr>
</table><br />
<table border="0" cellpadding="3" width="600">
<tr class="h"><th>Directive</th><th>Local Value</th><th>Master Value</th></tr>
<tr><td class="e">date.default_latitude</td><td class="v">31.7667</td><td class="v">31.7667</td></tr>
<tr><td class="e">date.default_longitude</td><td class="v">35.2333</td><td class="v">35.2333</td></tr>
<tr><td class="e">date.sunrise_zenith</td><td class="v">90.583333</td><td class="v">90.583333</td></tr>
<tr><td class="e">date.sunset_zenith</td><td class="v">90.583333</td><td class="v">90.583333</td></tr>
<tr><td class="e">date.timezone</td><td class="v">Asia/Ho_Chi_Minh</td><td class="v">Asia/Ho_Chi_Minh</td></tr>
</table><br />
<h2><a name="module_dom">dom</a></h2>
<table border="0" cellpadding="3" width="600">
<tr><td class="e">DOM/XML </td><td class="v">enabled </td></tr>
<tr><td class="e">DOM/XML API Version </td><td class="v">20031129 </td></tr>
<tr><td class="e">libxml Version </td><td class="v">2.9.2 </td></tr>
<tr><td class="e">HTML Support </td><td class="v">enabled </td></tr>
<tr><td class="e">XPath Support </td><td class="v">enabled </td></tr>
<tr><td class="e">XPointer Support </td><td class="v">enabled </td></tr>
<tr><td class="e">Schema Support </td><td class="v">enabled </td></tr>
<tr><td class="e">RelaxNG Support </td><td class="v">enabled </td></tr>
</table><br />
<h2><a name="module_ereg">ereg</a></h2>
<table border="0" cellpadding="3" width="600">
<tr><td class="e">Regex Library </td><td class="v">Bundled library enabled </td></tr>
</table><br />
<h2><a name="module_exif">exif</a></h2>
<table border="0" cellpadding="3" width="600">
<tr><td class="e">EXIF Support </td><td class="v">enabled </td></tr>
<tr><td class="e">EXIF Version </td><td class="v">1.4 $Id: 77f4630d93dc49bf34fec7c4769d100367202046 $ </td></tr>
<tr><td class="e">Supported EXIF Version </td><td class="v">0220 </td></tr>
<tr><td class="e">Supported filetypes </td><td class="v">JPEG,TIFF </td></tr>
</table><br />
<table border="0" cellpadding="3" width="600">
<tr class="h"><th>Directive</th><th>Local Value</th><th>Master Value</th></tr>
<tr><td class="e">exif.decode_jis_intel</td><td class="v">JIS</td><td class="v">JIS</td></tr>
<tr><td class="e">exif.decode_jis_motorola</td><td class="v">JIS</td><td class="v">JIS</td></tr>
<tr><td class="e">exif.decode_unicode_intel</td><td class="v">UCS-2LE</td><td class="v">UCS-2LE</td></tr>
<tr><td class="e">exif.decode_unicode_motorola</td><td class="v">UCS-2BE</td><td class="v">UCS-2BE</td></tr>
<tr><td class="e">exif.encode_jis</td><td class="v"><i>no value</i></td><td class="v"><i>no value</i></td></tr>
<tr><td class="e">exif.encode_unicode</td><td class="v">ISO-8859-15</td><td class="v">ISO-8859-15</td></tr>
</table><br />
<h2><a name="module_filter">filter</a></h2>
<table border="0" cellpadding="3" width="600">
<tr><td class="e">Input Validation and Filtering </td><td class="v">enabled </td></tr>
<tr><td class="e">Revision </td><td class="v">$Id: fbeb8bbbf6cc97f568996dac46e13e48e2907326 $ </td></tr>
</table><br />
<table border="0" cellpadding="3" width="600">
<tr class="h"><th>Directive</th><th>Local Value</th><th>Master Value</th></tr>
<tr><td class="e">filter.default</td><td class="v">unsafe_raw</td><td class="v">unsafe_raw</td></tr>
<tr><td class="e">filter.default_flags</td><td class="v"><i>no value</i></td><td class="v"><i>no value</i></td></tr>
</table><br />
<h2><a name="module_ftp">ftp</a></h2>
<table border="0" cellpadding="3" width="600">
<tr><td class="e">FTP support </td><td class="v">enabled </td></tr>
</table><br />
<h2><a name="module_gd">gd</a></h2>
<table border="0" cellpadding="3" width="600">
<tr><td class="e">GD Support </td><td class="v">enabled </td></tr>
<tr><td class="e">GD Version </td><td class="v">bundled (2.1.0 compatible) </td></tr>
<tr><td class="e">FreeType Support </td><td class="v">enabled </td></tr>
<tr><td class="e">FreeType Linkage </td><td class="v">with freetype </td></tr>
<tr><td class="e">FreeType Version </td><td class="v">2.4.10 </td></tr>
<tr><td class="e">GIF Read Support </td><td class="v">enabled </td></tr>
<tr><td class="e">GIF Create Support </td><td class="v">enabled </td></tr>
<tr><td class="e">JPEG Support </td><td class="v">enabled </td></tr>
<tr><td class="e">libJPEG Version </td><td class="v">9 compatible </td></tr>
<tr><td class="e">PNG Support </td><td class="v">enabled </td></tr>
<tr><td class="e">libPNG Version </td><td class="v">1.5.18 </td></tr>
<tr><td class="e">WBMP Support </td><td class="v">enabled </td></tr>
<tr><td class="e">XPM Support </td><td class="v">enabled </td></tr>
<tr><td class="e">libXpm Version </td><td class="v">30411 </td></tr>
<tr><td class="e">XBM Support </td><td class="v">enabled </td></tr>
<tr><td class="e">WebP Support </td><td class="v">enabled </td></tr>
</table><br />
<table border="0" cellpadding="3" width="600">
<tr class="h"><th>Directive</th><th>Local Value</th><th>Master Value</th></tr>
<tr><td class="e">gd.jpeg_ignore_warning</td><td class="v">0</td><td class="v">0</td></tr>
</table><br />
<h2><a name="module_hash">hash</a></h2>
<table border="0" cellpadding="3" width="600">
<tr><td class="e">hash support </td><td class="v">enabled </td></tr>
<tr><td class="e">Hashing Engines </td><td class="v">md2 md4 md5 sha1 sha224 sha256 sha384 sha512 ripemd128 ripemd160 ripemd256 ripemd320 whirlpool tiger128,3 tiger160,3 tiger192,3 tiger128,4 tiger160,4 tiger192,4 snefru snefru256 gost adler32 crc32 crc32b fnv132 fnv164 joaat haval128,3 haval160,3 haval192,3 haval224,3 haval256,3 haval128,4 haval160,4 haval192,4 haval224,4 haval256,4 haval128,5 haval160,5 haval192,5 haval224,5 haval256,5  </td></tr>
</table><br />
<h2><a name="module_iconv">iconv</a></h2>
<table border="0" cellpadding="3" width="600">
<tr><td class="e">iconv support </td><td class="v">enabled </td></tr>
<tr><td class="e">iconv implementation </td><td class="v">&quot;libiconv&quot; </td></tr>
<tr><td class="e">iconv library version </td><td class="v">1.14 </td></tr>
</table><br />
<table border="0" cellpadding="3" width="600">
<tr class="h"><th>Directive</th><th>Local Value</th><th>Master Value</th></tr>
<tr><td class="e">iconv.input_encoding</td><td class="v">ISO-8859-1</td><td class="v">ISO-8859-1</td></tr>
<tr><td class="e">iconv.internal_encoding</td><td class="v">ISO-8859-1</td><td class="v">ISO-8859-1</td></tr>
<tr><td class="e">iconv.output_encoding</td><td class="v">ISO-8859-1</td><td class="v">ISO-8859-1</td></tr>
</table><br />
<h2><a name="module_json">json</a></h2>
<table border="0" cellpadding="3" width="600">
<tr><td class="e">json support </td><td class="v">enabled </td></tr>
<tr><td class="e">json version </td><td class="v">1.2.1 </td></tr>
</table><br />
<h2><a name="module_libxml">libxml</a></h2>
<table border="0" cellpadding="3" width="600">
<tr><td class="e">libXML support </td><td class="v">active </td></tr>
<tr><td class="e">libXML Compiled Version </td><td class="v">2.9.2 </td></tr>
<tr><td class="e">libXML Loaded Version </td><td class="v">20902 </td></tr>
<tr><td class="e">libXML streams </td><td class="v">enabled </td></tr>
</table><br />
<h2><a name="module_mbstring">mbstring</a></h2>
<table border="0" cellpadding="3" width="600">
<tr><td class="e">Multibyte Support </td><td class="v">enabled </td></tr>
<tr><td class="e">Multibyte string engine </td><td class="v">libmbfl </td></tr>
<tr><td class="e">HTTP input encoding translation </td><td class="v">disabled </td></tr>
<tr><td class="e">libmbfl version </td><td class="v">1.3.2 </td></tr>
</table><br />
<table border="0" cellpadding="3" width="600">
<tr class="h"><th>mbstring extension makes use of "streamable kanji code filter and converter", which is distributed under the GNU Lesser General Public License version 2.1.</th></tr>
</table><br />
<table border="0" cellpadding="3" width="600">
<tr><td class="e">Multibyte (japanese) regex support </td><td class="v">enabled </td></tr>
<tr><td class="e">Multibyte regex (oniguruma) version </td><td class="v">5.9.2 </td></tr>
</table><br />
<table border="0" cellpadding="3" width="600">
<tr class="h"><th>Directive</th><th>Local Value</th><th>Master Value</th></tr>
<tr><td class="e">mbstring.detect_order</td><td class="v"><i>no value</i></td><td class="v"><i>no value</i></td></tr>
<tr><td class="e">mbstring.encoding_translation</td><td class="v">Off</td><td class="v">Off</td></tr>
<tr><td class="e">mbstring.func_overload</td><td class="v">0</td><td class="v">0</td></tr>
<tr><td class="e">mbstring.http_input</td><td class="v">pass</td><td class="v">pass</td></tr>
<tr><td class="e">mbstring.http_output</td><td class="v">pass</td><td class="v">pass</td></tr>
<tr><td class="e">mbstring.http_output_conv_mimetypes</td><td class="v">^(text/|application/xhtml\+xml)</td><td class="v">^(text/|application/xhtml\+xml)</td></tr>
<tr><td class="e">mbstring.internal_encoding</td><td class="v"><i>no value</i></td><td class="v"><i>no value</i></td></tr>
<tr><td class="e">mbstring.language</td><td class="v">neutral</td><td class="v">neutral</td></tr>
<tr><td class="e">mbstring.strict_detection</td><td class="v">Off</td><td class="v">Off</td></tr>
<tr><td class="e">mbstring.substitute_character</td><td class="v"><i>no value</i></td><td class="v"><i>no value</i></td></tr>
</table><br />
<h2><a name="module_mcrypt">mcrypt</a></h2>
<table border="0" cellpadding="3" width="600">
<tr class="h"><th>mcrypt support</th><th>enabled</th></tr>
<tr class="h"><th>mcrypt_filter support</th><th>enabled</th></tr>
<tr><td class="e">Version </td><td class="v">2.5.8 </td></tr>
<tr><td class="e">Api No </td><td class="v">20021217 </td></tr>
<tr><td class="e">Supported ciphers </td><td class="v">cast-128 gost rijndael-128 twofish cast-256 loki97 rijndael-192 saferplus wake blowfish-compat des rijndael-256 serpent xtea blowfish enigma rc2 tripledes arcfour  </td></tr>
<tr><td class="e">Supported modes </td><td class="v">cbc cfb ctr ecb ncfb nofb ofb stream  </td></tr>
</table><br />
<table border="0" cellpadding="3" width="600">
<tr class="h"><th>Directive</th><th>Local Value</th><th>Master Value</th></tr>
<tr><td class="e">mcrypt.algorithms_dir</td><td class="v"><i>no value</i></td><td class="v"><i>no value</i></td></tr>
<tr><td class="e">mcrypt.modes_dir</td><td class="v"><i>no value</i></td><td class="v"><i>no value</i></td></tr>
</table><br />
<h2><a name="module_mhash">mhash</a></h2>
<table border="0" cellpadding="3" width="600">
<tr><td class="e">MHASH support </td><td class="v">Enabled </td></tr>
<tr><td class="e">MHASH API Version </td><td class="v">Emulated Support </td></tr>
</table><br />
<h2><a name="module_mongo">mongo</a></h2>
<table border="0" cellpadding="3" width="600">
<tr class="h"><th>MongoDB Support</th><th>enabled</th></tr>
<tr><td class="e">Version </td><td class="v">1.5.1 </td></tr>
<tr><td class="e">Streams Support </td><td class="v">enabled </td></tr>
<tr><td class="e">SSL Support </td><td class="v">disabled </td></tr>
<tr class="h"><th colspan="2">Supported Authentication Mechanisms</th></tr>
<tr><td class="e">MONGODB-CR (default) </td><td class="v">enabled </td></tr>
<tr><td class="e">MONGODB-X509 </td><td class="v">enabled </td></tr>
<tr><td class="e">GSSAPI (Kerberos) </td><td class="v">disabled </td></tr>
<tr><td class="e">PLAIN </td><td class="v">disabled </td></tr>
</table><br />
<table border="0" cellpadding="3" width="600">
<tr class="h"><th>Directive</th><th>Local Value</th><th>Master Value</th></tr>
<tr><td class="e">mongo.allow_empty_keys</td><td class="v">0</td><td class="v">0</td></tr>
<tr><td class="e">mongo.chunk_size</td><td class="v">261120</td><td class="v">261120</td></tr>
<tr><td class="e">mongo.cmd</td><td class="v">$</td><td class="v">$</td></tr>
<tr><td class="e">mongo.default_host</td><td class="v">localhost</td><td class="v">localhost</td></tr>
<tr><td class="e">mongo.default_port</td><td class="v">27017</td><td class="v">27017</td></tr>
<tr><td class="e">mongo.is_master_interval</td><td class="v">15</td><td class="v">15</td></tr>
<tr><td class="e">mongo.long_as_object</td><td class="v">0</td><td class="v">0</td></tr>
<tr><td class="e">mongo.native_long</td><td class="v">0</td><td class="v">0</td></tr>
<tr><td class="e">mongo.ping_interval</td><td class="v">5</td><td class="v">5</td></tr>
</table><br />
<h2><a name="module_mysql">mysql</a></h2>
<table border="0" cellpadding="3" width="600">
<tr class="h"><th>MySQL Support</th><th>enabled</th></tr>
<tr><td class="e">Active Persistent Links </td><td class="v">0 </td></tr>
<tr><td class="e">Active Links </td><td class="v">0 </td></tr>
<tr><td class="e">Client API version </td><td class="v">mysqlnd 5.0.11-dev - 20120503 - $Id: 15d5c781cfcad91193dceae1d2cdd127674ddb3e $ </td></tr>
</table><br />
<table border="0" cellpadding="3" width="600">
<tr class="h"><th>Directive</th><th>Local Value</th><th>Master Value</th></tr>
<tr><td class="e">mysql.allow_local_infile</td><td class="v">On</td><td class="v">On</td></tr>
<tr><td class="e">mysql.allow_persistent</td><td class="v">On</td><td class="v">On</td></tr>
<tr><td class="e">mysql.connect_timeout</td><td class="v">60</td><td class="v">60</td></tr>
<tr><td class="e">mysql.default_host</td><td class="v"><i>no value</i></td><td class="v"><i>no value</i></td></tr>
<tr><td class="e">mysql.default_password</td><td class="v"><i>no value</i></td><td class="v"><i>no value</i></td></tr>
<tr><td class="e">mysql.default_port</td><td class="v"><i>no value</i></td><td class="v"><i>no value</i></td></tr>
<tr><td class="e">mysql.default_socket</td><td class="v"><i>no value</i></td><td class="v"><i>no value</i></td></tr>
<tr><td class="e">mysql.default_user</td><td class="v"><i>no value</i></td><td class="v"><i>no value</i></td></tr>
<tr><td class="e">mysql.max_links</td><td class="v">Unlimited</td><td class="v">Unlimited</td></tr>
<tr><td class="e">mysql.max_persistent</td><td class="v">Unlimited</td><td class="v">Unlimited</td></tr>
<tr><td class="e">mysql.trace_mode</td><td class="v">Off</td><td class="v">Off</td></tr>
</table><br />
<h2><a name="module_mysqli">mysqli</a></h2>
<table border="0" cellpadding="3" width="600">
<tr class="h"><th>MysqlI Support</th><th>enabled</th></tr>
<tr><td class="e">Client API library version </td><td class="v">mysqlnd 5.0.11-dev - 20120503 - $Id: 15d5c781cfcad91193dceae1d2cdd127674ddb3e $ </td></tr>
<tr><td class="e">Active Persistent Links </td><td class="v">0 </td></tr>
<tr><td class="e">Inactive Persistent Links </td><td class="v">0 </td></tr>
<tr><td class="e">Active Links </td><td class="v">0 </td></tr>
</table><br />
<table border="0" cellpadding="3" width="600">
<tr class="h"><th>Directive</th><th>Local Value</th><th>Master Value</th></tr>
<tr><td class="e">mysqli.allow_local_infile</td><td class="v">On</td><td class="v">On</td></tr>
<tr><td class="e">mysqli.allow_persistent</td><td class="v">On</td><td class="v">On</td></tr>
<tr><td class="e">mysqli.default_host</td><td class="v"><i>no value</i></td><td class="v"><i>no value</i></td></tr>
<tr><td class="e">mysqli.default_port</td><td class="v">3306</td><td class="v">3306</td></tr>
<tr><td class="e">mysqli.default_pw</td><td class="v"><i>no value</i></td><td class="v"><i>no value</i></td></tr>
<tr><td class="e">mysqli.default_socket</td><td class="v"><i>no value</i></td><td class="v"><i>no value</i></td></tr>
<tr><td class="e">mysqli.default_user</td><td class="v"><i>no value</i></td><td class="v"><i>no value</i></td></tr>
<tr><td class="e">mysqli.max_links</td><td class="v">Unlimited</td><td class="v">Unlimited</td></tr>
<tr><td class="e">mysqli.max_persistent</td><td class="v">Unlimited</td><td class="v">Unlimited</td></tr>
<tr><td class="e">mysqli.reconnect</td><td class="v">Off</td><td class="v">Off</td></tr>
</table><br />
<h2><a name="module_mysqlnd">mysqlnd</a></h2>
<table border="0" cellpadding="3" width="600">
<tr class="h"><th>mysqlnd</th><th>enabled</th></tr>
<tr><td class="e">Version </td><td class="v">mysqlnd 5.0.11-dev - 20120503 - $Id: 15d5c781cfcad91193dceae1d2cdd127674ddb3e $ </td></tr>
<tr><td class="e">Compression </td><td class="v">supported </td></tr>
<tr><td class="e">core SSL </td><td class="v">supported </td></tr>
<tr><td class="e">extended SSL </td><td class="v">not supported </td></tr>
<tr><td class="e">Command buffer size </td><td class="v">4096 </td></tr>
<tr><td class="e">Read buffer size </td><td class="v">32768 </td></tr>
<tr><td class="e">Read timeout </td><td class="v">31536000 </td></tr>
<tr><td class="e">Collecting statistics </td><td class="v">Yes </td></tr>
<tr><td class="e">Collecting memory statistics </td><td class="v">Yes </td></tr>
<tr><td class="e">Tracing </td><td class="v">n/a </td></tr>
<tr><td class="e">Loaded plugins </td><td class="v">mysqlnd,debug_trace,auth_plugin_mysql_native_password,auth_plugin_mysql_clear_password </td></tr>
<tr><td class="e">API Extensions </td><td class="v">mysql,mysqli,pdo_mysql </td></tr>
</table><br />
<table border="0" cellpadding="3" width="600">
<tr class="h"><th>mysqlnd statistics</th><th> </th></tr>
<tr><td class="e">bytes_sent </td><td class="v">0 </td></tr>
<tr><td class="e">bytes_received </td><td class="v">0 </td></tr>
<tr><td class="e">packets_sent </td><td class="v">0 </td></tr>
<tr><td class="e">packets_received </td><td class="v">0 </td></tr>
<tr><td class="e">protocol_overhead_in </td><td class="v">0 </td></tr>
<tr><td class="e">protocol_overhead_out </td><td class="v">0 </td></tr>
<tr><td class="e">bytes_received_ok_packet </td><td class="v">0 </td></tr>
<tr><td class="e">bytes_received_eof_packet </td><td class="v">0 </td></tr>
<tr><td class="e">bytes_received_rset_header_packet </td><td class="v">0 </td></tr>
<tr><td class="e">bytes_received_rset_field_meta_packet </td><td class="v">0 </td></tr>
<tr><td class="e">bytes_received_rset_row_packet </td><td class="v">0 </td></tr>
<tr><td class="e">bytes_received_prepare_response_packet </td><td class="v">0 </td></tr>
<tr><td class="e">bytes_received_change_user_packet </td><td class="v">0 </td></tr>
<tr><td class="e">packets_sent_command </td><td class="v">0 </td></tr>
<tr><td class="e">packets_received_ok </td><td class="v">0 </td></tr>
<tr><td class="e">packets_received_eof </td><td class="v">0 </td></tr>
<tr><td class="e">packets_received_rset_header </td><td class="v">0 </td></tr>
<tr><td class="e">packets_received_rset_field_meta </td><td class="v">0 </td></tr>
<tr><td class="e">packets_received_rset_row </td><td class="v">0 </td></tr>
<tr><td class="e">packets_received_prepare_response </td><td class="v">0 </td></tr>
<tr><td class="e">packets_received_change_user </td><td class="v">0 </td></tr>
<tr><td class="e">result_set_queries </td><td class="v">0 </td></tr>
<tr><td class="e">non_result_set_queries </td><td class="v">0 </td></tr>
<tr><td class="e">no_index_used </td><td class="v">0 </td></tr>
<tr><td class="e">bad_index_used </td><td class="v">0 </td></tr>
<tr><td class="e">slow_queries </td><td class="v">0 </td></tr>
<tr><td class="e">buffered_sets </td><td class="v">0 </td></tr>
<tr><td class="e">unbuffered_sets </td><td class="v">0 </td></tr>
<tr><td class="e">ps_buffered_sets </td><td class="v">0 </td></tr>
<tr><td class="e">ps_unbuffered_sets </td><td class="v">0 </td></tr>
<tr><td class="e">flushed_normal_sets </td><td class="v">0 </td></tr>
<tr><td class="e">flushed_ps_sets </td><td class="v">0 </td></tr>
<tr><td class="e">ps_prepared_never_executed </td><td class="v">0 </td></tr>
<tr><td class="e">ps_prepared_once_executed </td><td class="v">0 </td></tr>
<tr><td class="e">rows_fetched_from_server_normal </td><td class="v">0 </td></tr>
<tr><td class="e">rows_fetched_from_server_ps </td><td class="v">0 </td></tr>
<tr><td class="e">rows_buffered_from_client_normal </td><td class="v">0 </td></tr>
<tr><td class="e">rows_buffered_from_client_ps </td><td class="v">0 </td></tr>
<tr><td class="e">rows_fetched_from_client_normal_buffered </td><td class="v">0 </td></tr>
<tr><td class="e">rows_fetched_from_client_normal_unbuffered </td><td class="v">0 </td></tr>
<tr><td class="e">rows_fetched_from_client_ps_buffered </td><td class="v">0 </td></tr>
<tr><td class="e">rows_fetched_from_client_ps_unbuffered </td><td class="v">0 </td></tr>
<tr><td class="e">rows_fetched_from_client_ps_cursor </td><td class="v">0 </td></tr>
<tr><td class="e">rows_affected_normal </td><td class="v">0 </td></tr>
<tr><td class="e">rows_affected_ps </td><td class="v">0 </td></tr>
<tr><td class="e">rows_skipped_normal </td><td class="v">0 </td></tr>
<tr><td class="e">rows_skipped_ps </td><td class="v">0 </td></tr>
<tr><td class="e">copy_on_write_saved </td><td class="v">0 </td></tr>
<tr><td class="e">copy_on_write_performed </td><td class="v">0 </td></tr>
<tr><td class="e">command_buffer_too_small </td><td class="v">0 </td></tr>
<tr><td class="e">connect_success </td><td class="v">0 </td></tr>
<tr><td class="e">connect_failure </td><td class="v">0 </td></tr>
<tr><td class="e">connection_reused </td><td class="v">0 </td></tr>
<tr><td class="e">reconnect </td><td class="v">0 </td></tr>
<tr><td class="e">pconnect_success </td><td class="v">0 </td></tr>
<tr><td class="e">active_connections </td><td class="v">0 </td></tr>
<tr><td class="e">active_persistent_connections </td><td class="v">0 </td></tr>
<tr><td class="e">explicit_close </td><td class="v">0 </td></tr>
<tr><td class="e">implicit_close </td><td class="v">0 </td></tr>
<tr><td class="e">disconnect_close </td><td class="v">0 </td></tr>
<tr><td class="e">in_middle_of_command_close </td><td class="v">0 </td></tr>
<tr><td class="e">explicit_free_result </td><td class="v">0 </td></tr>
<tr><td class="e">implicit_free_result </td><td class="v">0 </td></tr>
<tr><td class="e">explicit_stmt_close </td><td class="v">0 </td></tr>
<tr><td class="e">implicit_stmt_close </td><td class="v">0 </td></tr>
<tr><td class="e">mem_emalloc_count </td><td class="v">0 </td></tr>
<tr><td class="e">mem_emalloc_amount </td><td class="v">0 </td></tr>
<tr><td class="e">mem_ecalloc_count </td><td class="v">0 </td></tr>
<tr><td class="e">mem_ecalloc_amount </td><td class="v">0 </td></tr>
<tr><td class="e">mem_erealloc_count </td><td class="v">0 </td></tr>
<tr><td class="e">mem_erealloc_amount </td><td class="v">0 </td></tr>
<tr><td class="e">mem_efree_count </td><td class="v">0 </td></tr>
<tr><td class="e">mem_efree_amount </td><td class="v">0 </td></tr>
<tr><td class="e">mem_malloc_count </td><td class="v">0 </td></tr>
<tr><td class="e">mem_malloc_amount </td><td class="v">0 </td></tr>
<tr><td class="e">mem_calloc_count </td><td class="v">0 </td></tr>
<tr><td class="e">mem_calloc_amount </td><td class="v">0 </td></tr>
<tr><td class="e">mem_realloc_count </td><td class="v">0 </td></tr>
<tr><td class="e">mem_realloc_amount </td><td class="v">0 </td></tr>
<tr><td class="e">mem_free_count </td><td class="v">0 </td></tr>
<tr><td class="e">mem_free_amount </td><td class="v">0 </td></tr>
<tr><td class="e">mem_estrndup_count </td><td class="v">0 </td></tr>
<tr><td class="e">mem_strndup_count </td><td class="v">0 </td></tr>
<tr><td class="e">mem_estndup_count </td><td class="v">0 </td></tr>
<tr><td class="e">mem_strdup_count </td><td class="v">0 </td></tr>
<tr><td class="e">proto_text_fetched_null </td><td class="v">0 </td></tr>
<tr><td class="e">proto_text_fetched_bit </td><td class="v">0 </td></tr>
<tr><td class="e">proto_text_fetched_tinyint </td><td class="v">0 </td></tr>
<tr><td class="e">proto_text_fetched_short </td><td class="v">0 </td></tr>
<tr><td class="e">proto_text_fetched_int24 </td><td class="v">0 </td></tr>
<tr><td class="e">proto_text_fetched_int </td><td class="v">0 </td></tr>
<tr><td class="e">proto_text_fetched_bigint </td><td class="v">0 </td></tr>
<tr><td class="e">proto_text_fetched_decimal </td><td class="v">0 </td></tr>
<tr><td class="e">proto_text_fetched_float </td><td class="v">0 </td></tr>
<tr><td class="e">proto_text_fetched_double </td><td class="v">0 </td></tr>
<tr><td class="e">proto_text_fetched_date </td><td class="v">0 </td></tr>
<tr><td class="e">proto_text_fetched_year </td><td class="v">0 </td></tr>
<tr><td class="e">proto_text_fetched_time </td><td class="v">0 </td></tr>
<tr><td class="e">proto_text_fetched_datetime </td><td class="v">0 </td></tr>
<tr><td class="e">proto_text_fetched_timestamp </td><td class="v">0 </td></tr>
<tr><td class="e">proto_text_fetched_string </td><td class="v">0 </td></tr>
<tr><td class="e">proto_text_fetched_blob </td><td class="v">0 </td></tr>
<tr><td class="e">proto_text_fetched_enum </td><td class="v">0 </td></tr>
<tr><td class="e">proto_text_fetched_set </td><td class="v">0 </td></tr>
<tr><td class="e">proto_text_fetched_geometry </td><td class="v">0 </td></tr>
<tr><td class="e">proto_text_fetched_other </td><td class="v">0 </td></tr>
<tr><td class="e">proto_binary_fetched_null </td><td class="v">0 </td></tr>
<tr><td class="e">proto_binary_fetched_bit </td><td class="v">0 </td></tr>
<tr><td class="e">proto_binary_fetched_tinyint </td><td class="v">0 </td></tr>
<tr><td class="e">proto_binary_fetched_short </td><td class="v">0 </td></tr>
<tr><td class="e">proto_binary_fetched_int24 </td><td class="v">0 </td></tr>
<tr><td class="e">proto_binary_fetched_int </td><td class="v">0 </td></tr>
<tr><td class="e">proto_binary_fetched_bigint </td><td class="v">0 </td></tr>
<tr><td class="e">proto_binary_fetched_decimal </td><td class="v">0 </td></tr>
<tr><td class="e">proto_binary_fetched_float </td><td class="v">0 </td></tr>
<tr><td class="e">proto_binary_fetched_double </td><td class="v">0 </td></tr>
<tr><td class="e">proto_binary_fetched_date </td><td class="v">0 </td></tr>
<tr><td class="e">proto_binary_fetched_year </td><td class="v">0 </td></tr>
<tr><td class="e">proto_binary_fetched_time </td><td class="v">0 </td></tr>
<tr><td class="e">proto_binary_fetched_datetime </td><td class="v">0 </td></tr>
<tr><td class="e">proto_binary_fetched_timestamp </td><td class="v">0 </td></tr>
<tr><td class="e">proto_binary_fetched_string </td><td class="v">0 </td></tr>
<tr><td class="e">proto_binary_fetched_blob </td><td class="v">0 </td></tr>
<tr><td class="e">proto_binary_fetched_enum </td><td class="v">0 </td></tr>
<tr><td class="e">proto_binary_fetched_set </td><td class="v">0 </td></tr>
<tr><td class="e">proto_binary_fetched_geometry </td><td class="v">0 </td></tr>
<tr><td class="e">proto_binary_fetched_other </td><td class="v">0 </td></tr>
<tr><td class="e">init_command_executed_count </td><td class="v">0 </td></tr>
<tr><td class="e">init_command_failed_count </td><td class="v">0 </td></tr>
<tr><td class="e">com_quit </td><td class="v">0 </td></tr>
<tr><td class="e">com_init_db </td><td class="v">0 </td></tr>
<tr><td class="e">com_query </td><td class="v">0 </td></tr>
<tr><td class="e">com_field_list </td><td class="v">0 </td></tr>
<tr><td class="e">com_create_db </td><td class="v">0 </td></tr>
<tr><td class="e">com_drop_db </td><td class="v">0 </td></tr>
<tr><td class="e">com_refresh </td><td class="v">0 </td></tr>
<tr><td class="e">com_shutdown </td><td class="v">0 </td></tr>
<tr><td class="e">com_statistics </td><td class="v">0 </td></tr>
<tr><td class="e">com_process_info </td><td class="v">0 </td></tr>
<tr><td class="e">com_connect </td><td class="v">0 </td></tr>
<tr><td class="e">com_process_kill </td><td class="v">0 </td></tr>
<tr><td class="e">com_debug </td><td class="v">0 </td></tr>
<tr><td class="e">com_ping </td><td class="v">0 </td></tr>
<tr><td class="e">com_time </td><td class="v">0 </td></tr>
<tr><td class="e">com_delayed_insert </td><td class="v">0 </td></tr>
<tr><td class="e">com_change_user </td><td class="v">0 </td></tr>
<tr><td class="e">com_binlog_dump </td><td class="v">0 </td></tr>
<tr><td class="e">com_table_dump </td><td class="v">0 </td></tr>
<tr><td class="e">com_connect_out </td><td class="v">0 </td></tr>
<tr><td class="e">com_register_slave </td><td class="v">0 </td></tr>
<tr><td class="e">com_stmt_prepare </td><td class="v">0 </td></tr>
<tr><td class="e">com_stmt_execute </td><td class="v">0 </td></tr>
<tr><td class="e">com_stmt_send_long_data </td><td class="v">0 </td></tr>
<tr><td class="e">com_stmt_close </td><td class="v">0 </td></tr>
<tr><td class="e">com_stmt_reset </td><td class="v">0 </td></tr>
<tr><td class="e">com_stmt_set_option </td><td class="v">0 </td></tr>
<tr><td class="e">com_stmt_fetch </td><td class="v">0 </td></tr>
<tr><td class="e">com_deamon </td><td class="v">0 </td></tr>
<tr><td class="e">bytes_received_real_data_normal </td><td class="v">0 </td></tr>
<tr><td class="e">bytes_received_real_data_ps </td><td class="v">0 </td></tr>
</table><br />
<h2><a name="module_odbc">odbc</a></h2>
<table border="0" cellpadding="3" width="600">
<tr class="h"><th>ODBC Support</th><th>enabled</th></tr>
<tr><td class="e">Active Persistent Links </td><td class="v">0 </td></tr>
<tr><td class="e">Active Links </td><td class="v">0 </td></tr>
<tr><td class="e">ODBC library </td><td class="v">Win32 </td></tr>
</table><br />
<table border="0" cellpadding="3" width="600">
<tr class="h"><th>Directive</th><th>Local Value</th><th>Master Value</th></tr>
<tr><td class="e">odbc.allow_persistent</td><td class="v">On</td><td class="v">On</td></tr>
<tr><td class="e">odbc.check_persistent</td><td class="v">On</td><td class="v">On</td></tr>
<tr><td class="e">odbc.default_cursortype</td><td class="v">Static cursor</td><td class="v">Static cursor</td></tr>
<tr><td class="e">odbc.default_db</td><td class="v"><i>no value</i></td><td class="v"><i>no value</i></td></tr>
<tr><td class="e">odbc.default_pw</td><td class="v"><i>no value</i></td><td class="v"><i>no value</i></td></tr>
<tr><td class="e">odbc.default_user</td><td class="v"><i>no value</i></td><td class="v"><i>no value</i></td></tr>
<tr><td class="e">odbc.defaultbinmode</td><td class="v">return as is</td><td class="v">return as is</td></tr>
<tr><td class="e">odbc.defaultlrl</td><td class="v">return up to 4096 bytes</td><td class="v">return up to 4096 bytes</td></tr>
<tr><td class="e">odbc.max_links</td><td class="v">Unlimited</td><td class="v">Unlimited</td></tr>
<tr><td class="e">odbc.max_persistent</td><td class="v">Unlimited</td><td class="v">Unlimited</td></tr>
</table><br />
<h2><a name="module_openssl">openssl</a></h2>
<table border="0" cellpadding="3" width="600">
<tr><td class="e">OpenSSL support </td><td class="v">enabled </td></tr>
<tr><td class="e">OpenSSL Library Version </td><td class="v">OpenSSL 1.0.1l 15 Jan 2015 </td></tr>
<tr><td class="e">OpenSSL Header Version </td><td class="v">OpenSSL 1.0.1m 19 Mar 2015 </td></tr>
</table><br />
<h2><a name="module_pcre">pcre</a></h2>
<table border="0" cellpadding="3" width="600">
<tr><td class="e">PCRE (Perl Compatible Regular Expressions) Support </td><td class="v">enabled </td></tr>
<tr><td class="e">PCRE Library Version </td><td class="v">8.36 2014-09-26 </td></tr>
</table><br />
<table border="0" cellpadding="3" width="600">
<tr class="h"><th>Directive</th><th>Local Value</th><th>Master Value</th></tr>
<tr><td class="e">pcre.backtrack_limit</td><td class="v">1000000</td><td class="v">1000000</td></tr>
<tr><td class="e">pcre.recursion_limit</td><td class="v">100000</td><td class="v">100000</td></tr>
</table><br />
<h2><a name="module_PDO">PDO</a></h2>
<table border="0" cellpadding="3" width="600">
<tr class="h"><th>PDO support</th><th>enabled</th></tr>
<tr><td class="e">PDO drivers </td><td class="v">mysql, sqlite </td></tr>
</table><br />
<h2><a name="module_pdo_mysql">pdo_mysql</a></h2>
<table border="0" cellpadding="3" width="600">
<tr class="h"><th>PDO Driver for MySQL</th><th>enabled</th></tr>
<tr><td class="e">Client API version </td><td class="v">mysqlnd 5.0.11-dev - 20120503 - $Id: 15d5c781cfcad91193dceae1d2cdd127674ddb3e $ </td></tr>
</table><br />
<h2><a name="module_pdo_sqlite">pdo_sqlite</a></h2>
<table border="0" cellpadding="3" width="600">
<tr class="h"><th>PDO Driver for SQLite 3.x</th><th>enabled</th></tr>
<tr><td class="e">SQLite Library </td><td class="v">3.8.8.3 </td></tr>
</table><br />
<h2><a name="module_Phar">Phar</a></h2>
<table border="0" cellpadding="3" width="600">
<tr class="h"><th>Phar: PHP Archive support</th><th>enabled</th></tr>
<tr><td class="e">Phar EXT version </td><td class="v">2.0.2 </td></tr>
<tr><td class="e">Phar API version </td><td class="v">1.1.1 </td></tr>
<tr><td class="e">SVN revision </td><td class="v">$Id: e7d74296101f1ad1b4b7e5d81405e9576217d147 $ </td></tr>
<tr><td class="e">Phar-based phar archives </td><td class="v">enabled </td></tr>
<tr><td class="e">Tar-based phar archives </td><td class="v">enabled </td></tr>
<tr><td class="e">ZIP-based phar archives </td><td class="v">enabled </td></tr>
<tr><td class="e">gzip compression </td><td class="v">enabled </td></tr>
<tr><td class="e">bzip2 compression </td><td class="v">enabled </td></tr>
<tr><td class="e">OpenSSL support </td><td class="v">enabled </td></tr>
</table><br />
<table border="0" cellpadding="3" width="600">
<tr class="v"><td>
Phar based on pear/PHP_Archive, original concept by Davey Shafik.<br />Phar fully realized by Gregory Beaver and Marcus Boerger.<br />Portions of tar implementation Copyright (c) 2003-2009 Tim Kientzle.</td></tr>
</table><br />
<table border="0" cellpadding="3" width="600">
<tr class="h"><th>Directive</th><th>Local Value</th><th>Master Value</th></tr>
<tr><td class="e">phar.cache_list</td><td class="v"><i>no value</i></td><td class="v"><i>no value</i></td></tr>
<tr><td class="e">phar.readonly</td><td class="v">On</td><td class="v">On</td></tr>
<tr><td class="e">phar.require_hash</td><td class="v">On</td><td class="v">On</td></tr>
</table><br />
<h2><a name="module_Reflection">Reflection</a></h2>
<table border="0" cellpadding="3" width="600">
<tr class="h"><th>Reflection</th><th>enabled</th></tr>
<tr><td class="e">Version </td><td class="v">$Id: dc76d2fe0f3e9c327c1d4ca617d94e26c7fae98d $ </td></tr>
</table><br />
<h2><a name="module_session">session</a></h2>
<table border="0" cellpadding="3" width="600">
<tr><td class="e">Session Support </td><td class="v">enabled </td></tr>
<tr><td class="e">Registered save handlers </td><td class="v">files user  </td></tr>
<tr><td class="e">Registered serializer handlers </td><td class="v">php_serialize php php_binary wddx  </td></tr>
</table><br />
<table border="0" cellpadding="3" width="600">
<tr class="h"><th>Directive</th><th>Local Value</th><th>Master Value</th></tr>
<tr><td class="e">session.auto_start</td><td class="v">Off</td><td class="v">Off</td></tr>
<tr><td class="e">session.cache_expire</td><td class="v">180</td><td class="v">180</td></tr>
<tr><td class="e">session.cache_limiter</td><td class="v">nocache</td><td class="v">nocache</td></tr>
<tr><td class="e">session.cookie_domain</td><td class="v"><i>no value</i></td><td class="v"><i>no value</i></td></tr>
<tr><td class="e">session.cookie_httponly</td><td class="v">Off</td><td class="v">Off</td></tr>
<tr><td class="e">session.cookie_lifetime</td><td class="v">0</td><td class="v">0</td></tr>
<tr><td class="e">session.cookie_path</td><td class="v">/</td><td class="v">/</td></tr>
<tr><td class="e">session.cookie_secure</td><td class="v">Off</td><td class="v">Off</td></tr>
<tr><td class="e">session.entropy_file</td><td class="v"><i>no value</i></td><td class="v"><i>no value</i></td></tr>
<tr><td class="e">session.entropy_length</td><td class="v">0</td><td class="v">0</td></tr>
<tr><td class="e">session.gc_divisor</td><td class="v">1000</td><td class="v">1000</td></tr>
<tr><td class="e">session.gc_maxlifetime</td><td class="v">1440</td><td class="v">1440</td></tr>
<tr><td class="e">session.gc_probability</td><td class="v">1</td><td class="v">1</td></tr>
<tr><td class="e">session.hash_bits_per_character</td><td class="v">5</td><td class="v">5</td></tr>
<tr><td class="e">session.hash_function</td><td class="v">0</td><td class="v">0</td></tr>
<tr><td class="e">session.name</td><td class="v">PHPSESSID</td><td class="v">PHPSESSID</td></tr>
<tr><td class="e">session.referer_check</td><td class="v"><i>no value</i></td><td class="v"><i>no value</i></td></tr>
<tr><td class="e">session.save_handler</td><td class="v">files</td><td class="v">files</td></tr>
<tr><td class="e">session.save_path</td><td class="v"><i>no value</i></td><td class="v"><i>no value</i></td></tr>
<tr><td class="e">session.serialize_handler</td><td class="v">php</td><td class="v">php</td></tr>
<tr><td class="e">session.upload_progress.cleanup</td><td class="v">On</td><td class="v">On</td></tr>
<tr><td class="e">session.upload_progress.enabled</td><td class="v">On</td><td class="v">On</td></tr>
<tr><td class="e">session.upload_progress.freq</td><td class="v">1%</td><td class="v">1%</td></tr>
<tr><td class="e">session.upload_progress.min_freq</td><td class="v">1</td><td class="v">1</td></tr>
<tr><td class="e">session.upload_progress.name</td><td class="v">PHP_SESSION_UPLOAD_PROGRESS</td><td class="v">PHP_SESSION_UPLOAD_PROGRESS</td></tr>
<tr><td class="e">session.upload_progress.prefix</td><td class="v">upload_progress_</td><td class="v">upload_progress_</td></tr>
<tr><td class="e">session.use_cookies</td><td class="v">On</td><td class="v">On</td></tr>
<tr><td class="e">session.use_only_cookies</td><td class="v">On</td><td class="v">On</td></tr>
<tr><td class="e">session.use_strict_mode</td><td class="v">Off</td><td class="v">Off</td></tr>
<tr><td class="e">session.use_trans_sid</td><td class="v">0</td><td class="v">0</td></tr>
</table><br />
<h2><a name="module_SimpleXML">SimpleXML</a></h2>
<table border="0" cellpadding="3" width="600">
<tr class="h"><th>Simplexml support</th><th>enabled</th></tr>
<tr><td class="e">Revision </td><td class="v">$Id: e0de6ee7ef8280a12d77d76f1f971a944cbc8090 $ </td></tr>
<tr><td class="e">Schema support </td><td class="v">enabled </td></tr>
</table><br />
<h2><a name="module_soap">soap</a></h2>
<table border="0" cellpadding="3" width="600">
<tr><td class="e">Soap Client </td><td class="v">enabled </td></tr>
<tr><td class="e">Soap Server </td><td class="v">enabled </td></tr>
</table><br />
<table border="0" cellpadding="3" width="600">
<tr class="h"><th>Directive</th><th>Local Value</th><th>Master Value</th></tr>
<tr><td class="e">soap.wsdl_cache</td><td class="v">1</td><td class="v">1</td></tr>
<tr><td class="e">soap.wsdl_cache_dir</td><td class="v">/tmp</td><td class="v">/tmp</td></tr>
<tr><td class="e">soap.wsdl_cache_enabled</td><td class="v">1</td><td class="v">1</td></tr>
<tr><td class="e">soap.wsdl_cache_limit</td><td class="v">5</td><td class="v">5</td></tr>
<tr><td class="e">soap.wsdl_cache_ttl</td><td class="v">86400</td><td class="v">86400</td></tr>
</table><br />
<h2><a name="module_SPL">SPL</a></h2>
<table border="0" cellpadding="3" width="600">
<tr class="h"><th>SPL support</th><th>enabled</th></tr>
<tr><td class="e">Interfaces </td><td class="v">Countable, OuterIterator, RecursiveIterator, SeekableIterator, SplObserver, SplSubject </td></tr>
<tr><td class="e">Classes </td><td class="v">AppendIterator, ArrayIterator, ArrayObject, BadFunctionCallException, BadMethodCallException, CachingIterator, CallbackFilterIterator, DirectoryIterator, DomainException, EmptyIterator, FilesystemIterator, FilterIterator, GlobIterator, InfiniteIterator, InvalidArgumentException, IteratorIterator, LengthException, LimitIterator, LogicException, MultipleIterator, NoRewindIterator, OutOfBoundsException, OutOfRangeException, OverflowException, ParentIterator, RangeException, RecursiveArrayIterator, RecursiveCachingIterator, RecursiveCallbackFilterIterator, RecursiveDirectoryIterator, RecursiveFilterIterator, RecursiveIteratorIterator, RecursiveRegexIterator, RecursiveTreeIterator, RegexIterator, RuntimeException, SplDoublyLinkedList, SplFileInfo, SplFileObject, SplFixedArray, SplHeap, SplMinHeap, SplMaxHeap, SplObjectStorage, SplPriorityQueue, SplQueue, SplStack, SplTempFileObject, UnderflowException, UnexpectedValueException </td></tr>
</table><br />
<h2><a name="module_sqlite3">sqlite3</a></h2>
<table border="0" cellpadding="3" width="600">
<tr class="h"><th>SQLite3 support</th><th>enabled</th></tr>
<tr><td class="e">SQLite3 module version </td><td class="v">0.7-dev </td></tr>
<tr><td class="e">SQLite Library </td><td class="v">3.8.8.3 </td></tr>
</table><br />
<table border="0" cellpadding="3" width="600">
<tr class="h"><th>Directive</th><th>Local Value</th><th>Master Value</th></tr>
<tr><td class="e">sqlite3.extension_dir</td><td class="v"><i>no value</i></td><td class="v"><i>no value</i></td></tr>
</table><br />
<h2><a name="module_standard">standard</a></h2>
<table border="0" cellpadding="3" width="600">
<tr><td class="e">Dynamic Library Support </td><td class="v">enabled </td></tr>
<tr><td class="e">Internal Sendmail Support for Windows </td><td class="v">enabled </td></tr>
</table><br />
<table border="0" cellpadding="3" width="600">
<tr class="h"><th>Directive</th><th>Local Value</th><th>Master Value</th></tr>
<tr><td class="e">assert.active</td><td class="v">1</td><td class="v">1</td></tr>
<tr><td class="e">assert.bail</td><td class="v">0</td><td class="v">0</td></tr>
<tr><td class="e">assert.callback</td><td class="v"><i>no value</i></td><td class="v"><i>no value</i></td></tr>
<tr><td class="e">assert.quiet_eval</td><td class="v">0</td><td class="v">0</td></tr>
<tr><td class="e">assert.warning</td><td class="v">1</td><td class="v">1</td></tr>
<tr><td class="e">auto_detect_line_endings</td><td class="v">0</td><td class="v">0</td></tr>
<tr><td class="e">default_socket_timeout</td><td class="v">60</td><td class="v">60</td></tr>
<tr><td class="e">from</td><td class="v"><i>no value</i></td><td class="v"><i>no value</i></td></tr>
<tr><td class="e">url_rewriter.tags</td><td class="v">a=href,area=href,frame=src,input=src,form=fakeentry</td><td class="v">a=href,area=href,frame=src,input=src,form=fakeentry</td></tr>
<tr><td class="e">user_agent</td><td class="v"><i>no value</i></td><td class="v"><i>no value</i></td></tr>
</table><br />
<h2><a name="module_tokenizer">tokenizer</a></h2>
<table border="0" cellpadding="3" width="600">
<tr><td class="e">Tokenizer Support </td><td class="v">enabled </td></tr>
</table><br />
<h2><a name="module_wddx">wddx</a></h2>
<table border="0" cellpadding="3" width="600">
<tr class="h"><th>WDDX Support</th><th>enabled</th></tr>
<tr><td class="e">WDDX Session Serializer </td><td class="v">enabled </td></tr>
</table><br />
<h2><a name="module_xml">xml</a></h2>
<table border="0" cellpadding="3" width="600">
<tr><td class="e">XML Support </td><td class="v">active </td></tr>
<tr><td class="e">XML Namespace Support </td><td class="v">active </td></tr>
<tr><td class="e">libxml2 Version </td><td class="v">2.9.2 </td></tr>
</table><br />
<h2><a name="module_xmlreader">xmlreader</a></h2>
<table border="0" cellpadding="3" width="600">
<tr><td class="e">XMLReader </td><td class="v">enabled </td></tr>
</table><br />
<h2><a name="module_xmlrpc">xmlrpc</a></h2>
<table border="0" cellpadding="3" width="600">
<tr><td class="e">core library version </td><td class="v">xmlrpc-epi v. 0.51 </td></tr>
<tr><td class="e">php extension version </td><td class="v">0.51 </td></tr>
<tr><td class="e">author </td><td class="v">Dan Libby </td></tr>
<tr><td class="e">homepage </td><td class="v">http://xmlrpc-epi.sourceforge.net </td></tr>
<tr><td class="e">open sourced by </td><td class="v">Epinions.com </td></tr>
</table><br />
<h2><a name="module_xmlwriter">xmlwriter</a></h2>
<table border="0" cellpadding="3" width="600">
<tr><td class="e">XMLWriter </td><td class="v">enabled </td></tr>
</table><br />
<h2><a name="module_zip">zip</a></h2>
<table border="0" cellpadding="3" width="600">
<tr><td class="e">Zip </td><td class="v">enabled </td></tr>
<tr><td class="e">Extension Version </td><td class="v">$Id: c268059b54296d6ea21e8b1178f40a28a88f0024 $ </td></tr>
<tr><td class="e">Zip version </td><td class="v">1.11.0 </td></tr>
<tr><td class="e">Libzip version </td><td class="v">0.10.1 </td></tr>
</table><br />
<h2><a name="module_zlib">zlib</a></h2>
<table border="0" cellpadding="3" width="600">
<tr class="h"><th>ZLib Support</th><th>enabled</th></tr>
<tr><td class="e">Stream Wrapper </td><td class="v">compress.zlib:// </td></tr>
<tr><td class="e">Stream Filter </td><td class="v">zlib.inflate, zlib.deflate </td></tr>
<tr><td class="e">Compiled Version </td><td class="v">1.2.7.3 </td></tr>
<tr><td class="e">Linked Version </td><td class="v">1.2.7.3 </td></tr>
</table><br />
<table border="0" cellpadding="3" width="600">
<tr class="h"><th>Directive</th><th>Local Value</th><th>Master Value</th></tr>
<tr><td class="e">zlib.output_compression</td><td class="v">Off</td><td class="v">Off</td></tr>
<tr><td class="e">zlib.output_compression_level</td><td class="v">-1</td><td class="v">-1</td></tr>
<tr><td class="e">zlib.output_handler</td><td class="v"><i>no value</i></td><td class="v"><i>no value</i></td></tr>
</table><br />
<h2>Additional Modules</h2>
<table border="0" cellpadding="3" width="600">
<tr class="h"><th>Module Name</th></tr>
</table><br />
<h2>Environment</h2>
<table border="0" cellpadding="3" width="600">
<tr class="h"><th>Variable</th><th>Value</th></tr>
<tr><td class="e">ALLUSERSPROFILE </td><td class="v">C:\ProgramData </td></tr>
<tr><td class="e">APPDATA </td><td class="v">C:\Users\googlesky\AppData\Roaming </td></tr>
<tr><td class="e">CommonProgramFiles </td><td class="v">C:\Program Files (x86)\Common Files </td></tr>
<tr><td class="e">CommonProgramFiles(x86) </td><td class="v">C:\Program Files (x86)\Common Files </td></tr>
<tr><td class="e">CommonProgramW6432 </td><td class="v">C:\Program Files\Common Files </td></tr>
<tr><td class="e">COMPUTERNAME </td><td class="v">ZUVN-LAP </td></tr>
<tr><td class="e">ComSpec </td><td class="v">C:\WINDOWS\system32\cmd.exe </td></tr>
<tr><td class="e">HOMEDRIVE </td><td class="v">C: </td></tr>
<tr><td class="e">HOMEPATH </td><td class="v">\Users\googlesky </td></tr>
<tr><td class="e">LOCALAPPDATA </td><td class="v">C:\Users\googlesky\AppData\Local </td></tr>
<tr><td class="e">LOGONSERVER </td><td class="v">\\MicrosoftAccount </td></tr>
<tr><td class="e">MOZ_PLUGIN_PATH </td><td class="v">C:\Program Files (x86)\Foxit Software\Foxit Reader\plugins\ </td></tr>
<tr><td class="e">NUMBER_OF_PROCESSORS </td><td class="v">4 </td></tr>
<tr><td class="e">OS </td><td class="v">Windows_NT </td></tr>
<tr><td class="e">Path </td><td class="v">C:\ProgramData\Oracle\Java\javapath;C:\Program Files (x86)\Intel\iCLS Client\;C:\Program Files\Intel\iCLS Client\;C:\Windows\system32;C:\Windows;C:\Windows\System32\Wbem;C:\Windows\System32\WindowsPowerShell\v1.0\;C:\Program Files\Condusiv Technologies\ExpressCache\;C:\Program Files\Intel\Intel(R) Management Engine Components\DAL;C:\Program Files\Intel\Intel(R) Management Engine Components\IPT;C:\Program Files (x86)\Intel\Intel(R) Management Engine Components\DAL;C:\Program Files (x86)\Intel\Intel(R) Management Engine Components\IPT;C:\Program Files (x86)\Skype\Phone\;C:\Program Files (x86)\NVIDIA Corporation\PhysX\Common;C:\WINDOWS\system32;C:\WINDOWS;C:\WINDOWS\System32\Wbem;C:\WINDOWS\System32\WindowsPowerShell\v1.0\;C:\Program Files (x86)\Git\cmd;C:\Program Files (x86)\Git\bin;D:\Ampps\php;C:\ProgramData\ComposerSetup\bin </td></tr>
<tr><td class="e">PATHEXT </td><td class="v">.COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC </td></tr>
<tr><td class="e">PROCESSOR_ARCHITECTURE </td><td class="v">x86 </td></tr>
<tr><td class="e">PROCESSOR_ARCHITEW6432 </td><td class="v">AMD64 </td></tr>
<tr><td class="e">PROCESSOR_IDENTIFIER </td><td class="v">Intel64 Family 6 Model 58 Stepping 9, GenuineIntel </td></tr>
<tr><td class="e">PROCESSOR_LEVEL </td><td class="v">6 </td></tr>
<tr><td class="e">PROCESSOR_REVISION </td><td class="v">3a09 </td></tr>
<tr><td class="e">ProgramData </td><td class="v">C:\ProgramData </td></tr>
<tr><td class="e">ProgramFiles </td><td class="v">C:\Program Files (x86) </td></tr>
<tr><td class="e">ProgramFiles(x86) </td><td class="v">C:\Program Files (x86) </td></tr>
<tr><td class="e">ProgramW6432 </td><td class="v">C:\Program Files </td></tr>
<tr><td class="e">PSModulePath </td><td class="v">C:\WINDOWS\system32\WindowsPowerShell\v1.0\Modules\ </td></tr>
<tr><td class="e">PUBLIC </td><td class="v">C:\Users\Public </td></tr>
<tr><td class="e">SystemDrive </td><td class="v">C: </td></tr>
<tr><td class="e">SystemRoot </td><td class="v">C:\WINDOWS </td></tr>
<tr><td class="e">TEMP </td><td class="v">C:\Users\GOOGLE~1\AppData\Local\Temp </td></tr>
<tr><td class="e">TMP </td><td class="v">C:\Users\GOOGLE~1\AppData\Local\Temp </td></tr>
<tr><td class="e">USERDOMAIN </td><td class="v">ZUVN-LAP </td></tr>
<tr><td class="e">USERDOMAIN_ROAMINGPROFILE </td><td class="v">ZUVN-LAP </td></tr>
<tr><td class="e">USERNAME </td><td class="v">googlesky </td></tr>
<tr><td class="e">USERPROFILE </td><td class="v">C:\Users\googlesky </td></tr>
<tr><td class="e">windir </td><td class="v">C:\WINDOWS </td></tr>
<tr><td class="e">__COMPAT_LAYER </td><td class="v">RunAsAdmin Installer </td></tr>
<tr><td class="e">AP_PARENT_PID </td><td class="v">4780 </td></tr>
</table><br />
<h2>PHP Variables</h2>
<table border="0" cellpadding="3" width="600">
<tr class="h"><th>Variable</th><th>Value</th></tr>
<tr><td class="e">_REQUEST["do"]</td><td class="v">/install/requirement/sessionid_55ae92399b230/</td></tr>
<tr><td class="e">_REQUEST["core"]</td><td class="v"><pre>Array
(
    [security_token] =&gt; 
)
</pre></td></tr>
<tr><td class="e">_REQUEST["val"]</td><td class="v"><pre>Array
(
    [passed] =&gt; 1
)
</pre></td></tr>
<tr><td class="e">_GET["do"]</td><td class="v">/install/requirement/sessionid_55ae92399b230/</td></tr>
<tr><td class="e">_POST["core"]</td><td class="v"><pre>Array
(
    [security_token] =&gt; 
)
</pre></td></tr>
<tr><td class="e">_POST["val"]</td><td class="v"><pre>Array
(
    [passed] =&gt; 1
)
</pre></td></tr>
<tr><td class="e">_COOKIE["wp-settings-1"]</td><td class="v">mfold=o&amp;post_dfw=off&amp;editor=tinymce&amp;libraryContent=browse</td></tr>
<tr><td class="e">_COOKIE["wp-settings-time-1"]</td><td class="v">1436619445</td></tr>
<tr><td class="e">_COOKIE["wp_admin_time"]</td><td class="v">1</td></tr>
<tr><td class="e">_COOKIE["wordpress_logged_in_7b985cee66015d72a6b433b9ef02fddb"]</td><td class="v">googlesky|1438286891|Z27HbCRe52EkKYUx9826RtjU3bDm5SDgPRzWw3kmRJD|87d338bc289ec96618abb38ea2c53816939b9b4bbc1cf314ef5ac1bccd615bb8</td></tr>
<tr><td class="e">_COOKIE["redux_current_tab_get"]</td><td class="v">2</td></tr>
<tr><td class="e">_COOKIE["redux_current_tab"]</td><td class="v">1</td></tr>
<tr><td class="e">_COOKIE["phpfoxuser_id"]</td><td class="v">1</td></tr>
<tr><td class="e">_COOKIE["phpfoxuser_hash"]</td><td class="v">e378e9ff9d302440dc554d9159212405f79a2beaedface4e39</td></tr>
<tr><td class="e">_COOKIE["core2bc9user_id"]</td><td class="v">1</td></tr>
<tr><td class="e">_COOKIE["core2bc9user_hash"]</td><td class="v">8669a498b5a56f868ae83d82f95095379667bf866b619453fb</td></tr>
<tr><td class="e">_COOKIE["core2bc9macstyle"]</td><td class="v">default</td></tr>
<tr><td class="e">_COOKIE["core2bc9macnav"]</td><td class="v">default</td></tr>
<tr><td class="e">_COOKIE["core2bc9macnavpos"]</td><td class="v">top</td></tr>
<tr><td class="e">_COOKIE["PHPSESSID"]</td><td class="v">630iutkuo55ij1o586d4i7qh66</td></tr>
<tr><td class="e">_SERVER["TMP"]</td><td class="v">D:/Ampps/tmp</td></tr>
<tr><td class="e">_SERVER["HTTP_HOST"]</td><td class="v">snsp.vn</td></tr>
<tr><td class="e">_SERVER["HTTP_CONNECTION"]</td><td class="v">keep-alive</td></tr>
<tr><td class="e">_SERVER["CONTENT_LENGTH"]</td><td class="v">43</td></tr>
<tr><td class="e">_SERVER["HTTP_CACHE_CONTROL"]</td><td class="v">max-age=0</td></tr>
<tr><td class="e">_SERVER["HTTP_ACCEPT"]</td><td class="v">text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8</td></tr>
<tr><td class="e">_SERVER["HTTP_ORIGIN"]</td><td class="v">http://snsp.vn</td></tr>
<tr><td class="e">_SERVER["HTTP_USER_AGENT"]</td><td class="v">Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.89 Safari/537.36</td></tr>
<tr><td class="e">_SERVER["HTTP_HTTPS"]</td><td class="v">1</td></tr>
<tr><td class="e">_SERVER["CONTENT_TYPE"]</td><td class="v">application/x-www-form-urlencoded</td></tr>
<tr><td class="e">_SERVER["HTTP_DNT"]</td><td class="v">1</td></tr>
<tr><td class="e">_SERVER["HTTP_REFERER"]</td><td class="v">http://snsp.vn/install/index.php?do=/install/requirement/sessionid_55ae92399b230/</td></tr>
<tr><td class="e">_SERVER["HTTP_ACCEPT_ENCODING"]</td><td class="v">gzip, deflate</td></tr>
<tr><td class="e">_SERVER["HTTP_ACCEPT_LANGUAGE"]</td><td class="v">en-US,en;q=0.8,vi;q=0.6</td></tr>
<tr><td class="e">_SERVER["HTTP_COOKIE"]</td><td class="v">wp-settings-1=mfold%3Do%26post_dfw%3Doff%26editor%3Dtinymce%26libraryContent%3Dbrowse; wp-settings-time-1=1436619445; wp_admin_time=1; wordpress_logged_in_7b985cee66015d72a6b433b9ef02fddb=googlesky%7C1438286891%7CZ27HbCRe52EkKYUx9826RtjU3bDm5SDgPRzWw3kmRJD%7C87d338bc289ec96618abb38ea2c53816939b9b4bbc1cf314ef5ac1bccd615bb8; redux_current_tab_get=2; redux_current_tab=1; phpfoxuser_id=1; phpfoxuser_hash=e378e9ff9d302440dc554d9159212405f79a2beaedface4e39; core2bc9user_id=1; core2bc9user_hash=8669a498b5a56f868ae83d82f95095379667bf866b619453fb; core2bc9macstyle=default; core2bc9macnav=default; core2bc9macnavpos=top; PHPSESSID=630iutkuo55ij1o586d4i7qh66</td></tr>
<tr><td class="e">_SERVER["PATH"]</td><td class="v">C:\ProgramData\Oracle\Java\javapath;C:\Program Files (x86)\Intel\iCLS Client\;C:\Program Files\Intel\iCLS Client\;C:\Windows\system32;C:\Windows;C:\Windows\System32\Wbem;C:\Windows\System32\WindowsPowerShell\v1.0\;C:\Program Files\Condusiv Technologies\ExpressCache\;C:\Program Files\Intel\Intel(R) Management Engine Components\DAL;C:\Program Files\Intel\Intel(R) Management Engine Components\IPT;C:\Program Files (x86)\Intel\Intel(R) Management Engine Components\DAL;C:\Program Files (x86)\Intel\Intel(R) Management Engine Components\IPT;C:\Program Files (x86)\Skype\Phone\;C:\Program Files (x86)\NVIDIA Corporation\PhysX\Common;C:\WINDOWS\system32;C:\WINDOWS;C:\WINDOWS\System32\Wbem;C:\WINDOWS\System32\WindowsPowerShell\v1.0\;C:\Program Files (x86)\Git\cmd;C:\Program Files (x86)\Git\bin;D:\Ampps\php;C:\ProgramData\ComposerSetup\bin</td></tr>
<tr><td class="e">_SERVER["SystemRoot"]</td><td class="v">C:\WINDOWS</td></tr>
<tr><td class="e">_SERVER["COMSPEC"]</td><td class="v">C:\WINDOWS\system32\cmd.exe</td></tr>
<tr><td class="e">_SERVER["PATHEXT"]</td><td class="v">.COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC</td></tr>
<tr><td class="e">_SERVER["WINDIR"]</td><td class="v">C:\WINDOWS</td></tr>
<tr><td class="e">_SERVER["SERVER_SIGNATURE"]</td><td class="v"><i>no value</i></td></tr>
<tr><td class="e">_SERVER["SERVER_SOFTWARE"]</td><td class="v">Apache/2.4.12 (Win32) OpenSSL/1.0.1l PHP/5.5.25 mod_wsgi/3.5 Python/2.7.9</td></tr>
<tr><td class="e">_SERVER["SERVER_NAME"]</td><td class="v">snsp.vn</td></tr>
<tr><td class="e">_SERVER["SERVER_ADDR"]</td><td class="v">127.0.0.1</td></tr>
<tr><td class="e">_SERVER["SERVER_PORT"]</td><td class="v">80</td></tr>
<tr><td class="e">_SERVER["REMOTE_ADDR"]</td><td class="v">127.0.0.1</td></tr>
<tr><td class="e">_SERVER["DOCUMENT_ROOT"]</td><td class="v">D:/Ampps/www/snsp.vn</td></tr>
<tr><td class="e">_SERVER["REQUEST_SCHEME"]</td><td class="v">http</td></tr>
<tr><td class="e">_SERVER["CONTEXT_PREFIX"]</td><td class="v"><i>no value</i></td></tr>
<tr><td class="e">_SERVER["CONTEXT_DOCUMENT_ROOT"]</td><td class="v">D:/Ampps/www/snsp.vn</td></tr>
<tr><td class="e">_SERVER["SERVER_ADMIN"]</td><td class="v">admin@localhost</td></tr>
<tr><td class="e">_SERVER["SCRIPT_FILENAME"]</td><td class="v">D:/Ampps/www/snsp.vn/install/index.php</td></tr>
<tr><td class="e">_SERVER["REMOTE_PORT"]</td><td class="v">54994</td></tr>
<tr><td class="e">_SERVER["GATEWAY_INTERFACE"]</td><td class="v">CGI/1.1</td></tr>
<tr><td class="e">_SERVER["SERVER_PROTOCOL"]</td><td class="v">HTTP/1.1</td></tr>
<tr><td class="e">_SERVER["REQUEST_METHOD"]</td><td class="v">POST</td></tr>
<tr><td class="e">_SERVER["QUERY_STRING"]</td><td class="v">do=/install/requirement/sessionid_55ae92399b230/</td></tr>
<tr><td class="e">_SERVER["REQUEST_URI"]</td><td class="v">/install/index.php?do=/install/requirement/sessionid_55ae92399b230/</td></tr>
<tr><td class="e">_SERVER["SCRIPT_NAME"]</td><td class="v">/install/index.php</td></tr>
<tr><td class="e">_SERVER["PHP_SELF"]</td><td class="v">/install/index.php</td></tr>
<tr><td class="e">_SERVER["REQUEST_TIME_FLOAT"]</td><td class="v">1437504090.673</td></tr>
<tr><td class="e">_SERVER["REQUEST_TIME"]</td><td class="v">1437504090</td></tr>
</table><br />
<hr />
<h1>PHP Credits</h1>
<table border="0" cellpadding="3" width="600">
<tr class="h"><th>PHP Group</th></tr>
<tr><td class="e">Thies C. Arntzen, Stig Bakken, Shane Caraveo, Andi Gutmans, Rasmus Lerdorf, Sam Ruby, Sascha Schumann, Zeev Suraski, Jim Winstead, Andrei Zmievski </td></tr>
</table><br />
<table border="0" cellpadding="3" width="600">
<tr class="h"><th>Language Design &amp; Concept</th></tr>
<tr><td class="e">Andi Gutmans, Rasmus Lerdorf, Zeev Suraski, Marcus Boerger </td></tr>
</table><br />
<table border="0" cellpadding="3" width="600">
<tr class="h"><th colspan="2">PHP Authors</th></tr>
<tr class="h"><th>Contribution</th><th>Authors</th></tr>
<tr><td class="e">Zend Scripting Language Engine </td><td class="v">Andi Gutmans, Zeev Suraski, Stanislav Malyshev, Marcus Boerger, Dmitry Stogov </td></tr>
<tr><td class="e">Extension Module API </td><td class="v">Andi Gutmans, Zeev Suraski, Andrei Zmievski </td></tr>
<tr><td class="e">UNIX Build and Modularization </td><td class="v">Stig Bakken, Sascha Schumann, Jani Taskinen </td></tr>
<tr><td class="e">Windows Port </td><td class="v">Shane Caraveo, Zeev Suraski, Wez Furlong, Pierre-Alain Joye </td></tr>
<tr><td class="e">Server API (SAPI) Abstraction Layer </td><td class="v">Andi Gutmans, Shane Caraveo, Zeev Suraski </td></tr>
<tr><td class="e">Streams Abstraction Layer </td><td class="v">Wez Furlong, Sara Golemon </td></tr>
<tr><td class="e">PHP Data Objects Layer </td><td class="v">Wez Furlong, Marcus Boerger, Sterling Hughes, George Schlossnagle, Ilia Alshanetsky </td></tr>
<tr><td class="e">Output Handler </td><td class="v">Zeev Suraski, Thies C. Arntzen, Marcus Boerger, Michael Wallner </td></tr>
</table><br />
<table border="0" cellpadding="3" width="600">
<tr class="h"><th colspan="2">SAPI Modules</th></tr>
<tr class="h"><th>Contribution</th><th>Authors</th></tr>
<tr><td class="e">AOLserver </td><td class="v">Sascha Schumann </td></tr>
<tr><td class="e">Apache 1.3 (apache_hooks) </td><td class="v">Rasmus Lerdorf, Zeev Suraski, Stig Bakken, David Sklar, George Schlossnagle, Lukas Schroeder </td></tr>
<tr><td class="e">Apache 1.3 </td><td class="v">Rasmus Lerdorf, Zeev Suraski, Stig Bakken, David Sklar </td></tr>
<tr><td class="e">Apache 2.0 Filter </td><td class="v">Sascha Schumann, Aaron Bannert </td></tr>
<tr><td class="e">Apache 2.0 Handler </td><td class="v">Ian Holsman, Justin Erenkrantz (based on Apache 2.0 Filter code) </td></tr>
<tr><td class="e">Caudium / Roxen </td><td class="v">David Hedbor </td></tr>
<tr><td class="e">CGI / FastCGI </td><td class="v">Rasmus Lerdorf, Stig Bakken, Shane Caraveo, Dmitry Stogov </td></tr>
<tr><td class="e">CLI </td><td class="v">Edin Kadribasic, Marcus Boerger, Johannes Schlueter, Moriyoshi Koizumi, Xinchen Hui </td></tr>
<tr><td class="e">Continuity </td><td class="v">Alex Leigh (based on nsapi code) </td></tr>
<tr><td class="e">Embed </td><td class="v">Edin Kadribasic </td></tr>
<tr><td class="e">FastCGI Process Manager </td><td class="v">Andrei Nigmatulin, dreamcat4, Antony Dovgal, Jerome Loyet </td></tr>
<tr><td class="e">ISAPI </td><td class="v">Andi Gutmans, Zeev Suraski </td></tr>
<tr><td class="e">litespeed </td><td class="v">George Wang </td></tr>
<tr><td class="e">NSAPI </td><td class="v">Jayakumar Muthukumarasamy, Uwe Schindler </td></tr>
<tr><td class="e">phttpd </td><td class="v">Thies C. Arntzen </td></tr>
<tr><td class="e">pi3web </td><td class="v">Holger Zimmermann </td></tr>
<tr><td class="e">Sendmail Milter </td><td class="v">Harald Radi </td></tr>
<tr><td class="e">thttpd </td><td class="v">Sascha Schumann </td></tr>
<tr><td class="e">tux </td><td class="v">Sascha Schumann </td></tr>
<tr><td class="e">WebJames </td><td class="v">Alex Waugh </td></tr>
</table><br />
<table border="0" cellpadding="3" width="600">
<tr class="h"><th colspan="2">Module Authors</th></tr>
<tr class="h"><th>Module</th><th>Authors</th></tr>
<tr><td class="e">BC Math </td><td class="v">Andi Gutmans </td></tr>
<tr><td class="e">Bzip2 </td><td class="v">Sterling Hughes </td></tr>
<tr><td class="e">Calendar </td><td class="v">Shane Caraveo, Colin Viebrock, Hartmut Holzgraefe, Wez Furlong </td></tr>
<tr><td class="e">COM and .Net </td><td class="v">Wez Furlong </td></tr>
<tr><td class="e">ctype </td><td class="v">Hartmut Holzgraefe </td></tr>
<tr><td class="e">cURL </td><td class="v">Sterling Hughes </td></tr>
<tr><td class="e">Date/Time Support </td><td class="v">Derick Rethans </td></tr>
<tr><td class="e">DB-LIB (MS SQL, Sybase) </td><td class="v">Wez Furlong, Frank M. Kromann </td></tr>
<tr><td class="e">DBA </td><td class="v">Sascha Schumann, Marcus Boerger </td></tr>
<tr><td class="e">DOM </td><td class="v">Christian Stocker, Rob Richards, Marcus Boerger </td></tr>
<tr><td class="e">enchant </td><td class="v">Pierre-Alain Joye, Ilia Alshanetsky </td></tr>
<tr><td class="e">ereg </td><td class="v">Rasmus Lerdorf, Jim Winstead, Jaakko Hyvätti </td></tr>
<tr><td class="e">EXIF </td><td class="v">Rasmus Lerdorf, Marcus Boerger </td></tr>
<tr><td class="e">fileinfo </td><td class="v">Ilia Alshanetsky, Pierre Alain Joye, Scott MacVicar, Derick Rethans </td></tr>
<tr><td class="e">Firebird/InterBase driver for PDO </td><td class="v">Ard Biesheuvel </td></tr>
<tr><td class="e">FTP </td><td class="v">Stefan Esser, Andrew Skalski </td></tr>
<tr><td class="e">GD imaging </td><td class="v">Rasmus Lerdorf, Stig Bakken, Jim Winstead, Jouni Ahto, Ilia Alshanetsky, Pierre-Alain Joye, Marcus Boerger </td></tr>
<tr><td class="e">GetText </td><td class="v">Alex Plotnick </td></tr>
<tr><td class="e">GNU GMP support </td><td class="v">Stanislav Malyshev </td></tr>
<tr><td class="e">Iconv </td><td class="v">Rui Hirokawa, Stig Bakken, Moriyoshi Koizumi  </td></tr>
<tr><td class="e">IMAP </td><td class="v">Rex Logan, Mark Musone, Brian Wang, Kaj-Michael Lang, Antoni Pamies Olive, Rasmus Lerdorf, Andrew Skalski, Chuck Hagenbuch, Daniel R Kalowsky </td></tr>
<tr><td class="e">Input Filter </td><td class="v">Rasmus Lerdorf, Derick Rethans, Pierre-Alain Joye, Ilia Alshanetsky </td></tr>
<tr><td class="e">InterBase </td><td class="v">Jouni Ahto, Andrew Avdeev, Ard Biesheuvel </td></tr>
<tr><td class="e">Internationalization </td><td class="v">Ed Batutis, Vladimir Iordanov, Dmitry Lakhtyuk, Stanislav Malyshev, Vadim Savchuk, Kirti Velankar </td></tr>
<tr><td class="e">JSON </td><td class="v">Omar Kilani, Scott MacVicar </td></tr>
<tr><td class="e">LDAP </td><td class="v">Amitay Isaacs, Eric Warnke, Rasmus Lerdorf, Gerrit Thomson, Stig Venaas </td></tr>
<tr><td class="e">LIBXML </td><td class="v">Christian Stocker, Rob Richards, Marcus Boerger, Wez Furlong, Shane Caraveo </td></tr>
<tr><td class="e">mcrypt </td><td class="v">Sascha Schumann, Derick Rethans </td></tr>
<tr><td class="e">MS SQL </td><td class="v">Frank M. Kromann </td></tr>
<tr><td class="e">Multibyte String Functions </td><td class="v">Tsukada Takuya, Rui Hirokawa </td></tr>
<tr><td class="e">MySQL driver for PDO </td><td class="v">George Schlossnagle, Wez Furlong, Ilia Alshanetsky, Johannes Schlueter </td></tr>
<tr><td class="e">MySQL </td><td class="v">Zeev Suraski, Zak Greant, Georg Richter, Andrey Hristov </td></tr>
<tr><td class="e">MySQLi </td><td class="v">Zak Greant, Georg Richter, Andrey Hristov, Ulf Wendel </td></tr>
<tr><td class="e">MySQLnd </td><td class="v">Andrey Hristov, Ulf Wendel, Georg Richter, Johannes Schlüter </td></tr>
<tr><td class="e">OCI8 </td><td class="v">Stig Bakken, Thies C. Arntzen, Andy Sautins, David Benson, Maxim Maletsky, Harald Radi, Antony Dovgal, Andi Gutmans, Wez Furlong, Christopher Jones, Oracle Corporation </td></tr>
<tr><td class="e">ODBC driver for PDO </td><td class="v">Wez Furlong </td></tr>
<tr><td class="e">ODBC </td><td class="v">Stig Bakken, Andreas Karajannis, Frank M. Kromann, Daniel R. Kalowsky </td></tr>
<tr><td class="e">OpenSSL </td><td class="v">Stig Venaas, Wez Furlong, Sascha Kettler, Scott MacVicar </td></tr>
<tr><td class="e">Oracle (OCI) driver for PDO </td><td class="v">Wez Furlong </td></tr>
<tr><td class="e">pcntl </td><td class="v">Jason Greene, Arnaud Le Blanc </td></tr>
<tr><td class="e">Perl Compatible Regexps </td><td class="v">Andrei Zmievski </td></tr>
<tr><td class="e">PHP Archive </td><td class="v">Gregory Beaver, Marcus Boerger </td></tr>
<tr><td class="e">PHP Data Objects </td><td class="v">Wez Furlong, Marcus Boerger, Sterling Hughes, George Schlossnagle, Ilia Alshanetsky </td></tr>
<tr><td class="e">PHP hash </td><td class="v">Sara Golemon, Rasmus Lerdorf, Stefan Esser, Michael Wallner, Scott MacVicar </td></tr>
<tr><td class="e">Posix </td><td class="v">Kristian Koehntopp </td></tr>
<tr><td class="e">PostgreSQL driver for PDO </td><td class="v">Edin Kadribasic, Ilia Alshanetsky </td></tr>
<tr><td class="e">PostgreSQL </td><td class="v">Jouni Ahto, Zeev Suraski, Yasuo Ohgaki, Chris Kings-Lynne </td></tr>
<tr><td class="e">Pspell </td><td class="v">Vlad Krupin </td></tr>
<tr><td class="e">Readline </td><td class="v">Thies C. Arntzen </td></tr>
<tr><td class="e">Recode </td><td class="v">Kristian Koehntopp </td></tr>
<tr><td class="e">Reflection </td><td class="v">Marcus Boerger, Timm Friebe, George Schlossnagle, Andrei Zmievski, Johannes Schlueter </td></tr>
<tr><td class="e">Sessions </td><td class="v">Sascha Schumann, Andrei Zmievski </td></tr>
<tr><td class="e">Shared Memory Operations </td><td class="v">Slava Poliakov, Ilia Alshanetsky </td></tr>
<tr><td class="e">SimpleXML </td><td class="v">Sterling Hughes, Marcus Boerger, Rob Richards </td></tr>
<tr><td class="e">SNMP </td><td class="v">Rasmus Lerdorf, Harrie Hazewinkel, Mike Jackson, Steven Lawrance, Johann Hanne, Boris Lytochkin </td></tr>
<tr><td class="e">SOAP </td><td class="v">Brad Lafountain, Shane Caraveo, Dmitry Stogov </td></tr>
<tr><td class="e">Sockets </td><td class="v">Chris Vandomelen, Sterling Hughes, Daniel Beulshausen, Jason Greene </td></tr>
<tr><td class="e">SPL </td><td class="v">Marcus Boerger, Etienne Kneuss </td></tr>
<tr><td class="e">SQLite 3.x driver for PDO </td><td class="v">Wez Furlong </td></tr>
<tr><td class="e">SQLite3 </td><td class="v">Scott MacVicar, Ilia Alshanetsky, Brad Dewar </td></tr>
<tr><td class="e">Sybase-CT </td><td class="v">Zeev Suraski, Tom May, Timm Friebe </td></tr>
<tr><td class="e">System V Message based IPC </td><td class="v">Wez Furlong </td></tr>
<tr><td class="e">System V Semaphores </td><td class="v">Tom May </td></tr>
<tr><td class="e">System V Shared Memory </td><td class="v">Christian Cartus </td></tr>
<tr><td class="e">tidy </td><td class="v">John Coggeshall, Ilia Alshanetsky </td></tr>
<tr><td class="e">tokenizer </td><td class="v">Andrei Zmievski, Johannes Schlueter </td></tr>
<tr><td class="e">WDDX </td><td class="v">Andrei Zmievski </td></tr>
<tr><td class="e">XML </td><td class="v">Stig Bakken, Thies C. Arntzen, Sterling Hughes </td></tr>
<tr><td class="e">XMLReader </td><td class="v">Rob Richards </td></tr>
<tr><td class="e">xmlrpc </td><td class="v">Dan Libby </td></tr>
<tr><td class="e">XMLWriter </td><td class="v">Rob Richards, Pierre-Alain Joye </td></tr>
<tr><td class="e">XSL </td><td class="v">Christian Stocker, Rob Richards </td></tr>
<tr><td class="e">Zip </td><td class="v">Pierre-Alain Joye </td></tr>
<tr><td class="e">Zlib </td><td class="v">Rasmus Lerdorf, Stefan Roehrich, Zeev Suraski, Jade Nicoletti, Michael Wallner </td></tr>
</table><br />
<table border="0" cellpadding="3" width="600">
<tr class="h"><th colspan="2">PHP Documentation</th></tr>
<tr><td class="e">Authors </td><td class="v">Mehdi Achour, Friedhelm Betz, Antony Dovgal, Nuno Lopes, Hannes Magnusson, Georg Richter, Damien Seguy, Jakub Vrana </td></tr>
<tr><td class="e">Editor </td><td class="v">Philip Olson </td></tr>
<tr><td class="e">User Note Maintainers </td><td class="v">Daniel P. Brown, Thiago Henrique Pojda </td></tr>
<tr><td class="e">Other Contributors </td><td class="v">Previously active authors, editors and other contributors are listed in the manual. </td></tr>
</table><br />
<table border="0" cellpadding="3" width="600">
<tr class="h"><th>PHP Quality Assurance Team</th></tr>
<tr><td class="e">Ilia Alshanetsky, Joerg Behrens, Antony Dovgal, Stefan Esser, Moriyoshi Koizumi, Magnus Maatta, Sebastian Nohn, Derick Rethans, Melvyn Sopacua, Jani Taskinen, Pierre-Alain Joye, Dmitry Stogov, Felipe Pena, David Soria Parra </td></tr>
</table><br />
<table border="0" cellpadding="3" width="600">
<tr class="h"><th colspan="2">Websites and Infrastructure team</th></tr>
<tr><td class="e">PHP Websites Team </td><td class="v">Rasmus Lerdorf, Hannes Magnusson, Philip Olson, Lukas Kahwe Smith, Pierre-Alain Joye, Kalle Sommer Nielsen </td></tr>
<tr><td class="e">Event Maintainers </td><td class="v">Damien Seguy, Daniel P. Brown </td></tr>
<tr><td class="e">Network Infrastructure </td><td class="v">Daniel P. Brown </td></tr>
<tr><td class="e">Windows Infrastructure </td><td class="v">Alex Schoenmaker </td></tr>
</table><br />
<h2>PHP License</h2>
<table border="0" cellpadding="3" width="600">
<tr class="v"><td>
<p>
This program is free software; you can redistribute it and/or modify it under the terms of the PHP License as published by the PHP Group and included in the distribution in the file:  LICENSE
</p>
<p>This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
</p>
<p>If you did not receive a copy of the PHP license, or have any questions about PHP licensing, please contact license@php.net.
</p>
</td></tr>
</table><br />
</div></body></html>