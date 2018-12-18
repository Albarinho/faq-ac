# FAQ-AC Project for IS-601 @ NJIT:

This project is to learn about the different features of Laravel by creating a website that a user can register and ask questions.
The user is associated with the questions and answers and also can create a profile. People say that the best way to learn is by doing and in this project we will touch many laravel features such as: database models, migrations, unit tests, and seeding.
Another benefit out of this project was to learn how to use branches in GIT. Creating a branch is safe because you do not work on your master file and if for some reason you made a mistake that you cannot fix, you can always go back to your master branch and start all over. Note that it is best practice to merge your working code to the master branch frequently so you do not risk losing your work in case you make a mistake that you cannot fix. 

**If you would like to do this project and learn from the tutorials made by K. Williams from NJIT, click on the FAQ Tutorial Playlist link:** https://www.youtube.com/playlist?list=PLytMRtonvCRUjrQqKaQeOd2KoYq_ifcpD

## **Email Notifications Feature**

The purpose of the new feature is to notify the user that asked the question when the question is answered. This is beneficial so the user does not have to check the site everyday.
Most people nowadays have access to email and check their inbox folders more than 3 times a day. 
The user can benefit from this as he or she will know when the question 
was answered and can check the FAQ site immediately.

### **Adding the new feature**  

1. Generate a new mail class the php artisan make:mail AnswerNotification command was run. 
2. The .env file needs to be configured for emails to be sent out. Other mail drivers can be used:
   - MAIL_DRIVER=
   - MAIL_HOST=
   - MAIL_PORT=
   - MAIL_USERNAME=
   - MAIL_PASSWORD=
   - MAIL_ENCRYPTION=
   - MAIL_FROM_NAME=
3. New File MailTest.php in tests/Unit was created: php artisan make:test MailTest --unit
4. New File in views/mail/notify.blade.php was created.


# To run the FAQ project:

-   ## Getting Started

	### Clone the project
	
		https://github.com/Albarinho/faq-ac.git

	###	Prerequisites
  	
  	-	PHP v7.2 and above
  	-	composer	
	
    ###	Installing
    
	-	CD into FAQ and run 
	  		
             cd faq-ac
             composer install

  	-	cp .env.example to .env
  			
            `cp .env.example .env`
            
  	-    To received email notifications, set all EMAIL RELATED VARIABLES in .env file
          		
                - MAIL_DRIVER=smtp
                - MAIL_HOST=smtp.gmail.com
                - MAIL_PORT=587
                - MAIL_USERNAME=faq.project.ac@gmail.com
                - MAIL_PASSWORD=uodhshoatglndnom
                - MAIL_ENCRYPTION=tls
                - MAIL_FROM_NAME='FAQ-APP'
                  
  	-	Run: `php artisan key:generate`
  	 
  	            php artisan key:generate

-	##	Setting up database
    
        -	setup database / with sqlite or other 	
            -	[https://laravel.com/docs/5.6/database](https://laravel.com/docs/5.6/database,"https://laravel.com/docs/5.6/database")
    
        -	Run: `php artisan migrate`
    
                    php artisan migrate
    
        -	Run: `unit tests: phpunit`
    
                    phpunit
                    
        -	Run: `seeds php artisan migrate:refresh --seed`
    
                    php artisan migrate:refresh --seed
        
-   ##	Run the web app
    
   		php artisan serve
   
-	##	Access the webapp in your browser
   				
     	http://localhost:8000
     	
     **Some additional steps to receive the email once your app is running in your locahost:**           
           
            -   Register as a new user with an email that you can access.
            -   Create a question to the page. 
            -   View the question and click on "Answer". 
            -   Answer the question with a minimum body of five characters and submit the question. 
            -   Check your email!!
   

** **

-   **Relevant Laravel Resources:**

        https://laravel.com/docs/5.6/eloquent
        https://laravel.com/docs/5.6/database
        https://laravel.com/docs/5.6/seeding
        https://laravel.com/docs/5.6/testing

-   **Relevant General Resources**
        
        https://www.atlassian.com/git/tutorials/comparing-workflows/gitflow-workflowa
        https://www.jetbrains.com/phpstorm/
        http://agiledata.org/essays/tdd.html