<?php function cards_boxes($cards){ 
    $Processing = 0;
    $Approved = 0;
    $Green = 0;
    $Yellow = 0;
        
    foreach($cards as $key => $card){
        if($card->Status === 'ON PROCESS'){
            $Processing++;
        }else if($card->Status === 'APPROVED') {
            $Approved++;
            if($card->Card_type === 'Green'){
                $Green++;
            }else if($card->Card_type === 'Yellow') {
                $Yellow++;
            }
        }
    } ?>
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-olive">
                <div class="inner">
                    <h3><?=$Approved?></h3>
                    <p>Approved Applications</p>
                </div>
                <div class="icon">
                    <i class="ion ion-checkmark-circled"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3><?=$Processing?></h3>
                    <p>On Process Applications</p>
                </div>
                <div class="icon">
                    <i class="ion ion-help-circled"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-green">
                <div class="inner">
                    <h3><?=$Green?></h3>
                    <p>Green Cards</p>
                </div>
                <div class="icon">
                    <i class="ion ion-document-text"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3><?=$Yellow?></h3>
                    <p>Yellow Cards</p>
                </div>
                <div class="icon">
                    <i class="ion ion-document"></i>
                </div>
            </div>
        </div>
    </div>
<?php } 

function permits_boxes($applications, $unbilled){ 
    $Processing = 0;
    $Approved = 0;
    $Disapproved = 0;
        
    foreach($applications as $key => $app){
        if($app->Status === 'ON PROCESS'){
            $Processing++;
        }else if($app->Status === 'APPROVED') {
            $Approved++;
        }else if($app->Status === 'DISAPPROVED') {
            $Disapproved++;
        }
    }
    ?>
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3><?=$unbilled?></h3>
                    <p>Unprocessed Applications</p>
                </div>
                <div class="icon">
                    <i class="fa fa-exclamation-circle"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3><?=$Processing?></h3>
                    <p>On Process Applications</p>
                </div>
                <div class="icon">
                    <i class="fa fa-question-circle"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-green">
                <div class="inner">
                    <h3><?=$Approved?></h3>
                    <p>Approved Applications</p>
                </div>
                <div class="icon">
                    <i class="fa fa-check-circle"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-red">
                <div class="inner">
                    <h3><?=$Disapproved?></h3>
                    <p>Disapproved Applications</p>
                </div>
                <div class="icon">
                    <i class="fa fa-times-circle"></i>
                </div>
            </div>
        </div>
    </div>
<?php } ?>