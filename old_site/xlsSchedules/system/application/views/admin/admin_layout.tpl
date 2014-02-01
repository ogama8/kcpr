<html>
<head>

   {* This is the easiest way to add global scripts/styles *} 
   <link href="/ci/css/admin/admin_base.css" rel="stylesheet" type="text/css">

   {$_styles}

</head>

<div id="headerContainer">
   <div id="adminHeader">
      <span style="float: right; margin-right: 1em;">
         <a href="{URI adminPage="logout"}">logout</a>
      </span>

      <ul>
         <li class="single">
            <a href="{URI adminPage="news"}">News</a>
         </li>

         <li class="menu">Charts
            <ul>
               <li><a href="{URI adminPage="new_charts"}">Add Charts</a></li>
               <li><a href="{URI adminPage="edit_charts"}">Edit Charts</a></li>
            </ul>
         </li>
         
         <li class="menu">Schedule
            <ul> 
               <li><a href="{URI adminPage="shows"}">Add Shows</a></li>
               <li><a href="{URI adminPage="schedule"}">Edit Schedule</a></li>
            </ul>
         </li>

      </ul>

      <div class="clearer"></div>
   </div>
</div>

<div id="errorContainer">
   {if !empty($error)}
      <p>{$error}</p>
   {/if}
</div>

<div id="messageContainer">
   {if !empty($message)}
      <p>{$message}</p>
   {/if}
</div>

<div id="contentContainer">
   {$content}
</div>

<body>

<script type="text/javascript" src="/ci/js/mootools-core.js"></script>
<script type="text/javascript" src="/ci/js/mootools-more.js"></script>
<script type="text/javascript" src="/ci/js/dropdowns.js"></script>
{$_scripts}

</body>

</html>
