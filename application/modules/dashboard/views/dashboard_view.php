<?php
    echo main_header();
    echo sidebar('dashboard');
?> 
<style>.table-hover tbody tr:hover td {
    background: #cceeff;    
}</style>
<div class="content-wrapper">
    <section class="content-header">
        <ol class="breadcrumb">
            <li><i class="fa fa-money"></i> City Treasurer's Office</li>         
        </ol><br>
    </section>
    <section class="content">
        <div class="row">
            <div class="box-body">
                <div class="box box-primary">
                    <table class="table table-hover">
                        <thead>
                            <th> ACCOUNTABLE NO. </th>
                            <th style="text-align: center"> STUB NO. </th>
                            <th> START </th>
                            <th> ENDING </th>                           
                            <th> DESIGNATION </th>
                            <th> STATUS </th>
                        </thead>
                        <tbody>
                            <?php foreach ($Forms as $key => $value) {
                                ?>
                                    <tr>
                                        <td><?=$value->OR_Type?></td>
                                        <td align="center"><?=$value->Stub_no?></td>
                                        <td><?=$value->Start_OR?></td>
                                        <td><?=$value->End_OR?></td>
                                        <?php foreach ($Taken as $index => $take) {
                                            if($take->ID == $value->ID){
                                                ?><td>
                                                    <select data-key="<?=$value->ID?>" name="<?=$value->ID?>" class="form-control input-md or_for select2" style="width: 80%; color: black;">                                               
                                                        <option value="" disabled selected> Select </option>
                                                        <?php foreach ($col_type as $key => $col) {
                                                            ?><option value="<?=@$col->Type?>"> <?=@$col->Type?> </option><?php
                                                        }?>
                                                        <!-- <option value="General"> GENERAL </option>
                                                        <option value="Trust"> TRUST </option> -->
                                                    </select>
                                                </td>                                       
                                                <td><button class="btn btn-md btn-flat btn-success save" data-id="<?=$value->ID?>"><i class="fa fa-plus-square"></i> save </button></td><?php
                                            }                                            
                                        }?> 
                                        <?php
                                            if($value->OR_for != null){
                                                if($value->OR_origin == 51){
                                                    ?><td style="color:green; font-weight:bold;"> <?=strtoupper($value->OR_for)?> </td>
                                                    <td style="color: red;"> <b>Used</b> &nbsp;&nbsp;&nbsp;&nbsp; <button data-origin="<?=@$value->OR_origin?>" data-id="<?=$value->ID?>" class="btn btn-flat btn-sm btn-warning cancel_form"><i class="fa fa-times"></i></button> </td><?php
                                                }else{
                                                    ?>
                                                    <td style="color:green; font-weight:bold;"> <?=strtoupper($value->OR_for)?> </td>
                                                    <td style="color: red;"> <b>Used</b> &nbsp;&nbsp;&nbsp;&nbsp; <button class="btn btn-flat btn-sm btn-warning other-form"><i class="fa fa-times"></i></button> </button></td>
                                                <?php  
                                                }                                                                                              
                                            }
                                        ?>                                       
                                    </tr>
                                <?php
                            }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>       
    </section>
</div>
<?php echo main_footer();?>
<script language="javascript" src="<?php echo base_url()?>assets/general_assets/dashboard.js"></script>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/theme/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<script src="<?php echo base_url() ?>assets/theme/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script>
    var baseUrl = '<?php echo base_url();?>';   
    $(function(){
        $('.select2').select2();
    });
    $('.other-form').prop('disabled', true); 
</script>