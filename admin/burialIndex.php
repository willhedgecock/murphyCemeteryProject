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
                    <td>Burial_ID</td>
                    <td>First Name</td>
                    <td>Middle Name</td>
                    <td>Last Name</td>
                    <td>Date Of Birth</td>
                    <td>Birth Year</td>
                    <td>Birthplace City</td>
                    <td>Birthplace State</td>
                    <td>Date Of Death</td>
                    <td>Death Year</td>
                    <td>Plot Row</td>
                    <td>Plot Number</td>
                    <td>Interment Date</td>
                    <td>Interment Year</td>
                    <td>Veteran</td>
                    <td>Veteran Branch</td>
                    <td>Veteran Rank</td>
                    <td>Veteran Service Time</td>
                    <td>Spouse First Name</td>
                    <td>Spouse Middle Name</td>
                    <td>Spouse Last Name</td>
                    <td>Children Names</td>
                    <td>Mother First Name</td>
                    <td>Mother Middle Name</td>
                    <td>Mother Last Name</td>
                    <td>Father First Name</td>
                    <td>Father Middle Name</td>
                    <td>Father Last Name</td>
                    <td>Image Of Deceased</td>
                    <td>Grave Image #1</td>
                    <td>Grave Image #2</td>
                    <td>Obituary</td>
                    <td>Family Notes</td>
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
                    <td><?=$burialEntry['burial_ID']?></td>
                    <td><?=$burialEntry['burial_first_name']?></td>
                    <td><?=$burialEntry['burial_middle_name']?></td>
                    <td><?=$burialEntry['burial_last_name']?></td>
                    <td><?=$burialEntry['burial_DOB']?></td>
                    <td><?=$burialEntry['burial_birth_year']?></td>
                    <td><?=$burialEntry['burial_birthplace_city']?></td>
                    <td><?=$burialEntry['burial_birthplace_st']?></td>
                    <td><?=$burialEntry['burial_date_of_death']?></td>
                    <td><?=$burialEntry['burial_death_year']?></td>
                    <td><?=$burialEntry['burial_plot_row']?></td>
                    <td><?=$burialEntry['burial_plot_number']?></td>
                    <td><?=$burialEntry['burial_interment_date']?></td>
                    <td><?=$burialEntry['burial_interment_year']?></td>
                    <td><?=$burialEntry['burial_veteran']?></td>
                    <td><?=$burialEntry['burial_veteran_branch']?></td>
                    <td><?=$burialEntry['burial_veteran_rank']?></td>
                    <td><?=$burialEntry['burial_veteran_service_time']?></td>
                    <td><?=$burialEntry['burial_spouse_first_name']?></td>
                    <td><?=$burialEntry['burial_spouse_middle_name']?></td>
                    <td><?=$burialEntry['burial_spouse_last_name']?></td>
                    <td><?=$burialEntry['burial_children_names']?></td>
                    <td><?=$burialEntry['burial_mother_first_name']?></td>
                    <td><?=$burialEntry['burial_mother_middle_name']?></td>
                    <td><?=$burialEntry['burial_mother_last_name']?></td>
                    <td><?=$burialEntry['burial_father_first_name']?></td>
                    <td><?=$burialEntry['burial_father_middle_name']?></td>
                    <td><?=$burialEntry['burial_father_last_name']?></td>
                    <td><?=$burialEntry['burial_img_deceased']?></td>
                    <td><?=$burialEntry['burial_img_grave1']?></td>
                    <td><?=$burialEntry['burial_img_grave2']?></td>
                    <td><?=$burialEntry['burial_obituary']?></td>
                    <td><?=$burialEntry['burial_family_notes']?></td>
                    
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?=template_admin_footer()?>
                    
                    
