
<!DOCTYPE html>
<!--[if !IE]><!-->
<html lang="$ContentLocale">
<!--<![endif]-->
<!--[if IE 6 ]><html lang="$ContentLocale" class="ie ie6"><![endif]-->
<!--[if IE 7 ]><html lang="$ContentLocale" class="ie ie7"><![endif]-->
<!--[if IE 8 ]><html lang="$ContentLocale" class="ie ie8"><![endif]-->
<head>
        	<% base_tag %>
			<title><% if $MetaTitle %>$MetaTitle<% else %>$Title<% end_if %> &raquo; $SiteConfig.Title</title>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
			$MetaTags(false)
			<!--[if lt IE 9]>
			<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
			<![endif]--> 


        <!-- Favicon -->
       <link rel="shortcut icon" href="themes/jeoffy/images/gabbys.ico" />
 

        
</head>


<body data-spy="scroll" data-target=".navbar" data-offset="51" class="$ClassName.ShortName<% if not $Menu(2) %> no-sidebar<% end_if %>" <% if $i18nScriptDirection %>dir="$i18nScriptDirection"<% end_if %>>

	<div id="app" > 
		 <% include Header %> 
		 $Layout

	 
 		<% include Footer %> 
	</div> 

</body>
</html>
 