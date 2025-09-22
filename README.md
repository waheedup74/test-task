<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

# Actor Prompt Validation API

This project is a test-task implementation of an **Actor Information Extraction System**.
It accepts a natural language **description** of an actor and automatically extracts details such as first name, last name, address, height, weight, gender, and age using regex + mock data matching.

---

## API Flow

1. **Frontend Form / API Request**

   * A user provides an email and a free-text description of an actor.

2. **Validation**

   * Email must be unique and valid.
   * Description is required.

3. **Data Extraction**

   * The description is checked against a **mock dataset** (`storage/app/mock_actors.json`).
   * Regex/string matching is used to extract:

     * `first_name`
     * `last_name`
     * `address`
     * `height`
     * `weight`
     * `gender`
     * `age`

4. **Result**

   * If all required fields (first\_name, last\_name, address) are present, the actor is stored in the database.
   * If fields are missing, the request returns an error message.

5. **Prompt Validation Endpoint**

   * `GET /api/actors/prompt-validation`
   * Returns a simple JSON response for health-check purposes:

     ```json
     {
       "message": "text_prompt"
     }
     ```

---

## API Endpoints

### Create Actor

**POST** `/actors`

**Payload:**

```json
{
  "email": "john@example.com",
  "description": "John Doe lives at 123 Main St, New York. He is 6ft tall, weighs 75kg, male, 30 years old."
}
```

**Response (Success Example):**

```json
{
  "id": 1,
  "email": "john@example.com",
  "first_name": "John",
  "last_name": "Doe",
  "address": "123 Main St, New York",
  "height": "6ft",
  "weight": "75kg",
  "gender": "male",
  "age": 30
}
```


---

## Test Descriptions

Use the following descriptions for testing (these match the mock dataset):

1. **John Doe**
   `"John Doe lives at 123 Main St, New York. He is 6ft tall, weighs 75kg, male, 30 years old."`

2. **Emma Watson**
   `"Emma Watson lives at 221B Baker Street, London. She is 5ft 5in tall, weighs 52kg, female, 33 years old."`

3. **Chris Evans**
   `"Chris Evans lives at 45 Hollywood Blvd, Los Angeles. He is 6ft tall, weighs 85kg, male, 42 years old."`

4. **Scarlett Johansson**
   `"Scarlett Johansson lives at 90 Sunset Blvd, Los Angeles. She is 5ft 3in tall, weighs 57kg, female, 39 years old."`

5. **Robert Downey**
   `"Robert Downey lives at 77 Iron St, Malibu. He is 5ft 9in tall, weighs 78kg, male, 58 years old."`

6. **Jennifer Lawrence**
   `"Jennifer Lawrence lives at 16 Broadway Ave, New York. She is 5ft 9in tall, weighs 62kg, female, 34 years old."`

7. **Will Smith**
   `"Will Smith lives at 100 Bel-Air Rd, Los Angeles. He is 6ft 2in tall, weighs 82kg, male, 56 years old."`

8. **Natalie Portman**
   `"Natalie Portman lives at 15 Ocean Dr, Sydney. She is 5ft 3in tall, weighs 50kg, female, 43 years old."`

9. **Leonardo DiCaprio**
   `"Leonardo DiCaprio lives at 500 Vine St, Los Angeles. He is 6ft tall, weighs 80kg, male, 50 years old."`

10. **Gal Gadot**
    `"Gal Gadot lives at 77 Wonder St, Tel Aviv. She is 5ft 10in tall, weighs 59kg, female, 40 years old."`
