Backend of the Multi Quest

Laravel + Filament

run backend:
```bash
  php artisan serve
```
run npm:
```bash
  npm run dev/prod
```
run reverb:
```bash
  php artisan reverb:start
```
listen to notifications:
```bash
  php artisan queue:listen
```

Setup:
```bash
    composer install
    
    php artisan migrate
    
    php artisan db:seed
    
    php artisan shield:setup
```
Shield is already installed. Would you like to reinstall? => Yes
Do you want to configure Shield for multi-tenancy? => No
Would you like to run 'shield:install'? => Yes
Which Panel would you like to install Shield for? => admin
Would you like to run 'shield:generate' for 'admin' Panel? => Yes
Would you like to select what to generate (permissions, policies or both) ? => No
Would you like to run 'shield:super-admin' for 'admin' Panel? => Yes
Would you like to show some love by starring the repo? => Optional


