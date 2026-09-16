# Security

This repository is private and proprietary to ATUNKO. It is not open to public
vulnerability disclosure programs.

## Reporting a vulnerability

If you discover a security issue in this codebase, do not open a public GitHub
issue. Report it directly and confidentially to the project owner.

## Security measures in place

- CSRF protection on all state-changing requests (Laravel default).
- Rate limiting on authentication, password reset, public lead-capture forms,
  and document uploads.
- Global security headers: `X-Frame-Options`, `X-Content-Type-Options`,
  `Referrer-Policy`, `Permissions-Policy`, and `Strict-Transport-Security`
  when served over HTTPS.
- HTTPS is enforced when `APP_ENV=production`.
- Investor identity documents are stored on a private filesystem disk, never
  under a public web path, and are only served through an authenticated,
  ownership-checked download route.
- Sensitive investor profile fields (date of birth, source of funds, address,
  registration number) are encrypted at rest.
- Role-based access control (`investor`, `reviewer`, `compliance`, `admin`)
  restricts the admin/reviewer portal and its sub-sections.
- All investor and staff actions are recorded in an audit log
  (`audit_logs` table).

## Before production launch

- Configure a real mail driver, `SESSION_SECURE_COOKIE=true`,
  `SESSION_ENCRYPT=true`, and `APP_DEBUG=false`.
- Commission a penetration test.
- Put backups, monitoring, and alerting in place for the database and file
  storage.
- Confirm KYC/AML, eligibility, and disclosure requirements with legal and
  compliance counsel for every jurisdiction served.
