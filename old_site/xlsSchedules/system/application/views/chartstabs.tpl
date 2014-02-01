<ul class="tabList">
   {if !isset($chartsTab)}{assign var="chartsTab" value=""}{/if}
   <li><a 
    {if $chartsTab == "charts"}class="active"{/if}
    href="{URI page="charts"}">This Week's Charts</a>
   </li>

   <li> <a 
     {if $chartsTab == "archives"}class="active"{/if}
     href="{URI page="archives"}">Archives</a>
   </li>
</ul>
<div class="clearer"></div>
<div id="tabBar"></div>
