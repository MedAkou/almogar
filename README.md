

### 1. clone the Package & install the packages

```
git clone https://github.com/MedAkou/almogar.git
```
```
composer install
```

### 1. setup env file
   
   Run this commands from the Terminal:

	 cp .env.example .env
	 php artisan key:generate


### 2. Next make sure to create a new database and add your database credentials to your .env file:

```
DB_HOST=localhost
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret
```


### 3. setup the database & add admin & some dummy data

Run this commands from the Terminal:

	 php artisan migrate
	 php artisan make:admin
     php artisan make:merchant
	 php artisan make:data

 
### 4. you can login as manager from /manager/login
 
	user : admin@admin.com
	pass : 1234
	
### 5. you can login as merchant from  /merchant/login

	user : merchant@merchant.com
	pass : 1234

### 5. Setup contact email and base URL in .env file

	MAIL_ADDRESS=contact@o-bazaar.com
	APP_URL=https://obazaar-test.com/
