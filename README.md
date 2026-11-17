# Login & Register System (PHP & Docker)

A lightweight PHP user authentication system (register and login) that stores
users in a JSON file instead of an SQL database. Packaged to run in Docker.

## Tech Stack
- PHP 8.2 (Apache, via the official `php:8.2-apache` image)
- Flat-file JSON storage (`src/users.json`)
- Docker

## Features
- `register.php`: creates an account and saves the password as a hash
- `login.php`: verifies the username and password against `users.json`

## Project Structure
```
LoginRegister-App/
├── src/              # PHP source code
├── docs/
│   ├── screenshots/
│   └── notes.md
├── Dockerfile
├── .dockerignore
├── .gitignore
└── README.md
```

## Build and Run
1. Build the image:
   ```
   docker build -t login-register-app .
   ```
2. Run the container:
   ```
   docker run -d -p 8080:80 --name my-login-container login-register-app
   ```
3. Open in your browser: http://localhost:8080/login.php

## Stop and Clean Up
```
docker stop my-login-container
docker rm my-login-container
docker rmi login-register-app
```

## Configuration
| Setting | Value |
|---|---|
| Container port | 80 |
| Host port | 8080 (change with `-p <port>:80`) |

## How to Test
1. Go to http://localhost:8080/register.php and create an account.
2. Go to http://localhost:8080/login.php and log in with it.
3. A correct password shows a success message; a wrong one is rejected.

## Notes
Users are stored inside the container, so registered accounts are lost when
the container is removed.

## Bonus Features
- **Docker Compose:** `docker compose up -d --build` to start, `docker compose down` to stop.
- **Makefile:** `make build`, `make run`, `make stop`.
- **Healthcheck:** the Dockerfile checks `login.php` every 30 seconds; `docker ps` shows `healthy`.

## Attribution
This project was written from scratch for the OS Lab course.