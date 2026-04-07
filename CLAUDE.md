# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

This is a **CodeIgniter 4** PHP application for a tutoring center (bimbel). It manages pendaftar (students), pengajar (teachers), and programs with a public registration system and admin dashboard.

## Commands

```bash
# Development server (requires PHP 8.1+)
php spark serve

# Run tests
./tests/run-phpunit.sh        # Linux/macOS
./tests/run-tests.bat         # Windows
php vendor/bin/phpunit        # Direct

# Run specific test suite
php vendor/bin/phpunit --testsuite models
php vendor/bin/phpunit --testsuite controllers
php vendor/bin/phpunit --testsuite integration

# Database migration (if using)
php spark migrate
```

## Architecture

### Directory Structure
- `app/Controllers/` - Application controllers (Admin, Auth, Home, Pendaftaran, Sb2)
- `app/Models/` - Database models (AdminModel, PendaftarModel, PengajarModel, ProgramModel, PenggunaModel)
- `app/Views/` - PHP view templates
- `app/Filters/` - Request filters (AuthFilter for admin authentication)
- `public/` - Web root (entry point, assets, uploads)
- `system/` - CodeIgniter 4 framework core
- `tests/` - PHPUnit test suite

### Key Routes
- `/` - Home page (Home::utama)
- `/admin` - Admin dashboard
- `/admin/pendaftar` - Student management
- `/admin/pengajar` - Teacher management
- `/admin/program` - Program management
- `/daftar` - Public registration form
- `/login`, `/logout` - Authentication

### Data Models
- **PenggunaModel** - Base user model
- **PendaftarModel** - Student/registrant records
- **PengajarModel** - Teacher records
- **ProgramModel** - Tutoring programs

### Authentication
- Admin authentication via `Auth::prosesLogin` and `AuthFilter`
- Session-based auth with `session.driver` config
- Admin registration protected by `ADMIN_REGISTER_SECRET` env var

### Database
- MySQL with MySQLi driver
- Connection via `.env` file (database.default.*)
- Test database: `bimbel` (same as production)

## Configuration

Environment variables in `.env`:
- `database.default.*` - MySQL connection
- `ADMIN_REGISTER_SECRET` - Secret for admin self-registration

---

- Never create a component longer than 200 lines. If it exceeds this, split it into smaller components automatically. Always separate UI from logic.
- Most frontends become unmaintainable because every screen is 800+ line component
- This single rule forces clean architecture without you thinking about it.

## Workflow Orchestration

### Plan Node Default
- Enter plan mode for any non-trivial task (three or more steps, or involving architectural decisions).
- If something goes wrong, stop and re-plan immediately rather than continuing blindly.
- Use plan mode for verification steps, not just implementation.
- Write detailed specifications upfront to reduce ambiguity.

### Subagent Strategy
- Use subagents liberally to keep the main context window clean.
- Offload research, exploration, and parallel analysis to subagents.
- For complex problems, allocate more compute via subagents.
- Assign one task per subagent to ensure focused execution.

### Self-Improvement Loop
- After any correction from the user, update tasks/lessons.md with the relevant pattern.
- Create rules for yourself that prevent repeating the same mistake.
- Iterate on these lessons rigorously until the mistake rate declines.
- Review lessons at the start of each session when relevant to the project.

### Verification Before Done
- Never mark a task complete without proving it works.
- Diff behavior between main and your changes when relevant.
- Ask: “Would a staff engineer approve this?”
- Run tests, check logs, and demonstrate correctness.

### Demand Elegance (Balanced)
- For non-trivial changes, pause and ask whether there is a more elegant solution.
- If a fix feels hacky, implement the solution you would choose knowing everything you now know.
- Do not over-engineer simple or obvious fixes.
- Critically evaluate your own work before presenting it.

### Autonomous Bug Fixing
- When given a bug report, fix it without asking for unnecessary guidance.
- Review logs, errors, and failing tests, then resolve them.
- Avoid requiring context switching from the user.
- Fix failing CI tests proactively.

## Task Management
1.Plan First: Write the plan to tasks/todo.md with checkable items.
2.Verify Plan: Review before starting implementation.
3.Track Progress: Mark items complete as you go.
4.Explain Changes: Provide a high-level summary at each step.
5.Document Results: Add a review section to tasks/todo.md.
6.Capture Lessons: Update tasks/lessons.md after corrections.

## Core Principles
- Simplicity First: Make every change as simple as possible. Minimize code impact.
- No Laziness: Identify root causes. Avoid temporary fixes. Apply senior developer standards.
- Minimal Impact: Touch only what is necessary. Avoid introducing new bugs.