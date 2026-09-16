# ATUNKO

Investor onboarding platform for ATUNKO — a public marketing site, an authenticated
investor portal, and an internal admin/reviewer portal, built on Laravel.

## Stack

- Laravel 12, Blade + Tailwind CSS (no SPA framework)
- MySQL
- Laravel Breeze (authentication scaffolding)

## Scope

The full roadmap is documented in [docs/ATUNKO_Future_Frontend_Backend_Roadmap.docx](docs/ATUNKO_Future_Frontend_Backend_Roadmap.docx).

- **Phase 1 — Public website** (complete): 11 public marketing pages, investor lead
  capture, contact form.
- **Phase 2 — Investor portal** (complete): account registration/login with email
  verification, investor profile, investment preferences, multi-step application,
  private document uploads, application status, notifications, account settings.
- **Phase 3 — Admin/reviewer portal** (complete): role-based staff access, investor
  directory, application review, KYC/AML review (custom manual process, no
  third-party provider), document review, user & role management, audit log,
  reports and CSV export, system settings.
- **Phase 4 — Security hardening** (complete): rate limiting, security headers,
  enforced HTTPS in production, encryption of sensitive investor PII at rest.

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

## Security

See [SECURITY.md](SECURITY.md) for the security measures in place and what must be
configured before a production launch.

## License

Proprietary and confidential — see [LICENSE](LICENSE). This repository and its
contents belong to ATUNKO and may not be used, copied, or distributed without
written permission.
