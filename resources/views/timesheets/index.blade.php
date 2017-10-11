@extends('layouts.main')


@section('content')
    <div class="row">
	   <div class="col-md-10 col-md-offset-1">
	       <div class="panel panel-primary" style="margin-top: 50px">
               

	          @if(count($employees))
                   
    	        <table class="table table-striped table-hover" id="table_id">
    	          <thead >
    	            <tr>
                    <td><b>Employees</b></td>
    	              <td><b>Regular</b></td>
    	              <td><b>Overtime</b></td>
    	              <td><b>Vacation</b></td>
    	              <td><b>Sick Time</b></td>
    	              <td><b>Total</b></td>
    	            </tr>
    	          </thead>
			    @foreach($employees as $employee)
			     
    	            <tr>
	    	              <td>{{$employee->last_name}}, {{$employee->first_name}}</td>
                          
                           <form action="/employees" id="selectMenu" method="POST" >
				               {{csrf_field()}}
						   	  	  <div class="form-group " >
						   	  	       <td class="count-me col-md-1" >
							   	  		     <input type="none" id="regular" class="form-control" value="10" />
							   	  		 </td>    
							   	  		<td class="count-me col-md-1" >  
							   	  		     <input type="none" id="overtime" class="form-control" placeholder="0.0" />
							   	  		</td>
							   	  		<td class="count-me col-md-1">   
							   	  		     <input type="none" id="vacation" class="form-control" placeholder="0.0" />
							   	  		</td>
							   	  		<td class="count-me col-md-1"> 
							   	  		     <input type="none" id="sick_time" class="form-control" placeholder="0.0" /> 
							   	  		</td>
							   	  		<td class="col-md-1" >
							   	  		   <div onmouseleave="mouseLeave()"> 
							   	  		    <p><span id="total" value="total">Mouse over me!</span></p>
							   	  		    </div>
							   	  		</td>
							   	  </div>
					        </form>

    	            </tr>
    	        @endforeach
    	         </table>
	    	    @endif 
	    	</div> 

											
	    	<button class="btn btn-danger pull-right">Discard Changes</button> 
	    	<a href="">
	    	  <button class="btn btn-primary pull-right" style="margin-right: 5px">Save</button> 
	    	</a> 

		</div>
	</div>

    <script type="text/javascript">
    	/*function mouseEnter() {
          if(regular || overtime || vacation || sick_time){ mouseleave();}
		  }*/

		function mouseLeave() {
		     regular = parseFloat(document.getElementById('regular').value);
	     	 overtime = parseFloat(document.getElementById('overtime').value);
	     	 vacation = parseFloat(document.getElementById('vacation').value);
	         sick_time = parseFloat(document.getElementById('sick_time').value);
	     	
	     	
	     	document.getElementById('total').innerHTML = regular + overtime + vacation + sick_time;
	     	alert(total);
		  }
      </script>
     
    <!--  <script>
        function mouseOutFunc(){	
	     	//
	        regular = parseFloat(document.getElementById('regular').value);
	     	 overtime = parseFloat(document.getElementById('overtime').value);
	     	 vacation = parseFloat(document.getElementById('vacation').value);
	      sick_time = parseFloat(document.getElementById('sick_time').value);
	     	
	     	
	     	document.getElementById('total').innerHTML = regular + overtime + vacation + sick_time;
	     	alert(regular);
	     	
	    }

	     $(document).ready(function(){
		    $("div.regular").mouseleave(function(){
		        mouseOutFunc();
		    });
		});
	     $(document).ready(function(){
		    $("div.overtime").mouseleave(function(){
		        mouseOutFunc();
		    });
		});
	     $(document).ready(function(){
		    $("div.vacation").mouseleave(function(){
		        mouseOutFunc();
		    });
		});
	     $(document).ready(function(){
		    $("div.sick_time").mouseleave(function(){
		        mouseOutFunc();
		    });
		});
	     $(document).ready(function(){
		    $("div.total").mouseleave(function(){
		        mouseOutFunc();
		    });
		});

	    
	</script> -->
 
@endsection