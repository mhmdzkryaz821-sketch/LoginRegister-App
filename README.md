# Login & Register System (PHP & Docker)

## About The Project
This project is a secure, lightweight **PHP-based User Authentication System** that manages user registration and login securely without relying on an external SQL database, utilizing structured JSON files for data storage.

###  Login & Register Pages
1. **Login Page (`login.php`):**
   - **Main Function:** Serves as the primary entry gate for users to access the system.
   - **How it Works:** Prompts the user to enter their Username and Password, then securely verifies the credentials against the stored records in the system's JSON database.

2. **Register Page (`register.php`):**
   - **Main Function:** Dedicated to creating new user accounts.
   - **How it Works:** Collects new user details, securely hashes the password (`Password Hashing`) for enhanced security, and saves the record into the local `src/users.json` file.

##  Getting Started & Docker Deployment
1. **Build the Docker Image:**
   ```bash
   docker build -t login-register-app .