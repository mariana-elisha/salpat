<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: sans-serif;
            color: #333;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            background-color: #f8f9fa;
            padding: 20px;
            text-align: center;
            border-bottom: 2px solid #e9ecef;
        }

        .content {
            padding: 20px;
        }

        .details {
            margin-top: 20px;
            border: 1px solid #e9ecef;
            padding: 15px;
            border-radius: 5px;
        }

        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 12px;
            color: #6c757d;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #ea580c;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Booking Confirmation</h1>
            <p>Thank you for choosing us!</p>
        </div>
        <div class="content">
            <p>Dear {{ $booking->guest_name }},</p>
            <p>Your booking has been received and is currently <strong>{{ ucfirst($booking->status) }}</strong>.</p>

            <div class="details">
                <h3>Booking Details</h3>
                <p><strong>Reference:</strong> {{ $booking->booking_reference }}</p>
                <p><strong>Room:</strong> {{ $booking->room->name }}</p>
                <p><strong>Check-in:</strong> {{ $booking->check_in->format('M d, Y') }}</p>
                <p><strong>Check-out:</strong> {{ $booking->check_out->format('M d, Y') }}</p>
                <p><strong>Guests:</strong> {{ $booking->number_of_guests }}</p>
                <p><strong>Total Price:</strong> ${{ number_format($booking->total_price, 2) }}</p>
            </div>

            <p>You can view your booking details at any time by clicking the button below:</p>
            <a href="{{ route('bookings.show', $booking->booking_reference) }}" class="btn">View Booking</a>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
        </div>
    </div>
</body>

</html>