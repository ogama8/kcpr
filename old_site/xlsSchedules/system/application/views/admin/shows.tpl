{if isset($message)}
   <span class="msg">{$message}</span>
{/if}

<h2>Shows</h2>

<form method="post" id="inputForm">

<ul class="tabList">
   {if !isset($activeTab)}{assign var="activeTab" value="all"}{/if}
   <li data-typeName="all"> 
      <a id="showAll"
       {if $activeTab == "all"}class="active"{/if}>
          All Shows
      </a>
   </li>

   {foreach from=$types item="type"}
      <li data-typeName="{$type}"> 
         <a 
          {if $activeTab == "{$type}"}class="active"{/if}>
            {$type|capitalize}   
         </a>
      </li>
   {/foreach}
</ul>

<div id="toolbar">
   <input id="newShow" type="button" value="New Show" />
   <input id="saveShows" type="submit" value="Save Changes" />
</div>

<div class="clearer"></div>
<div id="tabBar"></div>
   
<table id="showTable">
   <tr id="headerRow">
      <th>Name</th>
      <th>Type
         {foreach from=$types key="typeNum" item="typeName"}
            <div class="typeData hidden" 
             data-typeName="{$typeName}"
             data-typeNum="{$typeNum}"
             >
         {/foreach}
      </th>
      <th>Genre</th>
      <th>Description</th>
   </tr>

   {foreach from=$shows item="show"}
      <tr class="{$show->typeName()}">
         <input type="hidden" name="shows[id][]" value="{$show->id}" />
         <input type="hidden" name="shows[delete][]" class="deleteFlag" value="" />

         <td>
            <input type="text" name="shows[name][]" value="{$show->name}" />
         </td>

         <td>
            <select name="shows[type][]">
               {foreach from=$types key="typeNum" item="typeName"}
                  <option data-typeName="{$typeName}" value="{$typeNum}"
                   {if $typeNum == $show->type} selected="selected" {/if}>
                     {$typeName|capitalize} 
                  </option> 
               {/foreach}
            </select>
         </td>

         <td>
            <input type="text" name="shows[genre][]" value="{$show->genre}" />
         </td>

         <td class="description">
            <input class="description" name="shows[description][]" 
             type="text" value="{$show->description}" />
         </td>

         <td><a class="deleteShow">[x]</a></td>
      </tr>
   {/foreach}
</table>

</form>

{* Prototype for copying with js *}
<table>
<tr id="prototype" class="hidden">
      <input type="hidden" name="shows[id][]" value="" />
      <input type="hidden" name="shows[delete][]" class="deleteFlag" value="" />

      <td>
         <input type="text" name="shows[name][]" value=" "/>
      </td>

      <td>
         <select name="shows[type][]">
            {foreach from=$types key="typeNum" item="typeName"}
               <option data-typeName="{$typeName}" value="{$typeNum}">
                  {$typeName|capitalize} 
               </option> 
            {/foreach}
         </select>
      </td>

      <td>
         <input type="text" name="shows[genre][]" />
      </td>

      <td class="description">
         <input class="description" name="shows[description][]" type="text" />
      </td>

      <td><a class="deleteShow">[x]</a></td>
</tr>
</table>
