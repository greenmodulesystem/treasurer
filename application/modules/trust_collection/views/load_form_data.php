<div class="box-body">    
    <div class="col-md-5">
        <label>Particular:</label>
        <select name="particular" style="width: 100%" class="form-control input-m select2 particular" id="particular">
            <option value="" disabled selected>Select...</option>                                                                
            <?php foreach ($Result as $key => $value) {
                ?><option value="<?=$value->ID?>" data-name="<?=$value->Particular?>"><?=$value->Particular?></option><?php
            }?>
        </select>
    </div>    
    <div class="col-md-2">
        <label>Amount:</label>
        <input type="text" readonly class="form-control input-sm" id="amount" value="" style="color: black; font-size: 14px;">
    </div>    
</div>    
<div class="box-body">    
    <div class="col-md-2">
        <label>Quantity:</label>                
        <input type="number" disabled class="form-control input-sm" id="quantity" value="1">
    </div>                            
    <div class="col-md-3" style="margin-top: 2.2%">                            
        <button class="btn btn-primary btn-flat btn-sm" id="add_form"><i class="fa fa-plus-square"></i> Add </button>
    </div>                         
</div> 
<div class="box-body">    
    <div class="col-md-12" id="remarks" style="display: none">
        <label>Remarks:</label>
        <input type="text" name="voided" checked class="form-control input-sm" id="void_remarks">
    </div>
</div>
<script>                
    $(function(){
        $('.select2').select2();
    }); 
    $('.date_paids').datepicker({        
        format: "yyyy-mm-dd",
        showOtherMonths: true,
        selectOtherMonths: true,
        autoclose: true,
        changeMonth: true,
        changeYear: true,
        orientation: "dowm"
    });
    $(".date_paids").datepicker().datepicker("setDate", new Date());  
    $('.voided').on('change', function(){
        voided = $('input[type=checkbox]').prop('checked');
        if (voided == true) {            
            document.getElementById("remarks").style.display = "block";
        }else{
            document.getElementById("remarks").style.display = "none";
        }
    });    
    
</script>