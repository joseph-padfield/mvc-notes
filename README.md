#Info

```bash
composer install
```

To run the application locally:
```bash
composer start

```
Run this command in the application directory to run the test suite
```bash
composer test
```

#NOTES

1. Added welcome route - see templates/welcome.phtml and app/routes.php (welcome)
	as an example: http://0.0.0.0:8080/welcome
	
2. Added weather route - see templates.weather.phtml and app/routes.php (weather)
	as an example: http://0.0.0.0:8080/weather/Bath/rainy
	
3. Added temperature route - see app/routes.php (temperature)
	note the content renders directly from the function itself.
	as an example http://0.0.0.0:8080/temperature/London/hot
	
4. Added pet route, demonstrating how you can use `[]` to indicate
	that the route parameter is optional. Again, this renders directly from the function.
	as an example http://0.0.0.0:8080/pet/Nelly
	
5. Added myName route. see templates/myName.phtml adn app/routes.php (myName)
	this is an example of passing in the route parameters as an associative array.
	as an example http://0.0.0.0:8080/myName/Jo/Padfield
	

