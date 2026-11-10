"# Technical Notes" 
##  Tech Stack & Requirements
- **PHP:** Version 8.2 (Running on official Apache image `php:8.2-apache`)[cite: 3].
- **Data Storage:** Flat-file JSON database (`src/users.json`)[cite: 3].
- **Containerization:** Docker Desktop[cite: 3].
- **Version Control:** Git & GitHub (following conventional commits guidelines).

## Deployment & Operational Steps
1. Ensure Docker Desktop is active on your Windows/Linux/Mac host machine[cite: 3].
2. Open terminal in the project root directory and build the image:
   ```bash
   docker build -t login-register-app .