<?php
$title = "userProfile";
ob_start();
?>

<div class="sidebar">
    <button class="profile" onclick="myFunction('landing')">
        <img class="profile-img" src="<?= $user->profile_picture ?? "./public/images/default.svg" ?>" alt="Elon Musk's photo looking head to left"><br>
        <div class="profile-name">
            <h4><?= $user->first_name . " " . $user->last_name  ?? "Your name" ?></h4>
            <p>Member since <?= $user->date_created ?? "YYYY-MM-DD" ?></p>
        </div>
    </button>
    <div class="menus">
        <button onclick="myFunction('personal')"><i class="fa-solid fa-house"></i>Personal</button>

        <button onclick="myFunction('resume')"><i class="fa-solid fa-magnifying-glass"></i>Resume/CV</button>

        <button onclick="myFunction('education')"><i class="fa-solid fa-chart-simple"></i>Education</button>

        <button onclick="myFunction('experience')"><i class="fa-solid fa-chart-simple"></i>Experience</button>

        <button onclick="myFunction('skills')"><i class="fa-solid fa-bookmark"></i></i>Skills</button>

        <button onclick="showCalendarPage()"><i class="fa-solid fa-message"></i>Availability</button>
    </div>
</div>


<!-- main -->
<div class="main">
    <section id="landing">
        <?php include('./view/userProfileLanding.php') ?>
    </section>

    <section id="personal" class="hidden">
        <?php include('./view/userProfilePersonal.php') ?>
    </section>

    <section id="resume" class="hidden">
        <div id="resume">
            <form action="index.php?action=userResumeUpload" method="post" enctype="multipart/form-data">
                <p>
                <h2>Resume/CV</h2>
                <input type="file" name="resume" id="resume" accept=".pdf" />
                </p>
                <p>
                    <input id="submitResume" type="submit" value="Save" />
                </p>
            </form>
        </div>
    </section>

    <section id="education" class="hidden">
        <?php include('./view/userProfileEducation.php') ?>
    </section>

    <section id="experience" class="hidden">
        <?php include('./view/userProfileExperience.php') ?>
    </section>

    <section id="skills" class="hidden">
        <?php include('./view/userProfileSkills.php') ?>
    </section>

    <section id="avail" class="hidden">
        <!-- <p>Your Availability</p>
        <div class="avail"> -->
        <?php include('./view/calendarView.php') ?>
        <!-- </div> -->
    </section>

</div>
<?php
$content = ob_get_clean();
require('./view/userProfileTemplate.php');
?>