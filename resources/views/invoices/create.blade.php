@extends('layouts.main')

@section('content')
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
       <div class="col-md-6">
          <h1>New Invoice</h1>
       </div>
       <div class="col-md-6 " style="margin-top: 20px">
          <a href="">
           <button class="btn btn-primary pull-right">Save and Continue</button>
          </a>
       </div>
    </div>

    <form id="invoiceForm" action="{{ route('invoices.create') }}" method="post" data-parsley-validate ="">
                  {{ method_field('PUT') }}
                {{csrf_field()}}
    <div class="col-md-10 col-md-offset-1" >
      <div class="panel panel-primary">
        <div class="panel-heading">
          Business Address and Contact Details, Summary, and Logo
        </div>
        <div class="panel-body">
         <div class="col-md-6 noformpacing">
            <div class="col-md-12">
             <input class="form-control" type="text" name="invoice_title" value="Invoice" style="font-size: 20px; margin-bottom: 10px" required="">
            </div>
            <div class="col-md-12">
              <input class="form-control" type="text" name="invoice_summary" placeholder="Summary(e.g project name, discription of invoice)" required="">
            </div> 
             <div class="col-md-12">
              <h4><b>{{ Auth::user()->name }}</b></h4>
              <h5>{{ Auth::user()->name }}</h5>
              <a href="">Edit Your Business Address and Contact Details</a>
            </div> 
            </div>
         </div>
         <div class="col-md-6">

         </div>
      </div>
    </div>
    <div class="col-md-10 col-md-offset-1" >
       <div class="panel panel-primary" >
          <div class="panel-body">
            <div class="col-md-6">
               Hello
             </div>
             <div class="col-md-6 noformpacing" style="text-align: right;">
              <div class="col-md-12">
                <div class="col-md-6">
                    <label>Invoice Number</label></div>
                 <div class="col-md-6">
                    <input class="form-control" type="field" name="invoice_number" style="margin-bottom: 10px" required="">
                 </div>
              </div>
              <div class="col-md-12">
                 <div class="col-md-6">
                 <label>P.O./S.O. Number</label>
                 </div>
                 <div class="col-md-6">
                    <input class="form-control" type="field" name="so_number" style="margin-bottom: 10px" required="">
                 </div>
              </div>
              <div class="col-md-12">
                 <div class="col-md-6">
                  <label>Invoice Date</label>
                 </div>   
                 <div class="col-md-6">
                    <input class="form-control" type="date" name="invoice_date" style="margin-bottom: 10px" required="">
                 </div>
              </div>
              <div class="col-md-12">
                 <div class="col-md-6">
                  <label>Payment Due</label>
                 </div>
                 <div class="col-md-6">
                    <input class="form-control" type="date" name="payment_date" required="">
                 </div>
              </div>
             </div>
             
          </div>
         <div style="overflow-x:auto;">
         <table class="table table-hover" style="width: 100%">
             <thead>
              <tr style="background-color: #84b1f9; text-align: right;" >
                <th ><b>Items</b></th>
                <th><b> </b></th>
                <th><b>Quantity</b></th>
                <th><b>Price</b></th>
                <th><b>Discount</b></th>
                <th><b>Amount</b></th>
                <th><button type="button" id="add" class="btn btn-success">Add <i class="fa fa-plus"></i></button></th>
              </tr>
            </thead>
            <tbody class="detail ">
               <tr>
                <td ><input class="form-control" type="field" name="name" id="name" required="" data-parsley-type="alphanum"></td>
                <td ><input class="form-control" type="field" name="discription" id="discription" required=""></td>
                <td ><input class="quantity form-control" type="field" maxlength="2" name="quantity" id="quantity" required=""></td>
                <td ><input class="price form-control" type="field" name="price" id="price" maxlength="9" required="" data-parsley-type="integer"></td>
                <td><input class="discount form-control" type="field" id="discount" maxlength="12" name="discount" maxlength="2" data-parsley-length="[0, 2]"/></td>
                <td > <input class="product_total form-control" type="field" name="product_total" id="product_total" disabled="disabled" required="" ></td>
                <td><a href="#" class="remove"><button type="button" id="remove" class="btn btn-danger" disabled="disabled" value="1">Delete</button></a></td>
                <td style="display: none;" ><input class="sub_total" type="hidden" name="sub_total" value="0" /></td>
                <td style="display: none;" ><input class="dis_total" type="hidden" name="dis_total" value="0" /></td>
                
               </tr>
            </tbody>
            <tfoot>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th style="text-align: right;" colspan="1" class="titleTotal">Grand Total</th>
                <th style="text-align: right;" id="grand_total" value = "grand_total">0</th>
               
            </tfoot>
            <tfoot>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th style="text-align: right;" colspan="1" class="titleTotal">Sub Total</th>
                <th style="text-align: right;" id="sub_total" value = "sub_total">0</th>
            </tfoot>
            <tfoot>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th style="text-align: right;" colspan="1" class="titleTotal">Discount</th>
                <th style="text-align: right;" id="discount_total" >0</th>
            </tfoot>
            
         </table>
           </div>  
       </div>
       <button id="submit" type="submit" class="btn btn-primary pull-right">Save and Continue</button>
    </div>

    
    </form>

  </div>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
  <script>
     $(function(){
        $('#add').click(function(){
            addNewRow();

        });
     $(document).on("click", ".remove", function() {
          var tr = $(this).parent().parent();

           var quantity= tr.find('input[name="quantity"]').val();
           var price = tr.find('input[name="price"]').val();
           var discount = tr.find('input[id="discount"]').val();
           
          if(quantity!=0 || price!=0 || discount!=0){
            tr.find('input[name="product_total"]').val(0);
            tr.find('input[name="dis_total"]').val(0);
            tr.find('input[name="sub_total"]').val(0);
            grandTotal();
           }
          
          $(this).parent().parent().remove(); 
         
          
       });

     $(document).on("keyup", "#quantity, #price, #discount", function() {
       
        var tr = $(this).parent().parent();
        

           var quantity= tr.find('input[name="quantity"]').val();
           var price = tr.find('input[name="price"]').val();
           var discount = tr.find('input[name="discount"]').val();
           var totalDiscount = (quantity * price * discount)/100;
           var subTotal = quantity * price;
           var total = (quantity * price) - totalDiscount;
          var product_total = total.toFixed(2);

           tr.find('input[name="product_total"]').val(product_total);
           tr.find('input[name="dis_total"]').val(totalDiscount);
           tr.find('input[name="sub_total"]').val(subTotal);        
            
           grandTotal();
        });
        
        
       });
      function grandTotal(){
          var grand_total = 0;
           var sub_total = 0;
           var discount = 0;
          
          $('.product_total').each(function(index,event){
             grand_total += $(event).val()-0;
          });
          $('#grand_total').html(grand_total.toFixed(2));

          $('.dis_total').each(function(index,event){
             discount += $(event).val()-0;
          });
          $('#discount_total').html(discount.toFixed(2));
         
          $('.sub_total').each(function(index,event){
             sub_total += $(event).val()-0;
          });
          $('#sub_total').html(sub_total.toFixed(2));
         
       }
      function addNewRow(){
         var n = ($('.detail tr').length-0)+1;
          var tr = '<tr>' + 
                '<td><input class="form-control" type="field" name="name" id="name" required=""></td>'+
                '<td><input class="form-control" type="field" name="discription" id="discription" required=""></td>'+
                '<td><input class="quantity form-control" type="field" maxlength="2" name="quantity" id="quantity" required=""></td>'+
                '<td><input class="price form-control" type="field" maxlength="9" name="price" id="price" required=""></td>'+
                '<td><input class="discount form-control" type="field" maxlength="2" id="discount" name="discount"/></td>'+
                '<td><input class="product_total form-control" type="field" maxlength="12" name="product_total" id="product_total" disabled="disabled" required=""></td>'+
                '<td><a href="#" class="remove"><button type="button" id="remove" class="btn btn-danger">Delete</button></a></td>'+ '<td style="display: none;"><input class="sub_total" type="hidden" name="sub_total" value="0" /></td>'+ '<td style="display: none;" ><input class="dis_total" type="hidden" name="dis_total"  /></td>'+ 
               '</tr>';
         $('.detail').append(tr);
         
      }
  
   </script>
@endsection

@section('content')
   

@endsection