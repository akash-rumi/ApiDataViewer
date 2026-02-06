# LaravelDataHub

A Laravel 12 application running inside Docker with MySQL, Nginx, and PHP.  
This project demonstrates fetching and storing external API data (Typicode and Placeholder.org), optimizing large data handling, and presenting it with Bootstrap‑styled views.

---

## 🚀 How to Set Up and Run the Application

### Prerequisites
- Docker & Docker Compose installed
- Bash shell (Linux/macOS/WSL; Windows users can use Git Bash or WSL)

### Folder Structure

```text
.
├── database/                     # MySQL data volume
├── docker/                       # Docker setup  
│   ├── mysql/
│   ├── nginx/
│   │   └── default.conf
│   └── php/
│   │    └── dockerfile
│   └── compose.yml
├── .gitignore
├── .dockerignore
├── setup.sh                      ## Automated setup script
└── src/                          # Laravel application code
```

### Quick Setup
Run the provided script:

```bash
./setup.sh
```
This will:
1. Stop old containers and prune safely.
2. Build and start **PHP**, **Nginx**, **MySQL**, and **phpMyAdmin** services.
3. Configure .env automatically (downloads if missing).
4. Run composer install, generate app key, and migrate + seed database.
5. Fix permissions for storage and ``bootstrap/cache``.

### Access
- Application → http://localhost
- phpMyAdmin → http://localhost:8080

### Useful Commands

```bash
docker compose -p laraveldev logs -f         # see logs
docker compose -p laraveldev exec php bash   # enter PHP container
docker compose -p laraveldev up -d           # start services
docker compose -p laraveldev down            # stop services
```
---
## 📦 Large Data Fetching, Storage, and Optimization
### 🌐 External APIs
- Typicode → https://jsonplaceholder.typicode.com/posts
- Placeholder → https://jsonplaceholder.org/posts

### Handling Strategy
- **Separate tables & models** for each API (`posts_typicode`, `posts_placeholder_org`).
- **Artisan commands** (`fetch:typicode-posts`, `fetch:placeholder-posts`) to fetch and store data.
- **Base command abstraction** → shared logic for fetching, transforming, and storing.

### Optimization
- **Reusable Blade component** → `posts-table` supports:
    - Clickable titles (links to show page).
    - Read more/less toggle for long text.
    - Word wrapping (`word-break: break-word`) for clean presentation.
- **Bootstrap integration** → consistent UI with pagination, tables, and sidebar navigation.
- **Conditional sidebar** → only shows navigation on non‑home routes.
---
## 📥 Running the Data Fetch Commands
After setup, populate your database with external posts:
```bash
# Fetch Typicode posts
docker compose -p laraveldev exec php php artisan fetch:typicode-posts

# Fetch Placeholder.org posts
docker compose -p laraveldev exec php php artisan fetch:placeholder-posts
```
Then visit:
- `http://localhost/posts-typicode` → Typicode posts list
- `http://localhost/posts-placeholder` → ``Placeholder.org``  posts list
---
## ⚡ Challenges and Solutions
1. **Date Parsing Errors**
    - **Issue:** ``Placeholder.org``  returned dates in ``DD/MM/YYYY HH:mm:ss`` format.
    - **Fix:** Used ``Carbon::createFromFormat('d/m/Y H:i:s', $date)`` instead of ``Carbon::parse()``.
2. **Long Text Presentation**
    - **Issue:** Typicode post bodies overflowed tables.
    - **Fix:** Added word-break: break-word; and a read more/less toggle for better UX.
3. **Sidebar Navigation**
    - **Issue:** Needed navigation only on non‑home routes.
    - **Fix:** Conditional Blade check`` (!request()->is('/'))`` to render sidebar only when not on ``/``.
---
## 🏆 Summary
This project demonstrates:
- Best practices in Laravel for external data handling.
- Optimized architecture with base commands, repositories, and reusable components.
- Clean presentation using Bootstrap with UX enhancements.
- Dockerized setup for consistent local development.

---