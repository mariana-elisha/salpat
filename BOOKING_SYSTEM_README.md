# Lodge Booking System

A comprehensive online booking and reservation system built with Laravel 12 and Tailwind CSS.

## Features

- **Room Management**: View available rooms with detailed information
- **Online Booking**: Users can make reservations online with date selection
- **Availability Checking**: Automatic availability checking based on existing bookings
- **Booking Management**: Admin panel to view and manage all reservations
- **Status Management**: Update booking status (pending, confirmed, cancelled, completed)
- **Guest Information**: Collect guest details including name, email, phone, and special requests
- **Price Calculation**: Automatic total price calculation based on number of nights

## Installation

1. **Install Dependencies**
   ```bash
   composer install
   npm install
   ```

2. **Environment Setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

3. **Database Configuration**
   - Update your `.env` file with database credentials
   - For SQLite (default), ensure `database/database.sqlite` exists or create it:
     ```bash
     touch database/database.sqlite
     ```

4. **Run Migrations**
   ```bash
   php artisan migrate
   ```

5. **Seed Sample Data**
   ```bash
   php artisan db:seed
   ```
   This will create 5 sample rooms:
   - Deluxe Suite ($199.99/night)
   - Family Room ($149.99/night)
   - Standard Double ($99.99/night)
   - Single Room ($79.99/night)
   - Presidential Suite ($399.99/night)

6. **Build Assets**
   ```bash
   npm run build
   ```
   Or for development:
   ```bash
   npm run dev
   ```

7. **Start Development Server**
   ```bash
   php artisan serve
   ```

## Usage

### For Guests

1. **Browse Rooms**: Visit the homepage to see featured rooms or go to `/rooms` to see all available rooms
2. **Search Availability**: Use the search form to filter rooms by check-in/check-out dates and number of guests
3. **View Room Details**: Click on any room to see detailed information and amenities
4. **Make a Booking**: Fill out the booking form with your details and confirm your reservation
5. **View Booking Confirmation**: After booking, you'll receive a booking reference number

### For Administrators

1. **View All Bookings**: Navigate to `/bookings` to see all reservations
2. **Update Status**: Change booking status using the dropdown menu (pending, confirmed, cancelled, completed)
3. **View Details**: Click "View" to see complete booking information

## Routes

- `/` - Homepage with featured rooms and search form
- `/rooms` - List all available rooms
- `/rooms/{room}` - View room details and booking form
- `/bookings` - View all bookings (admin panel)
- `/bookings/{booking}` - View booking confirmation/details

## Database Schema

### Rooms Table
- `id` - Primary key
- `name` - Room name
- `description` - Room description
- `type` - Room type (single, double, suite, etc.)
- `capacity` - Maximum number of guests
- `price_per_night` - Price per night
- `image` - Room image path (optional)
- `amenities` - JSON array of amenities
- `is_available` - Availability status
- `timestamps` - Created/updated timestamps

### Bookings Table
- `id` - Primary key
- `room_id` - Foreign key to rooms table
- `user_id` - Foreign key to users table (nullable)
- `guest_name` - Guest's full name
- `guest_email` - Guest's email
- `guest_phone` - Guest's phone (optional)
- `check_in` - Check-in date
- `check_out` - Check-out date
- `number_of_guests` - Number of guests
- `total_price` - Total booking price
- `status` - Booking status (pending, confirmed, cancelled, completed)
- `special_requests` - Special requests/notes
- `booking_reference` - Unique booking reference
- `timestamps` - Created/updated timestamps

## Key Features Implementation

### Availability Checking
The system checks room availability by:
- Verifying the room is marked as available
- Checking for overlapping bookings (excluding cancelled ones)
- Ensuring check-in date is not in the past
- Validating check-out is after check-in

### Price Calculation
Total price is automatically calculated:
```
Total Price = Price per Night × Number of Nights
```

### Booking Reference
Each booking gets a unique reference number in the format: `BK` + 8 random characters (e.g., `BK1A2B3C4`)

## Customization

### Adding New Rooms
You can add rooms through:
1. Database seeder (add to `RoomSeeder.php`)
2. Database directly
3. Create an admin interface (future enhancement)

### Styling
The system uses Tailwind CSS. Modify styles in:
- `resources/css/app.css`
- Blade templates in `resources/views/`

### Room Images
To add room images:
1. Store images in `storage/app/public/rooms/`
2. Update the `image` field in the rooms table
3. Run `php artisan storage:link` to create symbolic link

## Future Enhancements

- User authentication integration
- Email notifications for bookings
- Payment integration
- Calendar view for availability
- Room image upload interface
- Advanced filtering and search
- Booking cancellation by guests
- Reviews and ratings

## Support

For issues or questions, please check the Laravel documentation or create an issue in the repository.
