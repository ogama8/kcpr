<html>
<head>
   {if isset($title)}<title>{$title}</title>{/if}
   {foreach from=$stylesheets item=stylesheet}
      <link rel="stylesheet" type="text/css" href="/templates/css/{$stylesheet}" />
   {/foreach}
</head>
<body> 

<div id="headerContainer">
   {foreach from=$header item=template}
      {include file=$template}
   {/foreach}
</div>

<div id="contentContainer">

   {if count($sidebar)}
   <div id="sidebarContainer">
   {foreach from=$sidebar item=template key=num}
      <div class="sidebar">{include file=$template}</div>
      {if $num != count($sidebar)}<hr noshade />{/if}
   {/foreach}
   </div>
   {/if}

   <div id="mainContainer" {if $fullWidth}class="fullWidth"{/if}>
   {foreach from=$main item=template}
      <div class="main">{include file=$template}</div>
   {/foreach}
   </div>

   <div class="clearer"></div>
</div>

<div id="footerContainer">
   {foreach from=$footer item=template}
      {include file=$template}
   {/foreach}
</div>

{foreach from=$scripts item=script}
   <script type="text/javascript" src="/templates/js/{$script}"></script>
{/foreach}
</body>
</html>
