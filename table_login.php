<table border = "1" id = "login">
	<tr>
		<form  name="form3" method="post" action="<?php echo $current_page; ?>">
			<td>
				<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="red">
					<tr>
						<td align = "center" colspan="3"><strong><?php echo $notice_reg; ?></strong></td>
					</tr>
					<tr>
						<td width="78">Username:</td>
						<td width="6"></td>
						<td width="294"><input name="myusername" type="text" id="myusername"></td>
					</tr>
					<tr>
						<td>Password:</td>
						<td></td>
						<td><input name="mypassword" type="password" id="mypassword"></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						
					<td>
						<input type="submit" name="Submit" value="Login">
						<input type="submit" name="Register" value="Register">

					</td>
					</tr>
				</table>
			</td>
		</form>
	</tr>
</table>

