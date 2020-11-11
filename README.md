# Laravel A5 Final Assignment

# Opdracht NL
Maak een EPK - Electronic Press Kit
- Gebruikers moeten kunnen inloggen.

- Een gebruiker kan meer dan één band onder zijn beheer hebben, en er kunnen meer gebruikers zijn die een band beheren.

- Een gebruiker komt dit te zien in een dashboard waar hij zijn eigen gegevens kan aanpassen maar ook kan kiezen uit de bands die hij beheert om door te gaan naar hun EPK.

- Een EPK pagina bestaat uit een banner foto met daaronder een biografie / beschrijving van de band. Met daaronder ook 3 YouTube video links. Gebruikers moeten de EPK achtergrond kleur en tekstkleur kunnen wijzigen.

- Gasten van de website moeten kunnen zoeken naar bands in een lijst waar de band foto zowel als naam in verschijnt en als ze op een klikken worden ze naar de pagina gebracht waar de bio & YouTube video’s en band foto staan maar de kleuren zijn dan niet aanpasbaar.

- Enkel de eigenaar kan EPK beheerders toevoegen.
# Assignment ENG
Make an EPK - Electronic Press Kit
- Users have to be able to log in.

- A user can have more than one band under its management, there can be muliple users who manage a band.

- A user will get to see this in a dashboard where he can also change his or her personal information but can also pick between the bands he or she manages. Clicking on a band brings you to the bands' EPK.

- An EPK page contains a banner photo with underneath a biography or description of the band. Under which a user must be able to place up to 3 YouTube links. They must also be able to edit the EPK background color and text color.

- Guests of the website must be able to search for bands in a list where there will be a photo as well as the name of the band. When you click on a list item you will be taken to the bands EPK. Guest are unable to edit anything about the EPK.

- Only the bands' owner can add EPK managers.

# How to install
Download the repository

    https://github.com/SanderCokart/PHP-A5-Laravel.git
 
 Run Composer
 

    composer install

 Run NPM **install**
 

    npm install
 Run NPM **dev**
 

    npm run dev
    
   ![env.example file](https://i.imgur.com/L59JWK1.png)
   
   Duplicate .env.example and rename to .env

Generate app key

    php artisan key:generate
Set your database settings in the .env file

    DB_CONNECTION=mysql  
    DB_HOST=127.0.0.1  
    DB_PORT=3306  
    DB_DATABASE=laravel  
    DB_USERNAME=root  
    DB_PASSWORD=
Create storage symbolic link

    php artisan storage:link
Migrate the database

    php artisan migrate

 Run the server
 

    php artisan serve

**Happy coding!**
