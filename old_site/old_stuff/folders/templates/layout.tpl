<html>
   <body> 
      <div id="headerContainer">
         {foreach from=$header item=template}
            {include file=$template}
         {/foreach}
      </div>

      <div id="mainContainer">
         {foreach from=$main item=template}
            {include file=$template}
         {/foreach}
      </div>

      <div id="footerContainer">
         {foreach from=$footer item=template}
            {include file=$template}
         {/foreach}
      </div>

      {foreach from=$scripts item=script}
         <script type="text/javascript" src="/templates/js/{$script}"></script>
      {/foreach}

      {foreach from=$stylesheets item=stylesheet}
         <link rel="stylesheet" type="text/css" href="/templates/css/{$stylesheet}"></script>
      {/foreach}
   </body>
</html>
