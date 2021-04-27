<?php
include 'main.php';
// Default input account values
$burialEntries = array(
    'burial_first_name' => '',
    'burial_middle_name' => '',
    'burial_last_name' => '',
    'burial_DOB' => '',
    'burial_birth_year' => '',
    'burial_birthplace_city' => '',
    'burial_birthplace_st' => '',
    'burial_date_of_death' => '',
    'burial_death_year' => '',
    'burial_plot_row' => '',
    'burial_plot_number' => '',
    'burial_interment_date' => '',
    'burial_interment_year' => '',
    'burial_veteran' => '',
    'burial_veteran_branch' => '',
    'burial_veteran_rank' => '',
    'burial_veteran_service_time' => '',
    'burial_spouse_first_name' => '',
    'burial_spouse_middle_name' => '',
    'burial_spouse_last_name' => '',
    'burial_children_names' => '',
    'burial_mother_first_name' => '',
    'burial_mother_middle_name' => '',
    'burial_mother_last_name' => '',
    'burial_father_first_name' => '',
    'burial_father_middle_name' => '',
    'burial_father_last_name' => '',
    'burial_img_deceased' => '',
    'burial_img_grave1' => '',
    'burial_img_grave2' => '',
    'burial_obituary' => '',
    'burial_family_notes' => ''
);

if (isset($_GET['burial_ID'])) {
    // Get the burial from the database
    $stmt = $pdo->prepare('SELECT * FROM murphyburials WHERE burial_ID = ?');
    $stmt->execute([ $_GET['burial_ID'] ]);
    $burialEntries = $stmt->fetch(PDO::FETCH_ASSOC);
    // burial_ID param exists, edit an existing account
    $page = 'Edit';
    if (isset($_POST['submit'])) {
        // Update the account
        $stmt = $pdo->prepare('UPDATE murphyburials SET burial_first_name = ?, burial_middle_name = ?, burial_last_name = ?, burial_DOB = ?, burial_birth_year = ?, burial_birthplace_city = ?, burial_birthplace_st = ?, burial_date_of_death = ?, burial_death_year = ?, burial_plot_row = ?, burial_plot_number = ?, burial_interment_date = ?, burial_interment_year = ?, burial_veteran = ?, burial_veteran_branch = ?, burial_veteran_rank = ?, burial_veteran_service_time = ?, burial_spouse_first_name = ?, burial_spouse_middle_name = ?, burial_spouse_last_name = ?, burial_children_names = ?, burial_mother_first_name = ?, burial_mother_middle_name = ?, burial_mother_last_name = ?, burial_father_first_name = ?, burial_father_middle_name = ?, burial_father_last_name = ?, burial_img_deceased = ?, burial_img_grave1 = ?, burial_img_grave2 = ?, burial_obituary = ?, burial_family_notes = ? WHERE burial_ID = ?');
        $stmt->execute([ $_POST['burial_first_name'], $_POST['burial_middle_name'], $_POST['burial_last_name'], $_POST['burial_DOB'], $_POST['burial_birth_year'], $_POST['burial_birthplace_city'], $_POST['burial_birthplace_st'], $_POST['burial_date_of_death'], $_POST['burial_death_year'], $_POST['burial_plot_row'], $_POST['burial_plot_number'], $_POST['burial_interment_date'], $_POST['burial_interment_year'], $_POST['burial_veteran'], $_POST['burial_veteran_branch'], $_POST['burial_veteran_rank'], $_POST['burial_veteran_service_time'], $_POST['burial_spouse_first_name'], $_POST['burial_spouse_middle_name'], $_POST['burial_spouse_last_name'], $_POST['burial_children_names'], $_POST['burial_mother_first_name'], $_POST['burial_mother_middle_name'], $_POST['burial_mother_last_name'], $_POST['burial_father_first_name'], $_POST['burial_father_middle_name'], $_POST['burial_father_last_name'], $_POST['burial_img_deceased'], $_POST['burial_img_grave1'], $_POST['burial_img_grave2'], $_POST['burial_obituary'], $_POST['burial_family_notes'], $_GET['burial_ID'] ]);
        header('Location: burialIndex.php');
        exit;
    }
    if (isset($_POST['delete'])) {
        // Delete the account
        $stmt = $pdo->prepare('DELETE FROM murphyburials WHERE burial_ID = ?');
        $stmt->execute([ $_GET['burial_ID'] ]);
        header('Location: burialIndex.php');
        exit;
    }
} else {
    // Create a new account
    $page = 'Create';
    if (isset($_POST['submit'])) {
        $stmt = $pdo->prepare('INSERT IGNORE INTO murphyburials (burial_first_name,burial_middle_name,burial_last_name,burial_DOB,burial_birth_year,burial_birthplace_city,burial_birthplace_st,burial_date_of_death,burial_death_year,burial_plot_row,burial_plot_number,burial_interment_date,burial_interment_year,burial_veteran, burial_veteran_branch,burial_veteran_rank,burial_veteran_service_time, burial_spouse_first_name,burial_spouse_middle_name,burial_spouse_last_name,burial_children_names,burial_mother_first_name,burial_mother_middle_name,burial_mother_last_name,burial_father_first_name,burial_father_middle_name,burial_father_last_name,burial_img_deceased,burial_img_grave1,burial_img_grave2,burial_obituary,burial_family_notes) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
        $stmt->execute([ $_POST['burial_first_name'], $_POST['burial_middle_name'], $_POST['burial_last_name'], $_POST['burial_DOB'], $_POST['burial_birth_year'], $_POST['burial_birthplace_city'], $_POST['burial_birthplace_st'], $_POST['burial_date_of_death'], $_POST['burial_death_year'], $_POST['burial_plot_row'], $_POST['burial_plot_number'], $_POST['burial_interment_date'], $_POST['burial_interment_year'], $_POST['burial_veteran'], $_POST['burial_veteran_branch'], $_POST['burial_veteran_rank'], $_POST['burial_veteran_service_time'], $_POST['burial_spouse_first_name'], $_POST['burial_spouse_middle_name'], $_POST['burial_spouse_last_name'], $_POST['burial_children_names'], $_POST['burial_mother_first_name'], $_POST['burial_mother_middle_name'], $_POST['burial_mother_last_name'], $_POST['burial_father_first_name'], $_POST['burial_father_middle_name'], $_POST['burial_father_last_name'], $_POST['burial_img_deceased'], $_POST['burial_img_grave1'], $_POST['burial_img_grave2'], $_POST['burial_obituary'], $_POST['burial_family_notes']]);
        header('Location: burialIndex.php');
        exit;
    }
}
?>

<?=template_admin_header($page . ' Account')?>

<h2><?=$page?> Burial Entry</h2>

<div class="content-block">
    <form action="" method="post" class="form responsive-width-100">
        <label for="burial_first_name">First Name</label>
        <input type="text" id="burial_first_name" name="burial_first_name" placeholder="First Name" value="<?=$burialEntries['burial_first_name']?>" required>
        <label for="burial_middle_name">Middle Name</label>
        <input type="text" id="burial_middle_name" name="burial_middle_name" placeholder="Middle Name" value="<?=$burialEntries['burial_middle_name']?>" required>
        <label for="burial_last_name">Last Name</label>
        <input type="text" id="burial_last_name" name="burial_last_name" placeholder="Last Name" value="<?=$burialEntries['burial_last_name']?>" required>
        <label for="burial_DOB">Date Of Birth</label>
        <input type="date" id="burial_DOB" name="burial_DOB" placeholder="Date Of Birth" value="<?=$burialEntries['burial_DOB']?>">
        <label for="burial_birth_year">Birth Year</label>
        <input type="number" id="burial_birth_year" name="burial_birth_year" placeholder="Birth Date" maxlength="4" value="<?=$burialEntries['burial_birth_year']?>">
        <label for="burial_birthplace_city">City Of Birth</label>
        <input type="text" id="burial_birthplace_city" name="burial_birthplace_city" placeholder="City Of Birth" value="<?=$burialEntries['burial_birthplace_city']?>">
        <label for="burial_birthplace_st">State Of Birth</label>
        <input type="text" id="burial_birthplace_st" name="burial_birthplace_st" placeholder="State Of Birth" value="<?=$burialEntries['burial_birthplace_st']?>">

        <label for="burial_date_of_death">Date Of Death</label>
        <input type="date" id="burial_date_of_death" name="burial_date_of_death" placeholder="Date Of Death" value="<?=$burialEntries['burial_date_of_death']?>">
        <label for="burial_death_year">Year of Death</label>
        <input type="number" maxlength="4" id="burial_death_year" name="burial_death_year" placeholder="Death Year" value="<?=$burialEntries['burial_death_year']?>">
        <label for="burial_plot_row">Plot Row Number</label>
        <input type="number" id="burial_plot_row" name="burial_plot_row" placeholder="Burial Plot Row Number" value="<?=$burialEntries['burial_plot_row']?>">
        <label for="burial_plot_number">Plot Number</label>
        <input type="number" id="burial_plot_number" name="burial_plot_number" placeholder="Burial Plot Number" value="<?=$burialEntries['burial_plot_number']?>">
        <label for="burial_interment_date">Date Of Interment</label>
        <input type="date" id="burial_interment_date" name="burial_interment_date" placeholder="Date Of Interment" value="<?=$burialEntries['burial_interment_date']?>">
        <label for="burial_interment_year">Interment Year</label>
        <input type="number" maxlength="4" id="burial_interment_year" name="burial_interment_year" placeholder="Interment Year" value="<?=$burialEntries['burial_interment_year']?>">
        
        <div id="veteran">
            <label for="burial_veteran">Was a Veteran? y/n</label>
            <input type="text" maxlength="1" id="burial_veteran" name="burial_veteran" placeholder="Veteran" value="<?=$burialEntries['burial_veteran']?>">
            <label for="burial_veteran_branch">Veteran Branch</label>
            <input type="text" id="burial_veteran_branch" name="burial_veteran_branch" placeholder="Veteran Branch" value="<?=$burialEntries['burial_veteran_branch']?>">
            <label for="burial_veteran_rank">Veteran Rank</label>
            <input type="text" id="burial_veteran_rank" name="burial_veteran_rank" placeholder="Veteran Rank" value="<?=$burialEntries['burial_veteran_rank']?>">
            <label for="burial_veteran_service_time">Veteran Service Time</label>
            <input type="text" id="burial_veteran_service_time" name="burial_veteran_service_time" placeholder="Veteran Service Time" value="<?=$burialEntries['burial_veteran_service_time']?>">
        </div>
        
        <label for="burial_spouse_first_name">Spouse First Name</label>
        <input type="text" id="burial_spouse_first_name" name="burial_spouse_first_name" placeholder="Spouse First Name" value="<?=$burialEntries['burial_spouse_first_name']?>">
        <label for="burial_spouse_middle_name">Spouse Middle Name</label>
        <input type="text" id="burial_spouse_middle_name" name="burial_spouse_middle_name" placeholder="Spouse Middle Name" value="<?=$burialEntries['burial_spouse_middle_name']?>">
        <label for="burial_spouse_last_name">Spouse Last Name</label>
        <input type="text" id="burial_spouse_last_name" name="burial_spouse_last_name" placeholder="Spouse Last Name" value="<?=$burialEntries['burial_spouse_last_name']?>">
        <label for="burial_children_names">Names Of Children</label>
        <input type="text" id="burial_children_names" name="burial_children_names" placeholder="Names Of Children" value="<?=$burialEntries['burial_children_names']?>">
        <label for="burial_mother_first_name">Mothers First Name</label>
        <input type="text" id="burial_mother_first_name" name="burial_mother_first_name" placeholder="Mothers First Name" value="<?=$burialEntries['burial_mother_first_name']?>">
        <label for="burial_mother_middle_name">Mothers Middle Name</label>
        <input type="text" id="burial_mother_middle_name" name="burial_mother_middle_name" placeholder="Mothers Middle Name" value="<?=$burialEntries['burial_mother_middle_name']?>">
        <label for="burial_mother_last_name">Mothers Last Name</label>
        <input type="text" id="burial_mother_last_name" name="burial_mother_last_name" placeholder="Mothers Last Name" value="<?=$burialEntries['burial_mother_last_name']?>">
        <label for="burial_father_first_name">Fathers First Name</label>
        <input type="text" id="burial_father_first_name" name="burial_father_first_name" placeholder="Fathers First Name" value="<?=$burialEntries['burial_father_first_name']?>">
        <label for="burial_father_middle_name">Fathers Middle Name</label>
        <input type="text" id="burial_father_middle_name" name="burial_father_middle_name" placeholder="Fathers Middle Name" value="<?=$burialEntries['burial_father_middle_name']?>">
        <label for="burial_father_last_name">Fathers Last Name</label>
        <input type="text" id="burial_father_last_name" name="burial_father_last_name" placeholder="Fathers Last Name" value="<?=$burialEntries['burial_father_last_name']?>">
        <label for="burial_img_deceased">Image Of Deceased</label>
        <input type="text" id="burial_img_deceased" name="burial_img_deceased" placeholder="Image of Deceased" value="<?=$burialEntries['burial_img_deceased']?>">
        <label for="burial_img_grave1">Picture Of Grave #1</label>
        <input type="text" id="burial_img_grave1" name="burial_img_grave1" placeholder="Picture Of Grave #1" value="<?=$burialEntries['burial_img_grave1']?>">
        <label for="burial_img_grave2">Picture Of Grave #2</label>
        <input type="text" id="burial_img_grave2" name="burial_img_grave2" placeholder="Pictures Of Grave #2" value="<?=$burialEntries['burial_img_grave2']?>">
        <label for="burial_obituary">Burial Obituary</label>
        <input type="text" id="burial_obituary" name="burial_obituary" placeholder="Burial Obituary" value="<?=$burialEntries['burial_obituary']?>">
        <label for="burial_family_notes">Burial Family Notes</label>
        <input type="text" id="burial_family_notes" name="burial_family_notes" placeholder="Burial Family Notes" value="<?=$burialEntries['burial_family_notes']?>">

        
        <div class="submit-btns">
            <input type="submit" name="submit" value="Submit">
            <?php if ($page == 'Edit'): ?>
            <input type="submit" name="delete" value="Delete" class="delete">
            <?php endif; ?>
        </div>
    </form>
</div>

<?=template_admin_footer()?>
