## Installation
### Prerequisites
- PHP 8.2+
- Composer
- Node.js & npm (for Vue frontend)
- MySQL or PostgreSQL database

### Setup Backend (Laravel 12)
1. Clone the repository:
   ```sh
   git clone https://github.com/jenarymadia/blue-shore-exam.git
   cd your-repo
   ```
2. Install dependencies:
   ```sh
   composer install
   ```
3. Create a `.env` file:
   ```sh
   cp .env.example .env
   ```
4. Configure database in `.env`:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```
5. Generate application key:
   ```sh
   php artisan key:generate
   ```
6. Run migrations and seed database:
   ```sh
   php artisan migrate --seed
   ```
7. Start the Laravel development server:
   ```sh
   php artisan serve
   ```

### Setup Frontend (Vue 3)
1. Navigate to frontend directory:
   ```sh
   cd frontend
   ```
2. Install dependencies:
   ```sh
   npm install
   ```
3. Create a `.env` file:
   ```sh
   cp .env.example .env
   ```
4. Set API URL in `.env`:
   ```env
   VITE_API_URL=http://127.0.0.1:8000/
   ```
5. Start the Vue development server:
   ```sh
   npm run dev
   ```

## API Endpoints
### Authentication
- `POST /api/login` - Authenticate user and return a token
- `POST /api/logout` - Logout user and revoke token

### Albums
- `GET /api/albums` - Get paginated album list
- `POST /api/albums` - Create a new album (Admin only)
- `DELETE /api/albums/{id}` - Delete an album (Admin only)
- `POST /api/albums/{id}/vote` - Upvote/Downvote an album

## Role-Based Access
- **User**: Can view and vote on albums.
- **Admin**: Can create and delete albums.

## Admin Account
- Email: admin@example.com
- Password: password123

## Testing with Postman
1. Set `Accept: application/json` in headers.
2. Login and retrieve token.
3. Use `Authorization: Bearer {token}` for protected routes.

## License
This project is licensed under the MIT License.

