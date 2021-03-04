Final project creates a page where teachers can check test scores
and students can take tests. Tests are created through command line
by a teacher and are multiple choice, each answer choice has its own
entry in the table.
Stored in the form:
q# | qtext | qpoints | correctans | eName

q# and eName are primary keys which indicate the exam name and question number for each question.

correctans indicates which option is the intended correct solution
(i.e. a,b,c,d,...)

ex: 1 | This is question #1 | 5 | a | Exam1

Answers for questions are stored as
cid | qnum | eName | ctext

cid, qnum, eName are primary keys and indicate the exam name, question number, and the letter of the choice

ex: a | 1 | Exam1 | This is choice a


Teachers also create accounts for the students which have a username an password, a student can take exams or view previous exam scores once logged in.

Exams are graded automatically using procedures in SQL and the graded exam is viewable only by the student that took it.

Teachers can view any student's exam, and since they can access the database directly, they can also change the data within the gradedexam table.