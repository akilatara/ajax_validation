<div class="container">
	<h3>Employee List</h3>
	<div class="alert alert-success" style="display: none;">
		
	</div>
	<button id="btnAdd"class="btn btn-success">Add New</button>
	<table class="table table-bordered table-responsive" style="margin-top:20px;">
		<thead>
			<tr>
				<td>ID</td>
				<td>Employee Name</td>
				<td>Address</td>
				<td>City</td>
				<td>Actions</td>
			</tr>
		</thead>	
		<tbody  id ="showdata">

	</tbody>
		</table>
</div>

<div  id="myModal"class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <!-- <div class="modal-body"> -->
        <form action="" id="myForm" method="post" class="form-horizontal">
        	<input type="hidden" name="txtId" value="0">
        <div class="form-group col-sm-4">
        	<label for="name">EmployeeName</label>
        	<input type="text" name="txtempname" class="form-control" autocomplete="off">
        </div>
        	<div class="form-group col-sm-4">
        	<label  for="address">Address</label>
        	<input type="text" name="txtaddress" class="form-control" autocomplete="off">
        	</div>
        		<div class="form-group col-sm-4">
        	<label for="city">City</label>
        	<input type="text" name="txtcity" class="form-control" autocomplete="off">
        	</div>	
      <!-- </div> -->
  </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="btnSave" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div  id="deleteModal"class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">confirm delete</h4>
      </div>
      <div class="modal-body">
      	Do you wantto delete this record?
      </div>
    
  
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="btnDelete" class="btn btn-primary">delete</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
	//show
     $(function(){
		showAllmain();
		$('#btnAdd').click(function()
		{
			$('#myModal').modal('show');
			$('#myModal').find('.modal-title').text('Add new main');
			$('#myForm').attr('action','<?php echo base_url() ?>main/Addmain');

		});
             //add
		$('#btnSave').click(function()
		{
			var url= $('#myForm').attr('action');
			var data= $('#myForm').serialize();

			var employeeName =$('input[name=txtempname]');
			var address = $('input[name=txtaddress]');
			var  city = $('input[name=txtcity]');
			var result ='';
			  if(employeeName.val()=='')
			  {
			  	employeeName.parent().parent().addClass('has-error');
                }else
                {
                	employeeName.parent().parent().removeClass('has-error');
                	result +='1';
                }
                if(address.val()=='')
                {
                	address.parent().parent().addClass('has-error');
                }else
                {
                	address.parent().parent().removeClass('has-error');
                	result +='2';
                }
                if(city.val()=='')
                {
                	city.parent().parent().addClass('has-error');
                }else
                {
                	city.parent().parent().removeClass('has-error');
                	result +='3';
                }
                  if(result=='123')
                  {
                  	  $.ajax({
                  	  	type: 'ajax',
                  	  	method: 'post',
                  	  	url: url,
                  	  	data: data,
                  	  	async: false,
                  	  	dataType: 'json',
                  	  	success: function(response){
                  	  		if(response.success){
                  	  			$('#myModal').modal('hide');
                  	  			$('#myForm')[0].reset();
                  	  			if(response.type=='add'){
                  	  				var type='added';
                  	  			}else if(response.type=='update'){
                  	  				var type='updated';
                  	  			}
                  	  			$('.alert-success').html('Main '+type+' successfully').fadeIn().delay(4000).fadeOut('slow');

                  	  			
                  	  			showAllmain();
                  	  			
              	  		}else{
              	  			alert('Error');
              	  		}
                  	  		
                  	  	},
                  	  	error: function(){
                  	  		alert('Could not Add data');
                      	}

                  	  });

                  }
              });
		//edit
     $('#showdata').on('click','.item-edit', function(){
        var id = $(this).attr('data');
        $('#myModal').modal('show');
        $('#myModal').find('.modal-title').text('Edit Main');
        $('#myForm').attr('action','<?php echo base_url() ?>Main/updateMain');
        $.ajax({
           type:'ajax',
           method: 'get',
           url: '<?php echo base_url() ?>Main/editMain',
           data:{id:id},
           async: false,
           dataType: 'json',
           success: function(data){
               $('input[name=txtempname]').val(data.empname);
               $('input[name=txtaddress]').val(data.address);
               $('input[name=txtcity]').val(data.city);
               $('input[name=txtId]').val(data.id);

           },

           error: function(){
            alert('Could not Edit Data');
           }
       })
     });
		
		//delete

		$('#showdata').on('click','.item-delete',function(){
			var id=$(this).attr('data');
			$('#deleteModal').modal('show');
			$('#btnDelete').unbind().click(function(){
				$.ajax(
				{
					type:'ajax',
					method: 'get',
					async:false,
					url:'<?php echo base_url() ?>Main/deleteMain',
					data:{id:id},
					dataType:'json',
					success:function(response){
						if(response.success){
						$('#deleteModal').modal('hide');
						$('.alert-success').html('Main Deleted successfully').fadeIn().delay(4000).fadeOut('slow');
						showAllMain();
					}else{
						alert('Error');
					}


					},

					error:function(){
						alert('Error deleting');
					}
				});
			});
		});

		function showAllmain()
		{
	          $.ajax({
				   type:'ajax',
				 url:'<?php echo base_url() ?>main/showAllmain',
				
				dataType:'json',
				success: function(data)
				{
					var html = '';
					var i;
					for(i=0; i<data.length; i++)
					{
					html +='<tr>'+
					    '<td>'+data[i].id+'</td>'+
				        '<td>'+data[i].empname+'</td>'+
				        '<td>'+data[i].address+'</td>'+
				        '<td>'+data[i].city+'</td>'+
				'<td>'+
					   '<a href="javascript:;" class="btn btn-info item-edit" data="'+data[i].id+'">Edit</a>'+
		                 '<a href="javascript:;" class="btn btn-danger item-delete" data="'+data[i].id+'">Delete</a>'+
					     '</td>'+
					'</tr>';

					}

					$('#showdata').html(html);
				},
				error: function()
				{
					alert('Could not get Data from Database');
				}

			});
		}
	});
</script>