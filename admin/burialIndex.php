<?php
include 'main.php';
$stmt = $pdo->prepare('SELECT * FROM murphyburials');
$stmt->execute();
$burialEntries = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?=template_admin_header('Accounts')?>

<h2>Burial Entry</h2>

<div class="links">
    <a href="burialEntry.php">Create New Entry</a>
</div>

<div class="content-block">
    <div class="table">
        <table>
            <thead>
                <tr>
                    <td class="responsive-hidden">Burial_ID</td>
                    <td>First Name</td>
                    <td class="responsive-hidden">Middle Name</td>
                    <td>Last Name</td>
                    <td class="responsive-hidden">Date Of Birth</td>
                    <td class="responsive-hidden">Birth Year</td>
                    <td class="responsive-hidden">Birthplace City</td>
                    <td class="responsive-hidden">Birthplace State</td>
                    <td class="responsive-hidden">Date Of Death</td>
                    <td class="responsive-hidden">Death Year</td>
                    <td class="responsive-hidden">Plot Row</td>
                    <td class="responsive-hidden">Plot Number</td>
                    <td class="responsive-hidden">Interment Date</td>
                    <td class="responsive-hidden">Interment Year</td>
                    <td class="responsive-hidden">Veteran</td>
                    <td class="responsive-hidden">Veteran Branch</td>
                    <td class="responsive-hidden">Veteran Rank</td>
                    <td class="responsive-hidden">Veteran Service Time</td>
                    <td class="responsive-hidden">Spouse First Name</td>
                    <td class="responsive-hidden">Spouse Middle Name</td>
                    <td class="responsive-hidden">Spouse Last Name</td>
                    <td class="responsive-hidden">Children Names</td>
                    <td class="responsive-hidden">Mother First Name</td>
                    <td class="responsive-hidden">Mother Middle Name</td>
                    <td class="responsive-hidden">Mother Last Name</td>
                    <td class="responsive-hidden">Father First Name</td>
                    <td class="responsive-hidden">Father Middle Name</td>
                    <td class="responsive-hidden">Father Last Name</td>
                    <td class="responsive-hidden">Image Of Deceased</td>
                    <td class="responsive-hidden">Grave Image #1</td>
                    <td class="responsive-hidden">Grave Image #2</td>
                    <td class="responsive-hidden">Obituary</td>
                    <td class="responsive-hidden"Family Notes</td>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($burialEntries)): ?>
                <tr>
                    <td colspan="8" style="text-align:center;">There are no burial entries</td>
                </tr>
                <?php else: ?>
                <?php foreach ($burialEntries as $burialEntry): ?>
                <tr class="details" onclick="location.href='burialEntry.php?burial_ID=<?=$burialEntry['burial_ID']?>'">
                    <td class="responsive-hidden"><?=$burialEntry['burial_ID']?></td>
                    <td><?=$burialEntry['burial_first_name']?></td>
                    <td class="responsive-hidden"><?=$burialEntry['burial_middle_name']?></td>
                    <td><?=$burialEntry['burial_last_name']?></td>
                    <td class="responsive-hidden"><?=$burialEntry['burial_DOB']?></td>
                    <td class="responsive-hidden"><?=$burialEntry['burial_birth_year']?></td>
                    <td class="responsive-hidden"><?=$burialEntry['burial_birthplace_city']?></td>
                    <td class="responsive-hidden"><?=$burialEntry['burial_birthplace_st']?></td>
                    <td class="responsive-hidden"><?=$burialEntry['burial_date_of_death']?></td>
                    <td class="responsive-hidden"><?=$burialEntry['burial_death_year']?></td>
                    <td class="responsive-hidden"><?=$burialEntry['burial_plot_row']?></td>
                    <td class="responsive-hidden"><?=$burialEntry['burial_plot_number']?></td>
                    <td class="responsive-hidden"><?=$burialEntry['burial_interment_date']?></td>
                    <td class="responsive-hidden"><?=$burialEntry['burial_interment_year']?></td>
                    <td class="responsive-hidden"><?=$burialEntry['burial_veteran']?></td>
                    <td class="responsive-hidden"><?=$burialEntry['burial_veteran_branch']?></td>
                    <td class="responsive-hidden"><?=$burialEntry['burial_veteran_rank']?></td>
                    <td class="responsive-hidden"><?=$burialEntry['burial_veteran_service_time']?></td>
                    <td class="responsive-hidden"><?=$burialEntry['burial_spouse_first_name']?></td>
                    <td class="responsive-hidden"><?=$burialEntry['burial_spouse_middle_name']?></td>
                    <td class="responsive-hidden"><?=$burialEntry['burial_spouse_last_name']?></td>
                    <td class="responsive-hidden"><?=$burialEntry['burial_children_names']?></td>
                    <td class="responsive-hidden"><?=$burialEntry['burial_mother_first_name']?></td>
                    <td class="responsive-hidden"><?=$burialEntry['burial_mother_middle_name']?></td>
                    <td class="responsive-hidden"><?=$burialEntry['burial_mother_last_name']?></td>
                    <td class="responsive-hidden"><?=$burialEntry['burial_father_first_name']?></td>
                    <td class="responsive-hidden"><?=$burialEntry['burial_father_middle_name']?></td>
                    <td class="responsive-hidden"><?=$burialEntry['burial_father_last_name']?></td>
                    <td class="responsive-hidden"><?=$burialEntry['burial_img_deceased']?></td>
                    <td class="responsive-hidden"><?=$burialEntry['burial_img_grave1']?></td>
                    <td class="responsive-hidden"><?=$burialEntry['burial_img_grave2']?></td>
                    <td class="responsive-hidden"><?=$burialEntry['burial_obituary']?></td>
                    <td class="responsive-hidden"><?=$burialEntry['burial_family_notes']?></td>
                    
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?=template_admin_footer()?>
                    
                    
