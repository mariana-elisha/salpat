<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation — {{ config('app.name') }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            background-color: #f1f5f9;
            color: #334155;
            line-height: 1.6;
        }

        .wrapper {
            max-width: 620px;
            margin: 40px auto;
            background-color: #ffffff;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.08);
        }

        /* Header */
        .header {
            background: linear-gradient(135deg, #0B7BBF 0%, #095f99 100%);
            padding: 36px 40px;
            text-align: center;
        }

        .header-logo {
            display: inline-block;
            background-color: rgba(255, 255, 255, 0.15);
            border-radius: 12px;
            padding: 10px 20px;
            margin-bottom: 16px;
        }

        .header-logo span {
            font-size: 22px;
            font-weight: 700;
            color: #ffffff;
            letter-spacing: 1px;
        }

        .header h1 {
            font-size: 26px;
            font-weight: 700;
            color: #ffffff;
            margin-bottom: 6px;
        }

        .header p {
            color: rgba(255, 255, 255, 0.85);
            font-size: 15px;
        }

        /* Badge */
        .status-badge {
            display: inline-block;
            background-color: #E89968;
            color: #ffffff;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 4px 14px;
            border-radius: 999px;
            margin-top: 14px;
        }

        /* Content */
        .content {
            padding: 36px 40px;
        }

        .greeting {
            font-size: 17px;
            font-weight: 600;
            color: #0f172a;
            margin-bottom: 10px;
        }

        .intro {
            font-size: 15px;
            color: #475569;
            margin-bottom: 28px;
        }

        /* Reference box */
        .reference-box {
            background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
            border: 1px solid #bae6fd;
            border-radius: 12px;
            padding: 18px 24px;
            text-align: center;
            margin-bottom: 28px;
        }

        .reference-label {
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #0B7BBF;
            margin-bottom: 6px;
        }

        .reference-code {
            font-size: 22px;
            font-weight: 700;
            color: #0B7BBF;
            letter-spacing: 2px;
        }

        /* Details table */
        .section-title {
            font-size: 13px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #94a3b8;
            margin-bottom: 12px;
        }

        .details-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 28px;
        }

        .details-table tr {
            border-bottom: 1px solid #f1f5f9;
        }

        .details-table tr:last-child {
            border-bottom: none;
        }

        .details-table td {
            padding: 12px 4px;
            font-size: 15px;
        }

        .details-table td:first-child {
            font-weight: 600;
            color: #64748b;
            width: 40%;
        }

        .details-table td:last-child {
            color: #0f172a;
            font-weight: 500;
        }

        /* Total price highlight */
        .price-row td {
            color: #0B7BBF !important;
            font-weight: 700 !important;
            font-size: 16px !important;
        }

        /* CTA Button */
        .cta-wrapper {
            text-align: center;
            margin: 28px 0;
        }

        .cta-btn {
            display: inline-block;
            background: linear-gradient(135deg, #0B7BBF 0%, #095f99 100%);
            color: #ffffff !important;
            text-decoration: none;
            font-size: 15px;
            font-weight: 600;
            padding: 14px 32px;
            border-radius: 10px;
            box-shadow: 0 4px 14px rgba(11, 123, 191, 0.3);
        }

        /* Special requests */
        .special-requests {
            background-color: #fffbeb;
            border: 1px solid #fde68a;
            border-radius: 10px;
            padding: 14px 18px;
            font-size: 14px;
            color: #78350f;
            margin-bottom: 28px;
        }

        .special-requests strong {
            display: block;
            margin-bottom: 4px;
            color: #92400e;
        }

        /* Divider */
        .divider {
            height: 1px;
            background-color: #e2e8f0;
            margin: 28px 0;
        }

        /* Footer */
        .footer {
            background-color: #f8fafc;
            border-top: 1px solid #e2e8f0;
            padding: 24px 40px;
            text-align: center;
        }

        .footer p {
            font-size: 13px;
            color: #94a3b8;
            line-height: 1.8;
        }

        .footer a {
            color: #0B7BBF;
            text-decoration: none;
        }

        .footer .accent {
            color: #E89968;
            font-weight: 600;
        }
    </style>
</head>

<body>
    <div class="wrapper">

        {{-- Header --}}
        <div class="header">
            <div class="header-logo">
                <span>{{ config('app.name') }}</span>
            </div>
            <h1>Booking Confirmed!</h1>
            <p>Your reservation has been received. We look forward to welcoming you.</p>
            <span class="status-badge">{{ ucfirst($booking->status) }}</span>
        </div>

        {{-- Body --}}
        <div class="content">
            <p class="greeting">Dear {{ $booking->guest_name }},</p>
            <p class="intro">
                Thank you for choosing <strong>{{ config('app.name') }}</strong>. Your booking is confirmed and we have
                all the details below for your reference.
            </p>

            {{-- Reference Box --}}
            <div class="reference-box">
                <div class="reference-label">Booking Reference</div>
                <div class="reference-code">{{ $booking->booking_reference }}</div>
            </div>

            {{-- Booking Details --}}
            <div class="section-title">Booking Details</div>
            <table class="details-table">
                <tr>
                    <td>Room</td>
                    <td>{{ $booking->room->name }}</td>
                </tr>
                <tr>
                    <td>Check-in</td>
                    <td>{{ $booking->check_in->format('l, M d, Y') }}</td>
                </tr>
                <tr>
                    <td>Check-out</td>
                    <td>{{ $booking->check_out->format('l, M d, Y') }}</td>
                </tr>
                <tr>
                    <td>Nights</td>
                    <td>{{ $booking->check_in->diffInDays($booking->check_out) }} night(s)</td>
                </tr>
                <tr>
                    <td>Guests</td>
                    <td>{{ $booking->number_of_guests }} guest(s)</td>
                </tr>
                @if($booking->contact_preference)
                    <tr>
                        <td>Contact via</td>
                        <td>{{ ucfirst($booking->contact_preference) }}</td>
                    </tr>
                @endif
                <tr class="price-row">
                    <td>Total Amount</td>
                    <td>${{ number_format($booking->total_price, 2) }}</td>
                </tr>
            </table>

            @if($booking->special_requests)
                <div class="special-requests">
                    <strong>📝 Special Requests</strong>
                    {{ $booking->special_requests }}
                </div>
            @endif

            {{-- CTA --}}
            <div class="cta-wrapper">
                <a href="{{ route('bookings.show', $booking->booking_reference) }}" class="cta-btn">
                    View My Booking →
                </a>
            </div>

            <div class="divider"></div>

            <p style="font-size: 14px; color: #64748b;">
                If you have any questions or need to make changes, please contact us at
                <a href="mailto:info@salpatcamp.com" style="color: #0B7BBF;">info@salpatcamp.com</a>
                or call <strong>+255 770 307 759</strong>.
            </p>
        </div>

        {{-- Footer --}}
        <div class="footer">
            <p>
                <span class="accent">{{ config('app.name') }}</span><br>
                Wailes Street, Soweto Moshi, Kilimanjaro, Tanzania<br>
                <a href="tel:+255770307759">+255 770 307 759</a> &middot;
                <a href="mailto:info@salpatcamp.com">info@salpatcamp.com</a>
            </p>
            <p style="margin-top: 12px;">&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
        </div>

    </div>
</body>

</html>