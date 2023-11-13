<?php include('view/header.php') ?>
<?php if($courses) { ?>
    <section id="list" class="list">
        <header class="list_row list_header">
            <h1>Course List</h1>
        </header>

        <?php foreach ($courses as $course) : ?>
            <div class="list_row">
                <div class="list_item">
                    <p class="bold"><?= $course['courseName'] ?></p>
                </div>
                <div class="list_removeItem">
                    <form action="." method="post">
                        <input type="hidden" name="action" value="delete_course">
                        <input type="hidden" name="course_id" value="<?= $course['courseId'] ?>">
                        <button class="remove-button">❌</button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </section>
<?php } else { ?>
    <p>No courses exist yet.</p>
<?php } ?>

<section id="add" class="add">
    <h2>Add Course</h2>
    <form action="." method="post" id="add_form" class="add_form">
        <input type="hidden" name="action" value="add_course">
        <div class="add_inputs">
            <label>Name:</label>
            <input type="text" name="course_name" maxlength="225" placeholder="Name" autofocus required>
        </div>
        <div class="add_addItem">
            <button class="add-button bold">Add</button>
        </div>
    </form>
</section>
<br>
<p><a href=".">View &amp; Add Assignments</a></p>
<?php include('view/footer.php') ?>