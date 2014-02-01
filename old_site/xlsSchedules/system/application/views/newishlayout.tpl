<html>
<head>
   {if isset($title)}<title>KCPR 93.1fm - {$title}</title>{/if}

   {* This is the easiest way to add global scripts/styles *} 
   <link href="/ci/css/base.css" rel="stylesheet" type="text/css">
   {$_styles}

</head>
<body> 

<div id="headerContainer">
   <div id="header">
      <div id="picture">

      {if !isset($section)}{assign var="section" value=""}{/if}
      <ul class="headerList">
         <li><a 
         {if $active == "listen"}class="active"{/if}
          href="{URI page="listen"}">Listen Online</a>
         </li>

         <li><a href="{URI page="schedule"}"
          {if $active == "schedule"}class="active"{/if}
          >Schedule </a>
         </li>


         <li class="gap"><a 
          {if $active == "charts"}class="active"{/if}
          href="{URI page="charts"}">Charts </a>
         </li>

         <li><a 
          {if $active == "contact"}class="active"{/if}
          href="{URI page="contact"}">Contact </a>
         </li>

         <li><a 
          {if $active == "about"}class="active"{/if}
          href="{URI page="about"}"> About </a>
         </li>
      </ul>
      <div class="clearer"></div>
      </div>
   </div>
</div>

<div id="contentContainer">

   {if isset($sidebar)}
      <div id="sidebarContainer">
         {$sidebar}
      </div>
   {/if}

   <div id="mainContainer" {if $fullWidth}class="fullWidth"{/if}>
      {$content}
   </div>

   <div class="clearer"></div>
</div>

<div id="footerContainer">
   <div class="tiny">
      <div>
      <a href="http://www.calpoly.edu" target="_blank">Cal Poly</a> : 
      <a href="http://cla.calpoly.edu" target="_blank">College of Liberal Arts</a> : 
      <a href="http://cla.calpoly.edu/jour" target="_blank">Journalism Dept.</a>
      </div>

      <div>
      &copy; {$smarty.now|date_format:"%Y"} KCPR 91.3fm, San Luis Obispo, CA
      </div>
   </div>
</div>

<script type="text/javascript" src="/ci/js/mootools-core.js"></script>
<script type="text/javascript" src="/ci/js/mootools-more.js"></script>
{$_scripts}

</body>
</html>
