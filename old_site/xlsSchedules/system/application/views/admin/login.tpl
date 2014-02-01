{if !isset($errorMsg)}
   {$greeting} 
{else}
   {$errorMsg}
{/if}
<form method="post">
User: <input type="text" name="user" />
Password: <input type="password" name="pword" />
<input type="submit" value="Login" />
</form>
