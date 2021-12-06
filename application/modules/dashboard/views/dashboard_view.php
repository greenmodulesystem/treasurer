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
            <li>Collection</li>
            <li class="active">Dashboard</li>
        </ol><br>
    </section>
    <section class="content">
        <div class="row">
            <div class="box-body">
                <div class="box box-primary" style="color: black">
                    <table class="table table-hover">
                        <thead>
                            <th>OR Type</th>
                            <th>Stub No</th>
                            <th>Start OR</th>
                            <th>End OR</th>                           
                            <th>OR For</th>
                            <th>Status</th>
                        </thead>
                        <tbody>
                            <?php foreach ($Forms as $key => $value) {
                                ?>
                                    <tr>
                                        <td><?=$value->OR_Type?></td>
                                        <td><?=$value->Stub_no?></td>
                                        <td><?=$value->Start_OR?></td>
                                        <td><?=$value->End_OR?></td>
                                        <?php foreach ($Taken as $index => $take) {
                                            if($take->ID == $value->ID){
                                                ?><td>
                                                    <select data-key="<?=$value->ID?>" name="<?=$value->ID?>" class="form-control input-md or_for" style="width: 80%; color: black;">                                               
                                                        <option value="" disabled selected>Select...</option>
                                                        <option value="General">General</option>
                                                        <option value="Trust">Trust</option>                                               
                                                        <option value="Cedula">Cedula</option>
                                                        <option value="RealProperty">RPT</option>
                                                        <option value="Form 52">Form 52</option>
                                                        <option value="Form 53">Form 53</option>
                                                        <option value="Form 54">Form 54</option>
                                                        <option value="Form 56">Form 56</option>
                                                        <option value="Form 57">Form 57</option>
                                                    </select>
                                                </td>                                       
                                                <td><button class="btn btn-md btn-flat btn-success save" data-id="<?=$value->ID?>"><i class="fa fa-plus-square"></i> save </button></td><?php
                                            }                                            
                                        }?> 
                                        <?php
                                            if($value->OR_for != null){
                                                ?><td style="color: green"> <?=$value->OR_for?> </td>
                                                <td style="color: red;"> <b>Used</b> &nbsp;&nbsp;&nbsp;&nbsp; <button data-id="<?=$value->ID?>" class="btn btn-flat btn-sm btn-warning cancel_form"><i class="fa fa-times"></i></button> </td><?php
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
</script>