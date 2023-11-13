<?php
    function get_assignments_by_course($course_id) {
        global $db;

        if($course_id) {
            $query = "SELECT a.id, a.description, c.courseName
            FROM assignments a
            LEFT JOIN courses c
            ON a.courseId = c.courseId
            WHERE a.courseId = :course_id
            ORDER BY a.id";
        } else {
            $query = "SELECT a.id, a.description, c.courseName
            FROM assignments a
            LEFT JOIN courses c
            ON a.courseId = c.courseId
            ORDER BY c.courseId";
        }

        $statement = $db->prepare($query);
        if($course_id) {
            $statement->bindValue(':course_id', $course_id);
        }

        $statement->execute();
        $assignments = $statement->fetchAll();
        $statement->closeCursor();

        return $assignments;
    }

    function delete_assignment($assignment_id) {
        global $db;

        $query = "DELETE FROM assignments WHERE id = :assign_id";

        $statement = $db->prepare($query);
        $statement->bindValue(':assign_id', $assignment_id);
        $statement->execute();
        $statement->closeCursor();
    }

    function add_assignment($course_id, $description) {
        global $db;

        $query = "INSERT INTO assignments (description, courseId)
                VALUES (:desc, :course_id)";

        $statement = $db->prepare($query);
        $statement->bindValue(':desc', $description);
        $statement->bindValue(':course_id', $course_id);
        $statement->execute();
        $statement->closeCursor();
    }
?>