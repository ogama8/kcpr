<html>
<head>
   <title>KCPR 91.3fm{if !empty($title)} - {$title}{/if}</title>

   {* This is the easiest way to add global scripts/styles *} 
   <link href="{URI css="type/stylesheet.css"}" rel="stylesheet" type="text/css">
   <link href="{URI css="base.css"}" rel="stylesheet" type="text/css">
   {$_styles}
</head>
<body> 

<div id="topPicture"> </div>
<div class="" id="topBlock"> </div>
<div class="rotate" id="bottomBlock"> </div>

<div id="headerContainer">
   <div id="header">
      <a href="{URI page="home"}"><img src="/images/kcprbanner2.png" id="picture" /></a>
      <div class="clearer"></div>

      {if !isset($section)}{assign var="section" value=""}{/if}
      <div class="rotate" id="navigation">
         <ul class="headerList">
            <li><a href="{URI page="schedule"}"
             {if $active == "schedule"}class="active"{/if}
             >Schedule</a>
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

            <li><a 
            {if $active == "listen"}class="active"{/if}
             href="{URI page="listen"}">Listen Online</a>
            </li>

         </ul>
      </div>
   </div>
</div>

<div id="contentContainer">

   <div id="sidebarContainer">
      {$sidebar}
   </div>

   <div id="mainContainer" {if empty($sidebar)}class="fullWidth"{/if}>
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
      &copy; {* {$smarty.now|date_format:"%Y"} *} 2011 KCPR 91.3fm, San Luis Obispo, CA
      </div>
   </div>
</div>

<script type="text/javascript" src="{URI js="mootools-core.js"}"></script>
<script type="text/javascript" src="{URI js="mootools-more.js"}></script>
{$_scripts}

</body>
</html>
