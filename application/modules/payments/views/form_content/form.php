
<div class="form-horizontal">
    <div class="form-group">
        <label for="or-number" class="col-sm-2 control-label">OR NUMBER</label>
        <div class="col-sm-4">
            <input disabled style="text-align:center; color:red; font: bold 30px Bookman Old Style; " type="text" class="form-control input-lg" data-field="or-number" placeholder="OR NUMBER" value="<?=@$or_number;?>">
        </div>
        <label for="or-number" class="col-sm-1 control-label">Date</label>
        <div class="col-sm-2">
            <input type="text" class="form-control input-lg date" data-field="date" placeholder="MM/DD/YYYY" value="<?=date('m/d/Y',time())?>">
        </div>
    </div>  
    <div class="form-group">
        <?php if($form === '51'  || $form === '54'  || $form === '57'):?>
        <label for="payor" class="col-sm-2 control-label">Payor</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" data-field="payor" placeholder="Payor">
        </div>
        <?php endif;?>
        <?php if($form === '52' || $form === '53'):?>
        <label for="payor" class="col-sm-2 control-label">Owner</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" data-field="payor" placeholder="Owner">
        </div>
        <?php endif;?>
    </div> 
    <div class="form-group">
        <?php if($form === '51'):?>
        <label for="payor" class="col-sm-2 control-label">Paid by</label>

        <div class="col-sm-4">
            <input type="text" class="form-control " data-field="paid-by" placeholder="Paid by">
        </div>
        <?php endif;?>
    </div>   
    <div class="form-group">
        <label for="address" class="col-sm-2 control-label">Address</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" data-field="address" placeholder="Address">
        </div>
        <?php if($form === '52' || $form === '53'):?>
        <div class="col-sm-3">
            <input type="text" class="form-control" data-field="city-municipality" placeholder="City/Municipality" value="Cadiz">
        </div>
        <div class="col-sm-3">
            <input type="text" class="form-control" data-field="province" placeholder="Province" value="Negros Occidental">
        </div>
         <?php endif;?>
    </div> 
    <?php if($form === '52'):?>
    <div class="form-group">
       
        <hr>
        <label for="payor" class="col-sm-2 control-label">Conveyed to</label>

        <div class="col-sm-4">
            <input type="text" class="form-control " data-field="received-by" placeholder="Recevied by">
        </div>
    </div> 
    <div class="form-group">
      
        <label for="address" class="col-sm-2 control-label">Address</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" data-field="r-address" placeholder="Address">
        </div>
       
        <div class="col-sm-3">
            <input type="text" class="form-control" data-field="r-city-municipality" placeholder="City/Municipality" value="Murcia">
        </div>
        <div class="col-sm-3">
            <input type="text" class="form-control" data-field="r-province" placeholder="Province" value="Negros Occidental">
        </div>
       
    </div> 
    <?php endif;?>       
    <?php if($form === '52' || $form === '53'):?>
    <div class="form-group">
        <label for="address" class="col-sm-2 control-label">Sex</label>
        <div class="col-sm-3">
            <select class="form-control" data-field="sex">
                <option value="M">Male</option>
                <option value="F">Female</option>
            </select>
        </div>
        <label for="address" class="col-sm-1 control-label">Age</label>
        <div class="col-sm-2">
            <input type="number" class="form-control" data-field="age" placeholder="Age">
        </div>
    </div>
    <?php if($form === '52'):?>
    <div class="form-group">
        <label for="address" class="col-sm-2 control-label">Certificate of Ownership No.</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" data-field="ownerhsip-no" placeholder="Ownership No.">
        </div>
    </div>
    <?php endif;?>
    <div class="form-group">
        <label for="address" class="col-sm-2 control-label">Brand of City/Municipality</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" data-field="city-municipality-brand" placeholder="Brand of City/Municipality">
        </div>
        <label for="address" class="col-sm-1 control-label">Brand of Owner</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" data-field="ownder-brand" placeholder="Brand of Owner">
        </div>
    </div>
    <?php endif;?>
    <div class="form-group">
        <label for="address" class="col-sm-2 control-label" >Particulars</label>
        <div class="col-sm-4">
            <select class="form-control" data-field="particular">
                <option value="" disabled selected>Please Select Particular</option>
                <?php foreach ($fees as $key => $fee):?>
                        <option value="<?=$fee->ID?>" data-amount="<?=$fee->Amount?>"><?=$fee->Particular?></option>
                <?php endforeach;?>
            </select>
        </div>
        <div class="col-sm-3">
            <input type="text" class="form-control" data-field="description" placeholder="Description">
        </div>
        <div class="col-sm-2">
            <input type="number" class="form-control" data-field="amount" placeholder="Amount">
        </div>
        <div class="col-sm-1">
            <button class="btn btn-sm btn-flat btn-success" id="save" ><i class="fa fa-plus"></i> SAVE</button>
        </div>
    </div>    
</div>

<!-- load searched payer and add to payer input -->
<div class="modal fade modal-wide-payer" id="load-search-payer" role="dialog">
    <div class="modal-dialog">       
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" style="color: red"> <i class="fa fa-times"></i> </button>                
            </div>
            <div class="modal-body">
                <table class="table table-hover">
                    <thead>
                        <th> Option </th>
                        <th> Payer </th>
                        <th> Address </th>                        
                    </thead>
                    <tbody id="load-searched">                                
                    </tbody>
                </table>          
            </div>            
        </div>        
    </div>
</div>

<div class="list">
    <table class="table" >
        <caption>List</caption>
        <thead> 
            <tr>
                <th width="50%">Item</th>
                <th width="15%">Amount</th>
                <th >Option</th>
            </tr>
        </thead>
        <tbody style="overflow:scroll; height:100px;" id="lists">
                    
        </tbody>
        <tfoot>
            <tr>
                <th style="text-align:right;"> TOTAL: </th>
                <th style="text-align:left; color:green; font: bold 25px Bookman Old Style; " class="amount" data-value="total"> 0</th>
            </tr>
            <tr>
                <th style="text-align:right;"> Cash: </th>
                <th>
                    <input type="number" class="form-control " placeholder="Amount" class="amount" data-value="cash" value="0">
                </th>
                <th class="bg-warning">
                    <!-- <button class="btn btn-md btn-primary btn-flat"> <i class="fa fa-money"></i> CHEQUE</button> -->
                    Cheque: 
                </th>
                <td class="bg-warning">
                    Bank: 
                </td>
                <td class="bg-warning" style="padding-bottom : .1em;">
                    <select name="bank-optn" id="" class="form-control cheque" data-value="bank">
                        <option value="" disabled selected>Select Bank</option>
                        <?php foreach ($banks as $key => $value):?>
                            <option value="<?=$value->Bank_name?>"><?=$value->Bank_name_short?></option>
                        <?php endforeach;?>
                        </select>

                </td>
            </tr>
            <tr>
                <th></th>
                <th></th>
                <th class="bg-warning">
                </th>
                <td class="bg-warning ">
                    No: 
                </td>
                <td class="bg-warning" style="padding-bottom : .1em; padding-top : -.1em;">
                    <input type="text" class="form-control cheque" data-value="no" value="0">
                </td>
            </tr>
            <tr>
                <th></th>
                <th></th>
                <th class="bg-warning">
                </th>
                <td class="bg-warning">
                    Date: 
                </td>
                <td class="bg-warning m_padding" style="padding-bottom : .1em;">
                    
                    <input type="text" class="form-control date cheque" data-value="date" value="" placeholder="MM/DD/YYYY">
                </td>
            </tr>
            <tr>
                <th></th>
                <th></th>
                <th class="bg-warning">
                </th>
                <td class="bg-warning">
                    Amount: 
                </td>
                <td class="bg-warning m_padding" >
                    
                    <input type="number" class="form-control cheque" data-value="amount" value="0">
                </td>
            </tr>
            <tr>
                <th style="text-align:right;"> Change: </th>
                <th style="text-align:left; font: bold 20px Bookman Old Style; " class="amount" data-value="change"> 0</th>

            </tr>
            
            <tr>
                <td  style="text-align:right;" colspan="2">
                    <button class="btn btn-md btn-primary btn-flat" id="btn-pay-print" disabled> <i class="fa fa-money"></i> PAY AND PRINT RECEIPT</button>
                </td>
                <td  style="text-align:center;"  colspan="3">
                    
                </td>
            </tr>
        </tfoot>
    </table>
    <?php if(isset(OFFICE_R[OFFICE]['CERTIFICATES'][$form])):?>
    <div class="form-horizontal">
        <div class="form-group">
            <label class="col-md-2 control-label">CERTIFICATE</label>
            <div class="col-md-4">
                <select class="form-control" name="" id="certificates">
                    <option disabled selected>Select Certificate</option>
                    <?php foreach (OFFICE_R[OFFICE]['CERTIFICATES'][$form] as $key => $certificate):?>
                        <option value="<?=$certificate?>"><?=$certificate?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="col-md-6">
                <button class="btn btn-md btn-flat btn-success" id="certificate" disabled><i class="fa fa-certificate"></i> CREATE CERTIFICATE</button>
                <button class="btn btn-lg bg-navy btn-flat pull-right" id="btn-new"> <i class="fa fa-retweet"></i> NEW TRANSACTION</button>
            </div>
                            
        </div>       
    </div>
    <?php endif;?>
</div>