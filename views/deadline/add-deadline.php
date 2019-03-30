<?php require './../../config.php';
include VIEWS.'/header.php';
require_once CONTROLLERS.'/deadline-controller.php';
$_SESSION['studentId'];
?>

<main id="jg-main" class="m-4">
    <div class="text-center p-3">
        <h1>Add New Deadline</h1>
        <div class="p-4">
            <form action="" method="POST" class="m-4">
                <div>
                    <label for="deadlineName">Deadline Name:</label>
                </div>
                <div>
                    <input type="text" class="form__input-field" name="deadlineName" value="<?php
                      if(isset($_POST['deadlineName'])){
                        echo $name;}
                        ?>"/>
                </div>
                <div>
                    <label for="deadlineDate">Deadline Date:</label>
                </div>
                <div>
                    <input type="date" class="form-control"name="deadlineDate" value="<?php 
                    if (isset($_POST['deadlineDate'])) {echo $date;} 
                    ?>">
                </div>
                <div>
                    <label for="deadlineDesc">Deadline Description:</label>
                </div>
                <div>
                    <textarea type="text" class="form-control"name="deadlineDesc"><?php
                    if(isset($_POST['deadlineDesc'])){
                        echo $desc;
                      }?></textarea>
                </div>
                <button class="jg-button-primary" name="addDeadline" type="submit">Submit</button>
            </form>
        </div>

    </div>
</main>

<?php include VIEWS.'/footer.php'; ?>
