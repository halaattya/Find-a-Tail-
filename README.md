# Find a Tail 🐾 — Pet Adoption Portal



A PHP-based web application that connects families with pets available for adoption. Users can browse pets, submit adoption requests, and track their application status. Admins can manage listings and approve or reject requests.


## Features

- **Pet Listings** — Browse available pets with photos and details
- **User Authentication** — Sign up, log in, and sign out with session-based auth
- **Adoption Requests** — Logged-in users can apply to adopt a pet and track their requests
- **Admin Dashboard** — Admins can manage all adoption requests (approve/reject) and add or remove pets
- **Role-based Access** — Separate views and permissions for regular users vs admins



## Tech Stack

- **Backend:** PHP (procedural)
- **Database:** MySQL (via MySQLi)
- **Frontend:** HTML, CSS
- **Local Server:** XAMPP (Apache + MySQL)




## Project Structure

```
hala/
├── index.php               # Home page
├── login.php               # Login form
├── signup.html             # Sign up form
├── process_login.php       # Login logic
├── process_signup.php      # Registration logic
├── userSignup.php          # User creation handler
├── signout.php             # Session logout
├── view_pet.php            # Browse available pets
├── view_pet_za3tar.php     # Alternate pet view
├── view_za3tar.php         # Extended pet detail view
├── addPet.php              # Admin: add new pet
├── deletePet.php           # Admin: delete pet
├── adoption.php            # Submit adoption request
├── myAdoption.php          # User: view own requests
├── accept.php              # Admin: approve request
├── reject.php              # Admin: reject request
├── delete.php              # Admin: delete request
├── adminPage.php           # Admin dashboard
├── db.php                  # Database connection
├── seeds/
│   └── petSeed.php         # Sample pet data
└── assets/
    ├── css/style.css
    └── images/
```




## Getting Started

1. Install [XAMPP](https://www.apachefriends.org/)
2. Clone/copy the project into `htdocs/`
3. Start Apache and MySQL from the XAMPP control panel
4. Create a database named `halaDB` in phpMyAdmin
5. Run `seeds/petSeed.php` to populate sample data
6. Visit `http://localhost/hala/`




## Notes

- Default DB credentials are XAMPP defaults (`root` / no password) — update `db.php` before deploying
- Admin access is role-based; set `role = 'admin'` directly in the database for an admin account
