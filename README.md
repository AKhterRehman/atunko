# ATUNKO

Investor onboarding platform for ATUNKO — a public marketing site plus an authenticated
investor portal for registration, onboarding, KYC-lite document collection and application
review, built on Laravel.

## Stack

- Laravel 12, Blade + Tailwind CSS (no SPA framework)
- MySQL
- Laravel Breeze (authentication scaffolding)

## Scope

The full roadmap is documented in [docs/ATUNKO_Future_Frontend_Backend_Roadmap.docx](docs/ATUNKO_Future_Frontend_Backend_Roadmap.docx):
30 routes across a public marketing site, an investor portal, and an admin/reviewer portal,
delivered in three phases.

- **Phase 1 — Public website** (complete): 11 public marketing pages, investor lead capture,
  contact form.
- **Phase 2 — Investor portal** (in progress): account registration/login, investor profile,
  investment preferences, multi-step application, private document uploads, application
  status, notifications, account settings.
- **Phase 3 — Compliance & operations** (not started): KYC/AML integration, admin/reviewer
  portal, reporting, security hardening.

## Local setup

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate
npm run build
php artisan serve
```

Requires a MySQL database matching the credentials in `.env` (`DB_DATABASE=atunko` by default).
