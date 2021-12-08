<?=empty($stabs) ? 'No stabs found.':''?>
<?php foreach ($stabs as $key => $stab):?>
    <tr>
        <td><?=$stab->OR_Type?></td>
        <td><?=$stab->Stub_no?></td>
        <td><?=$stab->Start_OR?></td>
        <td><?=$stab->End_OR?></td>
        <td><?=$stab->remaining?></td>
    </tr>
<?php endforeach;?>
