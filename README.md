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

The main focus is on frontend for this version. I managed to find a nice pre-built UI components in which I don't need to rebuild from scratch. Vuetify is awesome !!!. I use vue framework for this project and this time I don't use inertia server-side rendering anyone. I configured everything on my own. Ohhh yeah... We will need to create api version since the frontend I'm building is not totally google classroom clone. and we will need to change the project's name to *** Dodoco ***.
