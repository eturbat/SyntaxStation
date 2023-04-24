## SyntaxStation Learning Management System (LMS)

SyntaxStation is a PHP-based Learning Management System designed specifically for CS students of College of Wooster. The SyntaxStation Learning Management System is a user-centric platform designed to cater to the unique needs of computer science learners. It is an innovative web-based application that includes interactive coding exercises, simulations, and collaborative learning tools, all of which are essential in enhancing the learning outcomes of students.

The platform's primary advantage is its accessibility, which has been optimized to ensure that all users, regardless of their internet speed, can access course materials seamlessly. This eliminates potential barriers to learning that may slow down load times and ensures that every user has an equal opportunity to learn.

## Installation

To install SyntaxStation on your system, follow the steps below:

1. Clone the entire SyntaxStation folder and paste it into your web directory.
2. Import the project1.sql database into your phpMyAdmin. Make sure you create a new database named project1.
3. Edit the dbconnection file, change the username, password, and database name. The default user is root, the password is null, and the database name is project1.
4. Open your browser and type "http://localhost/syntaxstation/".
5. To log in as an admin, use the following details:
- Admin Login Details
- Login Id: hguarnera@wooster.edu
- Password: cs200

## Features

SyntaxStation has been designed to provide the following features:

1. User login and logout functionality.
2. Restricted access to only members of the College of Wooster.
3. Access to available courses.
4. Ability to take assessments at the end of each course.
5. Automatic retaking of courses and assessments for users who score below 90%.
6. Course progress tracking and restriction on progression to the next course until passing the assessment of the current course.
7. Results page showing the scores of submitted assessments.
8. Awarding of a certificate of completion upon completion of all available courses.
9. Addition of course content in various formats, such as PDFs, PowerPoints, and text with images and videos by admins.
10. Deletion of courses by admins.
11. Viewing of user information, such as their course progress and assessment scores by admins.
12. Addition of other admins to the system by admins.
13. Deletion of other admins from the system by admins.


