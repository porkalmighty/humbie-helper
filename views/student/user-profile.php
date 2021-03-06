<?php
require '../../config.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once CONTROLLERS.'/student-controller.php';
require_once CONTROLLERS. '/timer-controller.php';
require_once CONTROLLERS. '/project-controller.php';
require_once MODELS. '/Timer.php';


if(!isset($_SESSION['username'])) {
    header("Location:/project-backstreet-boys-and-jenna");
}

$s = $student->getStudent($_SESSION['studentId']);
$projects = $project->listProjects($_SESSION['studentId'], $db);
require_once VIEWS.'/header.php';
?>
<main id="jg-main" class="m-4">
    <h1 class="text-center m-3">Welcome, <?= $_SESSION['username'];?>!</h1>

    <div class="container">
        <div class="row project-details">
            <div class="col-lg-12 d-flex justify-content-center jg_sub-header">
                <div>
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

                        <li class="nav-item">
                            <a class="nav-link active" id="pills-currentProjects-tab" data-toggle="pill"
                                href="#pills-currentProjects" role="tab" aria-controls="pills-currentProjects"
                                aria-selected="false">Current Projects</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-yourInfo-tab" data-toggle="pill" href="#pills-yourInfo"
                                role="tab" aria-controls="pills-yourInfo" aria-selected="false">Your Info</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-timesheet-tab" data-toggle="pill" href="#pills-timesheet"
                                role="tab" aria-controls="pills-timesheet" aria-selected="false">Timesheet</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-12 d-flex justify-content-center">
                <div class="tab-content m-2" id="pills-tabContent">

                    <!-- Current Projects Tab  -->
                    <div class="tab-pane fade show active" id="pills-currentProjects" role="tabpanel"
                        aria-labelledby="pills-currentProjects-tab">


                        <table class="table">
                            <thead class="jg_table__thead text center">
                                <tr>
                                    <th>Project Name</th>
                                    <th> Details </th>
                                    <th> Edit </th>
                                    <th> Delete </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($projects as $project):?>
                                <tr class="jg_table__tbody">
                                    <td><?=$project->project_name?></td>
                                    <td>
                                        <form action="" method='post'>
                                            <input type='hidden' name="project_id" value="<?=$project->id?>" />
                                            <input class='jg-table__button btn' type='submit' name='details'
                                                value='Project Details' />
                                        </form>
                                    </td>
                                    <td>
                                        <form action="" method='post'>
                                            <input type='hidden' name="project_id" value="<?=$project->id?>" />
                                            <input class='jg-table__button btn' type='submit' name='edit'
                                                value='Edit Project' />
                                        </form>
                                    </td>
                                    <td>
                                        <form action="" method='post'>
                                            <input type='hidden' name="project_id" value="<?=$project->id?>" />
                                            <input class='jg-table__button btn' type='submit' name='delete'
                                                value='Delete Project' />
                                        </form>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <ul class="list-group list-group-flush text-center">
                            <li class="list-group-item jg-add-details" style="width: 50%; margin: 0 auto;"><a
                                    href="<?= RVIEWS."/project/add-project.php"?>">&plus; Start
                                    A New Project</a></li>
                        </ul>
                    </div>

                    <!-- Your Info Tab  -->
                    <div class="tab-pane fade" id="pills-yourInfo" role="tabpanel" aria-labelledby="pills-yourInfo-tab">
                        <div class="card my-2 col-md-6 mx-auto">
                            <div class="card-body text-left">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>Full Name:</td>
                                            <td><?= $s['student_fname'] . " " . $s['student_lname'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Username:</td>
                                            <td><?= $s['username'];?></td>

                                        </tr>
                                        <tr>
                                            <td>E-mail:</td>
                                            <td><?= $s['student_email'];?></td>

                                        </tr>
                                        <tr>
                                            <td>Phone Number:</td>
                                            <td><?= $s['student_phone'];?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center" colspan="2"> <a
                                                    href="<?=RVIEWS."/student/edit-student.php"?>">Edit your profile</a>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

                    <!-- Timesheet Tab  -->
                    <div class="tab-pane fade" id="pills-timesheet" role="tabpanel"
                        aria-labelledby="pills-timesheet-tab">
                        <div class="card mt-2 text-center col-md-6 m-2 p-4 mx-auto">
                            <h5>View Timesheet For: </h5>
                            <div class="card-body text-left">
                                <div>
                                    <?php
                                        $projectsForTimer = $t->projectListForTimer($_SESSION['studentId']);
                                        // var_dump($projectsForTimer);
                                    ?>
                                    <div class="text-center">
                                        <?php
                                            foreach($projectsForTimer as $project) {

                                            echo
                                                "<div>" .
                                                    "<a href='" . RVIEWS . "/timer/timer-list.php?projectId=" .$project['id'] . "'>". $project['project_name'] . "</a>" .
                                                "</div>";
                                            }

                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>


</main>

<?php include VIEWS.'/footer.php'; ?>
