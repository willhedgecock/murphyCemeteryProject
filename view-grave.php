<?php   

    if (isset($_GET['burial_ID'])) {

        require("main.php");

        $id = $_GET['burial_ID'];

        $sql = "SELECT * FROM murphyburials WHERE burial_ID = '$id'";

        //var_dump($sql); die;

        $stmt = $pdo->prepare($sql);

        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC);

    } else {
        header('find-grave.php');
    }
?>

    <style>
        <?php include('css/find-display-grave.css') ?>
    </style>
    

    <?php if ($row=$stmt->fetch(PDO::FETCH_ASSOC)) { ?>


    <!--Display first and last name (middle name if available)-->
    

    <div class="burial-record">   
        
    <h1><?php echo $row['burial_first_name'] . " " . $row['burial_middle_name'] . " " . $row['burial_last_name'] ?></h1>

        <!--Display birthdate if available else display birth year-->
        <?php if ($row['burial_DOB'] == "" || $row['burial_DOB'] == "0000-00-00") { ?>
            <?php if ($row['burial_birth_year'] != "") { ?>
            <p>Birth year: <?php echo $row['burial_birth_year'] ?></p>
        <?php }} else { ?>
        <p>Date of birth: <?php echo $row['burial_DOB'] ?></p>
        <?php } ?>

        <!--Display birth place (city and state)-->
        <?php if ($row['burial_birthplace_city'] != "" && $row['burial_birthplace_st'] != "") { ?>
            <p>Birthplace: <?php echo $row['burial_birthplace_city'] . "," . " " ?>
            <?php echo $row['burial_birthplace_st'] ?>            
            </p>
        <?php } ?> 
        
        <?php if ($row['burial_birthplace_city'] == "" && $row['burial_birthplace_st'] != "") { ?>
            <p>Birth state: <?php echo $row['burial_birthplace_st'] ?></p>
        <?php } ?>

        <!--Display burial plot row and number-->
        <p>Plot Row: <?php echo $row['burial_plot_row'] ?>
           Plot Number: <?php echo $row['burial_plot_number'] ?>
        </p>

        <!--Display veteran information if present in the database-->
        <?php if ($row['burial_veteran'] == "Y") { ?>
            <p>Military Branch: <?php echo $row['burial_veteran_branch'] ?></p>
            <p>Military Rank: <?php echo $row['burial_veteran_rank'] ?></p>
            <p>Military Time Served: <?php echo $row['burial_veteran_service_time'] ?></p>
        <?php } ?>

        <!--Display date of death if available-->
        <?php if ($row['burial_date_of_death'] != "") { ?>
            <?php if ($row['burial_date_of_death'] != "")  { ?>
            <p>Burial death date: <?php echo $row['burial_date_of_death'] ?></p>
        <?php } } ?>

        <?php if ($row['burial_death_year'] != "" && $row['burial_death_year'] == "") { ?>
            <?php if ($row['burial_death_year'] != 0)  { ?>
            <p>Burial death year: <?php echo $row['burial_death_year'] ?></p>
        <?php }} ?>

        <!--Display burial date if available else display burial year-->
        <?php if ($row['burial_interment_date'] != "") { ?>
            <?php if ($row['burial_interment_date'] != "")  { ?>
            <p>Burial interment date: <?php echo $row['burial_interment_date'] ?></p>
        <?php } } ?>

        <?php if ($row['burial_interment_year'] != "" && $row['burial_interment_date'] == "") { ?>
            <?php if ($row['burial_interment_year'] != 0)  { ?>
            <p>Burial interment year: <?php echo $row['burial_interment_year'] ?></p>
        <?php }} ?>

        <!--Display spouse information-->
        <?php if ($row['burial_spouse_first_name'] != "") { ?>
            <p>Spouse: <?php echo $row['burial_spouse_first_name'] .  " " . $row['burial_spouse_last_name'] ?></p>
        <?php } ?>

        <!--Display children-->
        <?php if ($row['burial_children_names'] != "") { ?>
            <p>Children: <?php echo $row['burial_children_names'] ?>
        <?php } ?>

        <!--Display parents-->
        <?php if ($row['burial_mother_first_name'] != "") { ?>
            <p>Mother: <?php echo $row['burial_mother_first_name'] . " " . $row['burial_mother_last_name']?></p>
        <?php } ?>

        <?php if ($row['burial_father_first_name'] != "") { ?>
            <p>Father: <?php echo $row['burial_father_first_name'] . " " . $row['burial_father_last_name']?></p>
        <?php } ?>

        <!--Display family notes-->
        <?php if ($row['burial_family_notes'] != "") { ?>
            <p>Family notes: <?php echo $row['burial_family_notes']?></p>
        <?php } ?>

        <button type="button" class="print-burial" onclick="window.print()">Print</button>
      
    </div>

    <?php } ?>