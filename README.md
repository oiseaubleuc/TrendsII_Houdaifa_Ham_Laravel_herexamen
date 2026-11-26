<h1 align="center">Law Emergency (v1)</h1>
<p align="center">
  <b>Legal assistance platform — first version</b><br/>
  Multilingual site for a law firm with legal area pages, case submission and management, PDF export, news and an admin area. Continued in Law-Emergency-project.
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-11-FF2D20?style=flat-square&logo=laravel&logoColor=white" />
  <img src="https://img.shields.io/badge/PHP-8.2-777BB4?style=flat-square&logo=php&logoColor=white" />
  <img src="https://img.shields.io/badge/Blade-templates-F05340?style=flat-square" />
  <img src="https://img.shields.io/badge/i18n-EN%20%7C%20FR%20%7C%20NL-555?style=flat-square" />
  <img src="https://img.shields.io/badge/PDF-DomPDF-B30B00?style=flat-square" />
</p>

---

## Features

- **Legal areas** — dedicated pages for criminal, traffic and family law, each with its own case submission form.
- **Case management** — create, view, edit and delete cases, with PDF export per case or for all cases.
- **News** — public articles, managed by admins.
- **Contact form** — messages stored in the database.
- **Multilingual** — language switcher.
- **Authentication** — registration, login and profile pages.
- **Admin area** — overview and management.

## Tech stack

| Layer | Technology |
|---|---|
| Backend | Laravel 11, PHP 8.2 |
| Frontend | Blade, Vite |
| PDF | DomPDF |

## Getting started

```bash
git clone https://github.com/oiseaubleuc/TrendsII_Houdaifa_Ham_Laravel_herexamen.git
cd TrendsII_Houdaifa_Ham_Laravel_herexamen
composer install
npm install && npm run build
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```

The improved version of this project lives in [Law-Emergency-project](https://github.com/oiseaubleuc/Law-Emergency-project).

---

<p align="center">Built by <a href="https://github.com/oiseaubleuc">Hoho</a> · Belgium</p>
