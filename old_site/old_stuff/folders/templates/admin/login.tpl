{if !isset($errorMsg)}
   Hey you! Are you supposed to be here?
{else}
   {$errorMsg}
{/if}
<form method="post">
User: <input type="text" name="user" />
Password: <input type="text" name="pword" />
<input type="submit" value="Login" />
</form>
