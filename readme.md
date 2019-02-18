## Hakaya test
This task supposed to be implemented as 2 sides Fontend and Backend (API).
I've implement the API because really i've not time to impelemnt frontend.

# Installation
1. open .env file set QUEUE_CONNECTION=database
2. Register [Mailtrap Account](https://mailtrap.io) and set credentials on .env file
- `MAIL_DRIVER=smtp`
- `MAIL_HOST=smtp.mailtrap.io`
- `MAIL_PORT=2525`
- `MAIL_USERNAME=XXXXXX`
- `MAIL_PASSWORD=XXXXXX`
- `MAIL_ENCRYPTION=tls`
3. open terminal and run `php artisan migrate`
4. run `php artisan queue:work` to start queue worker

# APIs
## 1. Sevice area
#### GET: /api/service-area
#### GET: /api/service-area/{id}
#### POST: /api/service-area
	Request Body
      {"name": "area_1",
      "area": [[40.74894149554006, -73.98615270853043],[40.74848633046773, -73.98648262023926],[40.747925497790725, -73.9851602911949],[40.74837050671544, -73.98482501506805],[40.74894149554006, -73.98615270853043]]}
    

## 2. Contacts
#### GET: /api/contact
#### GET: /api/contact/{id}
#### POST: /api/contact
		Request Body
          {"name":"mada",
          "email": "mada@yahoo.com",
          "phone": "0020100000002",
          "comments": "this is a comment",
          "lng": -73.9861527,
          "lat": 40.748941495,
          "area_id": 1 }
          
          
  Please Feel free to contact me at this email if you have any question or needs any claifications  [mahmoud.a.ebada@gmail.com]( mahmoud.a.ebada@gmail.com)