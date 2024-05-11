<?=main_header();?>
<?=sidebar('oop');?>  
<div class="content-wrapper">
     
    <section class="content">
        <div class="body">
            <div class="box box-primary">                              
                <div class="row">
                    <div class="box-body">              
                        <div class="box-header" style="margin-top: -1%">
                            <h4 class="title-header" style="margin-left: 0.9%"><i class="fa fa-info"></i> Order of Payment Collection </h4>      
                            <div class="box-body" style="margin-left: -1.5%">    
                                <div class="row">
                                    <div class="box-body">
                                        <div class="col-md-5">
                                            <div class="input-group input-group-sm">
                                                <input type="text" id="search-val" class="form-control" autofocus placeholder="search order of payment number">
                                                <span class="input-group-btn">
                                                    <button type="button" id="btn-search" class="btn btn-success "><i class="fa fa-search"></i> Search</button>
                                                </span>
                                            </div>
                                        </div> 
                                    </div>
                                </div>         
                                <div class="row">
                                    <div class="box-body">
                                        <div class="box-body">
                                            <div class="box-body">
                                                <div class="nav-tabs-custom"> 
                                                    <ul class="nav nav-tabs">
                                                        <li class="active"><a href="#unpaid" data-toggle="tab"> UNPAID </a></li>
                                                        <li><a href="#paid" data-toggle="tab"> PAID </a></li>                                            
                                                    </ul>
                                                    <div class="tab-content">                                            
                                                        <div class="tab-pane active" id="unpaid">
                                                            <table class="table">
                                                                <thead>
                                                                    <th> Order No. </th>
                                                                    <th> Name </th>
                                                                    <th> Status </th>
                                                                    <th> Date </th>
                                                                </thead>
                                                                <tbody id="load-order-of-payments"></tbody>
                                                            </table>
                                                        </div>

                                                        <div class="tab-pane" id="paid">
                                                            <table class="table">
                                                                <thead>
                                                                    <th> Order No. </th>
                                                                    <th> Name </th>
                                                                    <th> Status </th>
                                                                    <th> Date </th>
                                                                </thead>
                                                                <tbody id="load-paid-oop"></tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>                                                                                                                             
                            </div>                  
                        </div>       
                    </div>
                </div>   
            </div>  
        </div>
    </section>
</div>
<?=main_footer();?>
<script src="<?php echo base_url()?>assets/general_assets/order_payment/oop.js"></script>
<script language="javascript" src="<?php echo base_url() ?>assets/general_assets/idle_signout.js"></script> <!-- KARL ALOB 3/24 -->