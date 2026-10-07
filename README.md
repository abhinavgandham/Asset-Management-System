# Asset-Management-System
The Asset Management System is a secure web application that allows an individual user to record, organise, update, search, and share information about personal assets.

This is a portfolio/learning project, built one phase at a time. The full product and technical specification lives in [`docs/asset_management_system_final_project_spec.md`](docs/asset_management_system_final_project_spec.md) and is the source of truth for scope and design decisions.

# Tech Stack
- PHP 8.3 / Laravel 12
- PostgreSQL
- Docker (Laravel Sail)

# Local Development Setup

### Prerequisites
- PHP 8.3+ and [Composer](https://getcomposer.org/)
- Docker and Docker Compose

### Setup
1. Copy `.env.example` into a new `.env` file.
2. Run `composer install` (a fresh clone won't contain the `vendor/` directory).
3. Run `php artisan key:generate` to generate the `APP_KEY`.
4. Start the app and database containers: `./vendor/bin/sail up -d`.
5. Run `./vendor/bin/sail artisan migrate` to create the database schema.
6. Visit the app at [http://localhost](http://localhost).

### Port conflicts
Sail exposes the app on host port `80` and PostgreSQL on host port `5432` by default. If either is already in use on your machine, set `APP_PORT` and/or `FORWARD_DB_PORT` in `.env` to free ports, then restart the containers:
```bash
./vendor/bin/sail down
./vendor/bin/sail up -d
```

### Useful Sail commands
| Command | Purpose |
|---|---|
| `./vendor/bin/sail up -d` | Start containers in the background |
| `./vendor/bin/sail down` | Stop containers |
| `./vendor/bin/sail artisan <command>` | Run any Artisan command inside the app container |

# Project Status
This project is being built incrementally, following the phase order defined in the specification. Current phase: **Phase 0 – Project Setup**.
