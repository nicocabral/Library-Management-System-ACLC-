<script>
function confirmSubmit(){
		 var x = confirm("Are you sure you want to update your username and password");
		if(x==true){
			return;
			}
		else{
			return false;}
	}
</script>
<!-- Modal -->
<div class="modal fade" id="changepasswordModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-cog"></i> CHANGE PASSWORD</h4>
      </div>
      <div class="modal-body">
      <div class="row">
      	<div class="col-lg-12">
        <div class="panel panel-default">
        <div class="panel-body">
   <form onSubmit="return confirmSubmit();" action="cp_processUser.php" method="post">
   <p>Fields with (*) are required</p>
   <input type="hidden" name="id" value="<?php echo $_SESSION['id']?>">
 <table width="100%">
 <tr style="margin-bottom:10px;">
 <td style="width:auto; text-align:right;">
    <label for="Username">Username *: </label>
    </td>
   <td style="width:auto; text-align:center;">
    <input type="text" name="username" placeholder="Username" required><br><p></p>
    </td>
 </tr>
 <tr style="margin-bottom:10px;">
 <td style="width:auto; text-align:right;">
    <label for="exampleInputPassword1">Password *: </label>
    </td>
    <td style="width:auto; text-align:center;">
    <input type="password" name="password" placeholder="**********" required><br><p></p></td>
 </tr>
 <tr style="margin-bottom:10px;">
 <td style="width:auto; text-align:right;">
    <label for="exampleInputPassword1"> Confirm Password *:</label>
    </td>
   <td style="width:auto; text-align:center;"><input type="password" name="confirmpassword" placeholder="**********"required><br><p></p></td>
 </tr >
  <tr style="margin-bottom:10px;">
  <td colspan="2" style="width:auto; text-align:right;">
  <button type="reset">Clear</button>
  <button type="submit">Save changes</button>
</td>
</tr>
</table>
</form>
</div></div></div>
      </div></div>
      
      </div>
    </div>
  </div>
</div>

<!--    end modal -->
