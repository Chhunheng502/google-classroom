# Google Classroom

This project is a clone to google official website [Google Classroom](https://classroom.google.com). The project is created for the purpose of implementing TDD (Test Driven Development) and applying some design principles I have learned so far. I'm also eager to implement Google Classroom features as well since I believe it's the best project to hone my skills further.

## Installation

```sh
git clone https://github.com/Chhunheng502/google-classroom.git google-classroom
cd google-classroom
```

Install PHP dependencies:

```sh
composer install
```

Setup configuration:

```sh
cp .env.example .env
```

Generate application key:

```sh
php artisan key:generate
```

### Notes

In this version, I have implemented many tests on http requests to Classroom data controller and some request validations on those data. I also managed to test file upload (classroom theme) to controller successfully after many attempts. However, there's still a problem with GoogleAuthTest. Even though authenticating with google is successful on the web page, but testing using mock doesn't work quite well. Nevertheless, I have learned something new.
