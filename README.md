**FAQ-AC Project for 601 @ NJIT**

This project is to learn about the different features of Laravel by creating a website that a user can register and ask questions.
The user is associated with the questions and answers and also can create a profile. People say that the best way to learn is by doing and in this project we will touch many laravel features such as: database models, migrations, unit tests, and seeding.
Another benefit out of this project was to learn how to use branches in GIT. Creating a branch is safe because you do not work on your master file and if for some reason you made a mistake that you can not fix, you can always go back to your master branch and start all over. Note that it is best practice to merge your working code to the master branch frequently so you do not risk losing your work in case you make a mistake that you cannot fix. 

**If you would like to learn about this project and benefit from the tutorials made by K. Williams from NJIT check it out!:**

**FAQ Tutorial Playlist**
 https://www.youtube.com/playlist?list=PLytMRtonvCRUjrQqKaQeOd2KoYq_ifcpD

**Email Notifications Feature**

The purpose of the new feature is to notify the user that asked the question when the question is answered. This is beneficial so the user does not have to check the site everyday.
Most people nowadays have access to email and check their inbox folders more than 3 times a day. The user can benefit from this as he or she will know when the question was answered and can check immediately.

**Adding the new feature**  

1. Generate a new mail class the php artisan make:mail AnswerNotification command was run. 
2. Edit the .env file for emails to be sent from that email. Other mail drivers can be used:
   1. MAIL_DRIVER=smtp
   2. MAIL_HOST=smtp.gmail.com
   3. MAIL_PORT=587
   4. MAIL_USERNAME=faq.project.ac@gmail.com
   5. MAIL_PASSWORD=uodhshoatglndnom
   6. MAIL_ENCRYPTION=tls
   7. MAIL_FROM_NAME='FAQ-APP'
3. New File MailTest.php in tests/Unit was created: php artisan make:test MailTest --unit
4. New File in views/mail/notify.blade.php was created.


**To run the FAQ project:**

1.git clone (https://github.com/Albarinho/faq-ac.git)
2.CD into FAQ and run composer install
3.cp .env.example to .env
4.run: php artisan key:generate
5.setup database / with sqlite or other (https://laravel.com/docs/5.6/database)
6.Run: php artisan migrate
7.Run: unit tests: phpunit
8.Run: seeds php artisan migrate:refresh --seed

**Relevant Laravel Resources:**

https://laravel.com/docs/5.6/eloquent
https://laravel.com/docs/5.6/database
https://laravel.com/docs/5.6/seeding
https://laravel.com/docs/5.6/testing

**Relevant General Resources**

https://www.atlassian.com/git/tutorials/comparing-workflows/gitflow-workflow
https://www.jetbrains.com/phpstorm/
http://agiledata.org/essays/tdd.html