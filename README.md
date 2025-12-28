# Projectbeschrijving

Dit project is een dynamische website voor **Boxing Academy Brussels**, ontwikkeld met het Laravel framework. De website biedt bezoekers informatie over de club, tarieven, nieuws, FAQ en de mogelijkheid om contact op te nemen.

Daarnaast bevat het project een **admin-gedeelte** waar beheerders verschillende onderdelen van de website kunnen beheren, zoals gebruikers, tarieven, nieuws, FAQ en contactberichten.

Dit project werd ontwikkeld in het kader van een schoolopdracht.

## Installatiehandleiding

Stappen

1. Clone de repository:
   -> git clone <URL-van-de-repository>
   -> cd <naam-van-de-repository>

2. Installeer PHP dependencies:
   -> composer install

3. Installeer frontend dependencies:
   -> npm install

4. Maak het environment bestand aan
   -> cp .env.example .env
   -> php artisan key:generate

5. Database instellen (SQLite)
   -> touch database/database.sqlite
   -> php artisan migrate --seed

6. Mail configuratie (Voor het testen van e-mails wordt Mailtrap gebruikt.  
   Dit is enkel nodig om te controleren of de admin e-mails ontvangt bij nieuwe contactberichten.)

-> Gebruik Mailtrap en voeg de SMTP-gegevens toe aan het .env bestand.

7. Start de ontwikkelserver:
   -> npm run dev
   -> php artisan serve

## Functionaliteiten

### Authenticatie
- Registreren
- Inloggen / uitloggen
- Wachtwoord reset
- Rolonderscheid tussen gebruiker en admin

### Publieke pagina's
- Homepagina
- Nieuws overzicht en detailpagina
- Tarievenpagina
- FAQ-pagina met categorieën en vragen
- Contactformulier
- Publieke gebruikersprofielen bekijken
- Aantal likes op nieuws zien
- (Aantal)Reacties zien

### Ingelogde (gewone) gebruiker

- (Alle publieke pagina's)
- Eigen profiel: bekijken en aanpassen
- Nieuws liken
- Reacties op nieuws geven

### Admin
Website:
- Alle publieke pagina's + Mijn profiel zoals gebruiker

Dashboard:
- Gebruikersbeheer: user toevoegen, admin maken, verwijderen
- Tarievenbeheer: toevoegen, bewerken, verwijderen
- Nieuwsbeheer: toevoegen, bewerken, verwijderen
- FAQ-beheer: categorieën en vragen
- Contactbeheer:
    - Admin ontvangt e-mail bij nieuw contactbericht
    - Admin kan berichten bekijken en verwijderen
    - Admin kan antwoorden via e-mail

# Bronnen:

- W3schools: https://www.w3schools.com/cssref/css_colors.php
- Laravel documentatie: https://laravel.com/docs/12.x/installation
- Mailtrap documentatie: https://docs.mailtrap.io/
- Tailwind CSS: https://tailwindcss.com/
- Emoji's: https://getemoji.com/ 

