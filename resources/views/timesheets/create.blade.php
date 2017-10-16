@extends('layouts.main')


@section('content')
    <div class="row">
	   <div class="col-md-10 col-md-offset-1">
	       <div class="panel panel-primary" style="margin-top: 50px">
               

	          
                   
    	        <table class="table table-striped table-hover" id="table_id">
    	          <thead >
    	            <tr>
                    <td><b>Employees</b></td>
    	              <td><b>Regular</b></td>
    	              <td><b>Overtime</b></td>
    	              <td><b>Vacation</b></td>
    	              <td><b>Sick Time</b></td>
    	              <td><b>Total</b></td>
    	              <td><button type="button" id="add" class="btn btn-success">Add <i class="fa fa-plus"></i></button></td>
    	            </tr>
    	          </thead>
    	           
			       <tbody class="detail" id="myid">
    	            <tr>
	    	              <td>Name</td>
                          
                           <form action="/employees" id="selectMenu" method="POST" >
				               {{csrf_field()}}
						   	  	  <div class="form-group " >
						   	  	       <td class="count-me col-md-1" >
							   	  		     <input type="field" id="regular" class="form-control" value=" " onkeyup ="myFunction()"/>
							   	  		 </td>    
							   	  		<td class="count-me col-md-1" >  
							   	  		     <input type="field" id="overtime" class="form-control" placeholder="0.0" onkeyup ="myFunction()"/>
							   	  		</td>
							   	  		<td class="count-me col-md-1">   
							   	  		     <input type="field" id="vacation" class="form-control" placeholder="0.0" onkeyup ="myFunction()"/>
							   	  		</td>
							   	  		<td class="count-me col-md-1"> 
							   	  		     <input type="field" id="sick_time" class="form-control" placeholder="0.0" onkeyup ="myFunction()"/> 
							   	  		</td>
							   	  		<td class="col-md-1" >
							   	  		    <input class="form-control" type="" name="" id="total" value="" disabled="disabled">
							   	  		</td>
							   	  		 <td><a href="#" class="remove"><button type="button" id="remove" class="btn btn-danger">Delete</button></a></td>
							   	  </div>
					        </form>
                       
    	            </tr>
    	            </tbody>
    	         </table>
	    	</div> 

											
	    	<button class="btn btn-danger pull-right">Discard Changes</button> 
	    	<a href="">
	    	  <button class="btn btn-primary pull-right" style="margin-right: 5px">Save</button> 
	    	</a> 

		</div>
	</div>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
  <script>
   	  $(function(){
        $('#add').click(function(){
            
        });
	   $(document).on("click", ".remove", function() {
          $(this).parent().parent().remove(); 
		});
	   $(document).on("keyup", "#regular, #overtime", function() {
          /*var n = ($('.detail').length-0)+1;
          var regular =0; var overtime =0; var vacation =0; var sick_time =0;
   	     	regular = document.getElementById('regular').value;
          overtime = document.getElementById('overtime').value;
		   vacation = document.getElementById('vacation').value;
          sick_time = document.getElementById('sick_time').value;
           var total = +sick_time + +vacation + +overtime + +regular;
           document.getElementById('total').value=total;*/

           var tr = $(this).parent().parent();

           var regular= tr.find('input[name="regular"]').val();
           var overtime = tr.find('input[name="overtime"]').val();
           var total = regular * overtime;
          tr.find('input[name="total"]').val(total);
          

		});
   	 });
   	  function myFunction(){
   	  	

           
   	  	   
   	  }
   	  function addNewRow(){
         var n = ($('.detail tr').length-0)+1;
          var tr = '<tr>' +
              '<td class="count-me col-md-1" ><input type="none" id="regular" class="form-control" value="10" /></td>'+    
			'<td class="count-me col-md-1" ><input type="none" id="overtime" class="form-control" placeholder="0.0" /></td>'+
			'<td class="count-me col-md-1"><input type="none" id="vacation" class="form-control" placeholder="0.0" /></td>'+
			'<td class="count-me col-md-1"><input type="none" id="sick_time" class="form-control" placeholder="0.0" /></td>'+
			'<td class="col-md-1" ><input class="form-control" type="" name="" id="total" value="" disabled="disabled"></td>'+
            '</tr>';
         $('.detail').append(tr);
   	  }
   </script>
 
@endsection